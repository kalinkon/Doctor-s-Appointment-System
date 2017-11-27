<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Patients extends Model
{
    protected $table = 'patients';

    protected $fillable = [
        'userId','address', 'totalAppointmentCount', 'noShowUpCount', 'showUpCount'
        ,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
