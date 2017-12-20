<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


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

    public function scheduling_setting()
    {
        return $this->hasOne(SchedulingSetting::class);
    }
    public function dayOff(){
        return $this->hasOne(DayOff::class);
    }
    public function appointments()
    {
        return $this->hasMany(Appointments::class);
    }



}