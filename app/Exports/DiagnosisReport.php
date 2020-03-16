<?php
namespace App\Exports;

use App\Consultation;
use App\DiagnosisR;
use App\DiagnosisL;
use App\Diagnosise;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DiagnosisReport implements FromView
{
	
    public function view(): View
    {
		$data = $this->data;
		$consult = Consultation::with('patient')->whereBetween('consultation_date', [$data['from'], $data['to']])->get();
		$info = [];
		$diagnosis_ids = [];
		
		$group[] =['min'=>0, 'max'=>1]; 
		$group[] =['min'=>1, 'max'=>4]; 
		$group[] =['min'=>5, 'max'=>14]; 
		$group[] =['min'=>15, 'max'=>24]; 
		$group[] =['min'=>25, 'max'=>49]; 
		$group[] =['min'=>50, 'max'=>60]; 
		$group[] =['min'=>61, 'max'=>999]; 
		
		foreach($consult as $c){
	
			$birthdate= new \DateTime($c->patient->date_of_birth);
			$today = new \DateTime();	
			$age = $birthdate->diff($today)->y;
		
			foreach($group as $g){
				
				if($age>$g['min'] && $age<=$g['max'])
					if(!isset($info[$g['min'].'-'.$g['max']])){
						$info[$g['min'].'-'.$g['max']] = [];	
					
					if(!isset($info[$g['min'].'-'.$g['max']][$c->patient->gender]))
						$info[$g['min'].'-'.$g['max']][$c->patient->gender] = [];	
					
					$grouping = $info[$g['min'].'-'.$g['max']][$c->patient->gender];

					$dia_r = DiagnosisR::where('consultation_id', $c->id)->get();
					
					if($dia_r){
						foreach($dia_r as $d){
							$diagnosis_ids[$d->diagnosise_id] ='' ;
							if(isset($grouping[$d->diagnosise_id])){
								$grouping[$d->diagnosise_id]++;		
							}else{
								$grouping[$d->diagnosise_id] = 1;
							}
						}				
					}

			
					$dia_l = DiagnosisL::where('consultation_id', $c->id)->get();
					if($dia_l){
						foreach($dia_l as $d){
							$diagnosis_ids[$d->diagnosise_id] ='' ;
							if(isset($grouping[$d->diagnosise_id])){
								$grouping[$d->diagnosise_id]++;		
							}else{
								$grouping[$d->diagnosise_id] = 1;
							}
							
						}
					
					}
					
					$info[$g['min'].'-'.$g['max']][$c->patient->gender] = $grouping;
						
				}
				
			}		
		}
		
		$diagnosis_rec = Diagnosise::wherein('id', array_keys($diagnosis_ids))->get();
		$diagnosis = [];
		
		foreach($diagnosis_rec as $d){
			$diagnosis[$d->id] = $d;
			foreach($group as $g){
				
				$male_count = isset($info[$g['min'].'-'.$g['max']]['Male'][$d->id])?$info[$g['min'].'-'.$g['max']]['Male'][$d->id]:0;
				
				$female_count = isset($info[$g['min'].'-'.$g['max']]['Female'][$d->id])?$info[$g['min'].'-'.$g['max']]['Female'][$d->id]:0;
				
				if(!isset($info[$d->id]['male_total'])){
					$info[$d->id]['male_total'] = 0;
				}
				
				if(!isset($info[$d->id]['female_total'])){
					$info[$d->id]['female_total'] = 0;
				}
				
				$info[$d->id]['male_total'] +=$male_count;
				$info[$d->id]['female_total'] +=$female_count;	
			}
		}
		
		$data['info'] = $info;
		$data['diagnosis'] = $diagnosis;
		
        return view('export/diagnosis',$data);
    }
}