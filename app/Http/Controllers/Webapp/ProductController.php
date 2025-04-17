<?php
namespace App\Http\Controllers\Webapp;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($id)
    
{
    $product = Product::findOrFail($id);
    return view('webapp.productdetail', compact('product'));
}

}
