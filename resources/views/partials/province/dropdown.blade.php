<div class="form-group col-md-12">
    <label control-label for="country"> Country: </label>
    <select name="country_id" class="form-control" id="country_id">
        <option value="">=== Select Country ===</option>
        @foreach ($countries as $key => $value)
            <option value="{{ $value->id }}"@if(isset($dataTypeContent->country_id) && $dataTypeContent->country_id == $value->id) selected="selected"@endif>{{ $value->name }}</option>
        @endforeach
    </select>
</div>
 
<div class="form-group col-md-12">
    <label for="status"> City: </label>
    <select class="form-control" name="city_id" id="city_id">
        @foreach ($cities as $key => $value)
            <option value="{{ $value->id }}"@if(isset($dataTypeContent->city_id) && $dataTypeContent->city_id == $value->id) selected="selected"@endif>{{ $value->city_name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-md-12">
    <label control-label for="district"> District: </label>
    <select name="district_id" class="form-control" id="district_id">
        <option value="">=== Select District ===</option>
        @foreach ($districts as $key => $value)
            <option value="{{ $value->id }}"@if(isset($dataTypeContent->district_id) && $dataTypeContent->district_id == $value->id) selected="selected"@endif>{{ $value->district_name }}</option>
        @endforeach
    </select>
</div>   

<div class="form-group col-md-12">
    <label control-label for="commune"> Commune: </label>
    <select name="commune_id" class="form-control" id="commune_id">
        <option value="">=== Select Commune ===</option>
        @foreach ($communes as $key => $value)
            <option value="{{ $value->id }}"@if(isset($dataTypeContent->commune_id) && $dataTypeContent->commune_id == $value->id) selected="selected"@endif>{{ $value->commune_name }}</option>
        @endforeach
    </select>
</div>  

<div class="form-group col-md-12">
    <label control-label for="village"> Village: </label>
    <select name="village_id" class="form-control" id="village_id">
        <option value="">=== Select Village ===</option>
        @foreach ($villages as $key => $value)
            <option value="{{ $value->id }}"@if(isset($dataTypeContent->village_id) && $dataTypeContent->village_id == $value->id) selected="selected"@endif>{{ $value->village_name }}</option>
        @endforeach
    </select>
</div>  

@section('javascript')
<script>

 jQuery('#country_id').on('change',function()
  {
     var countryID = jQuery(this).val();
     if(countryID)
     {
        jQuery.ajax({
           url : "{{ url('/json-cities') }}" + '/' +countryID,
           type : "GET",
           dataType : "json",
           success:function(data)
           {
              jQuery('#city_id').empty();
              jQuery('#city_id').append('<option value="" disable="true" selected="true">=== Select City ===</option>');
              jQuery.each(data, function(key,value){
                 $('#city_id').append('<option value="'+ value.id +'">'+ value.city_name +'</option>');
              });
           }
        });
     }
     else
     {
        $('#city_id').empty();
     }
  });

  jQuery('#city_id').on('change',function(){
     var cityID = jQuery(this).val();
     console.log(cityID);
     if(cityID)
     {
        jQuery.ajax({
           url : "{{ url('/json-districts') }}" + '/' +cityID,
           type : "GET",
           dataType : "json",
           success:function(data)
           {
              jQuery('#district_id').empty();
              jQuery('#district_id').append('<option value="" disable="true" selected="true">=== Select District ===</option>');
              jQuery.each(data, function(key,value){
                 $('#district_id').append('<option value="'+ value.id +'">'+ value.district_name +'</option>');
              });
           }
        });
     }
     else
     {
        $('#district_id').empty();
     }
  });

  jQuery('#district_id').on('change',function(){
     var districtID = jQuery(this).val();
     if(districtID)
     {
        jQuery.ajax({
           url : "{{ url('/json-communes') }}" + '/' +districtID,
           type : "GET",
           dataType : "json",
           success:function(data)
           {
              jQuery('#commune_id').empty();
              jQuery('#commune_id').append('<option value="" disable="true" selected="true">=== Select Commune ===</option>');
              jQuery.each(data, function(key,value){
                 $('#commune_id').append('<option value="'+ value.id +'">'+ value.commune_name +'</option>');
              });
           }
        });
     }
     else
     {
        $('#commune_id').empty();
     }
  });


  jQuery('#commune_id').on('change',function(){
     var communeID = jQuery(this).val();
     if(communeID)
     {
        jQuery.ajax({
           url : "{{ url('/json-villages') }}" + '/' +communeID,
           type : "GET",
           dataType : "json",
           success:function(data)
           {
              jQuery('#village_id').empty();
              jQuery('#village_id').append('<option value="" disable="true" selected="true">=== Select Village ===</option>');
              jQuery.each(data, function(key,value){
                 $('#village_id').append('<option value="'+ value.id +'">'+ value.village_name +'</option>');
              });
           }
        });
     }
     else
     {
        $('#village_id').empty();
     }
  });
</script>
@stop