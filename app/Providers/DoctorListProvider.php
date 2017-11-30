<?php

namespace App\Providers;

use App\Doctors;
use Illuminate\Support\ServiceProvider;

class  DoctorListProvider extends ServiceProvider
{
    public function boot()
    {
        view()-> composer('*',function ($view)
        {
            $view -> with ('doctorList', Doctors::all());

        });
    }
}