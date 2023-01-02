<?php
include '../classes/Dbclass.php';
$db=new Dbclass();
$db1=new Dbclass();
include '../parts/header.php';
include '../parts/menu.php';
?>
<div class="main-content">
    <div class="header-title-2">
        <h1>Daily Trip</h1>
    </div>
    <hr />
    <div class="container_trip">
        <div>
            <h3 class="bggreen">Add new trip</h3>
        </div>
        <div class="trip-err-info error-txt-2">            
        </div>
        <div>
            <table class='tbl-trip'>
                <tr>
                    <td>Date</td>
                    <td><input type="text" id="datepick" class="txtdatepick" placeholder="Enter date" autoComplete="off"></td>
                </tr>
                <tr>
                    <td>Driver</td>
                    <td>
                        <div class="search_select_box searchbox_driver">
                            <select data-live-search="true">
                                <option value="" id="opt-txt-driver">--Select Driver--</option>
                                <?php
                                $res=$db->select('driver','*','is_active=1 ORDER BY driver ASC');
                                while($rw=mysqli_fetch_assoc($res)){
                                    echo "<option value='".$rw['ID']."'>".$rw['driver']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Route</td>
                    <td>
                        <div class="search_select_box searchbox_destination">
                            <select data-live-search="true">
                                <option value="" id="opt-txt-route">--Select Route--</option>
                                <?php
                                $res=$db->select('destination','MAX(ID) as ID,destination','is_active=1 GROUP BY destination ORDER BY destination ASC');
                                while($rw=mysqli_fetch_assoc($res)){
                                    echo "<option value='".$rw['ID']."'>".$rw['destination']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Truck</td>
                    <td>
                        <div class="search_select_box searchbox_plate">
                            <select data-live-search="true">
                                <option value="" id="opt-txt-plate">--Select Truck--</option>
                                <?php
                                $res=$db->select('plate','*','is_active=1 ORDER BY plate ASC');
                                while($rw=mysqli_fetch_assoc($res)){
                                    echo "<option value='".$rw['ID']."'>".$rw['plate']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Driver Rate</td>
                    <td><input type="text" name="trip_rate" id="trip_rate" class="txttrip_rate numeric-input" placeholder="Enter Amount" autoComplete="off"></td>
                </tr>
                <tr>
                    <td>Diesel Amount</td>
                    <td><input type="text" name="diesel" id="diesel" class="txtdiesel numeric-input" placeholder="Enter Amount" autoComplete="off"></td>
                </tr>    
                <tr>
                    <td>Other Expenses</td>
                    <td><input type="text" name="expense" id="expense" class="txtexpenses numeric-input" placeholder="Enter Amount" autoComplete="off"></td>
                </tr>    
                <tr>
                    <td class="tbl-td-v">Expenses Remarks</td>
                    <td>
                        <textarea class="txtexpense_remarks" id="" cols="30" rows="4"></textarea>
                    </td>
                </tr>      
            </table>
        </div>        
        <div style="position:relative;">
            
            <input type="button" value="SAVE" class="btnsave" id="btnsavedailytrip">
            <a href="trip.php" class="cancel-link">Cancel</a>
        </div>
        <div class="success-info">
                <div class="added-trip"></div>
        </div>        
    </div>   
</div>

<?php
include '../parts/footer.php';
?>

		
		
	
