<?php
include '../classes/Dbclass.php';
$db=new Dbclass();
$driverid=trim($_GET['id']);
$filterid=trim($_GET['filter']);
$date1=date("Y-m-d", strtotime($_GET['datefr']));
$date2=date("Y-m-d", strtotime($_GET['dateto']));
$datefr_display=date("M d, Y", strtotime($_GET['datefr']));
$dateto_display=date("M d, Y", strtotime($_GET['dateto']));
$drivername='';
$ress=$db->select('driver','*','ID='.$driverid);
while($rww=mysqli_fetch_assoc($ress)){
    $drivername=$rww['driver'];
}
include '../parts/header-print.php';
include '../parts/menu.php';
?>
<div class="main-content">
    <div class="content-wrapper">
        <div class="header-title">
            <h1 style="text-align:center;margin-top:50px;">LXAP Trucking Services</span></h1>
            <h1 style="text-align:center;font-weight:400;">Cash Advances Report<span class="prnt-prvw"> ( Print Preview )</span></h1>
        </div>
        <hr />
        <div class="rptruckmaintenance-container">  
                <div class="rptruckmaintenance-wrapper">
                    <div class="container-srch">            
                    <a href="#" class="btn-print" id="btn-prnt-prev"><img src="../icons/print.png" style="width:25px;"> Print</a>            
                        <a class="btn-gb" href="report_driver.php?id=<?=$driverid?>&datefr=<?=$date1?>&dateto=<?=$date2?>&filter=<?=$filterid?>"><img src="../icons/back.png" style="width:25px;"> Go Back</a>
                        
                    </div>                     
                    <div class="container-button">                        
                        <h4><i style="font-size:1.2rem;">Driver name:</i><b style="font-size:2.5rem;color:green;margin-left:10px;"><?=$drivername?></b></h4>
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
                                $res=$db->select('vwca','*',"driverid=".$driverid." AND ca_date>='".$date1."' AND ca_date<='".$date2."' ORDER BY ca_date ASC");
                                while($rw=mysqli_fetch_assoc($res)){
                            ?>
                            <tr>
                                <td><?=$i++;?></td>
                                <td>
                                    <?=date('M d, Y',strtotime($rw['ca_date']));?>
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
                            $res=$db->select('vwca','SUM(amount) as amount',"driverid=".$driverid." AND ca_date>='".$date1."' AND ca_date<='".$date2."'");
                            while($rww=mysqli_fetch_assoc($res)){
                                $gtotal=$rww['amount'];
                            }                            
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
		
		
	