<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function __construct(array $attributes = [])
	{

    	$this->entry_id = \Auth::user()->id;
    	$this->country_id = 116;
    	$this->city_id = 1;
    	parent::__construct($attributes);
	}
	
	public function getAgeAttribute($value)
    {
		$birthdate= new \DateTime($value);
		$today = new \DateTime();	
		$age = $birthdate->diff($today)->y;
		
        return $age;
    }
}
