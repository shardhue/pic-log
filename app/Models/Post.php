<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'image',
        'user_id'
    ];

    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
