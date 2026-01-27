<?php
namespace App\View\Composers;

use App\Models\Backend\Category;
use Illuminate\View\View;

class CategoryComposer
{
    public function compose(View $view)
    {

        $categories = Category::with('subCategories')->where('status', 1)->orderBy('order', 'asc')->get();

        $view->with('categories', $categories);
    }
}
