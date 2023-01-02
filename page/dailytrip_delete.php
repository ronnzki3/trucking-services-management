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
    <div class="container_trip" style="position:relative;">
        <div>
            <h3 class="bgred">Delete trip details</h3>
        </div>
        <div>
            <h2 style="color:red;font-weight:700;padding-left:20px;font-size:2rem;">WARNING!!!</h2>
        </div>
        <div>
            <h5 style="color:red;padding-left:20px;">Do you want to continue delete this current trip details?</h5>
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
                    <td><input type="text" id="datepick" class="txtdatepick txtdrivernamestyle" value="<?=date('M d, Y',strtotime($trip_date));?>" placeholder="Enter date" autoComplete="off" disabled></td>
                </tr>
                <tr>
                    <td>Driver</td>
                    <td>
                        <input type="text" value=<?=$tripdriver?> class="txtdrivernamestyle" disabled>                        
                    </td>
                </tr>
                <tr>
                    <td>Route</td>
                    <td>
                        <input type="text" value=<?=$tripdestination?> class="txtdrivernamestyle" disabled>
                    </td>
                </tr>
                <tr>
                    <td>Plate</td>
                    <td>
                        <input type="text" value=<?=$tripplate?> class="txtdrivernamestyle" disabled>
                    </td>
                </tr>
                <tr>
                    <td>Driver Rate</td>
                    <td><input type="text" name="trip_rate" id="trip_rate" class="txttrip_rate txtdrivernamestyle" value="<?=$trip_rate?>" placeholder="Enter Amount" autoComplete="off" disabled></td>
                </tr>
                <tr>
                    <td>Diesel Amount</td>
                    <td><input type="text" name="diesel" id="diesel" class="txtdiesel txtdrivernamestyle" value="<?=$trip_diesel?>" placeholder="Enter Amount" autoComplete="off" disabled></td>
                </tr>         
            </table>
        </div>        
        <div style="position:relative;">
            <input type="button" value="DELETE" class="btn-style btndelete btn-margin-left" id="btndeletedailytrip">
            <a href="trip.php" class="cancel-link">Cancel</a>
        </div>
        <div class="success-info">
                <div class="added-trip success-deleted2"></div>
        </div>      
    </div>   
</div>

<?php
include '../parts/footer.php';
?>

		
		
	
