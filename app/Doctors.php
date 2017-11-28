<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Doctors extends Model
{
    protected $table = 'doctors';

    protected $fillable = [
        'userId',
        'registrationNo',
        'educationalDegrees',
        'specializationDepartment',
        'chamberAddress',
        'chamberAddressGeoLocation',
        'VisitFee',
        'isActiveForScheduling',
        'isCurrentlyOpen',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


}