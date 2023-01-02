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
            <h3 class="bgyellow">Edit cash advance information</h3>
        </div>
        <div class="trip-err-info error-txt-2">            
        </div>
        <div>
                    <?php
                        $ca_id=0;     
                        $getdriver_name='';
                        $getdriverid=0;
                        $ca_date='';
                        $ca_driverid='';
                        $ca_amount='';
                        $ca_remarks='';
                        $ca_id='';
                        if(isset($_GET['id'])){
                            $ca_id=(int)$_GET['id'];

                            $res1=$db->select('ca','*','ID='.$ca_id);
                            while($rw1=mysqli_fetch_assoc($res1)){
                                $ca_id=$rw1['ID'];
                                $ca_date=$rw1['ca_date'];
                                $ca_driverid=$rw1['driverid'];
                                $ca_amount=$rw1['amount'];
                                $ca_remarks=$rw1['remarks'];
                            }
                        }                        

                        $res=$db->select('driver','*','ID='.$ca_driverid);
                        while($rw=mysqli_fetch_assoc($res)){     
                            $getdriver_name=$rw['driver']; 
                            $getdriverid=$rw['ID'];
                        }                  
                    ?>
            <table class="tbl-trip">
                <tr>
                    <td>Date</td>
                    <input type="hidden" class="txtcaiddd" value="<?=$ca_id;?>">
                    <td><input type="text" id="datepick" class="txtdatepick" value="<?=date('M d, Y',strtotime($ca_date));?>" placeholder="Enter date" autoComplete="off"></td>
                </tr>
                <tr>
                    <td>Driver</td>
                    <td>  
                        
                            <div class="search_select_box searchbox_driver">
                                <select data-live-search="true">
                                    <option value="<?=$getdriverid?>"><?=$getdriver_name?></option>
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
                    <td><input type="text" id="ca_amount" class="txttrip_rate numeric-input" value=<?=$ca_amount;?> placeholder="Enter Amount"></td>
                </tr>
                <tr>
                    <td class="tbl-td-v">Remarks</td>
                    <td>
                        <textarea id="ca_remarks" class="txtca_remarks" cols="30" rows="2"><?=str_replace('<br />', "", $ca_remarks);?></textarea>
                    </td>
                </tr>         
            </table>
        </div>        
        <div style="position:relative;">
            <input type="button" value="UPDATE" class="btn-style btnupdate btn-margin-left" id="btnupdateca">
            <a href="ca.php" class="cancel-link">Cancel</a>
        </div>
        <div class="success-info">
                <div class="added-trip success-updated"></div>
        </div>         
    </div>   
</div>

<?php
include '../parts/footer.php';
?>

		
		
	
