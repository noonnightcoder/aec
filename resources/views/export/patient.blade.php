<table>
	<tr>
		<td colspan="11" style="text-align:center;font-weight:bold;">{{$title}}</td>
	</tr>

	<tr>
		<td style="text-align:center;">No</td>
		<td style="text-align:center;">Referral From</td>
		<td style="text-align:center;">Consultation Date</td>
		<td style="text-align:center;">Family Name</td>
		<td style="text-align:center;">Given Name</td>
		<td style="text-align:center;">Patient ID</td>
		<td style="text-align:center;">Age</td>
		<td style="text-align:center;">Gender</td>
		<td style="text-align:center;">FU</td>
		<td style="text-align:center;">Telephone 1</td>
		<td style="text-align:center;">Telephone 2</td>
	</tr>
	
	
	@foreach($patients as $p)
	
	<tr>
		<td style="text-align:center;">{{isset($i)? ++$i:($i=1)}}</td>
		<td style="text-align:center;">{{$p->referral}}</td>
		<td style="text-align:center;">{{$p->consultation_date}}</td>
		<td style="text-align:center;">{{$p->patient->family_name}}</td>
		<td style="text-align:center;">{{$p->patient->given_name}}</td>
		<td style="text-align:center;">{{$p->patient->id}}</td>
		<td style="text-align:center;">{{$p->patient->age}}</td>
		<td style="text-align:center;">{{$p->patient->gender}}</td>
		<td style="text-align:center;">{{$p->follow_up}}</td>
		<td style="text-align:center;">{{$p->patient->phone1}}</td>
		<td style="text-align:center;">{{$p->patient->phone2}}</td>
	</tr>
	
	
	@endforeach
	
	

</table>