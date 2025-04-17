<?php
namespace App\Http\Controllers\Webapp;
use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\EcomProduct;
use App\Models\EcomHomeSection;
use App\Models\EcomCategories;

class DiscoverController extends Controller
{
    public function index()
    {

        // Saare products fetch kar rahe hain. Agar pagination ya filtering chahiye toh usse modify kar sakti hain.
        $products = Product::select('id','photos', 'title', 'sale_price', 'compare_price' ,'available_stock', 'stock_status')->get();


        // $products = Product::select('photos', 'title', 'sale_price')->get();
        return view('webapp.discover', compact('products'));
    }

}





