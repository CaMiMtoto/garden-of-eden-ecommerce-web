<?php

namespace App;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * @property mixed name
 * @property mixed email
 * @property mixed role
 * @property string password
 * @property mixed user_name
 * @property mixed $orders
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 */
class User extends Model implements Authenticatable, \Illuminate\Contracts\Auth\CanResetPassword
{
    use HasApiTokens, Notifiable;
    use \Illuminate\Auth\Authenticatable;
    use CanResetPassword;

    protected $fillable = [
        'name', 'email', 'role', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    /*    public function sendPasswordResetNotification($token)
        {
            $this->notify(new ResetPassword($token));
        }*/


}


