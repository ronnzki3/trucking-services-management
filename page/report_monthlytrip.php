<?php
include 'classes/Dbclass.php';
$db=new Dbclass();
$driverid=18;
$date1='2022-11-01';
$date2='2022-11-14';
include 'parts/header.php';
include 'parts/menu.php';
?>
<div class="main-content">
    <div class="content-wrapper">
        <div class="rpall-container">  
                <div class="rpall-wrapper">
                    <div class="container-button">
                        <h4>REPORT</h4>
                    </div>
                    <table>
                        <thead>
                            <th>Date</th>
                            <th>Route</th>
                            <th>Plate</th>
                            <th>Driver</th>
                            <th>Rate</th>
                        </thead>
                        <tbody>
                            <?php

                                $res=$db->select('vwdailytripall','*',"tripdate>='".$date1."' AND tripdate<='".$date2."' ORDER BY tripdate ASC");
                                while($rw=mysqli_fetch_assoc($res)){
                            ?>
                            <tr>
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
                                    <?=$rw['rateamount'];?>
                                </td>
                            </tr>
                            <?php
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
		
		
	