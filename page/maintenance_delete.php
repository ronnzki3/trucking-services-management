<?php
include '../classes/Dbclass.php';
$db=new Dbclass();
$db1=new Dbclass();
include '../parts/header.php';
include '../parts/menu.php';
?>
<div class="main-content">
    <div class="header-title-2">
        <h1>Maintenance</h1>
    </div>
    <hr />
    <div class="container_trip">        
        <div>
            <h3 class="bgred">Delete expense</h3>
        </div>
        <div>
            <h2 style="color:red;font-weight:700;padding-left:20px;font-size:2rem;">WARNING!!!</h2>
        </div>
        <div>
            <h5 style="color:red;padding-left:20px;">Do you want to continue delete this current expense?</h5>
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
                    $res1=$db->select('maintenance','*','ID='.$trip_id);
                    while($rw1=mysqli_fetch_assoc($res1)){
                        $trip_date=$rw1['transactiondate'];
                        $trip_plateid=$rw1['plateid'];
                        $trip_rate=$rw1['amount'];
                        $trip_remarks=$rw1['remarks'];
                    }
                    $res4=$db->select('plate','*','ID='.$trip_plateid);
                    while($rw4=mysqli_fetch_assoc($res4)){
                       $tripplate=$rw4['plate'];
                    }
                }
                ?>
                <tr>
                    <td>Date</td>
                    <input type="hidden" id="txtdailymaintenanceid" value="<?=$trip_id?>">
                    <td><input type="text" id="datepick" class="txtdatepick txtdrivernamestyle" value="<?=date('M d, Y',strtotime($trip_date));?>" placeholder="Enter date" autoComplete="off" disabled></td>
                </tr>
                <tr>
                    <td>Plate</td>
                    <td>
                        <input type="text" value="<?=$tripplate?>" class="txtdrivernamestyle" disabled>
                    </td>
                </tr>
                <tr>
                    <td>Amount</td>
                    <td><input type="text" id="maintenance_rate" class="txtmaintenance_rate txtdrivernamestyle" value="<?=$trip_rate?>" placeholder="Enter Amount" autoComplete="off" disabled></td>
                </tr>
                <tr>
                    <td class="tbl-td-v">Remarks</td>
                    <td>
                        <textarea id="maintenance_rate" class="txtmaintenance_remarks txtdrivernamestyle" cols="30" rows="4" disabled><?=str_replace('<br />', "", $trip_remarks)?></textarea>
                    </td>
                </tr>         
            </table>
        </div>        
        <div style="position:relative;">
            <input type="button" value="DELETE" style="margin-left:calc(100% - 120px);margin-top:15px;" class="btn-style btndelete" id="btndeletemaintenance">
            <a href="maintenance.php" class="cancel-link">Cancel</a>
        </div>
        <div class="success-info">
                <div class="added-trip success-deleted2"></div>
        </div>           
    </div>   
</div>

<?php
include '../parts/footer.php';
?>

		
		
	
