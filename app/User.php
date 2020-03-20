<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'lastname', 'firstname', 'middlename', 'contact_number','type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function type(){
        return $this->hasOne('App\UserType','id','type_id');
    }

    public function media(){
        return $this->hasOne('App\Media','id','media_id');
    }

    public function privileges(){
        return $this->hasMany('App\UserPrivilege','user_id','id');
    }

    public function customer_role(){
        return $this->hasOne('App\UserPrivilege','user_id', 'id')->where('feature_id', 1);
    }

    public function item_role(){
        return $this->hasOne('App\UserPrivilege','user_id', 'id')->where('feature_id', 2);
    }

    public function report_role(){
        return $this->hasOne('App\UserPrivilege','user_id', 'id')->where('feature_id', 3);
    }

    public function usermanagement_role(){
        return $this->hasOne('App\UserPrivilege','user_id', 'id')->where('feature_id', 4);
    }

    public function sales_role(){
        return $this->hasOne('App\UserPrivilege','user_id', 'id')->where('feature_id', 5);
    }

    public function storecategory_role(){
        return $this->hasOne('App\UserPrivilege','user_id', 'id')->where('feature_id', 6);
    }
}
