     jQuery('#country_id').on('change',function()
      {
         var countryID = jQuery(this).val();
         if(countryID)
         {
            jQuery.ajax({
               url : provinceUrl +countryID,
               type : "GET",
               dataType : "json",
               success:function(data)
               {
                  jQuery('#city_id').empty();
                  jQuery('#city_id').append('<option value="0" disable="true" selected="true">=== Select City ===</option>');
                  jQuery.each(data, function(key,value){
                     $('#city_id').append('<option value="'+ key +'">'+ value +'</option>');
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
               url : '../../province/getdistricts/' +cityID,
               type : "GET",
               dataType : "json",
               success:function(data)
               {
                  jQuery('#district_id').empty();
                  jQuery('#district_id').append('<option value="0" disable="true" selected="true">=== Select District ===</option>');
                  jQuery.each(data, function(key,value){
                     $('#district_id').append('<option value="'+ key +'">'+ value +'</option>');
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
               url : '../../province/getdistricts/' +districtID,
               type : "GET",
               dataType : "json",
               success:function(data)
               {
                  jQuery('#village_id').empty();
                  jQuery('#village_id').append('<option value="0" disable="true" selected="true">=== Select District ===</option>');
                  jQuery.each(data, function(key,value){
                     $('#village_id').append('<option value="'+ key +'">'+ value +'</option>');
                  });
               }
            });
         }
         else
         {
            $('#village_id').empty();
         }
      });