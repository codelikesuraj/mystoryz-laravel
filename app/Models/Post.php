<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $with = ['author'];

    protected $fillable  = [
        'title',
        'slug',
        'excerpt',
        'body',
        'user_id',
        'visibility',
    ];

    public function author () {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sluggable (): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    public function incrementViewCount() {
        $this->increment('views');
        $this->save();
    }
}
