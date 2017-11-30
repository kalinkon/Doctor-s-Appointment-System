<?php
/**
 * Created by PhpStorm.
 * User: LINKN
 * Date: 11/29/2017
 * Time: 8:25 PM
 */


namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;
use App\Student;

class SpecializationDepartment extends Model
{
    protected $table = 'specialization_department';
    protected $fillable = ['departmentName' ];

    public function departments(){
        return $this->hasMany(Doctors::class);
    }


}
