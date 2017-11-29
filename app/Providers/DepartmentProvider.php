<?php

namespace App\Providers;

use App\SpecializationDepartment;
use Illuminate\Support\ServiceProvider;

class  DepartmentProvider extends ServiceProvider
{
    public function boot()
    {
        view()-> composer('*',function ($view)
        {
           $view -> with ('departmentArray', SpecializationDepartment::all());

        });
    }
}