<?php
include 'classes/Dbclass.php';
$db=new Dbclass();
$driverid=18;
$date1=date("Y-m-d", strtotime($_GET['datefr']));
// $date2=date("Y-m-d", strtotime($_GET['dateto']));
$datefr_display=date("M d, Y", strtotime($_GET['datefr']));
// $dateto_display=date("M d, Y", strtotime($_GET['dateto']));

$getcurrentdate=$date1;
$getfirstday=date("Y-m-01", strtotime($getcurrentdate));
$getlastday=date("Y-m-t", strtotime($getcurrentdate));
$gd1=date('M d, Y',strtotime($getfirstday));
$gd2=date('M d, Y',strtotime($getlastday));
$getlastdate=date("t", strtotime($getcurrentdate));
$getmos=date("m", strtotime($getcurrentdate));
$getyr=date("Y", strtotime($getcurrentdate));
$getmosName=date("M", strtotime($getcurrentdate));


//assign background color to each driver
$driverss=array();
$background_colors = array(
                        '#cccccc','#FA8970','#B97364','#D8A476','#EFD695','#FFDFF4',
                        '#F3F38B','#E0F38B','#AEE0C3','#AEE0D0','#AEE0DC','#BBA3C6',
                        '#B7E3FF','#B0C6F0','#6A7DAB','#ACA0DE','#D7BAEE','#F9B5D9',
                        '#FC9CAC','#BDABAB','#EEECEC','#AFEAC0','#9DC8BB','#98B0DD',

                        '#cccccc','#FA8970','#B97364','#D8A476','#EFD695','#FFDFF4',
                        '#F3F38B','#E0F38B','#AEE0C3','#AEE0D0','#AEE0DC','#BBA3C6',
                        '#B7E3FF','#B0C6F0','#6A7DAB','#ACA0DE','#D7BAEE','#F9B5D9',
                        '#FC9CAC','#BDABAB','#EEECEC','#AFEAC0','#9DC8BB','#98B0DD',

                        '#cccccc','#FA8970','#B97364','#D8A476','#EFD695','#FFDFF4',
                        '#F3F38B','#E0F38B','#AEE0C3','#AEE0D0','#AEE0DC','#BBA3C6',
                        '#B7E3FF','#B0C6F0','#6A7DAB','#ACA0DE','#D7BAEE','#F9B5D9',
                        '#FC9CAC','#BDABAB','#EEECEC','#AFEAC0','#9DC8BB','#98B0DD',

                        '#cccccc','#FA8970','#B97364','#D8A476','#EFD695','#FFDFF4',
                        '#F3F38B','#E0F38B','#AEE0C3','#AEE0D0','#AEE0DC','#BBA3C6',
                        '#B7E3FF','#B0C6F0','#6A7DAB','#ACA0DE','#D7BAEE','#F9B5D9',
                        '#FC9CAC','#BDABAB','#EEECEC','#AFEAC0','#9DC8BB','#98B0DD'
                            
                            );
$x=0;
$res4=$db->select('driver','*',"ID>0 ORDER BY driver ASC");
while($rw4=mysqli_fetch_assoc($res4)){
    $driverss[$rw4['ID']]=$background_colors[$x];
    $x++;
}
//end assigning background color



include 'parts/header-print-landscape.php';
include 'parts/menu.php';
?>
<div class="main-content">
    <div class="content-wrapper">
        <div class="header-title">
            <h1 style="text-align:center;margin-top:50px;">LXAP Trucking Services</span></h1>
            <h1 style="text-align:center;font-weight:400;">Monthly Trips <span class="prnt-prvw">- Print Preview</span></h1>
        </div>
        <hr />
        <div class="rpm-container">  
                <div class="container-srch" style="width:1200px !important;">                        
                    <a class="btn-gb" href="report_monthly.php?datefr=<?=$date1?>&filter=6"><img src="icons/back.png" style="width:25px;"> Go Back</a>
                    <a href="#" class="btn-print" id="btn-prnt-prev"><img src="icons/print.png" style="width:25px;"> Print</a>
                </div>   
                <div class="rpm-wrapper">                       
                    <div class="container-button">                        
                        <!-- <h4><i style="font-size:1.2rem;">Driver name:</i><b style="font-size:2.5rem;color:green;margin-left:10px;"><?=$getdrivername?></b></h4> -->
                        <span>Report result/s from <b style="font-size:1.2rem;"><?=$gd1?></b> <i> to </i> <b style="font-size:1.2rem;"><?=$gd2?></b> </span>
                    </div>  
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                            <?php
                            // echo "<pre>";
                            // print_r($driverss);
                            // echo "</pre>";
                            $ress=$db->select('destination','*',"ID>0 ORDER BY destination ASC");
                            while($rww=mysqli_fetch_assoc($ress)){
                                echo "<th>".$rww['destination']."</th>";
                            }
                            ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                            <?php
                            $ress1=$db->select('destination','*',"ID>0 ORDER BY destination ASC");
                            while($rww1=mysqli_fetch_assoc($ress1)){
                                echo "<td>".$rww1['areacode']."</td>";
                            }
                            ?>
                            </tr>
                        <?php
                            $i=1;
                            while($i<=(int)$getlastdate){
                                ?>
                                <tr>    
                                    <td>
                                    <?=$i."-".$getmosName;?>
                                    </td>                                
                                    <?php
                                        $destinationid='';
                                         $res=$db->select('destination','*',"ID>0 ORDER BY destination ASC");
                                         while($rw=mysqli_fetch_assoc($res)){
                                            $destinationid=$rw['ID'];                                           
                                            ?>   
                                                <!-- <td style="background-color:<?=$rand_background?>"> -->
                                                <td>
                                                <?php                                                        
                                                    $q_date1=$getyr."-".$getmos."-".$i;
                                                    $q_date=date("Y-m-d", strtotime($q_date1));
                                                    $res1=$db->select('vwdailytripall','*',"destinationid=".$destinationid." AND tripdate='".$q_date."'");
                                                    while($rw1=mysqli_fetch_assoc($res1)){
                                                        $did=$rw1['driverid'];
                                                        $newbg=$driverss[$did];
                                                        echo "<span style='display:block;width:100%;height:100%;background-color:$newbg;'>".$rw1['driver']."</span>";
                                                    }
                                                ?>   
                                                </td>
                                            <?php
                                         }
                                    ?>                                    
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>    
                </div>        
        </div>
    </div>
</div>
<?php
include 'modal.php';
include 'parts/footer.php';
?>
		
		
	