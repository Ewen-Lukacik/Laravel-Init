<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'content',
        'people_id'
    ];
}
