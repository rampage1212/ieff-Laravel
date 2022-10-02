<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum_post extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'thread_id',
        'author_id',
        'content',
        'post_id',
        'sequence',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function thread()
    {
        return $this->belongsTo(Forum_thread::class, 'thread_id');
    }
}
