<?php
namespace App\Http\Controllers\Webapp;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth; 
use App\Models\EcomRewardPoint;
use App\Models\EcomScratchCard;
class UserController extends Controller
{

    public function profile()
    {
      
        
       
        $totalRewardAmount = EcomScratchCard::sum('reward_amount');
return view('webapp.profile', compact('totalRewardAmount'));
    
       
    }
}
   


