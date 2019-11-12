<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\District;
use App\Commune;
use App\Village;

class ProvinceController extends Controller
{
    public function countries()
    {
        //$countries = DB::table('countries')->pluck("name","id");
        //return view('province',compact('countries'));
        return view('province');
    }

    public function cities($id) 
    {
        //$cities = DB::table("cities")->where("country_id",$id)->pluck("city_name","id");
        $cities = City::where("country_id", '=', $id)->get();
        return json_encode($cities);
    }

    public function districts($id) 
    {
        //$districts = DB::table("districts")->where("city_id",$id)->pluck("district_name","id");
        $districts = District::where("city_id", '=', $id)->get();
        return json_encode($districts);
    }

    public function communes($id) 
    {
        //$communes = DB::table("communes")->where("district_id",$id)->pluck("commune_name","id");
        $communes = Commune::where("district_id", '=', $id)->get();
        return json_encode($communes);
    }

    public function villages($id) 
    {
        //$villages = DB::table("villages")->where("commune_id",$id)->pluck("village_name","id");
        $villages = Village::where("commune_id", '=', $id)->get();
        return json_encode($villages);
    }
}
