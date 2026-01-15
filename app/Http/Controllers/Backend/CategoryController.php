<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StorePostRequest;
use App\Http\Requests\Category\UpdatePostRequest;
use App\Models\Backend\Category;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::orderByDesc("id")->paginate(5);
        return view('backend.category.index', compact('categories'));
    }
    public function create()
    {
        return view('backend.category.create');
    }

    public function store(StorePostRequest $request)
    {
        $category         = new Category();
        $category->name   = $request->name;
        $category->order  = $request->order;
        $category->status = $request->status;

        if ($category->save()) {
            return redirect()->route('category.index')
                ->with('success', 'Created Successfully');
        }

        return redirect()->back()
            ->with('danger', 'Create unsuccessful');

    }

    public function edit($id)
    {

        $category = Category::find($id);

        return view('backend.category.edit', compact('category'));
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $category         = Category::find($id);
        $category->name   = $request->name;
        $category->order  = $request->order;
        $category->status = $request->status;

        if ($category->save()) {
            return redirect()->route('category.index')
                ->with('success', 'Updated Successfully');
        }

        return redirect()->back()
            ->with('danger', 'Update unsuccessful');

    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->delete()) {
            return redirect()->route('category.index')
                ->with('success', 'Category deleted successfully');
        }

        return redirect()->back()
            ->with('danger', 'Delete failed');
    }

}
