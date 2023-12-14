<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'subject',
        'status',
        'content',
        'slug',
        'last_post_date'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function lastPost()
    // {
    //     return $this->hasOne('App\Models\Post')->latest();
    // }
}
