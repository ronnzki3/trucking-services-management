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
            <h3 class="bgyellow">Edit expense</h3>
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
                    <td><input type="text" id="datepick" class="txtdatepick" value="<?=date('M d, Y',strtotime($trip_date));?>" placeholder="Enter date" autoComplete="off"></td>
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
                    <td>Amount</td>
                    <td><input type="text" id="maintenance_rate" class="txtmaintenance_rate numeric-input" value="<?=$trip_rate?>" placeholder="Enter Amount" autoComplete="off"></td>
                </tr>
                <tr>
                    <td class="tbl-td-v">Remarks</td>
                    <td>
                        <textarea id="maintenance_rate" class="txtmaintenance_remarks" cols="30" rows="4"><?=str_replace('<br />', "", $trip_remarks)?></textarea>
                    </td>
                </tr>         
            </table>
        </div>        
        <div style="position:relative;">
            <input type="button" value="UPDATE" style="margin-left:calc(100% - 150px);margin-top:15px;" class="btn-style btnupdate" id="btnupdatemaintenance">
            <a href="maintenance.php" class="cancel-link">Cancel</a>
        </div>
        <div class="success-info">
                <div class="added-trip success-updated"></div>
        </div>      
    </div>   
</div>

<?php
include '../parts/footer.php';
?>

		
		
	
