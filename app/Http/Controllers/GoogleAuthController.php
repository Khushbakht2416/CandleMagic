<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\File;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callBackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            $imagePath = '';
            if ($google_user->getAvatar()) {
                $imagePath = $this->getSocialAvatar($google_user->getAvatar(), '/frontend/images/resource/', $google_user->getId());
            }

            $user = User::where('google_id', $google_user->getId())->orWhere('email', $google_user->getEmail())->first();

            if (!$user) {
                $password = Str::random(24);
                $user = new User();
                $user->name = $google_user->getName();
                $user->email = $google_user->getEmail();
                $user->google_id = $google_user->getId();
                $user->image = $imagePath;
                $user->password = $password;
                $user->secure_password = Hash::make($password);
                $user->save();
            } else {

                $user->image = $imagePath ?? $user->image;
                $user->save();
            }

            Auth::login($user);

            return redirect()->intended('');

        } catch (\Throwable $th) {
            dd('Something went wrong: ' . $th->getMessage());
        }
    }

    private function getSocialAvatar($file, $path, $userId)
    {
        $fileContents = @file_get_contents($file);
        if ($fileContents !== false) {
            $filePath = public_path() . $path . $userId . ".jpg";
            File::put($filePath, $fileContents);
            return str_replace(public_path() . '/', '', $filePath);
        }
        return 'frontend/images/user/user.png';
    }
}
