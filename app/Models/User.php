<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Messagable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'nickname',
        'avatar',
        'country',
        'city',
        'postcode',
        'type',
        'competing_fifa',
        'competing_pes',
        'competing_playstation',
        'competing_xbox',
        'birthdate',
        'team_name',
        'team_email',
        'organiser_name',
        'manager_name',
        'email',
        'password',
        'federation',
        'banned',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'banned' => 'datetime',
    ];

    public function location()
    {
        return $this->hasOne(Country::class, 'alpha-2', 'country');
    }

    public function permissions()
    {
        return $this->hasOne(Permission::class);
    }
}
