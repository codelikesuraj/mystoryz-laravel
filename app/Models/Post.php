<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $with = ['author'];

    protected $fillable  = [
        'title',
        'slug',
        'excerpt',
        'body',
        'user_id',
    ];

    public function author () {
        return $this->belongsTo(User::class, 'user_id');
    }
}
