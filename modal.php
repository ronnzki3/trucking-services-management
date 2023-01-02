  
  <!-- DRIVER Modal -->
  <div id="modal_driver_add" class="modal">    
        <div class="modal_container_driver">
            <div>
                <h3 class="bggreen">Add new driver</h3>
            </div>
            <div class="modal-drv-input">
                <label for="driver">Driver name:</label>
                <input type="text" name="driver" id="driver" placeholder="Enter driver name" style="text-transform:uppercase;" autocomplete="off">
                <div style="width:100%;" class="driver-error error-txt"></div>
            </div>            
            <div class="modal-drv-btn">
                <input type="button" value="CANCEL" class="btncancel btn-style">
                <input type="button" value="SAVE" id="btnsavedriver" class="btnsave btn-style">
            </div>  
            <div class="success-info">
                <div class="added-driver"></div>
                <div class="added-link-driver"></div>
            </div>          
        </div>   
    </div>



    <!-- Edit DRIVER Modal -->
  <div id="modal_driver_edit" class="modal">    
        <div class="modal_container_driver">
            <div>
                <h3 class="bgyellow">Edit driver name</h3>
            </div>
            <div class="modal-drv-input">
                <label for="driver">Driver name:</label>
                <input type="hidden" class="driverId-edit">
                <input type="text" name="driver" id="driverEdit1" class="driverName" placeholder="Enter driver name" style="text-transform:uppercase;" autocomplete="off">
                <div style="width:100%;" class="driver-error error-txt"></div>
            </div>
            <div class="success-info">
                <div class="added-driver success-updated"></div>
            </div>
            <div class="modal-drv-btn">
                <input type="button" value="CANCEL" class="btncancel btn-style">
                <input type="button" value="UPDATE" id="btnupdatedriver" class="btnupdate btn-style">
            </div>
        </div>   
    </div>


       <!-- DELETE DRIVER Modal -->
  <div id="modal_driver_delete" class="modal">    
        <div class="modal_container_driver">
            <div>
                <h3 class="bgred">Delete driver</h3>
            </div>
            <div>
                <h4 class='warning'>WARNING!!!</h4>
            </div>
            <div>
                <h4 class='warning-q'>Do you want to continue delete this driver?</h4>
            </div>
            <div class="modal-drv-input">
                <label for="driver">Driver name:</label>
                <input type="hidden" class="driverIdDelete">
                <input type="text" name="driver" id="driverEdit" class="txtdrivernamestyle driverName" style="text-transform:uppercase;" disabled>
            </div>
            <div class="modal-drv-btn">
                <input type="button" value="CANCEL" class="btncancel btn-style">
                <input type="button" value="DELETE" id="btndeletedriver" class="btndelete btn-style">
            </div>
            <div class="success-info">
                <div class="added-driver success-deleted"></div>
            </div>
        </div>   
    </div>



<!-- PLATE Modal -->
<div id="modal_plate_add" class="modal" data-keyboard="false" data-backdrop="static">    
        <div class="modal_container_driver">
            <div>
                <h3 class="bggreen">Add new plate #</h3>
            </div>
            <div class="modal-drv-input">
                <label for="plate">Plate number:</label>
                <input type="text" id="plate" placeholder="Enter plate number" style="text-transform:uppercase;" autocomplete="off">
                <div style="width:100%;" class="plate-error error-txt"></div>
            </div>
            <div class="modal-drv-btn">
                <input type="button" value="CANCEL" class="btncancel btn-style">
                <input type="button" value="SAVE" id="btnsaveplate" class="btnsave btn-style">
            </div> 
            <div class="success-info">
                <div class="added-plate"></div>
                <div class="added-link-plate"></div>
            </div>   
        </div>   
    </div>



    <!--EDIT PLATE Modal -->
