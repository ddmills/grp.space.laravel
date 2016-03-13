<?php

namespace App;

use Auth;
use App\User;
use Carbon\Carbon;
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
        return $this->belongsToMany('App\User');
    }

    public function addMember($user)
    {
        if (!$this->members->contains($user)) {
            return $this->members()->attach($user);
        }
    }

    public function inviteUser($user)
    {
        if (!Auth::check()) {
            return false;
        }

        $currentUser = Auth::user();

        if ($user->id == $currentUser->id) {
            return false;
        }

        if ($this->owner->id != $currentUser->id) {
            return false;
        }

        $data = [
            'room' => $this->name,
            'roomid' => $this->id,
            'invitedby' => $currentUser->name,
            'token' => bin2hex(random_bytes(64)),
        ];

        $user->addNotification('room.invite', $data, Carbon::now()->addWeek());

        return true;
    }
}
