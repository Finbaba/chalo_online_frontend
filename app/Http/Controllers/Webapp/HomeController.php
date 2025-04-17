<?php
namespace App\Http\Controllers\Webapp;
use App\Http\Controllers\Controller;
use App\Models\EcomBrand;
use App\Models\EcomCategory;
use App\Models\EcomHomeSection;
use App\Models\EcomProduct;
use App\Models\EcomSlider;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $tenant_id = 2;

        $homeSections = EcomHomeSection::where('tenant_id', $tenant_id)
            ->orderBy('order_number', 'ASC')
            ->get();

        $homeSections = $homeSections->map(function ($section) use ($tenant_id) {
            $list = collect([]); // Default empty list

            switch ($section->type) {
                case 'brand':
                    $list = EcomBrand::where(['tenant_id' => $tenant_id, 'home_section_id' => $section->id])->limit(10)->get();
                    break;
                case 'category':
                    $list = EcomCategory::where(['tenant_id' => $tenant_id, 'home_section_id' => $section->id])->limit(10)->get();
                    break;
                case 'product':
                    $list = EcomProduct::where(['tenant_id' => $tenant_id, 'home_section_id' => $section->id])->inRandomOrder()->limit(6)->get();
                    break;
                case 'slider':
                    $list = EcomSlider::where(['tenant_id' => $tenant_id, 'home_section_id' => $section->id])->inRandomOrder()->limit(6)->get();
                    break;
            }
            return [
                "id" => $section->id,
                "title" => $section->title,
                "type" => $section->type,
                "display" => $section->display,
                "list" => $list
            ];
        });


        return view('webapp.home', compact('homeSections'));
    }
}


//$categories = Category::select('name')->distinct()->get();