<div id="modal_plate_edit" class="modal" data-keyboard="false" data-backdrop="static">    
        <div class="modal_container_driver">
            <div>
                <h3 class="bgyellow">Edit plate #</h3>
            </div>
            <div class="modal-drv-input">
                <label for="plate">Plate number:</label>
                <input type="hidden" id="plateeditid">
                <input type="text" name="plate" id="plateedit" placeholder="Enter plate number" style="text-transform:uppercase;" autocomplete="off">
                <div style="width:100%;" class="plate-error error-txt"></div>
            </div>
            <div class="success-info">
                <div class="added-plate success-updated"></div>
            </div>
            <div class="modal-drv-btn">
                <input type="button" value="CANCEL" class="btncancel btn-style">
                <input type="button" value="UPDATE" id="btnupdateplate" class="btnupdate btn-style">
            </div> 
        </div>   
    </div>


    <!--DELETE PLATE Modal -->
    <div id="modal_plate_delete" class="modal" data-keyboard="false" data-backdrop="static">    
        <div class="modal_container_driver">
            <div>
                <h3 class="bgred">Delete Plate #</h3>
            </div>
            <div>
                <h4 class='warning'>WARNING!!!</h4>
            </div>
            <div>
                <h4 class='warning-q'>Do you want to continue delete this plate #?</h4>
            </div>
            <div class="modal-drv-input">
                <label for="plate">Plate number:</label>
                <input type="hidden" id="platedeleteid">
                <input type="text" id="platedelete" class="txtdrivernamestyle" style="text-transform:uppercase;" disabled>
            </div>
            <div class="modal-drv-btn">
                <input type="button" value="CANCEL" class="btncancel btn-style">
                <input type="button" value="DELETE" id="btndeleteplate" class="btndelete btn-style">
            </div>
            <div class="success-info">
                <div class="added-plate success-deleted"></div>
            </div>
        </div>   
    </div>







<!-- DESTINATION Modal -->
<div id="modal_destination_add" class="modal">    
        <div class="modal_container_driver">
            <div>
                <h3 class="bggreen">Add new route</h3>
            </div>
            <div class="modal-drv-input-2">
                <label for="destination">Route:</label>
                <input type="text" name="destination" id="txtdestination" placeholder="Enter destination" style="text-transform:uppercase;" autocomplete="off">
                <div style="width:100%;" class="destination1-error error-txt"></div>
            </div>
            <div class="modal-drv-input-2">
                <label for="areacode">Area Code:</label>
                <input type="text" name="areacode" id="txtareacode" placeholder="Enter area code" style="text-transform:uppercase;" autocomplete="off">
                <div style="width:100%;" class="destination2-error error-txt"></div>
            </div>
            <div class="modal-drv-input-2">
                <label for="destination_distance">Distance (km):</label>
                <input type="text" name="destination_distance" id="txtdestination_distance" class="numeric-input" placeholder="Enter distance" autocomplete="off">
                <div style="width:100%;" class="destination4-error error-txt"></div>
            </div>
            <div class="modal-drv-input-2">
                <label for="destination_rate">Rate Amount:</label>
                <input type="text" name="destination_rate" id="txtdestination_rate" class="numeric-input" placeholder="Enter Amount" autocomplete="off">
                <div style="width:100%;" class="destination3-error error-txt"></div>
            </div>
            <div class="modal-drv-btn">
                <input type="button" value="CANCEL" class="btncancel btn-style">
                <input type="button" value="SAVE" id="btnsavedestination" class="btnsave btn-style">
            </div>
            <div class="success-info">
                <div class="added-destination"></div>
                <div class="added-link-destination"></div>
            </div> 
        </div>   
    </div>



