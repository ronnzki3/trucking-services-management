<?php
include 'classes/Dbclass.php';
$db=new Dbclass();
include 'parts/header.php';
include 'parts/menu.php';
?>
<div class="main-content">
    <div class="header-title-2">
        <h1>Payables</h1>
    </div>
    <hr />
    <div class="container_trip">
        <div>
            <h3 class="bggreen">Add new payable</h3>
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
                    <td>Company</td>
                    <td>
                        <div class="search_select_box searchbox_driver">
                            <select data-live-search="true">
                                <option value="">--Select Company--</option>
                                <?php
                                $res=$db->select('company','*','ID>0 ORDER BY company ASC');
                                while($rw=mysqli_fetch_assoc($res)){
                                    echo "<option value='".$rw['ID']."'>".$rw['company']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Debit</td>
                    <td><input type="text" id="debit_amount" class="txtdebit numeric-input" placeholder="Enter Amount"></td>
                </tr>
                <tr>
                    <td>Credit</td>
                    <td><input type="text" id="credit_amount" class="txtcredit numeric-input" placeholder="Enter Amount"></td>
                </tr>        
            </table>
        </div>
        <div>
            <input type="button" value="SAVE" class="btn-style btnsave" id="btnsaveca">
        </div>
        <div class="success-info">
                <div class="added-trip"></div>
        </div>    
             
    </div>   
</div>

<?php
include 'parts/footer.php';
?>

		
		
	
