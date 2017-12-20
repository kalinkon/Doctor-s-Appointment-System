<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Patients extends Model
{
    protected $table = 'patients';

    protected $fillable = [
        'user_id','address', 'totalAppointmentCount', 'noShowUpCount', 'showUpCount'
        ,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function appointments()
    {
        return $this->hasMany(Appointments::class);
    }


}
