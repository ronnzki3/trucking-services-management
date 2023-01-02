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
            <h1>Lists of Cash Advances</h1>
    </div>
    <hr />
        <div class="ca-container">  
                <div style="margin-left: 700px;margin-bottom:10px;">
                    Search: <input class="txtsearch" id="txtsearchca" type="text" placeholder="search driver...">
                    <a href="#" class="btnsearch" id="btnsearchca">Search</a>
                </div>
                <div class="ca-wrapper">                    
                    <div class="container-button">
                        <a href="ca_add.php">Add New CA</a>
                    </div>
                    <div>
                        <span style="font-size:1.2rem;">Current month's list of cash advances</span> <span style="margin-left:10px;font-size:1.2rem;"> (Cash advances from <b><?=$gd1;?></b> to <b><?=$gd2?></b>) </span>
                    </div>
                    <table>
                        <thead>
                            <th></th>
                            <th>Date</th>
                            <th>Driver Name</th>
                            <th>Amount</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                // $res=$db->select('vwca','*','ca_date>="'.$getfirstday.'" AND ca_date<="'.$getlastday.'" ORDER BY ca_date ASC');

                                if(isset($_GET['s'])){
                                    $srch=$_GET['s'];
                                    $res=$db->select('vwca','*','ca_date>="'.$getfirstday.'" AND ca_date<="'.$getlastday.'" AND driver like "%'.$srch.'%" ORDER BY ca_date ASC');
                                }else{
                                    $res=$db->select('vwca','*','ca_date>="'.$getfirstday.'" AND ca_date<="'.$getlastday.'" ORDER BY ca_date ASC');
                                }
                                $rwcount=mysqli_num_rows($res);
                                if($rwcount<=0){
                                    echo "<tr><td colspan='6' style='padding:10px;text-align:left !important;font-weight:500;'> No record/s found. </td></tr>";
                                }
                                while($rw=mysqli_fetch_assoc($res)){
                            ?>
                            <tr>
                                <td><?=$i++;?></td>
                                <td>
                                    <?=date('M d, Y',strtotime($rw['ca_date']));?>
                                </td>
                                <td>
                                    <?=$rw['driver'];?>
                                </td>
                                <td>
                                    <?=number_format($rw['amount']);?>
                                </td>
                                <td>
                                    <?=$rw['remarks'];?>
                                </td>
                                <td>
                                    <a href="ca_edit.php?id=<?=$rw['ID']?>"><img src="../icons/edit.png" /> Edit</a>
                                    <a href="ca_delete.php?id=<?=$rw['ID']?>"><img src="../icons/delete.png" /> Delete</a>
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
                            // $res=$db->select('vwca','SUM(amount) as totalamount','ca_date>="'.$getfirstday.'" AND ca_date<="'.$getlastday.'"');
                            if(isset($_GET['s'])){
                                $src=$_GET['s'];
                                $res=$db->select('vwca','SUM(amount) as totalamount','ca_date>="'.$getfirstday.'" AND ca_date<="'.$getlastday.'" AND driver like "%'.$src.'%"');
                            }else{
                                $res=$db->select('vwca','SUM(amount) as totalamount','ca_date>="'.$getfirstday.'" AND ca_date<="'.$getlastday.'"');
                            }
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
                             }
                        ?>
                    </table>    
                    <div class="pagination-div">                        
                        <a href="ca.php?p=<?=$page-1?>" class="pagination-prev pagination-btn">PREVIOUS</a>
                        <?php
                        if($page<0){
                            ?>
                            <a href="ca.php?p=<?=$page+1?>" class="pagination-next pagination-btn">NEXT</a>
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
		
		
	