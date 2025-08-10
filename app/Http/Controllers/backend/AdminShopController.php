<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\AdminShopModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminShopController extends Controller
{
    public function index()
    {
        $shop = AdminShopModel::all();
        return view('backend.pages-shop')->with('shop', $shop);
    }

    //EDIT_PAGE
    public function editshop($id)
    {
        $shop = AdminShopModel::find($id);
        return view('backend.pages-edit-shop')->with('shop', $shop);
    }
    //UPDATE_shop
    public function editsingleshop(Request $request, $id)
    {
        $shop = AdminShopModel::find($id);

        if (!$shop) {
            return redirect()->back()->with('error', 'shop not found');
        }

        $request->validate([
            'saletag' => 'required|string',
            'imgurl' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
            'pname' => 'required|string',
            'company' => 'required|string|in:IGET Moon,IGET Bar,AliBar,KUZ',
            'description' => 'required|string|max:5000',
            'information' => 'required|string|max:5000',
            'duration' => 'required|string',
            'actualprice' => 'required|numeric|min:0',
            'afterdiscount' => 'nullable|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'bestselling' => 'required|in:Yes,No'
        ]);

        if ($request->afterdiscount > $request->actualprice) {
            return redirect()->back()->with('error', "Actual Price is not greater than discount price");
        }


        if ($request->hasFile('imgurl')) {
            $imageName = 'Shop_upload_' . time() . '.' . $request->imgurl->extension();
            $folderPath = 'frontend/images/resource';
            $imagePath = $folderPath . '/' . $imageName;
            $request->imgurl->move(public_path($folderPath), $imageName);
            $shop->imgurl = $imagePath;
        } else {
            $shop->imgurl = $request->imgurlprevious;
        }

        $shop->saletag = $request->saletag;
        $shop->pname = $request->pname;
        $shop->company = $request->company;
        $shop->duration = $request->duration;
        $shop->description = $request->description;
        $shop->information = $request->information;
        $shop->actualprice = $request->actualprice;
        $shop->afterdiscount = $request->afterdiscount;
        $shop->quantity = $request->quantity;
        $shop->bestselling =($request->bestselling === 'Yes') ? 1 : 0;
        $shop->save();

        return redirect('/admin/shop')->with('success', 'shop updated successfully');
    }

    ///ADD_Shop
    public function addshop()
    {
        return view('backend.pages-add-shop');
    }

    //POST_shop
    public function addsingleshop(Request $request)
{
    $request->validate([
        'saletag' => 'required|string',
        'imgurl' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
        'pname' => 'required|string',
        'company' => 'required|string|in:IGET Bar,IGET Moon,AliBar,KUZ',
        'description' => 'required|string|max:5000',
        'information' => 'required|string|max:5000',
        'duration' => 'required|string',
        'actualprice' => 'required|numeric|min:0',
        'afterdiscount' => 'nullable|numeric|min:0',
        'quantity' => 'required|numeric|min:0',
        'bestselling' => 'required|in:Yes,No'
    ]);

    if ($request->afterdiscount > $request->actualprice) {
        return redirect()->back()->with('error', "Actual Price is not greater than discount price");
    }

    // Get the last product ID and increment by 1
    $lastProduct = AdminShopModel::orderBy('id', 'desc')->first();
    $nextProductId = $lastProduct ? $lastProduct->id + 1 : 1;

    $shop = new AdminShopModel();
    $randomString = Str::random(35);

    // Handle image upload
    if ($request->hasFile('imgurl')) {
        $imageName = 'Shop_upload_' . time() . '.' . $request->imgurl->extension();
        $folderPath = 'frontend/images/resource';
        $imagePath = $folderPath . '/' . $imageName;
        $request->imgurl->move(public_path($folderPath), $imageName);
        $shop->imgurl = $imagePath;
    }

    $shop->id = $nextProductId; // Set product ID
    $shop->saletag = $request->saletag;
    $shop->pname = $request->pname;
    $shop->actualprice = $request->actualprice;
    $shop->afterdiscount = $request->afterdiscount;
    $shop->company = $request->company;
    $shop->duration = $request->duration;
    $shop->description = $request->description;
    $shop->information = $request->information;
    $shop->quantity = $request->quantity;
    $shop->bestselling = $request->bestselling == 'Yes' ? 1 : 0;
    $shop->addtocart = $randomString;
    $shop->status = 1;
    $shop->save();

    return redirect('/admin/shop')->with('success', 'Shop added successfully');
}


    // Enable Shop
    public function enableshop($id)
    {
        $shop = AdminShopModel::find($id);
        if ($shop) {
            $shop->status = 1;
            $shop->save();
            return redirect()->back()->with('success', 'Shop enabled successfully.');
        }
        return redirect()->back()->with('error', 'Shop not found.');
    }

    // Disable Shop
    public function disableshop($id)
    {
        $shop = AdminShopModel::find($id);
        if ($shop) {
            $shop->status = 0;
            $shop->save();
            return redirect()->back()->with('success', 'Shop disabled successfully.');
        }
        return redirect()->back()->with('error', 'Shop not found.');
    }


    public function deleteshop($id)
    {
        $shop = AdminShopModel::find($id);
        if ($shop) {
            $shop->delete();
            return redirect()->back()->with('success', 'Shop enabled successfully.');
        }

        return redirect()->back()->with('error', 'Shop not found.');
    }
}
