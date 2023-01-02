<?php
include '../classes/Dbclass.php';
$db=new Dbclass();
include '../parts/header.php';
include '../parts/menu.php';
?>
<div class="main-content">
    <div class="header-title-2">
        <h1>Cash advances</h1>
    </div>
    <hr />
    <div class="container_trip">
        <div>
            <h3 class="bggreen">Add new cash advance</h3>
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
                    <td>Driver</td>
                    <td>
                        <div class="search_select_box searchbox_driver">
                            <select data-live-search="true">
                                <option value="">--Select Driver--</option>
                                <?php
                                $res=$db->select('driver','*','ID>0 ORDER BY driver ASC');
                                while($rw=mysqli_fetch_assoc($res)){
                                    echo "<option value='".$rw['ID']."'>".$rw['driver']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Amount</td>
                    <td><input type="text" id="ca_amount" class="txttrip_rate numeric-input" placeholder="Enter Amount"></td>
                </tr>
                <tr>
                    <td class="tbl-td-v">Remarks</td>
                    <td>
                        <textarea id="ca_remarks" class="txtca_remarks" cols="30" rows="2"></textarea>
                    </td>
                </tr>         
            </table>
        </div>
        <div style="position:relative;">
            <input type="button" value="SAVE" class="btn-style btnsave" id="btnsaveca">
            <a href="ca.php" class="cancel-link">Cancel</a>
        </div>
        <div class="success-info">
                <div class="added-trip"></div>
        </div>    
             
    </div>   
</div>

<?php
include '../parts/footer.php';
?>

		
		
	
