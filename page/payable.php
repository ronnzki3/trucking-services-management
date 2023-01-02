<?php
session_start();
if(!isset($_SESSION['auth'])){
    header('Location: login.php');
}
include '../classes/Dbclass.php';
$db=new Dbclass();

$companyname='Select Company';
if(isset($_GET['id'])){
    $r1=$db->select('company','*','ID='.$_GET['id'].' ORDER BY company asc');
    while($rw1=mysqli_fetch_assoc($r1)){
       $companyname=$rw1['company'];
    }
}
include '../parts/header.php';
include '../parts/menu.php';
?>
<div class="main-content">
    <div class="content-wrapper">
    <div class="header-title">  
                <div style="float:right;padding-top:10px;margin-right:70px;">
                    <a href="changepass.php">Change login password</a>
                    <a href="logout.php" style="margin-left:20px;color:red;">Logout</a>
                </div>       
        <h1>Payables</h1>       
    </div>
    <hr />
        <div class="payable-container">  
                <div class="payable-wrapper">
                    <!-- ///////////////////// LEFT CONTAINER ////////////////////////// -->
                    <div class="payable-cont-left hide-in-print">
                        <div>
                            <h4 style="color:slategray;font-weight:800;">Company List</h4>
                        </div>
                        <div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            Company
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $resultpy=$db->select('company','*','ID>0 ORDER BY company asc');
                                        $rwc1=mysqli_num_rows($resultpy);
                                        $getid=0;
                                        if(isset($_GET['id'])){
                                            $getid=$_GET['id'];
                                        }
                                        if($rwc1>0){
                                            while($rwpy=mysqli_fetch_assoc($resultpy)){                                                
                                                if((int)$getid===(int)$rwpy['ID']){
                                                    echo "<tr class='active-menu'><td class='comp-sel' id='compid-".$rwpy['ID']."'><span class='tr-comp-Name".$rwpy['ID']."'>".$rwpy['company']."</span></td>
                                                    <td style='text-align:center;'><a href='#' class='comp-edit' id='compEdit-".$rwpy['ID']."'> edit</a></td>
                                                    </tr>";
                                                }else{
                                                    echo "<tr class=''><td class='comp-sel' id='compid-".$rwpy['ID']."'><span class='tr-comp-Name".$rwpy['ID']."'>".$rwpy['company']."</span></td>
                                                    <td style='text-align:center;'><a href='#' class='comp-edit' id='compEdit-".$rwpy['ID']."'> edit </a></td>
                                                    </tr>";
                                                }                                               
                                            }
                                        }else{
                                            echo "<tr><td colspan='2'> No data found.</td></tr>";
                                        }
                                        
                                    ?>
                                </tbody>
                            </table>
                            
                        </div>
                        <!-- /////END TABLE ////////////////////// -->
                        <div>
                            <a href="#" class="btnsearch bg-green" id="btnaddnewCompany"><img src="../icons/company.png" width="20px"> Add new company</a>
                        </div>
                    </div>


                    <!-- ///////////////////// RIGHT CONTAINER ////////////////////////// -->
                    <div class="payable-cont-right">
                            <?php
                            $bal=0;
                            if(isset($_GET['id'])){
                                $compid1=$_GET['id'];
                                $fres=$db->custom_select('SELECT (SUM(IFNULL(credit,0)))-(SUM(IFNULL(debit,0))) as rembal FROM payables WHERE companyid='.$compid1.' GROUP BY companyid');
                                while($rwwd=mysqli_fetch_assoc($fres)){
                                    $bal=$rwwd['rembal'];
                                }
                            }
                            ?>
                        <div>                       
                            <p><span>Company Name: </span><span class="compnamel" id="compids-<?php if(isset($_GET['id'])){echo $_GET['id'];} ?>" style="font-size:2.3rem;font-weight:bolder;margin-left:10px;color:slategrey;"><?=$companyname;?></span></p>
                            <?php
                            if(isset($_GET['id'])){
                                ?>
                                    <p style="float:right;">Remaining Balance : <span style="font-size:1.4rem;font-weight:600;margin-left:10px;"><?=number_format($bal)?></span></p>
                                <?php
                            }
                            ?>
                        </div>
                        <div>
                            <?php
                            if(isset($_GET['id'])){
                                $compid=$_GET['id'];
                            ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Date</th>
                                        <th>Particulars</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Balance</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i=1;
                                        $resultcp=$db->select('vwpayables_w_balance','*',"companyid='$compid' ORDER BY payable_date ASC");
                                        $rwc=mysqli_num_rows($resultcp);
                                        if($rwc>0){
                                                while($rwcp=mysqli_fetch_assoc($resultcp)){                                            
                                                    echo "<tr>
                                                    <td>".$i++."</td>
                                                    <td class='tdpaydate".$rwcp['ID']."'>".date('M d, Y',strtotime($rwcp['payable_date']))."</td>
                                                    <td class='tdpayparticulars".$rwcp['ID']."'>".$rwcp['particulars']."</td>
                                                    <td class='tdpaydebit".$rwcp['ID']."'>".number_format($rwcp['debit'])."</td>
                                                    <td class='tdpaycredit".$rwcp['ID']."'>".number_format($rwcp['credit'])."</td>
                                                    <td>".number_format($rwcp['balance'])."</td>
                                                    <td><a href='#' class='pay-sel' id='payid-".$rwcp['ID']."'> edit</a></td>
                                                    </tr>";
                                                }
                                        }else{
                                            echo "<tr><td colspan='7' style='text-align:left;'> No data found. </td></tr>";
                                        }
                                        
                                    ?>
                                </tbody>
                            </table>
                                <a href="#" class="btnsearch btnaddnewpayable bg-green" id="pay-<?=$compid?>"><img src="../icons/record.png" width="20px"> Add new record - <?=$companyname?></a>
                                <a href="payable_print.php?id=<?=$_GET['id'];?>" class="btnsearch bg-gray"><img src="../icons/print.png" width="20px"> Print Preview</a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>        
        </div>
    </div>
</div>



<?php
include '../modal.php';
include '../parts/footer.php';
?>
		
		
	