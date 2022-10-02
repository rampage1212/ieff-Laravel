<?php

namespace App\Http\Controllers;
use App\Models\Ranking;
use App\Models\Update;
use Auth;

use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index() 
    {
    	$rankings = Ranking::orderBy('points', 'desc')->paginate(25);
    	foreach ($rankings as $ranking) {
    		if($ranking->previous_points == null) {
				$ranking->change = '<i class="icon-line-minus"></i>';
    		}
			elseif($ranking->previous_points > $ranking->points) {
				$ranking->change = '<i class="icon-line-chevrons-down danger"></i>';
			}
			elseif($ranking->previous_points < $ranking->points) {
				$ranking->change = '<i class="icon-line-chevrons-up success"></i>';
			}
			else {
				$ranking->change = '<i class="icon-line-minus"></i>';
			}
    	}
    	$text = Update::take(1)->first();
    	return view('rankings')->withRankings($rankings)->withText($text);
    }
}
