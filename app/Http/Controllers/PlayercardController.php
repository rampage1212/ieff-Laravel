<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class PlayercardController extends Controller
{
    public function index($slug)
    {
        if(!Auth::check()) {
            return view('auth.login');
        }
        else {
            if (Auth::user()->paypal == 0) {
                return view('license');
            }
        }

    	$user = User::findOrFail($slug);

    	return view('player-card')->withUser($user);
    }
}