<!--EDIT DESTINATION Modal -->
<div id="modal_destination_edit" class="modal">    
        <div class="modal_container_driver">
            <div>
                <h3 class="bgyellow">Edit route</h3>
            </div>
            <div class="modal-drv-input-2">
                <label for="destination">Route:</label>
                <input type="hidden" id="txtdestinationeditid">
                <input type="text" name="destination" id="txtdestinationedit" placeholder="Enter destination" style="text-transform:uppercase;" autocomplete="off">
                <div style="width:100%;" class="destination1-error error-txt"></div>
            </div>
            <div class="modal-drv-input-2">
                <label for="areacode">Area Code:</label>
                <input type="text" name="areacode" id="txtareacodeedit" placeholder="Enter area code" style="text-transform:uppercase;" autocomplete="off">
                <div style="width:100%;" class="destination2-error error-txt"></div>
            </div>
            <div class="modal-drv-input-2">
                <label for="destination_distance">Distance (km):</label>
                <input type="text" name="destination_distance" id="txtdestination_distanceedit" class="numeric-input" placeholder="Enter distance" autocomplete="off">
                <div style="width:100%;" class="destination4-error error-txt"></div>
            </div>
            <div class="modal-drv-input-2">
                <label for="destination_rate">Rate Amount:</label>
                <input type="text" name="destination_rate" id="txtdestination_rateedit" class="numeric-input" placeholder="Enter Amount" style="text-transform:uppercase;" autocomplete="off">
                <div style="width:100%;" class="destination3-error error-txt"></div>
            </div>
            <div class="success-info">
                <div class="added-destination success-updated"></div>
            </div>
            <div class="modal-drv-btn">
                <input type="button" value="CANCEL" class="btncancel btn-style">
                <input type="button" value="UPDATE" id="btnupdatedestination" class="btnupdate btn-style">
            </div>
            
        </div>   
    </div>


    <!--DELETE DESTINATION Modal -->
<div id="modal_destination_delete" class="modal">    
        <div class="modal_container_driver">
            <div>
                <h3 class="bgred">Delete Route</h3>
            </div>
            <div>
                <h4 class='warning'>WARNING!!!</h4>
            </div>
            <div>
                <h4 class='warning-q'>Do you want to continue delete this route?</h4>
            </div>
            <div class="modal-drv-input-2">
                <label for="destination">Route:</label>
                <input type="hidden" id="txtdestinationdeleteid">
                <input type="text" name="destination" id="txtdestinationdelete" class="txtdrivernamestyle" style="text-transform:uppercase;" disabled>
            </div>
            <div class="modal-drv-input-2">
                <label for="areacode">Area Code:</label>
                <input type="text" name="areacode" id="txtareacodedelete" class="txtdrivernamestyle" style="text-transform:uppercase;" disabled>
            </div>
            <div class="modal-drv-input-2">
                <label for="destination_distance">Distance (km):</label>
                <input type="text" name="destination_distance" id="txtdestination_distancedelete" class="txtdrivernamestyle" autocomplete="off" disabled>
                <div style="width:100%;" class="destination4-error error-txt"></div>
            </div>
            <div class="modal-drv-input-2">
                <label for="destination_rate">Rate Amount:</label>
                <input type="text" name="destination_rate" id="txtdestination_ratedelete" class="txtdrivernamestyle" style="text-transform:uppercase;" disabled>
            </div>
            <div class="modal-drv-btn">
                <input type="button" value="CANCEL" class="btncancel btn-style">
                <input type="button" value="DELETE" id="btndeletedestination" class="btndelete btn-style">
            </div>
            <div class="success-info">
                <div class="added-destination success-deleted"></div>
            </div>
        </div>   
    </div>















     <!-- COMPANY Modal -->
  <div id="modal_company_add" class="modal">    
        <div class="modal_container_driver">
            <div>
                <h3 class="bggreen">Add new company</h3>
            </div>
            <div class="modal-drv-input">
                <label for="company">Company name:</label>
                <input type="text" name="company" id="company" placeholder="Enter company name" style="text-transform:uppercase;" autocomplete="off">
                <div style="width:100%;" class="company-error error-txt"></div>
            </div>            
            <div class="modal-drv-btn">
                <input type="button" value="CANCEL" class="btncancel btn-style">
                <input type="button" value="SAVE" id="btnsavecompany" class="btnsave btn-style">
            </div>  
            <div class="success-info">
                <div class="added-company"></div>
                <div class="added-link-company"></div>
            </div>          
        </div>   
    </div>

     <!-- Edit COMPANY Modal -->
  <div id="modal_company_edit" class="modal">    
        <div class="modal_container_driver">
            <div>
                <h3 class="bgyellow">Edit company name</h3>
            </div>
            <div class="modal-drv-input">
                <label for="company">Company name:</label>
                <input type="hidden" class="companyId-edit">
                <input type="text" name="company" id="companyEdit1" class="companyName" placeholder="Enter company name" style="text-transform:uppercase;" autocomplete="off">
                <div style="width:100%;" class="company-error error-txt"></div>
            </div>
            <div class="success-info">
                <div class="added-company success-updated"></div>
            </div>
            <div class="modal-drv-btn">
                <input type="button" value="CANCEL" class="btncancel btn-style">
                <input type="button" value="UPDATE" id="btnupdatecompany" class="btnupdate btn-style">
                <input type="button" value="DELETE" id="comp-del" class="btndelete btn-style">
            </div>
        </div>   
    </div>


         <!-- DELETE COMPANY Modal -->
  <div id="modal_company_delete" class="modal">    
        <div class="modal_container_driver">
            <div>
                <h3 class="bgred">Delete Company</h3>
            </div>
            <div>
                <h4 class='warning'>WARNING!!!</h4>
            </div>
            <div>
                <h4 class='warning-q'>Do you want to continue delete this company?</h4>
            </div>
            <div class="modal-drv-input">
                <label for="company">Company name:</label>
                <input type="hidden" class="companyIdDelete">
                <input type="text" name="company" id="companyEdit" class="txtdrivernamestyle companyNameDelete" style="text-transform:uppercase;" disabled>
            </div>
            <div class="modal-drv-btn">
                <input type="button" value="CANCEL" class="btncancel btn-style">
                <input type="button" value="DELETE" id="btndeletecompany" class="btndelete btn-style">
            </div>
            <div class="success-info">
                <div class="added-company success-deleted"></div>
            </div>
        </div>   
    </div>






    <!-- PAYABLES Modal -->
