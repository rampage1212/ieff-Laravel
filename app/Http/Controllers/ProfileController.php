<?php
         
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

        
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
   		return view('profile');
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	if ($request->user_id == null) {
        	return response()->json(['error' => 'An unknown error occured. Refresh the page and try again.']);
        }

    	$rules = array(
            'name'                  => ['required', 'string', 'max:255'],
            'surname'               => ['required', 'string', 'max:255'],
            'nickname'              => ['required', 'string', 'max:255'],
            'avatar'                => ['nullable', 'image'],
            'country'               => ['required', 'string', 'max:255'],
            'city'                  => ['required', 'string', 'max:255'],
            'postcode'              => ['required', 'string', 'max:255'],
            'competing_fifa'        => ['nullable', 'boolean'],
            'competing_pes'         => ['nullable', 'boolean'],
            'competing_playstation' => ['nullable', 'boolean'],
            'competing_xbox'        => ['nullable', 'boolean'],
            'birthdate'             => ['nullable', 'date'],
            'team_name'             => ['nullable', 'string', 'max:255'],
            'team_email'            => ['nullable', 'string', 'email', 'max:255', ],
            'organiser_name'        => ['nullable', 'string', 'max:255'],
            'manager_name'          => ['nullable', 'string', 'max:255'],
            'email'                 => ['unique:users,email,'.Auth::user()->id],
            'password'              => ['nullable', 'string', 'min:8', 'confirmed'],
            'permission_name'       => ['nullable', 'boolean'],
            'permission_surname'    => ['nullable', 'boolean'],
            'permission_email'      => ['nullable', 'boolean'],
            'permission_birthdate'  => ['nullable', 'boolean'],
            'permission_city'       => ['nullable', 'boolean'],
        );
        $error = Validator::make($request->all(), $rules);
		if($error->fails())
        {
            return response()->json(['validation' => $error->errors()->messages()]);
        }

        $user = User::where('id', $request->user_id)->first();
        $user->name                  = $request->name;               
        $user->surname               = $request->surname;           
        $user->nickname              = $request->nickname;   
        if ($request->hasfile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/images/uploads/avatars/'.$filename));
            $user->avatar            = 'images/uploads/avatars/'.$filename;
        }           
        $user->country                = $request->country;            
        $user->city                   = $request->city;            
        $user->postcode               = $request->postcode;         
        $user->type                   = $request->type;         
        $user->competing_fifa         = $request->competing_fifa;         
        $user->competing_pes          = $request->competing_pes;        
        $user->competing_playstation  = $request->competing_playstation;   
        $user->competing_xbox         = $request->competing_xbox;    
        $user->birthdate              = $request->birthdate;         
        $user->team_name              = $request->team_name;          
        $user->team_email             = $request->team_email;         
        $user->organiser_name         = $request->organiser_name;        
        $user->manager_name           = $request->manager_name;         
        $user->email                  = $request->email;     
        if($request->password !== null) {
        	$user->password           = $request->password;  
        }   
        $user->permissions->name      = $request->permission_name;
        $user->permissions->surname   = $request->permission_surname;
        $user->permissions->email     = $request->permission_email;
        $user->permissions->birthdate = $request->permission_birthdate;
        $user->permissions->city      = $request->permission_city;
        $user->save();  
        $user->permissions->save();

        return response()->json(['success' => '/images/uploads/avatars/'.$filename]);
    }
}