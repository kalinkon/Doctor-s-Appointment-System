<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $primaryKey = 'id';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'role',
        'mobileNo',
        'email',
        'password',
        'date_of_birth',
        'gender',
        'isActivated',
        'isValid',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];





    public function user_activation(){
        return $this->hasOne(User_activation::class);
    }


    public function hasRole($roles){
        return in_array($this->role, $roles);
    }

    public function isDoctor(){
        return $this->role == 'Doctor';
    }

    public function isAdmin(){
        return $this->role == 'Admin';
    }

    public function isPatient(){
        return $this->role == 'Patient';
    }

    public function isAssistant(){
        return $this->role == 'Assistant';
    }


//    public function verifications(){
//        return $this->hasMany(Verification::class);
//    }

    public function patients(){
        return $this->hasOne(Patients::class);
    }
    public function user_acyivation(){
        return $this->hasOne(User_activation::class);
    }


    public function doctors(){
        return $this->hasOne(Doctors::class);
    }

    public function admins(){
        return $this->hasOne(Admins::class);
    }


}
