<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $attributes = ['access' => 'public'];

    protected $fillable = ['name', 'description'];
}
