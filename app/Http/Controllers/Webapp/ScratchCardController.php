<?php
namespace App\Http\Controllers\Webapp;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ScratchCard;
use App\Models\EcomScratchCard;
use App\Models\EcomRewardPoint;
use Carbon\Carbon;


class ScratchCardController extends Controller 
{
    

    public function showScratchCards()
    {
        
        $scratchCards = EcomScratchCard::all();
         // Optionally, calculate the total points from all scratch cards
    $totalPoints = $scratchCards->sum('points'); // This line sums up all the points from the 'points' column in EcomScratchCard model

 
        return view('webapp.scratch-cards', compact('scratchCards', 'totalPoints'));
    }


   
}


