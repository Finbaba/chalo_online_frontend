<?php
namespace App\Http\Controllers\Webapp;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\EcomBrand;
use App\Models\EcomProduct;

class BrandsController extends Controller
{


    public function index()
    {

        $brands= EcomBrand::select('name' ,'photo','id')->distinct()->get();




        // $products = Product::select('photos', 'title', 'sale_price')->get();
        return view('webapp.allbrand', compact('brands'));
    }

    public function subbrands(Request $request)
    {
        $brandId = $request->input('id');

        // Category find karo
        $brand = EcomBrand::findOrFail($brandId);

        // Related subcategories nikaalo (agar model me relation defined hai)
        $subbrands = EcomBrand::where('id', $brandId)->get();
        $products = EcomProduct::where('brand_id', $brandId)->get();
      
        return view('webapp.sub_brands', compact('brand', 'subbrands','products'));
    }

}
