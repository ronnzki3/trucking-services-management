<?php
include '../classes/Dbclass.php';
$db=new Dbclass();
$driverid=18;
$date1=date("Y-m-d", strtotime($_GET['datefr']));
$date2=date("Y-m-d", strtotime($_GET['dateto']));
$datefr_display=date("M d, Y", strtotime($_GET['datefr']));
$dateto_display=date("M d, Y", strtotime($_GET['dateto']));
$result_per_page=70;
$total_pages=0;
$page=1;
if(isset($_GET['p'])){
    $page=$_GET['p'];
}else{
    $page=1;
}
$start_from=($page -1) * $result_per_page;
include '../parts/header-print.php';
include '../parts/menu.php';
?>
<div class="main-content">
    <div class="content-wrapper">
        <div class="header-title">
            <h1 style="text-align:center;margin-top:50px;">LXAP Trucking Services</span></h1>
            <h1 style="text-align:center;font-weight:400;">Statement of Account <span class="prnt-prvw">- Print Preview</span></h1>
        </div>
        <hr />
        <div class="rpall-container">  
                <div class="container-srch" style="width:1200px !important;">          
                    <a href="#" class="btn-print" id="btn-prnt-prev"> <img src="../icons/print.png" style="width:25px;"> Print</a>              
                    <a class="btn-gb" href="report_all.php?datefr=<?=$date1?>&dateto=<?=$date2?>&filter=1"> <img src="../icons/back.png" style="width:25px;"> Go Back</a>
                    
                </div>
                <div class="rpall-wrapper">
                    <div class="container-button">                        
                        <!-- <h4><i style="font-size:1.2rem;">Driver name:</i><b style="font-size:2.5rem;color:green;margin-left:10px;"><?=$getdrivername?></b></h4> -->
                        <span>Report result/s from <b style="font-size:1.2rem;"><?=$datefr_display?></b> <i>to</i> <b style="font-size:1.2rem;"><?=$dateto_display?></b> </span>

                        <?php
                            $totalrate=0;
                            $res1=$db->select('vwdailytripall','SUM(destination_rate) as totalrate',"tripdate>='".$date1."' AND tripdate<='".$date2."'");
                            while($rw1=mysqli_fetch_assoc($res1)){
                                $totalrate=$rw1['totalrate'];
                                echo '<span style="margin-left:200px;font-size:1rem;font-weight:600;margin-right:10px;"> TOTAL: </span> <span style="font-size:1.3rem;font-weight:800;">'.number_format($totalrate).'</span>';
                            }
                        ?>
                    </div>  
                    <table>
                        <thead>
                            <th></th>
                            <th>Date</th>
                            <th>Route</th>
                            <th>Plate</th>
                            <th>Driver</th>
                            <th>Route Rate</th>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($_GET['p'])){
                                    if($_GET['p']>1){
                                        $i=$_GET['p'] * $result_per_page + 1;
                                    }else{
                                        $i=1;
                                    }
                                }else{
                                    $i=1;
                                }
                                
                                $res=$db->select('vwdailytripall','*',"tripdate>='".$date1."' AND tripdate<='".$date2."' ORDER BY tripdate ASC,destination asc,driver asc,plate asc LIMIT ".$start_from.", ".$result_per_page);
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
                                    <?=$rw['plate'];?>
                                </td>
                                <td>
                                    <?=$rw['driver'];?>
                                </td>
                                <td>
                                    <?=number_format($rw['destination_rate']);?>
                                </td>
                            </tr>
                            <?php
                                }                                
                            ?>
                            <!-- <tr>
                                <td colspan="6">
                                    <?php
                                        $totalrate=0;
                                        $res1=$db->select('vwdailytripall','SUM(destination_rate) as totalrate',"tripdate>='".$date1."' AND tripdate<='".$date2."'");
                                        while($rw1=mysqli_fetch_assoc($res1)){
                                            $totalrate=$rw1['totalrate'];
                                            echo '<span style="font-size:1rem;font-weight:600;margin-right:10px;"> TOTAL: </span> <span style="font-size:1.3rem;font-weight:800;">'.number_format($totalrate).'</span>';
                                        }
                                    ?>
                                </td>
                            </tr> -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                        Page <?=$page;?>
                                </td>
                            </tr>
                            <tr class="hide-in-print pages-tr">
                                <td colspan="6" style="text-align:center;padding:15px 0;">
                                        <?php                                        
                                            $res0=$db->select('vwdailytripall','count(ID) as total',"tripdate>='".$date1."' AND tripdate<='".$date2."'");
                                            while($rw0=mysqli_fetch_assoc($res0)){
                                                $total_pages=ceil($rw0['total']/$result_per_page);
                                            }
                                            $datefrm=$_GET['datefr'];
                                            $dateto=$_GET['dateto'];
                                            $flter=$_GET['filter'];
                                            for ($i=1; $i<=$total_pages; $i++) {                
                                                if($page==$i){
                                                    echo "<a style='padding:2px 7px;font-size: 1.5rem;font-weight:bold;color:red;' href='report_all_preview.php?datefr=".$datefrm."&dateto=".$dateto."&filter=".$flter."&p=".$i."'>".$i."</a> ";
                                                }else{
                                                    echo "<a style='padding:2px 7px;font-size: 1.5rem;' href='report_all_preview.php?datefr=".$datefrm."&dateto=".$dateto."&filter=".$flter."&p=".$i."'>".$i."</a> ";
                                                }
                                                
                                            }
                                        ?>
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
		
		
	