<div id="modal_payable_add" class="modal">    
        <div class="modal_container_driver">
            <div>
                <h3 class="bggreen">Add new payable - <span class="payable-bankname"></span></h3>
            </div>
            <div class="modal-drv-input-2">
                <label for="destination">Date:</label>
                <input type="hidden" class="payablecompid">
                <input type="text" id="datepick2" class="txtdatepickpayable" placeholder="Enter date" autoComplete="off">
                <div style="width:100%;" class="destination1-error error-txt"></div>
            </div>
            <div class="modal-drv-input-2">
                <label for="particular">Particulars:</label>
                <textarea name="particular" id="txtparticular" cols="30" rows="5"></textarea>
                <!-- <input type="text" name="particular" id="txtparticular" placeholder="Enter area code" style="text-transform:uppercase;" autocomplete="off"> -->
                <div style="width:100%;" class="destination2-error error-txt"></div>
            </div>
            <div class="modal-drv-input-2">
                <label for="txtdebit">Debit:</label>
                <input type="text" name="txtdebit" id="txtdebit" class="numeric-input" placeholder="Enter Amount" autocomplete="off">
                <div style="width:100%;" class="destination3-error error-txt"></div>
            </div>
            <div class="modal-drv-input-2">
                <label for="txtcredit">Credit:</label>
                <input type="text" name="txtcredit" id="txtcredit" class="numeric-input" placeholder="Enter Amount" autocomplete="off">
                <div style="width:100%;" class="destination4-error error-txt"></div>
            </div>
            <div class="modal-drv-btn">
                <input type="button" value="CANCEL" class="btncancel btn-style">
                <input type="button" value="SAVE" id="btnsavepayable" class="btnsave btn-style">
            </div>
            <div class="success-info">
                <div class="added-payable"></div>
                <div class="added-link"></div>
            </div> 
        </div>   
    </div>





       <!--EDIT PAYABLES Modal -->
