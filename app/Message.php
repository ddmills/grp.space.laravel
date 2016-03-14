<?php

namespace App;

use App\Room;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['content'];

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function setAuthor(User $user)
    {
        $this->author()->associate($user);
        $this->save();
        return $this;
    }

    public function room()
    {
        return $this->belongsTo('App\Room', 'room_id');
    }

    public function setRoom(Room $room)
    {
        $this->room()->associate($room);
        $this->save();
        return $this;
    }
}
