<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Defines which attributes are allowed for mass assignment during creation or update.
     * This helps prevent security vulnerabilities like mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'content', 'author'
    ];

    /**
     * Specifies attributes that should be excluded from the model's JSON representation.
     * This can be useful for security reasons or to avoid unnecessary data exposure.
     *
     * @var array
     */
    protected $hidden = [];
}
