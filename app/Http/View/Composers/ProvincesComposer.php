<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Country;
use App\City;
use App\District;
use App\Commune;
use App\Village;

class ProvincesComposer
{
	public function compose(View $view)
    {
        $view->with('countries', Country::orderBy('name')->get());
        $view->with('cities', City::orderBy('city_name')->get());
        $view->with('districts', District::orderBy('district_name')->get());
        $view->with('communes', Commune::orderBy('commune_name')->get());
        $view->with('villages', Village::orderBy('village_name')->get());
    }

}