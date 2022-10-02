<?php

namespace App\Http\Controllers;
use App\Models\Transferwindow;
use Illuminate\Http\Request;
use Auth;

class TransferwindowController extends Controller
{
    public function index(Request $request) 
    {
        if(!Auth::check()) {
            return view('auth.login');
        }
        else {
            if (Auth::user()->paypal == 0) {
                return view('license');
            }
        }

        $window = Transferwindow::first();

    	return view('transfers')->withWindow($window);
    }
}