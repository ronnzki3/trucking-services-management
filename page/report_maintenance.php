<?php
include '../classes/Dbclass.php';
$db=new Dbclass();
$filterid=trim($_GET['filter']);
$date1=date("Y-m-d", strtotime($_GET['datefr']));
$date2=date("Y-m-d", strtotime($_GET['dateto']));
$datefr_display=date("M d, Y", strtotime($_GET['datefr']));
$dateto_display=date("M d, Y", strtotime($_GET['dateto']));
$getplatenumber='';
include '../parts/header.php';
include '../parts/menu.php';
?>
<div class="main-content">
    <div class="content-wrapper">
        <div class="header-title">
            <h1>Maintenance Report</h1>
        </div>
        <hr />
        <div class="rpmaintenance-container">  
                <div class="rpmaintenance-wrapper">
                    <div class="container-srch">                        
                        <a href="report.php?datefr=<?=$date1?>&dateto=<?=$date2?>&filter=<?=$filterid?>"><img src="../icons/search.png" style="width:25px;"> Filter Search</a>
                    </div>                     
                    <div class="container-button">                        
                        <!-- <h4><i style="font-size:1.2rem;">Plate #:</i><b style="font-size:2.5rem;color:green;margin-left:10px;"><?=$getplatenumber?></b></h4> -->
                        <span>Report result/s from <b style="font-size:1.2rem;"><?=$datefr_display?></b> <i> to </i> <b style="font-size:1.2rem;"><?=$dateto_display?></b> </span>
                    </div> 
                    <table>
                        <thead>
                            <th></th>
                            <th>Plate</th>
                            <th>Total Expenses / Plate</th>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                $res=$db->select('maintenance','plateid,(SELECT plate FROM plate WHERE ID=maintenance.plateid) as plate,SUM(amount) as totalexp',"transactiondate>='".$date1."' AND transactiondate<='".$date2."' GROUP BY plateid ORDER BY plate ASC");
                                while($rw=mysqli_fetch_assoc($res)){
                            ?>
                            <tr class="tr-maintenance" id="tr-maintenance-<?=$rw['plateid']?>"> 
                                <td><?=$i++;?></td>                     
                                <td>
                                    <?=$rw['plate'];?>
                                </td>
                                <td>
                                    <?=number_format($rw['totalexp']);?>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <?php
                                $gettotalexp=0;
                                $res=$db->select('maintenance','SUM(amount) as totalexp',"transactiondate>='".$date1."' AND transactiondate<='".$date2."'");
                                while($rw=mysqli_fetch_assoc($res)){
                                    $gettotalexp=$rw['totalexp'];
                                }
                                ?>
                                <td colspan="3">
                                    <span style="font-weight:600;margin-right:15px;">TOTAL EXPENSES: </span> <span style="font-size:1.6rem;font-weight:bold;color:darkred;"><?=number_format($gettotalexp);?></span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>    
                </div> 
                
                
                <div class="maintenance-report-details" id="maintenance-report-details">
                    
                </div>
        </div>
    </div>
</div>
<?php
include '../modal.php';
include '../parts/footer.php';
?>
		
		
	