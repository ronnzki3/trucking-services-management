<?php
include '../classes/Dbclass.php';
$db=new Dbclass();

$companyname='Select Company';
if(isset($_GET['id'])){
    $r1=$db->select('company','*','ID='.$_GET['id'].' ORDER BY company asc');
    while($rw1=mysqli_fetch_assoc($r1)){
       $companyname=$rw1['company'];
    }
}
include '../parts/header-print.php';
include '../parts/menu.php';
?>
<div class="main-content">
    <div class="content-wrapper">
    <div class="header-title">
            <h1 style="text-align:center;margin-top:50px;">LXAP Trucking Services</span></h1>
            <h1 style="text-align:center;font-weight:400;">Payables <span class="prnt-prvw">- Print Preview</span></h1>            
    </div>
    <hr />
        <div class="payable-container">  
        <a class="btn-gb bg-gr" href="payable.php?id=<?=$_GET['id']?>"> <img src="../icons/back.png" style="width:25px;"> Go Back</a>
        <a class="btn-gb bg-gr btn-print hide-in-print" href="#"> <img src="../icons/print.png" style="width:25px;"> Print</a>
                <div class="payable-wrapper">
                
                    <!-- ///////////////////// LEFT CONTAINER ////////////////////////// -->
                    <div class="payable-cont-left hide-in-print" style="display:none;">
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
                                        if($rwc1>0){
                                            while($rwpy=mysqli_fetch_assoc($resultpy)){
                                                echo "<tr class=''><td class='comp-sel' id='compid-".$rwpy['ID']."'><span class='tr-comp-Name".$rwpy['ID']."'>".$rwpy['company']."</span></td>
                                                <td><a href='#' class='comp-edit' id='compEdit-".$rwpy['ID']."'>modify</a></td>
                                                </tr>";
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
                            <a href="#" class="btnsearch bg-green" id="btnaddnewCompany"><img src="icons/company.png" width="20px"> Add new company</a>
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
                                        <!-- <th class="hide-in-print">Action</th> -->
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
                                                    </tr>";
                                                }
                                                // <td class='hide-in-print'><a href='#' class='pay-sel' id='payid-".$rwcp['ID']."'>modify</a></td>
                                        }else{
                                            echo "<tr><td colspan='7' style='text-align:left;'> No data found. </td></tr>";
                                        }
                                        
                                    ?>
                                </tbody>
                            </table>
                                <!-- <a href="#" class="btnsearch btnaddnewpayable bg-green hide-in-print" id="pay-<?=$compid?>"><img src="icons/record.png" width="20px"> Add new record - <?=$companyname?></a>
                                <a href="#" class="btnsearch btn-print bg-gray hide-in-print"><img src="icons/print.png" width="20px"> Print </a> -->
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
		
		
	