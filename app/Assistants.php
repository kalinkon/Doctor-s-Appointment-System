<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Assistants extends Model
{
    protected $table = 'assistants';


    protected $fillable = [
        'user_id', 'address', 'doctor_id', 'education', 'isActive'
        ,
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }


    public function appointments()
    {
        return $this->hasMany(Appointments::class);
    }


}

