<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'content',
        'image',
        'featured',
        'user_id',
        'member-nations',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }


    public static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            $blog->user_id = auth()->user()->id;
        });
    }
}
