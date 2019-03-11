<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Role;

use Illuminate\Http\Request;


class Admin extends Authenticatable
{
    use Notifiable;

     /**
     * The current route that should be route
     *
     *@var string
     */
     

    protected  $guard = 'admin';

    protected  $permissions, $currentRoute;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'hash', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

   

    public function articles(){

        return $this->hasMany('App\Article');
    }

    public function achieve() {

        return $this->update(['status' => '0'] );
    }

    public function active() {
        return $this->update(['status' => '1'] );
    }

    public function fillHash(){

        return $this->update(['hash' => null ]);
    }

    public function role(){

        return $this->belongsTo('App\Role', 'role_id');
    }
}
