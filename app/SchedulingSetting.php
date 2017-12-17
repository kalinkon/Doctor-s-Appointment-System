<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schedulingSetting extends Model
{

    protected $table = 'scheduling_settings';
    protected $primaryKey = 'id';

    protected $fillable = [
        'doctor_id',
        'appointmentReschedulingType',
        'visitBufferTime',
        'isAvailableOnFriday',
        'fridayStartingTime',
        'fridayClosingTime',
        'isAvailableOnSaturday',
        'saturdayStartingTime',
        'saturdayClosingTime',
        'isAvailableOnSunday',
    	'sundayStartingTime',
	    'sundayClosingTime',
        'isAvailableOnMonday',
	    'mondayStartingTime',
	    'mondayClosingTime',
        'isAvailableOnTuesday',
	    'tuesdayStartingTime',
        'tuesdayClosingTime',
	    'isAvailableOnWednesday',
        'wednesdayStartingTime',
	    'wednesdayClosingTime',
        'isAvailableOnThursday',
	    'thursdayStartingTime',
	    'thursdayClosingTime',
        'timeForCategoryA_patients',
        'timeForCategoryB_patients',
        'timeForCategoryC_patients',


    ];


    public function doctors()
    {
        return $this->belongsTo(Doctors::class);
    }








}
