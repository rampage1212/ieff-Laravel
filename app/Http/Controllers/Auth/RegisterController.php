<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'                  => ['required', 'string', 'max:255'],
            'surname'               => ['required', 'string', 'max:255'],
            'nickname'              => ['nullable', 'string', 'max:255'],
            'avatar'                => ['nullable', 'image'],
            'country'               => ['required', 'string', 'max:255'],
            'city'                  => ['required', 'string', 'max:255'],
            'postcode'              => ['required', 'string', 'max:255'],
            'federation'            => ['nullable', 'string', 'max:255'],
            'competing_fifa'        => ['nullable', 'boolean'],
            'competing_pes'         => ['nullable', 'boolean'],
            'competing_playstation' => ['nullable', 'boolean'],
            'competing_xbox'        => ['nullable', 'boolean'],
            'birthdate'             => ['nullable', 'date'],
            'team_name'             => ['nullable', 'string', 'max:255'],
            'team_email'            => ['nullable', 'string', 'email', 'max:255', ],
            'organiser_name'        => ['nullable', 'string', 'max:255'],
            'manager_name'          => ['nullable', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
            'permission_name'       => ['nullable', 'boolean'],
            'permission_surname'    => ['nullable', 'boolean'],
            'permission_city'       => ['nullable', 'boolean'],
            'permission_email'      => ['nullable', 'boolean'],
            'permission_birthdate'  => ['nullable', 'boolean'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $request = app('request');
        $filename = null;
        if ($request->hasfile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/images/uploads/avatars/'.$filename));
            $imageLink = '/images/uploads/avatars/'.$filename;
        }
        else {
            $imageLink = 'images/icons/avatar.jpg';
        }

        $user = User::create([
            'name'                  => $data['name'],
            'surname'               => $data['surname'],
            'nickname'              => $data['nickname'] ?? null,
            'avatar'                => $imageLink,
            'country'               => $data['country'],
            'city'                  => $data['city'],
            'postcode'              => $data['postcode'],
            'type'                  => $data['type'],
            'federation'            => $data['federation'] ?? null,
            'competing_fifa'        => $data['competing_fifa'] ?? null,
            'competing_pes'         => $data['competing_pes'] ?? null,
            'competing_playstation' => $data['competing_playstation'] ?? null,
            'competing_xbox'        => $data['competing_xbox'] ?? null,
            'birthdate'             => $data['birthdate'] ?? null,
            'team_name'             => $data['team_name'] ?? null,
            'team_email'            => $data['team_email'] ?? null,
            'organiser_name'        => $data['organiser_name'] ?? null,
            'manager_name'          => $data['manager_name'] ?? null,
            'email'                 => $data['email'],
            'password'              => Hash::make($data['password']),
            'permission_name'       => $data['permission_name'] ?? null,
            'permission_surname'    => $data['permission_surname'] ?? null,
            'permission_email'      => $data['permission_email'] ?? null,
            'permission_city'       => $data['permission_city'] ?? null,
            'permission_birthdate'  => $data['permission_birthdate'] ?? null,
        ]);

        return $user;
    }
}
