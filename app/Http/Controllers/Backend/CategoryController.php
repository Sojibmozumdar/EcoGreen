<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

       $categoreis =  Category::orderByDesc("id")->paginate(5);
        return view('backend.category.index', compact('categoreis'));
    }
    public function create()
    {
        return view('backend.category.create');
    }

    public function store(Request $request)
{
    $category = new Category();
    $category->name = $request->name;
    $category->order = $request->order;
    $category->status = $request->status;

   if ($category->save()) {
    return redirect()->route('category.index')
        ->with('success', 'Created Successfully');
}

return redirect()->back()
    ->with('danger', 'Created unsuccessful');

}


}
