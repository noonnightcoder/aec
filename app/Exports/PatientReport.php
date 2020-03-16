<?php
namespace App\Exports;

use App\Consultation;
use App\DiagnosisR;
use App\DiagnosisL;
use App\Diagnosise;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PatientReport implements FromView
{
	
    public function view(): View
    {
		$data = $this->data;
		$data['patients'] = Consultation::with('patient')->whereBetween('consultation_date', [$data['from'], $data['to']])->get();
		
		
        return view('export/patient',$data);
    }
}