<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\AdminProfileModal;
use App\Models\backend\AdminProfileModel;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function index()
    {
        if (session()->has('email')) {
            $admin = AdminProfileModel::where('id', 1)->first();
            return view('backend.users-profile', compact('admin'));
        } else {
            return redirect('/admin/login');
        }
    }
    public function updateAdminProfile(Request $request, $id)
    {
        if (session()->has('email')) {
            $admin = AdminProfileModel::find($id);
            if (!$admin) {
                return redirect()->back()->with('error', 'Admin not found');
            }

            $request->validate([
                'fullName' => 'required',
                'about' => 'required',
                'company' => 'required',
                'job' => 'required',
                'country' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'twitter' => 'required',
                'facebook' => 'required',
                'instagram' => 'required',
                'linkedin' => 'required',
                'profileImage' => 'image|mimes:jpeg,png,gif|max:2048'
            ]);

            if ($request->hasFile('profileImage')) {
                $imageName = 'profile_upload_' . time() . '.' . $request->profileImage->extension();
                $folderPath = 'frontend/img';
                $imagePath = $folderPath . '/' . $imageName;
                $request->profileImage->move(public_path($folderPath), $imageName);
                $admin->profile_image = $imagePath;
            }

            $admin->name = $request->fullName;
            $admin->about = $request->about;
            $admin->company = $request->company;
            $admin->job = $request->job;
            $admin->country = $request->country;
            $admin->address = $request->address;
            $admin->phone = $request->phone;
            $admin->email = $request->email;
            $admin->twitter = $request->twitter;
            $admin->facebook = $request->facebook;
            $admin->instagram = $request->instagram;
            $admin->linkedin = $request->linkedin;

            $admin->save();
            session()->put('job', $admin->job);
            session()->put('image', $admin->profile_image);
            session()->put('username', $admin->name);
            return redirect()->back()->with('success', 'Profile updated successfully');
        } else {
            return redirect('/admin/login');
        }
    }
}
