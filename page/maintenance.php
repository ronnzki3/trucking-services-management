<?php
include '../classes/Dbclass.php';
$db=new Dbclass();

$page=0;
if(isset($_GET['p'])){
    $page=(int)$_GET['p'];
}else{
    $page=0;
}
//subtract month  from current date
// $newdate = date("m-Y", strtotime("-7 months"));
//$newdate = date("m-Y", strtotime($page." months"));
// $getcurrentdate=date('Y-m-d');
$getcurrentdate=date("Y-m-d", strtotime($page." months"));
$getfirstday=date("Y-m-01", strtotime($getcurrentdate));
$getlastday=date("Y-m-t", strtotime($getcurrentdate));
$gd1=date('M d, Y',strtotime($getfirstday));
$gd2=date('M d, Y',strtotime($getlastday));

include '../parts/header.php';
include '../parts/menu.php';
?>
<div class="main-content">
    <div class="content-wrapper">
    <div class="header-title">
        <h1>Maintenance</h1>
    </div>
    <hr />
        <div class="maintenance-container">  
                <div class="maintenance-wrapper">
                    <div class="container-button">
                        <a href="maintenance_add.php" style="margin-left:calc(100% - 170px);">Add New Expenses</a>
                    </div>
                    <div>
                        <span style="font-size:1.2rem;">Current month's list of expenses</span> <span style="margin-left:10px;font-size:1.2rem;"> (Expenses from <b><?=$gd1;?></b> to <b><?=$gd2?></b>) </span>
                    </div>
                    <table>
                        <thead>
                            <th></th>
                            <th>Date</th>
                            <th>Plate</th>
                            <th>Amount</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php                               
                                $i=1;
                                $res=$db->select('vwmaintenance','*','transactiondate>="'.$getfirstday.'" AND transactiondate<="'.$getlastday.'" ORDER BY transactiondate ASC');
                                $rwcount=mysqli_num_rows($res);
                                if($rwcount<=0){
                                    echo "<tr><td colspan='6' style='padding:10px;text-align:left !important;font-weight:500;'> No record/s found. </td></tr>";
                                }
                                while($rw=mysqli_fetch_assoc($res)){
                            ?>
                            <tr>
                                <td><?=$i++;?></td>
                                <td>
                                    <?=date('M d, Y',strtotime($rw['transactiondate']));?>
                                </td>  
                                <td>
                                    <?=$rw['plate'];?>
                                </td>
                                <td>
                                    <?=number_format($rw['amount']);?>
                                </td>
                                <td>
                                    <?=$rw['remarks'];?>
                                </td>
                                <td>
                                    <a href="maintenance_edit.php?id=<?=$rw['ID']?>"><img src="../icons/edit.png" /> Edit</a>
                                    <a href="maintenance_delete.php?id=<?=$rw['ID']?>"><img src="../icons/delete.png" /> Delete</a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                        <?php
                            if($rwcount>0){
                        ?>
                        <tfoot>
                            <?php
                            $totala=0;
                            $res=$db->select('vwmaintenance','SUM(amount) as totalamount','transactiondate>="'.$getfirstday.'" AND transactiondate<="'.$getlastday.'"');
                            while($rww=mysqli_fetch_assoc($res)){
                                $totala=$rww['totalamount'];
                            }                            
                            ?>
                            <tr>
                                <td colspan="4"><span>TOTAL:</span><span style="margin-left:15px;font-size:1.5rem;color:red;"><?=number_format($totala);?></span></td>
                                <td colspan="2"></td>
                            </tr>
                            
                        </tfoot>
                            <?php
                            } //end if $rwwcount
                            ?>
                    </table>    
                    <div class="pagination-div">                        
                        <a href="maintenance.php?p=<?=$page-1?>" class="pagination-prev pagination-btn">PREVIOUS</a>
                        <?php
                        if($page<0){
                            ?>
                            <a href="maintenance.php?p=<?=$page+1?>" class="pagination-next pagination-btn">NEXT</a>
                            <?php
                        }
                        ?>
                        
                    </div> 
                </div>        
        </div>
    </div>
</div>
<?php
include '../modal.php';
include '../parts/footer.php';
?>
		
		
	