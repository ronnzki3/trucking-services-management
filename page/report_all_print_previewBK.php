<?php
include 'classes/Dbclass.php';
$db=new Dbclass();
$driverid=18;
$date1=date("Y-m-d", strtotime($_GET['datefr']));
$date2=date("Y-m-d", strtotime($_GET['dateto']));
$datefr_display=date("M d, Y", strtotime($_GET['datefr']));
$dateto_display=date("M d, Y", strtotime($_GET['dateto']));
include 'parts/header-print-landscape.php';
include 'parts/menu.php';
?>
<div class="main-content">
    <div class="content-wrapper">
        <!-- <div class="header-title">
            <h1>Monthly Trips Report</h1>
        </div> -->
        <hr />
        <div class="rpm-container">  
                <div class="rpm-wrapper">
                    <div class="container-button">          
                        <h5>Monthly Trips Report</h3>              
                        <!-- <h4><i style="font-size:1.2rem;">Driver name:</i><b style="font-size:2.5rem;color:green;margin-left:10px;"><?=$getdrivername?></b></h4> -->
                        <span>Report result/s from <b style="font-size:1.2rem;"><?=$datefr_display?></b> <i> to </i> <b style="font-size:1.2rem;"><?=$dateto_display?></b> </span>
                    </div>  
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                            <?php
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
                            while($i<=31){
                                ?>
                                <tr>    
                                    <td>
                                    <?=$i;?>
                                    </td>                                
                                    <?php
                                        $destinationid='';
                                         $res=$db->select('destination','*',"ID>0 ORDER BY destination ASC");
                                         while($rw=mysqli_fetch_assoc($res)){
                                            $destinationid=$rw['ID'];
                                            ?>                                            
                                                <td>
                                                        <?php                                                        
                                                            $q_date1="2022-11-".$i;
                                                            $q_date=date("Y-m-d", strtotime($q_date1));
                                                            $res1=$db->select('vwdailytripall','*',"destinationid=".$destinationid." AND tripdate='".$q_date."'");
                                                            while($rw1=mysqli_fetch_assoc($res1)){
                                                                echo $rw1['driver'];
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
		
		
	