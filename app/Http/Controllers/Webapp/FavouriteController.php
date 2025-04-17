<?php
namespace App\Http\Controllers\Webapp;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\favourite;

class FavouriteController extends Controller
{
    public function index()
    {
        // Fetch all categories from the ecom_categories table
        $favourites = favourite::select('name')->distinct()->get();

        
        // Pass the data to a view
        return view('webapp.favourites.index', compact('favourites'));
    }
}
