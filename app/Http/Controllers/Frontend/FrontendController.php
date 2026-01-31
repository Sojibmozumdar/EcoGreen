<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\Product;

class FrontendController extends Controller
{
    public function index()
    {

        $categories = Category::with(['subCategories' => function ($q) {$q->where('status', 1);}])->where('status', 1)->get();

        $products = Product::with('uploads')->where('status', 1)->latest()->take(8)->get();

        return view('home', compact('categories', 'products'));

    }

    public function productDetails($id)
    {

        $product = Product::find($id);
        return view('frontend.product_details', compact('product'));
    }

}
