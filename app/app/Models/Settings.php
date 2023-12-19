<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'forum_name',
        'forum_tagline',
        'forum_description',
        'forum_keywords',
        'forum_url',
        'posts_per_page',
    ];
}
