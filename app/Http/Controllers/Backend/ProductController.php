<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\Upload;
use App\Models\Backend\Product;
use App\Models\Backend\Category;
use App\Models\Backend\Subcategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdatePostRequest;
use App\Http\Requests\Product\StorePostRequest;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category', 'subCategory', 'uploads')
            ->orderByDesc('id')
            ->paginate(10);

        return view('backend.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('status', 1)->orderBy('id')->get();
        $sub_categories = Subcategory::where('status', 1)->orderBy('id')->get();

        return view('backend.product.create', compact('categories', 'sub_categories'));
    }

    public function store(StorePostRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'price' => $request->price,
            'discount' => $request->discount ?? 0,
            'quantity' => $request->quantity,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'product_details' => $request->product_details,
            'delivery_policy' => $request->delivery_policy,
            'return_policy' => $request->return_policy,
            'status' => $request->status ?? 1,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('products', 'public');

                Upload::create([
                    'product_id' => $product->id,
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::where('status', 1)->orderBy('id')->get();
        $sub_categories = Subcategory::where('category_id', $product->category_id)
            ->where('status', 1)
            ->get();

        return view('backend.product.edit', compact('product', 'categories', 'sub_categories'));
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'price' => $request->price,
            'discount' => $request->discount ?? 0,
            'quantity' => $request->quantity,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'product_details' => $request->product_details,
            'delivery_policy' => $request->delivery_policy,
            'return_policy' => $request->return_policy,
            'status' => $request->status ?? 1,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('products', 'public');

                Upload::create([
                    'product_id' => $product->id,
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        foreach ($product->uploads as $upload) {
            \Storage::disk('public')->delete($upload->path);
            $upload->delete();
        }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }

    public function getSubCategories($category_id)
    {
        $sub_categories = Subcategory::where('category_id', $category_id)
            ->where('status', 1)
            ->get();

        return response()->json($sub_categories);
    }
}
