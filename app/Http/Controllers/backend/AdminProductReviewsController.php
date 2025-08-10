<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\AdminProductReviewsModel;
use Illuminate\Http\Request;

class AdminProductReviewsController extends Controller
{
    public function destroy($id)
    {
        $product_reviews = AdminProductReviewsModel::findOrFail($id);
        $product_reviews->delete();

        return redirect()->back()->with('success', 'Product Review deleted successfully');
    }
}
