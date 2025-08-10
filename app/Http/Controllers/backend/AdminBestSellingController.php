<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\AdminBestSellingModel;
use App\Models\frontend\ShopModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBestSellingController extends Controller
{
    public function index()
    {
        if (session()->has('email')){
            $bestselling = ShopModel::where('bestselling',1)->where('bestselling', 1)->get();
            return view('backend.pages-bestselling')->with('bestselling', $bestselling);
        } else {
            return view('backend.login');
        }
    }

    //EDIT_PAGE
    public function editbestselling($id)
    {
        if (session()->has('email')){
            $bestselling = AdminBestSellingModel::find($id);
            return view('backend.pages-edit-bestselling')->with('bestselling', $bestselling);
        }else {
            return view('backend.login');
        }
    }
    //UPDATE_bestselling
    public function editsinglebestselling(Request $request, $id)
    {
        if (!session()->has('email')){
            return view('backend.login');
        }
        $bestselling = AdminBestSellingModel::find($id);

        if (!$bestselling) {
            return redirect()->back()->with('error', 'bestselling product not found');
        }

        $request->validate([
            'saletag' => 'required|string',
            'imgurl' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
            'pname' => 'required|string',
            'company' => 'required|string',
            'description' => 'required|string|max:5000',
            'information' => 'required|string|max:5000',
            'duration' => 'required|string',
            'actualprice' => 'required|numeric',
            'afterdiscount' => 'nullable|numeric'
        ]);

        if ($request->hasFile('imgurl')) {
            $imageName = 'BestSelling_upload_' . time() . '.' . $request->imgurl->extension();
            $folderPath = 'frontend/images/resource';
            $imagePath = $folderPath . '/' . $imageName;
            $request->imgurl->move(public_path($folderPath), $imageName);
            $bestselling->imgurl = $imagePath;
        } else {
            $bestselling->imgurl = $request->imgurlprevious;
        }
        $bestselling->saletag = $request->saletag;
        $bestselling->pname = $request->pname;
        $bestselling->company = $request->company;
        $bestselling->duration = $request->duration;
        $bestselling->description = $request->description;
        $bestselling->information = $request->information;
        $bestselling->actualprice = $request->actualprice;
        $bestselling->afterdiscount = $request->afterdiscount;
        $bestselling->status = 1;
        $bestselling->save();

        return redirect('/admin/bestselling')->with('success', 'bestselling product updated successfully');
    }

    ///ADD_bestselling
    public function addbestselling()
    {
        if(session()->has('email')){
            $bestselling = ShopModel::all();
            return view('backend.pages-add-bestselling', compact(['bestselling']));
        } else {
            return view('backend.login');
        }

    }

    //POST_bestselling
    public function addsinglebestselling(Request $request)
    {
        if (!session()->has('email')){
            return view('backend.login');
        }
        $request->validate([
            'saletag' => 'required|string',
            'imgurl' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
            'pname' => 'required|string',
            'company' => 'required|string',
            'description' => 'required|string|max:5000',
            'information' => 'required|string|max:5000',
            'duration' => 'required|string',
            'actualprice' => 'required|numeric',
            'afterdiscount' => 'nullable|numeric'
        ]);


        $bestselling = new AdminBestSellingModel();
        $randomString = Str::random(35);

        $imageName = 'BestSelling_upload_' . time() . '.' . $request->imgurl->extension();
        $folderPath = 'frontend/images/resource';
        $imagePath = $folderPath . '/' . $imageName;
        $request->imgurl->move(public_path($folderPath), $imageName);
        $bestselling->imgurl = $imagePath;
        $bestselling->saletag = $request->saletag;
        $bestselling->pname = $request->pname;
        $bestselling->company = $request->company;
        $bestselling->duration = $request->duration;
        $bestselling->description = $request->description;
        $bestselling->information = $request->information;
        $bestselling->actualprice = $request->actualprice;
        $bestselling->afterdiscount = $request->afterdiscount;
        $bestselling->addtocart = $randomString;
        $bestselling->status = 1;
        $bestselling->save();

        return redirect()->back()->with('success', 'bestselling product added successfully');
    }
    public function enablebestselling($id)
    {
        if (!session()->has('email')){
            return view('backend.login');
        }
        $bestselling = ShopModel::find($id);
        if ($bestselling) {
            $bestselling->bestselling = 1;
            $bestselling->save();
            return redirect()->back()->with('success', 'bestselling product enabled successfully.');
        }
        return redirect()->back()->with('error', 'bestselling product not found.');
    }

    // Disable bestselling
    public function disablebestselling($id)
    {
        if (!session()->has('email')){
            return view('backend.login');
        }
        $bestselling = ShopModel::find($id);
        if ($bestselling) {
            $bestselling->bestselling = 0;
            $bestselling->save();
            return redirect()->back()->with('success', 'bestselling product disabled successfully.');
        }
        return redirect()->back()->with('error', 'bestselling product not found.');
    }


    //DELETE
    public function deletebestselling($id)
    {
        if (!session()->has('email')){
            return view('backend.login');
        }
        $bestselling = ShopModel::find($id);
        if ($bestselling) {
            $bestselling->bestselling = 0;
            $bestselling->save();
            return back()->with("success", 'Successfully Remove From Best Selling');
        }
        return redirect()->back();
    }
}

