<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function players(Request $request)
    {
    	return response()->json(['name'=>'success']);   
    }
}
