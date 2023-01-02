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
include '../parts/header.php';
include '../parts/menu.php';
?>
<div class="main-content">
    <div class="content-wrapper">
        <div class="header-title">
            <h1>Trips per Truck</h1>
        </div>
        <hr />
        <div class="rpplate-container">  
                <div class="rpplate-wrapper">
                    <div class="container-srch">                        
                        <a href="report.php?id=<?=$plateid?>&datefr=<?=$date1?>&dateto=<?=$date2?>&filter=<?=$filterid?>"> <img src="../icons/search.png" style="width:25px;"> Filter Search</a>
                        <a href="report_plate_print.php?id=<?=$plateid?>&datefr=<?=$date1?>&dateto=<?=$date2?>&filter=<?=$filterid?>"> <img src="../icons/printpreview.png" style="width:25px;"> Print Preview</a>
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
                            <th>Driver</th>
                            <th>Diesel</th>
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
                                <td>
                                    <?=$rw['driver'];?>
                                </td>
                                <td>
                                    <?=number_format($rw['diesel']);?>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>                           
                        </tbody>
                        <tfoot>
                            <?php
                            $gtotal=0;
                            $res=$db->select('vwdailytripall','SUM(diesel) as totaldiesel',"plateid=".$plateid." AND tripdate>='".$date1."' AND tripdate<='".$date2."' ORDER BY tripdate ASC");
                            while($rww=mysqli_fetch_assoc($res)){
                                $gtotal=$rww['totaldiesel'];
                            }
                            ?>
                            <tr>
                                <td colspan="5">
                                    <span style="font-weight:700;">TOTAL:</span>                                    
                                    <span style="font-size:1.4rem;font-weight:700;margin-left:10px;color:red;"><?=number_format($gtotal);?></span>
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
		
		
	