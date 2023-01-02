$(document).ready(()=>{   

$('.btnaddnewDriver').on('click',()=>{
    resetAll();
    $('#modal_driver_add').modal();
});
$('#btnaddnewCompany').on('click',()=>{
    resetAll();
    $('#modal_company_add').modal();
});

$('.btnaddnewpayable').on('click',(e)=>{
    e.preventDefault();
    let id=e.currentTarget.id;
    let nid=id.substring(4);
    let compname=$('.compnamel').text().trim();
    $('.payablecompid').val(nid);
    resetAll();
    $('.payable-bankname').text(compname);
    $('#modal_payable_add').modal();
});
$('.drv-edit').on('click',(e)=>{
    e.preventDefault();
    let id=e.currentTarget.id.substring(8);
    let drvName=$('.tr-drv-Name'+id.trim()).text().trim();
    $('.driverId-edit').val(id.trim());
    $('.driverName').val(drvName.trim());
    resetAll();
    $('#modal_driver_edit').modal();
});
$('.comp-edit').on('click',(e)=>{
    e.preventDefault();
    let id=e.currentTarget.id.substring(9);
    let drvName=$('.tr-comp-Name'+id.trim()).text().trim();
    $('.companyId-edit').val(id.trim());
    $('.companyName').val(drvName.trim());
    resetAll();
    $('#modal_company_edit').modal();
});
$('.drv-del').on('click',(e)=>{
    e.preventDefault();
    let id=e.currentTarget.id.substring(7);
    let drvName=$('.tr-drv-Name'+id.trim()).text().trim();
    $('.driverIdDelete').val(id.trim());
    $('.driverName').val(drvName.trim());
    resetAll();
    $('#modal_driver_delete').modal();
});
$('#comp-del').on('click',(e)=>{
    e.preventDefault();
    let id=$('.companyId-edit').val().trim();
    let drvName=$('#companyEdit1').val().trim();
    $('.companyIdDelete').val(id.trim());
    $('.companyNameDelete').val(drvName.trim());
    // resetAll();
    $('#modal_company_delete').modal();
});
$('.btnaddnewDestination').on('click',()=>{
    resetAll();
    $('#modal_destination_add').modal();
});
$('.destination-td-edit').on('click',(e)=>{
    e.preventDefault();
    let id=e.currentTarget.id.substring(19).trim();
    let destination=$('.td-dest-name-id'+id).text().trim();
    let areacode=$('.td-dest-area-id'+id).text().trim();
    let rate=$('.td-dest-rate-id'+id).text().trim();
    let distance=$('.td-dest-distance-id'+id).text().trim();
    $('#txtdestinationeditid').val(id);
    $('#txtdestinationedit').val(destination);
    $('#txtareacodeedit').val(areacode);
    $('#txtdestination_rateedit').val(rate);
    $('#txtdestination_distanceedit').val(distance);
    resetAll();
    $('#modal_destination_edit').modal();
});
$('.destination-td-delete').on('click',(e)=>{
    e.preventDefault();
    let id=e.currentTarget.id.substring(18).trim();
    let destination=$('.td-dest-name-id'+id).text().trim();
    let areacode=$('.td-dest-area-id'+id).text().trim();
    let rate=$('.td-dest-rate-id'+id).text().trim();
    let distance=$('.td-dest-distance-id'+id).text().trim();
    $('#txtdestinationdeleteid').val(id);
    $('#txtdestinationdelete').val(destination);
    $('#txtareacodedelete').val(areacode);
    $('#txtdestination_ratedelete').val(rate);
    $('#txtdestination_distancedelete').val(distance);
    resetAll();
    $('#modal_destination_delete').modal();
});

$('.btnaddnewPlate').on('click',()=>{
    resetAll();
    $('#modal_plate_add').modal();
});
$('.plate-edit').on('click',(e)=>{
    e.preventDefault();
    let id=e.currentTarget.id.substring(13).trim();
    let plate=$('.td-plate-id'+id).text().trim();
    $('#plateeditid').val(id);
    $('#plateedit').val(plate);
    resetAll();
    $('#modal_plate_edit').modal();
});
$('.plate-del').on('click',(e)=>{
    e.preventDefault();
    let id=e.currentTarget.id.substring(12).trim();
    let plate=$('.td-plate-id'+id).text().trim();
    $('#platedeleteid').val(id);
    $('#platedelete').val(plate);
    resetAll();
    $('#modal_plate_delete').modal();
});

$('.btnaddnewCA').on('click',()=>{
    $('#modal_CA_add').modal();
});

$('#btnsavedriver').on('click',()=>{
   let driver=$('#driver').val().trim();
   if(driver.length>0){
        $.ajax({
            url:'../pages/driver_add.php',
            type:'post',
            cache:false,
            data:{
                'driver':driver,
            },
            success:function(data){
                $('#driver').val('');
                $('.driver-error').empty();
                $('.added-driver').append(data);
                $('#driver').focus();
                $('.added-link-driver').html("<a href='../page/drivers.php' style='margin-left:10px;margin-bottom:10px;display:block;'>Show driver list</a>");
            }
        });
   }else{
        $('.added-driver').empty();
        $('.driver-error').empty();
        $('.driver-error').html('Invalid input field.');
        $('.driver-error').hide();
        $('.driver-error').show(600);
   }
   
});

$('#btnsavecompany').on('click',()=>{
    let company=$('#company').val().trim();
    if(company.length>0){
         $.ajax({
             url:'../pages/company_save.php',
             type:'post',
             cache:false,
             data:{
                 'companyadd':'add',
                 'company':company,
             },
             success:function(data){
                 $('#company').val('');
                 $('.company-error').empty();
                 $('.added-company').append(data);
                 $('#company').focus();
                 $('.added-link-company').html("<a href='../page/payable.php' style='margin-left:10px;margin-bottom:10px;display:block;'>Show company list</a>");
             }
         });
    }else{
         $('.added-company').empty();
         $('.company-error').empty();
         $('.company-error').html('Invalid input field.');
         $('.company-error').hide();
         $('.company-error').show(600);
    }
    
 });

$('#btnupdatedriver').on('click',(e)=>{
    e.preventDefault();
    let driver=$('#driverEdit1').val().trim();
    let driverid=$('.driverId-edit').val().trim();   
    if(driver.length>0){
        $.ajax({
            url:'../pages/driver_add.php',
            type:'post',
            cache:false,
            data:{
                'driveredit':driver,
                'driverid':driverid,
            },
            success:function(data){
                $('.driver-error').empty();
                $('.added-driver').empty();
                $('.added-driver').html(data);
            }
       });
   }else{
        $('.added-driver').empty();
        $('.driver-error').empty();
        $('.driver-error').html('Invalid input field.');
        $('.driver-error').hide();
        $('.driver-error').show(600);
   }    
 });

 $('#btnupdatecompany').on('click',(e)=>{
    e.preventDefault();
    let company=$('#companyEdit1').val().trim();
    let companyid=$('.companyId-edit').val().trim();   
    if(company.length>0){
        $.ajax({
            url:'../pages/company_save.php',
            type:'post',
            cache:false,
            data:{
                'companyedit':company,
                'companyid':companyid,
            },
            success:function(data){
                $('.company-error').empty();
                $('.added-company').empty();
                $('.added-company').html(data);
            }
       });
   }else{
        $('.added-company').empty();
        $('.company-error').empty();
        $('.company-error').html('Invalid input field.');
        $('.company-error').hide();
        $('.company-error').show(600);
   }    
 });

 function resetAll(){
    $('.modal-drv-btn').show();
    $('.plate-error').empty();
    $('.added-plate').empty();
    $('.driver-error').empty();
    $('.added-driver').empty();
    $('.error-txt').empty();
    $('.added-destination').empty();
    $('.added-company').empty();
    $('.added-payable').empty();
}
 $('#btndeletedriver').on('click',()=>{
    let driverid=$('.driverIdDelete').val().trim();
    $.ajax({
         url:'../pages/driver_add.php',
         type:'post',
         cache:false,
         data:{
             'driveriddelete':driverid,
             'drivername':$('.driverName').val().trim(),
         },
         success:function(data){
             $('.added-driver').empty();
             $('.added-driver').html(data);
         }
    });
 });

 $('#btndeletecompany').on('click',()=>{
    let companyid=$('.companyIdDelete').val().trim();
    $.ajax({
         url:'../pages/company_save.php',
         type:'post',
         cache:false,
         data:{
             'companyiddelete':companyid,
             'company':$('.companyNameDelete').val().trim(),
         },
         success:function(data){
             $('.added-company').empty();
             $('.added-company').html(data);
         }
    });
 });


$('#btnsaveplate').on('click',()=>{
    let plate=$('#plate').val().trim();
    if(plate.length>0){
        $.ajax({
            url:'../pages/plate_add.php',
            type:'post',
            cache:false,
            data:{
               'form-plate-add':'add',
                'plate':plate,
            },
            success:function(data){
                $('#plate').val('');
                $('.plate-error').empty();
                $('.added-plate').append(data);
                $('#plate').focus();
                $('.added-link-plate').html("<a href='../page/plate.php' style='margin-left:20px;margin-bottom:10px;display:block;'>Show Truck lists</a>");
            }
       });
    }else{
        $('.plate-error').empty();
        $('.plate-error').html('Invalid input field.');
        $('.plate-error').hide();
        $('.plate-error').show(600);
    }    
 });


 $('#btnupdateplate').on('click',()=>{
    let id=$('#plateeditid').val().trim();
    let plate=$('#plateedit').val().trim();
    if(plate.length>0){
        $.ajax({
            url:'../pages/plate_add.php',
            type:'post',
            cache:false,
            data:{
                'form-plate-edit':'edit',
                'id':id,
                'plate':plate,
            },
            success:function(data){
                $('.plate-error').empty();
                $('.added-plate').empty();
                $('.added-plate').html(data);
                $('.modal-drv-btn').hide(600);
            }
       });
    }else{
        $('.plate-error').empty();
        $('.plate-error').html('Invalid input field.');
        $('.plate-error').hide();
        $('.plate-error').show(600);
    }
    
 });
 $('#btndeleteplate').on('click',()=>{
    let id=$('#platedeleteid').val().trim();
    $.ajax({
         url:'../pages/plate_add.php',
         type:'post',
         cache:false,
         data:{
             'form-plate-delete':'delete',
             'id':id,
             'platename':$('#platedelete').val().trim(),
         },
         success:function(data){
             $('.added-plate').empty();
             $('.added-plate').html(data);
            //  $('.modal-drv-btn').hide(600);
         }
    });
 });

 function isDate(dateVal) {
    var d = new Date(dateVal);
    return d.toString() === 'Invalid Date'? false: true;
  }

$('#btnsaveca').on('click',(e)=>{
    e.preventDefault();
    $('.added-trip').hide(200);
    let getdate=$('.txtdatepick').val().trim();
    let getdriverid=$('.searchbox_driver select').children("option:selected").val().trim(); 
    let getca_amount=$('#ca_amount').val().trim();
    let ca_remarks=$('.txtca_remarks').val().trim();
    if(getdate.length>0 && getdriverid.length>0 && getca_amount.length>0 && isDate(getdate)==true){
        $.ajax({
            url:'../pages/ca_save.php',
            type:'post',
            cache:false,
            data:{
               'form-ca-add':'add',
                'getdate':getdate,
                'driverid':getdriverid,
                'ca_amount':getca_amount,
                'remarks':ca_remarks,
            },
            success:function(data){
                $('.txtca_remarks').val('');
                $('#ca_amount').val('');
                $('.searchbox_driver select').get(0).selectedIndex=0;
                $(".searchbox_driver .filter-option-inner-inner").text("--Select Driver--");
                $('.trip-err-info').empty();
                $('.added-trip').html(data);                
                $('.added-trip').show(600);
            }
        });
    }else if(isDate(getdate)==false){
        $('.added-trip').empty();
        $('.trip-err-info').empty();
        $('.trip-err-info').html('<span>Date field is invalid.</span>');
        $('.trip-err-info').hide();
        $('.trip-err-info').show(700);
     }else{
        $('.added-trip').empty();
        $('.trip-err-info').empty();
        $('.trip-err-info').html('<span>Input field/s must not empty.</span>');
        $('.trip-err-info').hide();
        $('.trip-err-info').show(700);
    }   
    
 });
$('#btnupdateca').on('click',(e)=>{
    e.preventDefault();
    $('.added-trip').hide(200);
    let getdate=$('.txtdatepick').val().trim();
    let getdriverid=$('.searchbox_driver select').children("option:selected").val().trim(); 
    let getca_amount=$('#ca_amount').val().trim();
    let ca_remarks=$('.txtca_remarks').val().trim();
    let ca_id=$('.txtcaiddd').val().trim();
    if(getdate.length>0 && getdriverid.length>0 && getca_amount.length>0 && isDate(getdate)==true){
        $.ajax({
            url:'../pages/ca_save.php',
            type:'post',
            cache:false,
            data:{
                'form-ca-edit':'edit',
                'getdate':getdate,
                'driverid':getdriverid,
                'ca_amount':getca_amount,
                'remarks':ca_remarks,
                'id':ca_id,
            },
            success:function(data){
                $('.trip-err-info').empty();  
                $('.added-trip').html(data);              
                $('.added-trip').show(600);
            }
        });
    }else if(isDate(getdate)==false){
        $('.added-trip').empty();
        $('.trip-err-info').empty();
        $('.trip-err-info').html('<span>Date field is invalid.</span>');
        $('.trip-err-info').hide();
        $('.trip-err-info').show(700);
     }else{
        $('.added-trip').empty();
        $('.trip-err-info').empty();
        $('.trip-err-info').html('<span>Input field/s must not empty.</span>');
        $('.trip-err-info').hide();
        $('.trip-err-info').show(700);
    } 
    
 });
 $('#btndeleteca').on('click',(e)=>{
    e.preventDefault();
    $('.added-trip').hide(200);
    let ca_id=$('.txtcaiddd').val().trim();
    $.ajax({
         url:'../pages/ca_save.php',
         type:'post',
         cache:false,
         data:{
             'form-ca-delete':'delete',
             'id':ca_id,
         },
         success:function(data){
                $('.trip-err-info').empty();  
                $('.added-trip').html(data);              
                $('.added-trip').show(600);
         }
    });
 });
$('#btnsavedestination').on('click',(e)=>{
    e.preventDefault();
    let destination=$('#txtdestination').val().trim();
    let areacode=$('#txtareacode').val().trim();
    let destination_rate=$('#txtdestination_rate').val().trim();  
    let destination_distance=$('#txtdestination_distance').val().trim();  
    if(destination.length>0 && areacode.length>0 && destination_rate.length>0 && destination_distance.length>0)
    {
        $.ajax({
            url:'../pages/destination_add.php',
            type:'post',
            cache:false,
            data:{
                'form-mode-add':'add',
                'destination':destination,
                'areacode':areacode,
                'destination_rate':destination_rate,
                'destination_distance':destination_distance,
            },
            success:function(data){
                $('#txtdestination').val('');
                $('#txtareacode').val('');
                $('#txtdestination_rate').val('');
                $('#txtdestination_distance').val('');
                $('.destination1-error').empty();
                $('.destination2-error').empty();
                $('.destination3-error').empty();
                $('.destination4-error').empty();
                $('.added-destination').append(data);
                $('#txtdestination').focus();
                $('.added-link-destination').html("<a href='../page/destination.php' style='margin-left:20px;margin-bottom:10px;display:block;'>Show route list</a>");
            }
       });
    }else{
        if(destination.length<=0){
            $('.destination1-error').empty();
            $('.destination1-error').html('Invalid input field.');
            $(".destination1-error").hide();
            $(".destination1-error").show(600);
        }else{
            $('.destination1-error').empty();
        }
        if(areacode.length<=0){
            $('.destination2-error').empty();
            $('.destination2-error').html('Invalid input field.');
            $(".destination2-error").hide();
            $(".destination2-error").show(600);
        }else{
            $('.destination2-error').empty();
        }
        if(destination_rate.length<=0){
            $('.destination3-error').empty();
            $('.destination3-error').html('Invalid input field.');
            $(".destination3-error").hide();
            $(".destination3-error").show(600);
        }else{
            $('.destination3-error').empty();
        }
        if(destination_distance.length<=0){
            $('.destination4-error').empty();
            $('.destination4-error').html('Invalid input field.');
            $(".destination4-error").hide();
            $(".destination4-error").show(600);
        }else{
            $('.destination4-error').empty();
        }
    }
    
 });
 $('#btnupdatedestination').on('click',(e)=>{
    e.preventDefault();
    let dest_id=$('#txtdestinationeditid').val().trim();
    let destination=$('#txtdestinationedit').val().trim();
    let areacode=$('#txtareacodeedit').val().trim();
    let destination_rate=$('#txtdestination_rateedit').val().trim();   
    let destination_distance=$('#txtdestination_distanceedit').val().trim();   
    if(destination.length>0 && areacode.length>0 && destination_rate.length>0 && destination_distance.length>0)
    {
        $.ajax({
            url:'../pages/destination_add.php',
            type:'post',
            cache:false,
            data:{
                'id':dest_id,
                'form-mode-edit':'edit',
                'destination':destination,
                'areacode':areacode,
                'destination_rate':destination_rate,
                'destination_distance':destination_distance,
            },
            success:function(data){
                $('.destination1-error').empty();
                $('.destination2-error').empty();
                $('.destination3-error').empty();
                $('.destination4-error').empty();
                $('.added-destination').empty();
                $('.added-destination').html(data);
                $('.modal-drv-btn').hide(600);
            }
       });
    }else{
        if(destination.length<=0){
            $('.destination1-error').empty();
            $('.destination1-error').html('Invalid input field.');
            $(".destination1-error").hide();
            $(".destination1-error").show(600);
        }else{
            $('.destination1-error').empty();
        }
        if(areacode.length<=0){
            $('.destination2-error').empty();
            $('.destination2-error').html('Invalid input field.');
            $(".destination2-error").hide();
            $(".destination2-error").show(600);
        }else{
            $('.destination2-error').empty();
        }
        if(destination_rate.length<=0){
            $('.destination3-error').empty();
            $('.destination3-error').html('Invalid input field.');
            $(".destination3-error").hide();
            $(".destination3-error").show(600);
        }else{
            $('.destination3-error').empty();
        }
        if(destination_distance.length<=0){
            $('.destination4-error').empty();
            $('.destination4-error').html('Invalid input field.');
            $(".destination4-error").hide();
            $(".destination4-error").show(600);
        }else{
            $('.destination4-error').empty();
        }
    }
    
 });
 $('#btndeletedestination').on('click',(e)=>{
    e.preventDefault();
    let dest_id=$('#txtdestinationdeleteid').val().trim();
    let destination=$('#txtdestinationdelete').val().trim();
    let areacode=$('#txtareacodedelete').val().trim();
    let destination_rate=$('#txtdestination_ratedelete').val().trim();   
    let destination_distance=$('#txtdestination_distancedelete').val().trim();   
    $.ajax({
         url:'../pages/destination_add.php',
         type:'post',
         cache:false,
         data:{
             'id':dest_id,
             'form-mode-delete':'delete',
             'destination':destination,
             'areacode':areacode,
             'destination_rate':destination_rate,
             'destination_distance':destination_distance,
         },
         success:function(data){
             $('.added-destination').empty();
             $('.added-destination').html(data);
         }
    });
 });
 $("#search-box").keyup(function(e) {
    e.preventDefault();
    let curtxt=$(this).val();
    if(curtxt.trim()!=''){
        $.ajax({
            type: "POST",
            url: "page/getdriver.php",
            data: {
                'keyword': $(this).val(),
            },
            beforeSend: function() {
                $("#search-box").css("background", "#fff url(../LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) {
                $("#suggesstion-box").empty();
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
                $("#search-box").css("background", "#fff");
            }
        });
    }
    return false;
});
$("#search-box-destination").keyup(function(e) {
    e.preventDefault();
    let curtxt=$(this).val();
    if(curtxt.trim()!=''){
        $.ajax({
            type: "POST",
            url: "page/getdestination.php",
            data: {
                'destination': $(this).val(),
            },
            beforeSend: function() {
                $("#search-box-destination").css("background", "#fff url(../LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) {
                $("#suggesstion-box-destination").empty();
                $("#suggesstion-box-destination").show();
                $("#suggesstion-box-destination").html(data);
                $("#search-box-destination").css("background", "#fff");
            }
        });
    }
    return false;
});
$("#search-box-plate").keyup(function(e) {
    e.preventDefault();
    let curtxt=$(this).val();
    if(curtxt.trim()!=''){
        $.ajax({
            type: "POST",
            url: "page/getplate.php",
            data: {
                'plate': $(this).val(),
            },
            beforeSend: function() {
                $("#search-box-plate").css("background", "#fff url(../LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) {
                $("#suggesstion-box-plate").empty();
                $("#suggesstion-box-plate").show();
                $("#suggesstion-box-plate").html(data);
                $("#search-box-plate").css("background", "#fff");
            }
        });
    }
    return false;
});
$('.getdriverName').on('click',(e)=>{
    e.preventDefault();  
    let driverIdd=e.currentTarget.id;
    let driverid=driverIdd.substring(7);
    let drivername=$(e.currentTarget).text().trim();
    $("#search-box").val(drivername);
    $("#searchdriverId").val(driverid);
    $("#suggesstion-box").hide();
});
$('.getdestination').on('click',(e)=>{
    e.preventDefault();  
    let driverIdd=e.currentTarget.id;
    let driverid=driverIdd.substring(5);
    let drivername=$(e.currentTarget).text().trim();
    $("#search-box-destination").val(drivername);
    $("#searchdestinationId").val(driverid);
    $("#suggesstion-box-destination").hide();
});
$('.getplate').on('click',(e)=>{
    e.preventDefault();  
    let driverIdd=e.currentTarget.id;
    let driverid=driverIdd.substring(6);
    let drivername=$(e.currentTarget).text().trim();
    $("#search-box-plate").val(drivername);
    $("#searchplateId").val(driverid);
    $("#suggesstion-box-plate").hide();
});

$("#datepick").datepicker(
    {dateFormat : 'M d, yy'}
);   
$("#datepick2").datepicker(
    {dateFormat : 'M d, yy'}
);   
$("#datepick3").datepicker(
    {dateFormat : 'M d, yy'}
); 
$("#datepick4").datepicker(
    {dateFormat : 'M d, yy'}
); 
$("#datefrom").datepicker(
    {dateFormat : 'M d, yy'}
);  
$("#dateto").datepicker(
    {dateFormat : 'M d, yy'}
);  

$('.vwreport').on('click',()=>{
    $('.rpt-err').hide(200);
    let getselectedfilter=$('#filter').find(":selected").val();
    let getdatefrom=$('#datefrom').val();
    let getdateto=$('#dateto').val();
    let driverid=$('.searchbox_driver select').children("option:selected").val().trim();
    let plateid=$('.searchbox_plate select').children("option:selected").val().trim();
    if(getselectedfilter.trim()==1){
        if(isDate(getdatefrom)==true && isDate(getdateto)==true){
            location.href="report_all.php?datefr="+getdatefrom+"&dateto="+getdateto+"&filter="+getselectedfilter;
        }else{
            $('.rpt-err').empty();
            $('.rpt-err').html('<div>Missing or Invalid field/s. Please try again.</div>');
            $('.rpt-err').show(600);
        }        
    }else if(getselectedfilter.trim()==2){
        if(driverid.length>0 && isDate(getdatefrom)==true && isDate(getdateto)==true){
            location.href="report_driver.php?id="+driverid+"&datefr="+getdatefrom+"&dateto="+getdateto+"&filter="+getselectedfilter;
        }else{  
            $('.rpt-err').empty();
            $('.rpt-err').html('<div>Missing or Invalid field/s. Please try again.</div>');
            $('.rpt-err').show(600);
        }        
    }else if(getselectedfilter.trim()==3){
        if(plateid.length>0 && isDate(getdatefrom)==true && isDate(getdateto)==true){
            location.href="report_plate.php?id="+plateid+"&datefr="+getdatefrom+"&dateto="+getdateto+"&filter="+getselectedfilter;
        }else{
            $('.rpt-err').empty();
            $('.rpt-err').html('<div>Missing or Invalid field/s. Please try again.</div>');
            $('.rpt-err').show(600);
        }        
    }else if(getselectedfilter.trim()==7){
        if(plateid.length>0 && isDate(getdatefrom)==true && isDate(getdateto)==true){
            location.href="report_truck.php?id="+plateid+"&datefr="+getdatefrom+"&dateto="+getdateto+"&filter="+getselectedfilter;
        }else{
            $('.rpt-err').empty();
            $('.rpt-err').html('<div>Missing or Invalid field/s. Please try again.</div>');
            $('.rpt-err').show(600);
        }        
    }else if(getselectedfilter.trim()==4){

    }else if(getselectedfilter.trim()==5){
        if(isDate(getdatefrom)==true && isDate(getdateto)==true){
            location.href="report_maintenance.php?datefr="+getdatefrom+"&dateto="+getdateto+"&filter="+getselectedfilter;
        }else{
            $('.rpt-err').empty();
            $('.rpt-err').html('<div>Missing or Invalid field/s. Please try again.</div>');
            $('.rpt-err').show(600);
        }        
    }else if(getselectedfilter.trim()==6){
        if(isDate(getdatefrom)==true){
            location.href="report_monthly.php?datefr="+getdatefrom+"&filter="+getselectedfilter;
        }else{
            $('.rpt-err').empty();
            $('.rpt-err').html('<div>Missing or Invalid field/s. Please try again.</div>');
            $('.rpt-err').show(600);
        }        
    }
});

$('.rptoption').on('change', function() {
    let getsel=this.value.trim();
    if(getsel==2){
        $('.tr-driver').removeClass('tr-display-none');
        $('.tr-dateto').removeClass('tr-display-none');
        $('.tr-plate').addClass('tr-display-none');
    }else if(getsel==3){
        $('.tr-driver').addClass('tr-display-none');
        $('.tr-dateto').removeClass('tr-display-none');
        $('.tr-plate').removeClass('tr-display-none');
    }else if(getsel==7){
        $('.tr-driver').addClass('tr-display-none');
        $('.tr-dateto').removeClass('tr-display-none');
        $('.tr-plate').removeClass('tr-display-none');
    }else if(getsel==6){
        $('.tr-driver').addClass('tr-display-none');
        $('.tr-plate').addClass('tr-display-none');
        $('.tr-dateto').addClass('tr-display-none');
    }else{
        $('.tr-dateto').removeClass('tr-display-none');
        $('.tr-driver').addClass('tr-display-none');
        $('.tr-plate').addClass('tr-display-none');
    }
});


$('.tr-maintenance').on('mouseover',(e)=>{
    e.preventDefault();
    let id=e.currentTarget.id.substring(15);
    let searchParams = new URLSearchParams(window.location.search);
    let date1 = searchParams.get('datefr');
    let date2 = searchParams.get('dateto');
    $.ajax({
        url:'../pages/maintenance_details.php',
        type:'post',
        data:{
            'id':id,
            'date1':date1,
            'date2':date2,
        },
        success:function(data){
            $('#maintenance-report-details').empty();
            $('#maintenance-report-details').html(data);
        }
    });
});

$('thead,tfoot').on('mouseover',()=>{
    $('#maintenance-report-details').empty();
});


$('.btncancel').on('click',()=>{
    $.modal.close();
});

// $('.asideAnchor,.lxap,.lxap-i').on('mouseover',()=>{
$('.asideAnchor').on('mouseover',()=>{
    $('.content').addClass('abcd');
    $('a.lxap').addClass('rotate-lxap');
    $('.lxap-i').addClass('rotate-lxap-i');
});
// $('.asideAnchor,.lxap,.lxap-i').on('mouseout',()=>{
$('.asideAnchor').on('mouseout',()=>{
    $('.content').removeClass('abcd');
    $('a.lxap').removeClass('rotate-lxap');
    $('.lxap-i').removeClass('rotate-lxap-i');
});

$('.btn-print').on('click',()=>{
    window.print();
});

$('#btnsearch').on('click',()=>{   
    let getsearch=$('#txtsearchh').val().trim();
    let searchParams = new URLSearchParams(window.location.search);
    let p1 = searchParams.get('p');
    location.href="trip.php?p="+p1+"&s="+getsearch;
});

$('#btnsearchsoa').on('click',()=>{   
    let getsearch=$('#txtsearchsoa').val().trim();
    let searchParams = new URLSearchParams(window.location.search);
    let p2 = searchParams.get('datefr');
    let p3 = searchParams.get('dateto');
    let p4 = searchParams.get('filter');
    location.href="report_all.php?datefr="+p2+"&dateto="+p3+"&filter="+p4+"&s="+getsearch;
});


$('#btnsearchca').on('click',()=>{   
    let getsearch=$('#txtsearchca').val().trim();
    let searchParams = new URLSearchParams(window.location.search);
    let p1 = searchParams.get('p');
    location.href="ca.php?p="+p1+"&s="+getsearch;
});




$('.comp-sel').on('click',(e)=>{
    e.preventDefault();
    let id=e.currentTarget.id;
    let nid=id.substring(7);
    location.href="payable.php?id="+nid;
});

$('.pay-sel').on('click',(e)=>{
   e.preventDefault();
   let id=e.currentTarget.id;
   let nid=id.substring(6);
   let gdate=$('.tdpaydate'+nid).text();
    let particular=$('.tdpayparticulars'+nid).text().trim();
   let debit=$('.tdpaydebit'+nid).text().trim();
   let credit=$('.tdpaycredit'+nid).text().trim();
   let companyid=$('.compnamel').attr('id');
   let compname=$('.compnamel').text().trim();
   $('.payable-bankname').text(compname);
   $('.txtdatepickpayableedit').val(gdate);
   $('#txtdebitedit').val(debit);
   $('#txtcreditedit').val(credit);
    $('#txtparticularedit').val(particular);
   $('.payablecompidedit').val(companyid.substring(8));
   $('.payableids').val(nid);
   resetAll();
   $('#modal_payable_edit').modal();
});


$('#btndeletepayablefrm').on('click',(e)=>{
    e.preventDefault();
    let nid=$('.payableids').val().trim();
    let gdate=$('.txtdatepickpayableedit').val();
     let particular=$('#txtparticularedit').val().trim();
    let debit=$('#txtdebitedit').val().trim();
    let credit=$('#txtcreditedit').val().trim();
    let companyid=$('.payablecompidedit').val().trim();
    let compname=$('.compnamel').text().trim();
    $('.payable-bankname').text(compname);
    $('.txtdatepickpayabledelete').val(gdate);
    $('#txtdebitdelete').val(debit);
    $('#txtcreditdelete').val(credit);
     $('#txtparticulardelete').val(particular);
    $('.payablecompiddelete').val(companyid);
    $('.payableids').val(nid);
    resetAll();
    $('#modal_payable_delete').modal();
 });



$('#btnsavepayable').on('click',(e)=>{
    e.preventDefault();
    let gdate=$('.txtdatepickpayable').val();
    let particular=$('#txtparticular').val().trim();
    let debit=$('#txtdebit').val().trim();
    let credit=$('#txtcredit').val().trim(); 
    let compid=$('.payablecompid').val().trim();
    if(credit.length<=0 ){
        credit=0;
    }
    if(debit.length<=0){
        debit=0;
    }
    if(particular.length>0 && isDate(gdate)==true)
    {        
        $('.destination1-error').empty();
        $('.destination2-error').empty();
        if(credit<=0 && debit<=0){
                if(debit<=0){
                    $('.destination3-error').empty();
                    $('.destination3-error').html('Invalid input field.');
                    $(".destination3-error").hide();
                    $(".destination3-error").show(600);
                }else{
                    $('.destination3-error').empty();
                }
                if(credit<=0){
                    $('.destination4-error').empty();
                    $('.destination4-error').html('Invalid input field.');
                    $(".destination4-error").hide();
                    $(".destination4-error").show(600);
                }else{
                    $('.destination4-error').empty();
                }
        }else{
                $.ajax({
                    url:'../pages/payable_save.php',
                    type:'post',
                    cache:false,
                    data:{
                        'form-mode-add':'add',
                        'particular':particular,
                        'credit':credit,
                        'debit':debit,
                        'companyid':compid,
                        'payabledate':gdate,
                    },
                    success:function(data){
                        $('#txtparticular').val('');
                        $('#txtdebit').val('');
                        $('#txtcredit').val('');
                        $('.destination1-error').empty();
                        $('.destination2-error').empty();
                        $('.destination3-error').empty();
                        $('.destination4-error').empty();
                        $('.added-payable').append(data);
                        $('#txtparticular').focus();
                        $('.added-link').html("<a href='../page/payable.php?id="+compid+"' style='margin:10px;display:block;'>Show payable records</a>");
                    }
                });
        }
    }else{       
        if(particular.length<=0){
            $('.destination2-error').empty();
            $('.destination2-error').html('Invalid input field.');
            $(".destination2-error").hide();
            $(".destination2-error").show(600);
        }else{
            $('.destination2-error').empty();
        }

        if(isDate(gdate)==false){
            $('.destination1-error').empty();
            $('.destination1-error').html('<span>Date field is invalid.</span>');
            $('.destination1-error').hide();
            $('.destination1-error').show(700);
        }else{
            $('.destination1-error').empty();
        }
        
    }
 });



 $('#btneditpayable').on('click',(e)=>{
    e.preventDefault();
    $('.added-payable').hide(200);
    let gdate=$('.txtdatepickpayableedit').val();
    let particular=$('#txtparticularedit').val().trim();
    let debit=$('#txtdebitedit').val().trim();
    let credit=$('#txtcreditedit').val().trim(); 
    let compid=$('.payablecompidedit').val().trim();
    let payid=$('.payableids').val().trim();
    if(credit.length<=0 ){
        credit=0;
    }
    if(debit.length<=0){
        debit=0;
    }
    if(particular.length>0 && isDate(gdate)==true)
    {        
        $('.destination1-error').empty();
        $('.destination2-error').empty();
        if(credit<=0 && debit<=0){
                if(debit<=0){
                    $('.destination3-error').empty();
                    $('.destination3-error').html('Invalid input field.');
                    $(".destination3-error").hide();
                    $(".destination3-error").show(600);
                }else{
                    $('.destination3-error').empty();
                }
                if(credit<=0){
                    $('.destination4-error').empty();
                    $('.destination4-error').html('Invalid input field.');
                    $(".destination4-error").hide();
                    $(".destination4-error").show(600);
                }else{
                    $('.destination4-error').empty();
                }
        }else{
                $.ajax({
                    url:'../pages/payable_save.php',
                    type:'post',
                    cache:false,
                    data:{
                        'form-mode-edit':'edit',
                        'particular':particular,
                        'credit':credit,
                        'debit':debit,
                        'companyid':compid,
                        'payabledate':gdate,
                        'payid':payid,
                    },
                    success:function(data){
                        $('#txtparticular').val('');
                        $('#txtdebit').val('');
                        $('#txtcredit').val('');
                        $('.destination1-error').empty();
                        $('.destination2-error').empty();
                        $('.destination3-error').empty();
                        $('.destination4-error').empty();
                        $('.added-payable').append(data);
                        $('.added-payable').show(600);
                    }
                });
        }
    }else{       
        if(particular.length<=0){
            $('.destination2-error').empty();
            $('.destination2-error').html('Invalid input field.');
            $(".destination2-error").hide();
            $(".destination2-error").show(600);
        }else{
            $('.destination2-error').empty();
        }

        if(isDate(gdate)==false){
            $('.destination1-error').empty();
            $('.destination1-error').html('<span>Date field is invalid.</span>');
            $('.destination1-error').hide();
            $('.destination1-error').show(700);
        }else{
            $('.destination1-error').empty();
        }
        
    }
 });




 $('#btndeletepayable').on('click',(e)=>{
    e.preventDefault();
    let compid=$('.payablecompidedit').val().trim();
    let payid=$('.payableids').val().trim();
    // let compname=$('.compnamel').text().trim();
    $.ajax({
        url:'../pages/payable_save.php',
        type:'post',
        cache:false,
        data:{
            'form-mode-delete':'delete',
            'payid':payid,
            'companyid':compid,
        },
        success:function(data){
            $('.added-payable').html(data);              
            $('.added-payable').show(600);
        }
    });

 });


$('.active_drivers').on('click',()=>{
    $('#modal_activedrivers').modal();
});
$('.active_plate').on('click',()=>{
    $('#modal_activeplates').modal();
});
$('.active_routes').on('click',()=>{
    $('#modal_activeroutes').modal();
});


$('#btnupdateActivedriver').on('click',(e)=>{
    e.preventDefault();
    $('.added-driver').hide(100);
    let getChecked = [];
    $("input:checkbox[name=isactive]:checked").each(function(){
            // console.log($(this).val());
            getChecked.push($(this).val());
    });
    // alert(getChecked.join(", "));
    // console.log(getChecked);
     $.ajax({
        url:'../pages/driver_add.php',
        type:'post',
        cache:false,
        data:{
            'driveris_active':'isactive',
            'driverids':getChecked,
        },
        success:function(data){
            $('.added-driver').html(data);              
            $('.added-driver').show(600);
        }
    });
 });

 $('#btnupdateActiveplate').on('click',(e)=>{
    e.preventDefault();
    $('.added-driver').hide(100);
    let getChecked = [];
    $("input:checkbox[name=isactive_plate]:checked").each(function(){
            // console.log($(this).val());
            getChecked.push($(this).val());
    });
    // alert(getChecked.join(", "));
    // console.log(getChecked);
     $.ajax({
        url:'../pages/plate_add.php',
        type:'post',
        cache:false,
        data:{
            'plateis_active':'isactive',
            'plateids':getChecked,
        },
        success:function(data){
            $('.added-driver').html(data);              
            $('.added-driver').show(600);
        }
    });
 });

 $('#btnupdateActiveroutes').on('click',(e)=>{
    e.preventDefault();
    $('.added-driver').hide(100);
    let getChecked = [];
    $("input:checkbox[name=isactive_routes]:checked").each(function(){
            // console.log($(this).val());
            getChecked.push($(this).val());
    });
    // alert(getChecked.join(", "));
    // console.log(getChecked);
     $.ajax({
        url:'../pages/destination_add.php',
        type:'post',
        cache:false,
        data:{
            'routeis_active':'isactive',
            'routeids':getChecked,
        },
        success:function(data){
            $('.added-driver').html(data);              
            $('.added-driver').show(600);
        }
    });
 });






});





