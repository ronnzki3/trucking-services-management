<?php
include '../classes/Dbclass.php';
$db=new Dbclass();
$driverid=18;
$date1=date("Y-m-d", strtotime($_GET['datefr']));
$date2=date("Y-m-d", strtotime($_GET['dateto']));
$datefr_display=date("M d, Y", strtotime($_GET['datefr']));
$dateto_display=date("M d, Y", strtotime($_GET['dateto']));
include '../parts/header.php';
include '../parts/menu.php';
?>
<div class="scroll-div">

</div>
<div class="main-content">
    <div class="content-wrapper">
        <div class="header-title">
            <h1>Statement of Account</h1>
        </div>
        <hr />
        <div class="rpall-container">  
                <div style="margin-left: 870px">
                    Search: <input class="txtsearch" id="txtsearchsoa" type="text" placeholder="search...">
                    <a href="#" class="btnsearch" id="btnsearchsoa">Search</a>
                </div> 
                <div class="container-srch" style="width:1200px !important;">
                    <a href="report.php?datefr=<?=$date1?>&dateto=<?=$date2?>&filter=1"> <img src="../icons/search.png" style="width:25px;"> Filter Search</a>                    
                    <a href="report_all_preview.php?datefr=<?=$date1?>&dateto=<?=$date2?>&filter=1"> <img src="../icons/printpreview.png" style="width:25px;"> Print Preview</a>
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
                                echo '<span style="margin-left:450px;font-size:1rem;font-weight:600;margin-right:10px;"> TOTAL: </span> <span style="font-size:1.3rem;font-weight:800;">'.number_format($totalrate).'</span>';
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
                                $i=1;

                                if(isset($_GET['s'])){
                                    $srch=$_GET['s'];
                                    $res=$db->select('vwdailytripall','*',
                                    "(tripdate>='".$date1."' AND tripdate<='".$date2."' AND destination like '%$srch%') 
                                    OR 
                                    (tripdate>='".$date1."' AND tripdate<='".$date2."' AND plate like '%$srch%') 
                                    OR
                                    (tripdate>='".$date1."' AND tripdate<='".$date2."' AND driver like '%$srch%') 
                                    ORDER BY tripdate ASC,destination asc,driver asc,plate asc");
                                }else{
                                    $res=$db->select('vwdailytripall','*',"tripdate>='".$date1."' AND tripdate<='".$date2."' ORDER BY tripdate ASC,destination asc,driver asc,plate asc");
                                }
                                // $res=$db->select('vwdailytripall','*',"tripdate>='".$date1."' AND tripdate<='".$date2."' ORDER BY tripdate ASC,destination asc,driver asc,plate asc");
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
                            <tr>
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
                            </tr>
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
		
		
	