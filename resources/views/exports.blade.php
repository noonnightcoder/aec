<table>
	<tr>
		<td colspan="19" style="text-align:center;font-weight:bold;">{{$title}}</td>
	</tr>

	<tr>
		<td>No</td>
		<td>Ear Diagnosis</td>
		<td colspan="2" style="text-align:center;">Under 1 Year</td>
		<td colspan="2" style="text-align:center;">1-4 Year</td>
		<td colspan="2" style="text-align:center;">5-14 Year</td>
		<td colspan="2" style="text-align:center;">15-24 Year</td>
		<td colspan="2" style="text-align:center;">25-49 Year</td>
		<td colspan="2" style="text-align:center;">50-60 Year</td>
		<td colspan="2" style="text-align:center;">Over 60 Year</td>
		<td colspan="2" style="text-align:center;">Total</td>
		<td colspan="2" style="text-align:center;">Empolyee on Mission</td>
	</tr>
	
	<tr>
		<td></td>
		<td></td>
		<td>Female</td>
		<td>Male</td>
		<td>Female</td>
		<td>Male</td>
		<td>Female</td>
		<td>Male</td>
		<td>Female</td>
		<td>Male</td>
		<td>Female</td>
		<td>Male</td>
		<td>Female</td>
		<td>Male</td>
		<td>Female</td>
		<td>Male</td>
		<td>Female</td>
		<td>Male</td>
		<td></td>
	</tr>
	@foreach($diagnosis as $d)
	<tr>
		<td>{{isset($i)? ++$i:($i=1)}}</td>
		<td>{{$d->diagnosis_name}}</td>
		<td>{{isset($info['0-1']['Female'][$d->id])?$info['0-1']['Female'][$d->id]:'-'}}</td>
		<td>{{isset($info['0-1']['Male'][$d->id])?$info['0-1']['Male'][$d->id]:'-'}}</td>
		<td>{{isset($info['1-4']['Female'][$d->id])?$info['1-4']['Female'][$d->id]:'-'}}</td>
		<td>{{isset($info['1-4']['Male'][$d->id])?$info['1-4']['Male'][$d->id]:'-'}}</td>
		<td>{{isset($info['5-14']['Female'][$d->id])?$info['5-14']['Female'][$d->id]:'-'}}</td>
		<td>{{isset($info['5-14']['Male'][$d->id])?$info['5-14']['Male'][$d->id]:'-'}}</td>
		<td>{{isset($info['15-24']['Female'][$d->id])?$info['15-24']['Female'][$d->id]:'-'}}</td>
		<td>{{isset($info['15-24']['Male'][$d->id])?$info['15-24']['Male'][$d->id]:'-'}}</td>
		<td>{{isset($info['25-29']['Female'][$d->id])?$info['25-49']['Female'][$d->id]:'-'}}</td>
		<td>{{isset($info['25-29']['Male'][$d->id])?$info['25-49']['Male'][$d->id]:'-'}}</td>
		<td>{{isset($info['50-60']['Female'][$d->id])?$info['50-60']['Female'][$d->id]:'-'}}</td>
		<td>{{isset($info['50-60']['Male'][$d->id])?$info['50-60']['Male'][$d->id]:'-'}}</td>
		<td>{{isset($info['61-999']['Female'][$d->id])?$info['61-999']['Female'][$d->id]:'-'}}</td>
		<td>{{isset($info['61-999']['Male'][$d->id])?$info['61-999']['Male'][$d->id]:'-'}}</td>
		<td>{{isset($info[$d->id]['female_total'])?$info[$d->id]['female_total']:'-'}}</td>
		<td>{{isset($info[$d->id]['male_total'])?$info[$d->id]['male_total']:'-'}}</td>
		<td></td>
	</tr>
	
	@endforeach
	
	

</table>