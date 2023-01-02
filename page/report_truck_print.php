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
            <h1 style="text-align:center;font-weight:400;">Trips per Truck - Summary Report <span class="prnt-prvw">- Print Preview</span></h1>
        </div>
        <hr />
        <div class="rpplate-container">  
                <div class="rpplate-wrapper">
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
                            <th>Route</th>
                            <th>Route Rate</th>
                            <th>Expenses</th>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                $res=$db->select('vwdailytripall','*',"plateid=".$plateid." AND tripdate>='".$date1."' AND tripdate<='".$date2."' ORDER BY tripdate ASC");
                                while($rw=mysqli_fetch_assoc($res)){
                            ?>
                            <tr>
                                <td><?=$i++;?></td>
                                <td>
                                    <?=date('M d, Y',strtotime($rw['tripdate']));?>
                                </td>
                                <td>
                                    <?=$rw['destination'].' (<span class="areacodetbl">'.$rw['areacode'].'</span>)';?>
                                </td>
                                <td style="text-align:right;padding-right:5px;">
                                    <?=number_format($rw['destination_rate']);?>
                                </td>
                                <td>
                                    <?=number_format($rw['totalexpenses']);?>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>                           
                        </tbody>
                        <tfoot>
                            <?php
                            $gtotal=0;
                            $res=$db->select('vwdailytripall','SUM(destination_rate) as totaldiesel',"plateid=".$plateid." AND tripdate>='".$date1."' AND tripdate<='".$date2."' ORDER BY tripdate ASC");
                            while($rww=mysqli_fetch_assoc($res)){
                                $gtotal=$rww['totaldiesel'];
                            }


                            $gtotalexpenses=0;
                            $res5=$db->select('vwdailytripall','SUM(totalexpenses) as totalexpenses',"plateid=".$plateid." AND tripdate>='".$date1."' AND tripdate<='".$date2."' ORDER BY tripdate ASC");
                            while($rww5=mysqli_fetch_assoc($res5)){
                                $gtotalexpenses=$rww5['totalexpenses'];
                            }

                            $totalmaintenance=0;
                            $res52=$db->select('maintenance','SUM(amount) as totalmaintenance',"plateid=".$plateid." AND transactiondate>='".$date1."' AND transactiondate<='".$date2."'");
                            while($rww52=mysqli_fetch_assoc($res52)){
                                $totalmaintenance=$rww52['totalmaintenance'];
                            }

                            $netpay=$gtotal - ($gtotalexpenses + $totalmaintenance);
                            ?>
                           <tr style="background-color:white;color:black;">
                                <td colspan="6">
                                    <span style="font-weight:500;">Gross:</span>                                    
                                    <span style="font-size:1.1rem;font-weight:600;margin-left:10px;color:black;"><?=number_format($gtotal);?></span>
                                </td>
                            </tr>
                            <tr style="background-color:white;color:black;">
                                <td colspan="6">
                                    <span style="font-weight:500;">Expenses Total:</span>                                    
                                    <span style="font-size:1.1rem;font-weight:600;margin-left:10px;color:red;"><?=number_format($gtotalexpenses);?></span>
                                </td>
                            </tr>
                            <tr style="background-color:white;color:black;">
                                <td colspan="6">
                                    <?php
                                    if($totalmaintenance>0){
                                    ?>
                                    <!-- <a href="#" class="hide-in-print"> view details > </a> -->
                                    <?php
                                    }
                                    ?>
                                    
                                    <span style="font-weight:500;">Maintenance Expenses Total:</span>                                    
                                    <span style="font-size:1.1rem;font-weight:600;margin-left:10px;color:red;"><?=number_format($totalmaintenance);?></span>
                                </td>
                            </tr>
                            
                            <tr style="background-color:white;color:black;">
                                <td colspan="6">
                                    <span style="font-weight:500;">Net:</span>                                    
                                    <span style="font-size:1.1rem;font-weight:60;margin-left:10px;color:blue;"><?=number_format($netpay);?></span>
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
		
		
	