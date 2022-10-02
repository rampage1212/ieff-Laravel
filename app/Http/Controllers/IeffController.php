<?php

namespace App\Http\Controllers;
use App\Models\Membernation;
use App\Models\Committeeplayers;
use Illuminate\Http\Request;

class IeffController extends Controller
{
    public function index(Request $request) 
    {
        $membernations = Membernation::all();
        $committeeplayers = Committeeplayers::all();

    	return view('ieff')->withMembernations($membernations)->withCommitteeplayers($committeeplayers);
    }
}
