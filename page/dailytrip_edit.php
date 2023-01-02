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
            <h3 class="bgyellow">Edit daily trip</h3>
        </div>
        <div class="trip-err-info error-txt-2">            
        </div>
        <div>
            <table class="tbl-trip">
                <?php
                $trip_id=0;
                $trip_date='';
                $trip_driverid='';
                $trip_destinationid='';
                $trip_plateid='';
                $trip_rate='';
                $trip_diesel='';
                $tripdriver='';
                $tripdestination='';
                $tripplate='';
                $trip_expense='';
                $trip_remarks='';
                if(isset($_GET['id'])){
                    $trip_id=$_GET['id'];
                    $res1=$db->select('dailytrip','*','ID='.$trip_id);
                    while($rw1=mysqli_fetch_assoc($res1)){
                        $trip_date=$rw1['tripdate'];
                        $trip_driverid=$rw1['driverid'];
                        $trip_destinationid=$rw1['destinationid'];
                        $trip_plateid=$rw1['plateid'];
                        $trip_rate=$rw1['rateamount'];
                        $trip_diesel=$rw1['diesel'];
                        $trip_expense=$rw1['other_expense'];
                        $trip_remarks=$rw1['expense_remarks'];
                    }
                    $res2=$db->select('driver','*','ID='.$trip_driverid);
                    while($rw2=mysqli_fetch_assoc($res2)){
                       $tripdriver=$rw2['driver'];
                    }
                    $res3=$db->select('destination','*','ID='.$trip_destinationid);
                    while($rw3=mysqli_fetch_assoc($res3)){
                       $tripdestination=$rw3['destination'];
                    }
                    $res4=$db->select('plate','*','ID='.$trip_plateid);
                    while($rw4=mysqli_fetch_assoc($res4)){
                       $tripplate=$rw4['plate'];
                    }
                }
                ?>
                <tr>
                    <td>Date</td>
                    <input type="hidden" id="txtdailytripid" value="<?=$trip_id?>">
                    <td><input type="text" id="datepick" class="txtdatepick" value="<?=date('M d, Y',strtotime($trip_date));?>" placeholder="Enter date" autoComplete="off"></td>
                </tr>
                <tr>
                    <td>Driver</td>
                    <td>
                        <div class="search_select_box searchbox_driver">
                            <select data-live-search="true">
                                <option value="<?=$trip_driverid?>"><?=$tripdriver?></option>
                                <?php
                                $res=$db->select('driver','*','ID!='.$trip_driverid.' ORDER BY driver ASC');
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
                                <option value="<?=$trip_destinationid?>"><?=$tripdestination?></option>
                                <?php
                                $res=$db->select('destination','*','ID!='.$trip_destinationid.' ORDER BY destination ASC');
                                while($rw=mysqli_fetch_assoc($res)){
                                    echo "<option value='".$rw['ID']."'>".$rw['destination']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Plate</td>
                    <td>
                        <div class="search_select_box searchbox_plate">
                            <select data-live-search="true">
                                <option value="<?=$trip_plateid?>"><?=$tripplate?></option>
                                <?php
                                $res=$db->select('plate','*','ID!='.$trip_plateid.' ORDER BY plate ASC');
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
                    <td><input type="text" name="trip_rate" id="trip_rate" class="txttrip_rate numeric-input" value="<?=$trip_rate?>" placeholder="Enter Amount" autoComplete="off"></td>
                </tr>
                <tr>
                    <td>Diesel Amount</td>
                    <td><input type="text" name="diesel" id="diesel" class="txtdiesel numeric-input" value="<?=$trip_diesel?>" placeholder="Enter Amount" autoComplete="off"></td>
                </tr>    
                <tr>
                    <td>Other Expenses</td>
                    <td><input type="text" name="expense" id="expense" class="txtexpenses numeric-input" value="<?=$trip_expense?>" placeholder="Enter Amount" autoComplete="off"></td>
                </tr>    
                <tr>
                    <td class="tbl-td-v">Expenses Remarks</td>
                    <td>
                        <textarea class="txtexpense_remarks" id="" cols="30" rows="4"><?=str_replace('<br />', "", $trip_remarks);?></textarea>
                    </td>
                </tr>        
            </table>
        </div>        
        <div style="position:relative;">
            <input type="button" value="UPDATE" class="btn-style btnupdate btn-margin-left" id="btnupdatedailytrip">
            <a href="trip.php" class="cancel-link">Cancel</a>
        </div>
        <div class="success-info">
                <div class="added-trip success-updated"></div>
        </div>  
    </div>   
</div>

<?php
include '../parts/footer.php';
?>

		
		
	
