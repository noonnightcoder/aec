<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Referral;
use App\Item;
use App\Brand;
use App\ItemType;


class GeneralController extends Controller
{
   
    public function patient($id) 
    {
		$patient = Patient::where("id", '=', $id)->first();
		$referral = Referral::where("id", '=', $patient->referral_id)->first();
	
		$out = [];
		
		$birthdate= new \DateTime($patient->date_of_birth);
		$today = new \DateTIme();	
		$age = $birthdate->diff($today)->y;
	
		$out['family_name'] = $patient->family_name;
		$out['given_name'] = $patient->given_name;
		$out['referral_from'] = $referral->referral_name;
		$out['age'] = $age;
        return json_encode($out);
    }

    public function manufacturer($id) 
    {
		$item = Item::where("id", '=', $id)->first();
		
		$brand = Brand::where("id", '=', $item->brand_id)->first();
		$type = ItemType::where("id", '=', $item->type_id)->first();
	
		$out = [];
		$out['brand_name'] = $brand->brand_name;
		$out['type_name'] = $type->type_name;
        return json_encode($out);
    }

}