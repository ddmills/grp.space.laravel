<?php

namespace App;

use Cache;
use Validator;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    public function following()
    {
        return $this->belongsToMany('App\Room');
    }

    public function accessibleRooms()
    {
        return $this->rooms->merge($this->following);
    }

    public static function findByIdentifier($identifier)
    {
        $data = ['identifier' => $identifier];
        $rules = ['identifier' => 'email'];

        $isEmail = Validator::make($data, $rules)->passes();

        $field = $isEmail ? 'email' : 'username';

        return User::where([$field => $identifier])->first();
    }

    public function addNotification($type, $data, $expiry=null)
    {
        $expiry = isset($expiry) ? $expiry : Carbon::now()->addDay();
        $key = 'notify.user.' . $this->id;

        $notification = compact('type', 'data', 'expiry');

        if (Cache::has($key)) {
            $val = Cache::get($key);
            array_push($val, $notification);
        } else {
            $val = [$notification];
        }

        Cache::put($key, $val, $expiry);
    }

    public function getNotifications($type = null)
    {
        $key = 'notify.user.' . $this->id;

        $notifications = Cache::get($key);

        if (is_null($notifications)) {
            return [];
        }

        if (is_null($type)) {
            return $notifications;
        }

        $filtered = [];

        foreach ($notifications as $notification) {
            if ($notification['type'] == $type) {
                array_push($filtered, $notification);
            }
        }

        return $filtered;
    }
}
