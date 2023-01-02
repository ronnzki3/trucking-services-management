$(document).ready(()=>{

//////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////
// BOOTSTRAP SELECT 
$('.search_select_box select').selectpicker();
//////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////

   function isDate(dateVal) {
      var d = new Date(dateVal);
      return d.toString() === 'Invalid Date'? false: true;
    }

  function resetOption(){           
      $('.searchbox_driver select').get(0).selectedIndex=0;
      $('.searchbox_destination select').get(0).selectedIndex=0;
      $('.searchbox_plate select').get(0).selectedIndex=0;
      $(".searchbox_driver .filter-option-inner-inner").text("--Select Driver--");
      $(".searchbox_destination .filter-option-inner-inner").text("--Select Route--");
      $(".searchbox_plate .filter-option-inner-inner").text("--Select Plate--");
  }

    $('#btnsavedailytrip').on('click',()=>{    
      $('.added-trip').hide(300);
        let getdate=$('.txtdatepick').val();
        let getdriverid=$('.searchbox_driver select').children("option:selected").val().trim();
        let getdestinationid=$('.searchbox_destination select').children("option:selected").val().trim();
        let getpalteid=$('.searchbox_plate select').children("option:selected").val().trim();
        let getrate=$('.txttrip_rate').val().trim();
        let getdiesel=$('.txtdiesel').val().trim();  
        let getexpense=$('.txtexpenses').val().trim();  
        let getremarks=$('.txtexpense_remarks').val().trim();  
        if(getdate.length>0 && getdriverid.length>0 && getdestinationid.length>0 && getpalteid.length>0 && getrate.length>0 && getdiesel.length>0 && isDate(getdate)==true){
            $.ajax({
               url:'../pages/trip_add.php',
               type:'post',
               data:{
                  'trip-form-add':'add',
                  'datepick':getdate,
                  'driverid':getdriverid,
                  'destinationid':getdestinationid,
                  'plateid':getpalteid,
                  'rate':getrate,
                  'diesel':getdiesel,
                  'expense':getexpense,
                  'remarks':getremarks,
               },
               success:function(data){
                  resetOption();  
                  $('.txttrip_rate').val('');
                  $('.txtdiesel').val('');
                  $('.txtexpenses').val('');
                  $('.txtexpense_remarks').val('');
                  $('.trip-err-info').empty();     
                  $('.added-trip').html(data);                           
                  $('.added-trip').show(700);                  
               }
            });
         }else if(isDate(getdate)==false){
            $('.trip-err-info').empty();
            $('.trip-err-info').html('<span>Date field is invalid.</span>');
            $('.trip-err-info').hide();
            $('.trip-err-info').show(700);
         }else{
            $('.trip-err-info').empty();
            $('.trip-err-info').html('<span>Input field/s must not empty.</span>');
            $('.trip-err-info').hide();
            $('.trip-err-info').show(700);
        }               
     });


     $('#btnupdatedailytrip').on('click',()=>{    
      $('.added-trip').hide(300);
        let getdate=$('.txtdatepick').val();
        let getdriverid=$('.searchbox_driver select').children("option:selected").val().trim();
        let getdestinationid=$('.searchbox_destination select').children("option:selected").val().trim();
        let getpalteid=$('.searchbox_plate select').children("option:selected").val().trim();
        let getrate=$('.txttrip_rate').val().trim();
        let getdiesel=$('.txtdiesel').val().trim();   
        let getid=$('#txtdailytripid').val().trim();  
        let getexpense=$('.txtexpenses').val().trim();  
        let getremarks=$('.txtexpense_remarks').val().trim();   
        if(getdate.length>0 && getdriverid.length>0 && getdestinationid.length>0 && getpalteid.length>0 && getrate.length>0 && getdiesel.length>0 && isDate(getdate)==true){
            $.ajax({
               url:'../pages/trip_add.php',
               type:'post',
               data:{
                  'trip-form-edit':'edit',
                  'datepick':getdate,
                  'driverid':getdriverid,
                  'destinationid':getdestinationid,
                  'plateid':getpalteid,
                  'rate':getrate,
                  'diesel':getdiesel,
                  'id':getid,
                  'expense':getexpense,
                  'remarks':getremarks,
               },
               success:function(data){                  
                  $('.trip-err-info').empty();     
                  $('.added-trip').html(data);                           
                  $('.added-trip').show(700);
               }
            });
         }else if(isDate(getdate)==false){
            $('.trip-err-info').empty();
            $('.trip-err-info').html('<span>Date field is invalid.</span>');
            $('.trip-err-info').hide();
            $('.trip-err-info').show(700);
         }else{
            $('.trip-err-info').empty();
            $('.trip-err-info').html('<span>Input field/s must not empty.</span>');
            $('.trip-err-info').hide();
            $('.trip-err-info').show(700);
        }           
        
     });




     $('#btndeletedailytrip').on('click',()=>{    
         $('.added-trip').hide(300);
        let getid=$('#txtdailytripid').val().trim();    
        $.ajax({
             url:'../pages/trip_add.php',
             type:'post',
             data:{
                 'trip-form-delete':'delete',
                 'id':getid,
             },
             success:function(data){
                  $('.trip-err-info').empty();     
                  $('.added-trip').html(data);                           
                  $('.added-trip').show(700);
                  $('#btndeletedailytrip').hide(700);
             }
        });
     });



     $('#btnsavemaintenance').on('click',()=>{    
      $('.added-trip').hide(200);
      let getdate=$('.txtdatepick').val();
      let getpalteid=$('.searchbox_plate select').children("option:selected").val().trim();
      let getrate=$('.txtmaintenance_rate').val().trim();
      let getremarks=$('.txtmaintenance_remarks').val().trim();         
      if(getdate.length>0 && getpalteid.length>0 && getrate.length>0 && isDate(getdate)==true){
         $.ajax({
            url:'../pages/maintenance_save.php',
            type:'post',
            data:{
                'maintenance-form-add':'add',
                'datepick':getdate,
                'plateid':getpalteid,
                'rate':getrate,
                'remarks':getremarks,
            },
            success:function(data){
                  $('.txtmaintenance_rate').val('');
                  $('.txtmaintenance_remarks').val('');
                  $('.searchbox_plate select').get(0).selectedIndex=0;
                  $(".searchbox_plate .filter-option-inner-inner").text("--Select Plate--");
                  $('.trip-err-info').empty();     
                  $('.added-trip').html(data);                           
                  $('.added-trip').show(700);
            }
         });
      }else if(isDate(getdate)==false){
         $('.trip-err-info').empty();
         $('.trip-err-info').html('<span>Date field is invalid.</span>');
         $('.trip-err-info').hide();
         $('.trip-err-info').show(700);
      }else{
         $('.trip-err-info').empty();
         $('.trip-err-info').html('<span>Input field/s must not empty.</span>');
         $('.trip-err-info').hide();
         $('.trip-err-info').show(700);
     }     
      
   });



   $('#btnupdatemaintenance').on('click',()=>{  
      $('.added-trip').hide(200);  
      let getdate=$('.txtdatepick').val();
      let getpalteid=$('.searchbox_plate select').children("option:selected").val().trim();
      let getrate=$('.txtmaintenance_rate').val().trim();
      let getremarks=$('.txtmaintenance_remarks').val().trim();    
      let id=$('#txtdailymaintenanceid').val().trim();  
      if(getdate.length>0 && getpalteid.length>0 && getrate.length>0 && isDate(getdate)==true){
         $.ajax({
            url:'../pages/maintenance_save.php',
            type:'post',
            data:{
                'maintenance-form-edit':'edit',
                'datepick':getdate,
                'plateid':getpalteid,
                'rate':getrate,
                'remarks':getremarks,
                'id':id,
            },
            success:function(data){                  
                  $('.trip-err-info').empty();     
                  $('.added-trip').html(data);                           
                  $('.added-trip').show(700);
            }
         });
      }else if(isDate(getdate)==false){
         $('.trip-err-info').empty();
         $('.trip-err-info').html('<span>Date field is invalid.</span>');
         $('.trip-err-info').hide();
         $('.trip-err-info').show(700);
      }else{
         $('.trip-err-info').empty();
         $('.trip-err-info').html('<span>Input field/s must not empty.</span>');
         $('.trip-err-info').hide();
         $('.trip-err-info').show(700);
     } 
      
   });



   $('#btndeletemaintenance').on('click',()=>{  
      let id=$('#txtdailymaintenanceid').val().trim();  
      $.ajax({
           url:'../pages/maintenance_save.php',
           type:'post',
           data:{
               'maintenance-form-delete':'delete',
               'id':id,
           },
           success:function(data){
               $('.trip-err-info').empty();     
               $('.added-trip').html(data);                           
               $('.added-trip').show(700);
               $('#btndeletemaintenance').hide(700);
           }
      });
   });


    



});


$(document).on("input", ".numeric-input", function() {
   this.value = this.value.replace(/\D/g,'');
});