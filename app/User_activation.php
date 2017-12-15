<?php

namespace App;
//use Mail;

use Illuminate\Database\Eloquent\Model;
//use App\Mail\EmailVerification;

class User_activation extends Model
{
    protected $table='user_activation';

    protected $fillable=['user_id','token','created_at'];

    public $timestamps = false;

}
