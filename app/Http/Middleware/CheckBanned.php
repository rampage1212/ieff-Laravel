<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Auth;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        if(Auth::check()){
            $banned = Auth::user()->banned;
            $now = Carbon::now();
            $result = $now->gt($banned);
            if ($result == false) {
                Auth::logout();

                $request->session()->invalidate();

                $request->session()->regenerateToken();

                return redirect()->route('login')->with('error', 'Your Account is suspended until '.$banned.'. Please contact an admin if you believe this is an error.');
            }
        }
        return $next($request);
    }
}
