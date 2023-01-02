<?php
include '../classes/Dbclass.php';
$db=new Dbclass();
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
            <h3 class="bggreen">Add new expense</h3>
        </div>
        <div class="trip-err-info error-txt-2">            
        </div>
        <div>
            <table class="tbl-trip">
                <tr>
                    <td>Date</td>
                    <td><input type="text" id="datepick" class="txtdatepick" placeholder="Enter date" autoComplete="off"></td>
                </tr>
                <tr>
                    <td>Plate</td>
                    <td>
                        <div class="search_select_box searchbox_plate">
                            <select data-live-search="true">
                                <option value="">--Select Plate--</option>
                                <?php
                                $res=$db->select('plate','*','ID>0 ORDER BY plate ASC');
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
                    <td><input type="text" id="maintenance_rate" class="txtmaintenance_rate numeric-input" placeholder="Enter Amount" autoComplete="off"></td>
                </tr>
                <tr>
                    <td class="tbl-td-v">Remarks</td>
                    <td>
                        <textarea class="txtmaintenance_remarks" id="" cols="30" rows="4"></textarea>
                    </td>
                </tr>         
            </table>
        </div>        
        <div style="position:relative;">
            <input type="button" value="SAVE" style="margin-left:calc(100% - 120px);margin-top:15px;" class="btnsave btn-style" id="btnsavemaintenance">
            <a href="maintenance.php" class="cancel-link">Cancel</a>
        </div>
        <div class="success-info">
                <div class="added-trip"></div>
        </div>       
    </div>   
</div>

<?php
include '../parts/footer.php';
?>

		
		
	
