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
        $subcategory              = new Subcategory();
        $subcategory->name        = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->order       = $request->order ?? 0;
        $subcategory->status      = $request->status;

        if ($subcategory->save()) {
            return redirect()->route('sub_category.index')
                ->with('success', 'Created Successfully');
        }

        return redirect()->back()
            ->with('danger', 'Create unsuccessful');
    }

    public function edit($id)
    {

        $row = Subcategory::find($id);

        $categories = Category::orderBy('order', 'asc')->get();
        return view('backend.sub-category.edit', compact('row', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $subcategory                 = Subcategory::find($id);
        $subcategory->name           = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->order          = $request->order;
        $subcategory->status         = $request->status;

        if ($subcategory->save()) {
            return redirect()->route('sub_category.index')
                ->with('success', 'Updated Successfully');
        }

        return redirect()->back()
            ->with('danger', 'Update unsuccessful');

    }

    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);

        if ($subcategory->delete()) {
            return redirect()->route('sub_category.index')
                ->with('success', 'Category deleted successfully');
        }

        return redirect()->back()
            ->with('danger', 'Delete failed');
    }

}
