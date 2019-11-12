<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel Dependent Dropdown  Tutorial With Example</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  </head>
  <body>
    <div class="container">
      <h2>Laravel Dependent Dropdown  Tutorial With Example</h2>
            @include('partials.province.dropdown')
    </div>
  </body>
</html>

<script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="country"]').on('change',function(){
               var countryID = jQuery(this).val();
               if(countryID)
               {
                  jQuery.ajax({
                     url : 'province/getcities/' +countryID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        jQuery('select[name="city"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="city"]').empty();
               }
            });

            jQuery('select[name="city"]').on('change',function(){
               var cityID = jQuery(this).val();
               if(cityID)
               {
                  jQuery.ajax({
                     url : 'province/getdistricts/' +cityID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        jQuery('select[name="district"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="district"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="district"]').empty();
               }
            });

            jQuery('select[name="district"]').on('change',function(){
               var districtID = jQuery(this).val();
               if(cityID)
               {
                  jQuery.ajax({
                     url : 'province/getvillages/' +districtID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        jQuery('select[name="village"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="village"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="village"]').empty();
               }
            });


    });
    </script>