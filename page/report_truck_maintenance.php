<?php
include '../classes/Dbclass.php';
$db=new Dbclass();
$plateid=trim($_GET['id']);
$filterid=trim($_GET['filter']);
$date1=date("Y-m-d", strtotime($_GET['datefr']));
$date2=date("Y-m-d", strtotime($_GET['dateto']));
$datefr_display=date("M d, Y", strtotime($_GET['datefr']));
$dateto_display=date("M d, Y", strtotime($_GET['dateto']));
$getplatenumber='';
$ress=$db->select('plate','*','ID='.$plateid);
while($rww=mysqli_fetch_assoc($ress)){
    $getplatenumber=$rww['plate'];
}
include '../parts/header-print.php';
include '../parts/menu.php';
?>
<div class="main-content">
    <div class="content-wrapper">
        <div class="header-title">
            <h1 style="text-align:center;margin-top:50px;">LXAP Trucking Services</span></h1>
            <h1 style="text-align:center;font-weight:400;">Trips per Truck - Maintenance Report<span class="prnt-prvw"> ( Print Preview )</span></h1>
        </div>
        <hr />
        <div class="rptruckmaintenance-container">  
                <div class="rptruckmaintenance-wrapper">
                    <div class="container-srch">            
                    <a href="#" class="btn-print" id="btn-prnt-prev"><img src="../icons/print.png" style="width:25px;"> Print</a>            
                        <a class="btn-gb" href="report_truck.php?id=<?=$plateid?>&datefr=<?=$date1?>&dateto=<?=$date2?>&filter=<?=$filterid?>"><img src="../icons/back.png" style="width:25px;"> Go Back</a>
                        
                    </div>                     
                    <div class="container-button">                        
                        <h4><i style="font-size:1.2rem;">Plate #:</i><b style="font-size:2.5rem;color:green;margin-left:10px;"><?=$getplatenumber?></b></h4>
                        <span>Report result/s from <b style="font-size:1.2rem;"><?=$datefr_display?></b> <i>to</i> <b style="font-size:1.2rem;"><?=$dateto_display?></b> </span>
                    </div> 
                    <table>
                        <thead>
                            <th></th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Remarks</th>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                $res=$db->select('vwmaintenance','*',"plateid=".$plateid." AND transactiondate>='".$date1."' AND transactiondate<='".$date2."' ORDER BY transactiondate ASC");
                                while($rw=mysqli_fetch_assoc($res)){
                            ?>
                            <tr>
                                <td><?=$i++;?></td>
                                <td>
                                    <?=date('M d, Y',strtotime($rw['transactiondate']));?>
                                </td>
                                <td style="text-align:right;">
                                    <?=number_format($rw['amount']);?>
                                </td>
                                <td>
                                    <?=$rw['remarks'];?>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>                           
                        </tbody>
                        <tfoot>
                            <?php
                            $gtotal=0;
                            $res=$db->select('vwmaintenance','SUM(amount) as totaldiesel',"plateid=".$plateid." AND transactiondate>='".$date1."' AND transactiondate<='".$date2."'");
                            while($rww=mysqli_fetch_assoc($res)){
                                $gtotal=$rww['totaldiesel'];
                            }


                            // $gtotalexpenses=0;
                            // $res1=$db->select('vwdailytripall','SUM(other_expense) as totalxpense',"plateid=".$plateid." AND tripdate>='".$date1."' AND tripdate<='".$date2."'");
                            // while($rww1=mysqli_fetch_assoc($res1)){
                            //     $gtotalexpenses=$rww1['totalxpense'];
                            // }

                            // $overalltotal=$gtotal + $gtotalexpenses;
                            ?>
                            <tr>
                                <td colspan="2">
                                    <span style="font-weight:500;">TOTAL:</span>                                   
                                    
                                </td>
                                <td style="text-align:right;">
                                    <span style="font-size:1.1rem;font-weight:700;color:black;"><?=number_format($gtotal);?></span>
                                </td>
                                <td>

                                </td>
                            </tr>
                        </tfoot>
                    </table>    
                </div>        
        </div>
    </div>
</div>
<?php
include '../modal.php';
include '../parts/footer.php';
?>
		
		
	