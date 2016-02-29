<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $attributes = ['access' => 'public'];

    protected $fillable = ['name', 'description'];

    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function setOwner(User $user)
    {
        $this->owner()->associate($user);
        $this->save();
        return $this;
    }

    public function members()
    {
        return $this->hasMany('App\User');
    }
}
