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
            <h3 class="bgred">Delete cash advance information</h3>
        </div>
        <div>
            <h2 style="color:red;font-weight:700;padding-left:20px;font-size:2rem;">WARNING!!!</h2>
        </div>
        <div>
            <h5 style="color:red;padding-left:20px;">Do you want to continue delete this current cash advance details?</h5>
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
                    <td><input type="text" id="datepick" class="txtdatepick txtdrivernamestyle" value="<?=date('M d, Y',strtotime($ca_date));?>" placeholder="Enter date" autoComplete="off" disabled></td>
                </tr>
                <tr>
                    <td>Driver</td>
                    <td>  
                        <input type="text" value="<?=$getdriver_name?>" class="txtdrivernamestyle" disabled>                            
                    </td>
                </tr>
                <tr>
                    <td>Amount</td>
                    <td><input type="text" id="ca_amount" class="txttrip_rate txtdrivernamestyle" value=<?=number_format($ca_amount);?> placeholder="Enter Amount" disabled></td>
                </tr>
                <tr>
                    <td class="tbl-td-v">Remarks</td>
                    <td>
                        <textarea id="ca_remarks" class="txtca_remarks txtdrivernamestyle" cols="30" rows="2" disabled><?=str_replace('<br />', "", $ca_remarks);?></textarea>
                    </td>
                </tr>         
            </table>
        </div>    
        <div class="success-info">
                <div class="added-trip success-deleted2"></div>
        </div>    
        <div style="position:relative;">
            <input type="button" value="DELETE" class="btn-style btndelete btn-margin-left" id="btndeleteca">
            <a href="ca.php" class="cancel-link">Cancel</a>
        </div>
             
    </div>   
</div>

<?php
include '../parts/footer.php';
?>

		
		
	
