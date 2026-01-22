<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $sub_categories = Subcategory::orderByDesc("id")->paginate(5);
        return view('backend.sub-category.index', compact('sub_categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('order', 'asc')->get();
        return view('backend.sub-category.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'order'       => 'nullable|integer|min:0',
            'status'      => 'required|in:0,1',
        ]);

        $subcategory = Subcategory::create([
            'name'        => $validated['name'],
            'category_id' => $validated['category_id'],
            'order'       => $validated['order'] ?? 0,
            'status'      => $validated['status'],
        ]);

        return redirect()
            ->route('sub_category.index')
            ->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        $row = Subcategory::findOrFail($id);
        $categories = Category::orderBy('order', 'asc')->get();

        return view('backend.sub-category.edit', compact('row', 'categories'));
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'order'       => 'nullable|integer|min:0',
            'status'      => 'required|in:0,1',
        ]);

        $subcategory = Subcategory::findOrFail($id);

        $subcategory->update([
            'name'        => $validated['name'],
            'category_id' => $validated['category_id'],
            'order'       => $validated['order'] ?? 0,
            'status'      => $validated['status'],
        ]);

        return redirect()
            ->route('sub_category.index')
            ->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();

        return redirect()
            ->route('sub_category.index')
            ->with('success', 'Category deleted successfully');
    }
}
