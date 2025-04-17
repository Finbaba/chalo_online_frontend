<?php
namespace App\Http\Controllers\Webapp;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\EcomCategory;
use App\Models\EcomProduct;

class CategoryController extends Controller
{
    public function index()
    {
        // Fetch all categories from the ecom_categories table
        $categories = EcomCategory::select('id','name','photo')->distinct()->get();

        
        // Pass the data to a view
        return view('webapp.allcategories', compact('categories'));
    }

    public function subCategories(Request $request)
    {
        $categoryId = $request->input('id');

        // Category find karo
        $category = EcomCategory::findOrFail($categoryId);


        // Related subcategories nikaalo (agar model me relation defined hai)
        $subcategories = EcomCategory::where('parent_id', $categoryId)->get();

        $products = EcomProduct::where('cat_id', $categoryId)->get();
      
        return view('webapp.sub_categories', compact('category', 'subcategories' , 'products'));
    }
}
