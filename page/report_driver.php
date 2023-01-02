<?php
include '../classes/Dbclass.php';
$db=new Dbclass();
$driverid=trim($_GET['id']);
$filterid=trim($_GET['filter']);
$date1=date("Y-m-d", strtotime($_GET['datefr']));
$date2=date("Y-m-d", strtotime($_GET['dateto']));
$datefr_display=date("M d, Y", strtotime($_GET['datefr']));
$dateto_display=date("M d, Y", strtotime($_GET['dateto']));

$getdrivername='';
$ress=$db->select('driver','*','ID='.$driverid);
while($rww=mysqli_fetch_assoc($ress)){
    $getdrivername=$rww['driver'];
}
include '../parts/header.php';
include '../parts/menu.php';
?>
<div class="main-content">
    <div class="content-wrapper">
        <div class="header-title">
            <h1>Trips per Driver</h1>
        </div>
        <hr />
        <div class="rpdriver-container">  
                <div class="rpdriver-wrapper">
                     <div class="container-srch">                        
                        <a href="report.php?id=<?=$driverid?>&datefr=<?=$date1?>&dateto=<?=$date2?>&filter=<?=$filterid?>"> <img src="../icons/search.png" style="width:25px;"> Filter Search</a>
                        <a href="report_driver_print.php?id=<?=$driverid?>&datefr=<?=$date1?>&dateto=<?=$date2?>&filter=<?=$filterid?>"> <img src="../icons/printpreview.png" style="width:25px;"> Print Preview</a>
                    </div>                    
                    <div class="container-button">                        
                        <h4><i style="font-size:1.2rem;">Driver name:</i><b style="font-size:2.5rem;color:green;margin-left:10px;"><?=$getdrivername?></b></h4>
                        <span>Report result/s from <b style="font-size:1.2rem;"><?=$datefr_display?></b> <i>to</i> <b style="font-size:1.2rem;"><?=$dateto_display?></b> </span>
                    </div>                    
                    <table>
                        <thead>
                            <th></th>
                            <th>Date</th>
                            <th>Route</th>
                            <th>Plate</th>
                            <th>Rate</th>
                            <th>CA</th>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;                                
                                // $res=$db->select('vwdailytripallrpt','*',"driverid=".$driverid." AND tripdate>='".$date1."' AND tripdate<='".$date2."' ORDER BY tripdate ASC");
                                // $res=$db->custom_select("SELECT v.tripdate,v.driverid,v.destinationid,v.plateid,v.driver,v.destination,v.areacode,v.plate,v.rateamount,v.diesel,c.amount,c.remarks as remarks 
                                // FROM vwdailytripall v
                                // left join ca c 
                                // ON v.tripdate=c.ca_date 
                                // AND v.driverid=c.driverid 
                                // WHERE v.driverid=".$driverid." AND v.tripdate>='".$date1."' AND v.tripdate<='".$date2."'
                                // UNION ALL 
                                // SELECT ca_date as tripdate,driverid,'' as destinationid,'' as plateid,'' as driver,'' as destination,'' as areacode,'' as plate,'' as rateamount,'' as diesel,amount,'' as remarks 
                                // FROM vwcasum
                                // Where driverid=".$driverid." AND ca_date>='".$date1."' AND ca_date<='".$date2."'
                                // AND ca_date NOT IN (SELECT tripdate FROM vwdailytripall WHERE driverid=".$driverid." AND ca_date>='".$date1."' AND ca_date<='".$date2."') 
                                // ORDER BY tripdate ASC");

                                $res=$db->custom_select("SELECT tripdate,driverid,destinationid,plateid,driver,destination,areacode,plate,rateamount,diesel,
                                (SELECT SUM(amount) as amount FROM vwcasum WHERE ca_date>=vwdailytripall.tripdate AND ca_date<=vwdailytripall.tripdate AND driverid=vwdailytripall.driverid) as amount 
                                FROM vwdailytripall
                                WHERE driverid=".$driverid." AND tripdate>='".$date1."' AND tripdate<='".$date2."'                               
                                ORDER BY tripdate ASC");
                                while($rw=mysqli_fetch_assoc($res)){    
                            ?>
                            <tr>    
                                <td>
                                    <?=$i++?>
                                </td>                         
                                <td>
                                    <?=date('M d, Y',strtotime($rw['tripdate']));?>
                                </td>
                                <td>
                                    <?php
                                    if(trim($rw['areacode'])!=''){
                                    ?>
                                        <?=$rw['destination'].' (<span class="areacodetbl">'.$rw['areacode'].'</span>)';?>
                                    <?php
                                    }else{
                                    ?>
                                        <?=$rw['destination'].' <span class="areacodetbl">'.$rw['areacode'].'</span>';?>
                                    <?php
                                    }
                                    ?>
                                    
                                </td>
                                <td>
                                    <?=$rw['plate'];?>
                                </td>
                                <td>
                                    <?php
                                        if(number_format(floatval($rw['rateamount']))>0){
                                            echo number_format(floatval($rw['rateamount']));
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if(number_format($rw['amount'])>0){
                                            echo number_format($rw['amount']);
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php
                                }                               
                                $res2=$db->select('vwdailytripall','SUM(rateamount) as totalrate',"driverid=".$driverid." AND tripdate>='".$date1."' AND tripdate<='".$date2."'");
                                $gettotal=0;
                                while($rw2=mysqli_fetch_assoc($res2)){
                                    $gettotal=$rw2['totalrate'];
                                }

                                $res3=$db->select('ca','SUM(amount) as totalrate',"driverid=".$driverid." AND ca_date>='".$date1."' AND ca_date<='".$date2."'");
                                $gettotalca=0;
                                while($rw3=mysqli_fetch_assoc($res3)){
                                    $gettotalca=$rw3['totalrate'];
                                }
                            ?>
                           <tfoot>
                           <tr>
                                <td colspan="6">
                                    <i style="font-weight:400;">Base Pay :</i> <b style="font-size:1.3rem;width:70px;text-align:right;display:inline-block;"><?=number_format($gettotal);?></b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <a href="report_ca.php?id=<?=$driverid?>&datefr=<?=$date1?>&dateto=<?=$date2?>&filter=2"> see details > </a>
                                    <i style="font-weight:400;">Total CA :</i> <b style="font-size:1.3rem;width:70px;text-align:right;display:inline-block;color:red;"><?=number_format($gettotalca);?></b>
                                </td>
                            </tr>
                            <tr>
                                <?php
                                $netpay=floatval($gettotal) - floatval($gettotalca);
                                ?>
                                <td colspan="6">
                                    <i style="font-weight:700;">NET PAY :</i> <b style="font-size:1.5rem;width:70px;text-align:right;display:inline-block;color:blue;"><?=number_format($netpay);?></b>
                                </td>
                            </tr>
                           </tfoot>
                        </tbody>
                    </table>    
                </div>    
        </div>
    </div>
</div>
<?php
include '../modal.php';
include '../parts/footer.php';
?>
		
	