<div id="modal_payable_edit" class="modal">    
        <div class="modal_container_driver">
            <div>
                <h3 class="bgyellow">Edit payable - <span class="payable-bankname"></span></h3>
            </div>
            <div class="modal-drv-input-2">
                <label for="destination">Date:</label>
                <input type="hidden" class="payablecompidedit">
                <input type="hidden" class="payableids">
                <input type="text" id="datepick3" class="txtdatepickpayableedit" placeholder="Enter date" autoComplete="off">
                <div style="width:100%;" class="destination1-error error-txt"></div>
            </div>
            <div class="modal-drv-input-2">
                <label for="particular">Particulars:</label>
                <textarea name="particular" id="txtparticularedit" cols="30" rows="3"></textarea>
                <!-- <input type="text" name="particular" id="txtparticularedit" placeholder="Enter area code" style="text-transform:uppercase;" autocomplete="off"> -->
                <div style="width:100%;" class="destination2-error error-txt"></div>
            </div>
            <div class="modal-drv-input-2">
                <label for="txtdebit">Debit:</label>
                <input type="text" name="txtdebit" id="txtdebitedit" class="numeric-input" placeholder="Enter Amount" autocomplete="off">
                <div style="width:100%;" class="destination3-error error-txt"></div>
            </div>
            <div class="modal-drv-input-2">
                <label for="txtcredit">Credit:</label>
                <input type="text" name="txtcredit" id="txtcreditedit" class="numeric-input" placeholder="Enter Amount" autocomplete="off">
                <div style="width:100%;" class="destination4-error error-txt"></div>
            </div>
            <div class="success-info">
                <div class="added-payable success-updated"></div>
            </div>
            <div class="modal-drv-btn">
                <input type="button" value="CANCEL" class="btncancel btn-style">
                <input type="button" value="UPDATE" id="btneditpayable" class="btnupdate btn-style">
                <input type="button" value="DELETE" id="btndeletepayablefrm" class="btndelete btn-style">
            </div>
        </div>   
    </div>




    
         <!-- DELETE PAYABLES Modal -->
  <div id="modal_payable_delete" class="modal">    
        <div class="modal_container_driver">
            <div>
                <h3 class="bgred">Delete payable - <span class="payable-bankname"></span></h3>
            </div>
            <div>
                <h4 class='warning'>WARNING!!!</h4>
            </div>
            <div>
                <h4 class='warning-q'>Do you want to continue delete this record?</h4>
            </div>
            <div class="modal-drv-input-2">
                <label for="destination">Date:</label>
                <input type="hidden" class="payablecompidedit">
                <input type="hidden" class="payableids">
                <input type="text" id="datepick4" class="txtdatepickpayabledelete txtdrivernamestyle" placeholder="Enter date" autoComplete="off">
                <div style="width:100%;" class="destination1-error error-txt"></div>
            </div>
            <div class="modal-drv-input-2">
                <label for="particular">Particulars:</label>
                <textarea name="particular" id="txtparticulardelete" class="txtdrivernamestyle" cols="30" rows="3"></textarea>
                <!-- <input type="text" name="particular" id="txtparticularedit" placeholder="Enter area code" style="text-transform:uppercase;" autocomplete="off"> -->
                <div style="width:100%;" class="destination2-error error-txt"></div>
            </div>
            <div class="modal-drv-input-2">
                <label for="txtdebit">Debit:</label>
                <input type="text" name="txtdebit" id="txtdebitdelete" class="txtdrivernamestyle" placeholder="Enter Amount" autocomplete="off">
                <div style="width:100%;" class="destination3-error error-txt"></div>
            </div>
            <div class="modal-drv-input-2">
                <label for="txtcredit">Credit:</label>
                <input type="text" name="txtcredit" id="txtcreditdelete" class="txtdrivernamestyle" placeholder="Enter Amount" autocomplete="off">
                <div style="width:100%;" class="destination4-error error-txt"></div>
            </div>           
            <div class="modal-drv-btn">
                <input type="button" value="CANCEL" class="btncancel btn-style">
                <input type="button" value="DELETE" id="btndeletepayable" class="btndelete btn-style">
            </div>
            <div class="success-info">
                <div class="added-payable success-delete"></div>
            </div>
        </div>   
    </div>




     <!--ACTIVE DRIVER Modal -->
  <div id="modal_activedrivers" class="modal">    
        <div class="modal_container_active_drivers">
            <div>
                <h3 class="bggreen">Active/Inactive drivers</h3>
            </div>
            <div class="modal-drv-input">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Driver</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i_=1;
                    $res_drv=$db->select('driver','*','ID>0 order by is_active desc,driver asc');
                    while($rdrv=mysqli_fetch_assoc($res_drv)){
                        $stv=$rdrv['is_active'];
                        $drvId=$rdrv['ID'];
                        $ck='';
                        if($stv==1){
                            $ck='checked';
                        }
                        echo "<tr><td>".$i_++."</td><td>";
                        echo $rdrv['driver'];
                        echo "</td><td>";
                        echo "<input type='checkbox' name='isactive' value='$drvId' ".$ck.">";
                        echo "</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
                
            </div>            
            <div class="modal-drv-btn">
                <input type="button" value="CANCEL" class="btncancel btn-style">
                <input type="button" value="Update" id="btnupdateActivedriver" class="btnupdate btn-style">
            </div>  
            <div class="success-info">
                <div class="added-driver"></div>
            </div>          
        </div>   
    </div>




     <!--ACTIVE Plate Modal -->
  <div id="modal_activeplates" class="modal">    
        <div class="modal_container_active_drivers">
            <div>
                <h3 class="bggreen">Active/Inactive Trucks</h3>
            </div>
            <div class="modal-drv-input">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Plate #</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i_2=1;
                    $res_drv1=$db->select('plate','*','ID>0 order by is_active desc,plate asc');
                    while($rdrv1=mysqli_fetch_assoc($res_drv1)){
                        $stv=$rdrv1['is_active'];
                        $drvId=$rdrv1['ID'];
                        $ck='';
                        if($stv==1){
                            $ck='checked';
                        }
                        echo "<tr><td>".$i_2++."</td><td>";
                        echo $rdrv1['plate'];
                        echo "</td><td>";
                        echo "<input type='checkbox' name='isactive_plate' value='$drvId' ".$ck.">";
                        echo "</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
                
            </div>            
            <div class="modal-drv-btn">
                <input type="button" value="CANCEL" class="btncancel btn-style">
                <input type="button" value="Update" id="btnupdateActiveplate" class="btnupdate btn-style">
            </div>  
            <div class="success-info">
                <div class="added-driver"></div>
            </div>          
        </div>   
    </div>








    <!--ACTIVE ROUTES Modal -->
  <div id="modal_activeroutes" class="modal">    
        <div class="modal_container_active_drivers">
            <div>
                <h3 class="bggreen">Active/Inactive Routes</h3>
            </div>
            <div class="modal-drv-input">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Routes</th>
                            <th>Area code</th>
                            <th>Distance</th>
                            <th>Rate</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i_21=1;
                    $res_drv11=$db->select('destination','*','ID>0 order by is_active desc,destination asc,areacode asc');
                    while($rdrv11=mysqli_fetch_assoc($res_drv11)){
                        $stv=$rdrv11['is_active'];
                        $drvId=$rdrv11['ID'];
                        $ck='';
                        if($stv==1){
                            $ck='checked';
                        }
                        echo "<tr><td>".$i_21++."</td><td>";
                        echo $rdrv11['destination'];
                        echo "</td><td>";
                        echo $rdrv11['areacode'];
                        echo "</td><td>";
                        echo $rdrv11['destination_distance'];
                        echo "</td><td>";
                        echo $rdrv11['destination_rate'];
                        echo "</td><td>";
                        echo "<input type='checkbox' name='isactive_routes' value='$drvId' ".$ck.">";
                        echo "</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
                
            </div>            
            <div class="modal-drv-btn">
                <input type="button" value="CANCEL" class="btncancel btn-style">
                <input type="button" value="Update" id="btnupdateActiveroutes" class="btnupdate btn-style">
            </div>  
            <div class="success-info">
                <div class="added-driver"></div>
            </div>          
        </div>   
    </div>






    