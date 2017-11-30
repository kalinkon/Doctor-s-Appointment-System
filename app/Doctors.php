<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Doctors extends Model
{
    protected $table = 'doctors';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'doctorName',
        'registrationNo',
        'educationalDegrees',
        'specializationDepartment',
        'specializationDepartmentId',
        'chamberAddress',
        'chamberAddressGeoLocation',
        'visitFee',
        'isActiveForScheduling',
        'isCurrentlyOpen',

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


}