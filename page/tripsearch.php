<?php
include 'classes/Dbclass.php';
$db=new Dbclass();

$page=0;
if(isset($_GET['p'])){
    $page=(int)$_GET['p'];
}else{
    $page=0;
}
//subtract month  from current date
// $newdate = date("m-Y", strtotime("-7 months"));
//$newdate = date("m-Y", strtotime($page." months"));
// $getcurrentdate=date('Y-m-d');
$getcurrentdate=date("Y-m-d", strtotime($page." months"));
$getfirstday=date("Y-m-01", strtotime($getcurrentdate));
$getlastday=date("Y-m-t", strtotime($getcurrentdate));
$gd1=date('M d, Y',strtotime($getfirstday));
$gd2=date('M d, Y',strtotime($getlastday));

$gettotal=0;

$res1=$db->select('vwDailyTrip','SUM(rateamount) as total','tripdate>="'.$getfirstday.'" AND tripdate<="'.$getlastday.'"');
while($rww=mysqli_fetch_assoc($res1)){
    $gettotal=$rww['total'];
}


if(isset($_GET['s'])){
    $res=$db->select('vwDailyTrip','*','tripdate>="'.$getfirstday.'" AND tripdate<="'.$getlastday.'" and destination like "%'.$_GET['s'].'%" OR driver like "%'.$_GET['s'].'%" OR plate like "%'.$_GET['s'].'%" ORDER BY tripdate ASC,destination ASC,driver ASC,plate ASC');
}else{
    $res=$db->select('vwDailyTrip','*','tripdate>="'.$getfirstday.'" AND tripdate<="'.$getlastday.'" ORDER BY tripdate ASC');
}

include 'parts/header.php';
include 'parts/menu.php';
?>
<div class="main-content">
    <div class="content-wrapper">
    <div class="header-title">
        <h1>Lists of Trips</h1>
    </div>
    <hr />
        <div class="vwtrip-container">  
                <div class="vwtrip-wrapper">
                    <div class="search-wrapper">
                        <div>
                            Search: <input class="txtsearch" type="text" placeholder="search...">
                            <a href="#" class="btnsearch">Search</a>
                        </div>                        
                    </div>
                    <div class="container-button">                            
                        <a href="dailytrip_add.php" style="margin-left:calc(100% - 150px);">Add New Trip</a>
                        <span style="margin-left:calc(100% - 250px);font-size:1.2rem;display:block;">Total Monthly Trips: <b style="font-size:1.4rem;margin-left:15px;"><?=number_format($gettotal);?></b></span>
                    </div>                   
                    <div>
                        <span style="font-size:1.2rem;">Current month's list of trips</span> <span style="margin-left:10px;font-size:1.2rem;"> (Trips from <b><?=$gd1;?></b> to <b><?=$gd2?></b>) </span>
                    </div>
                    <table>
                        <thead>
                            <th></th>
                            <th>Date</th>                            
                            <th>Route</th>
                            <th>Driver</th>
                            <th>Plate</th>
                            <th>Rate</th>
                            <th>Diesel</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php                              
                                
                                $i=1;
                                
                                $rwcount=mysqli_num_rows($res);
                                if($rwcount<=0){
                                    echo "<tr><td colspan='8' style='padding:10px;text-align:left !important;font-weight:500;'> No record/s found. </td></tr>";
                                }
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
                                    <?=$rw['plate'];?>
                                </td>
                                <td>
                                    <?=number_format($rw['rateamount']);?>
                                </td>
                                <td>
                                    <?=number_format($rw['diesel']);?>
                                </td>
                                <td>
                                    <a href="dailytrip_edit.php?id=<?=$rw['ID']?>"><img src="icons/edit.png" /> Edit</a>
                                    <a href="dailytrip_delete.php?id=<?=$rw['ID']?>"><img src="icons/delete.png" /> Delete</a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                <span style="margin-left:calc(100% - 150px);font-size:1.2rem;display:block;">Total: <b style="font-size:1.4rem;margin-left:15px;"><?=number_format($gettotal);?></b></span>
                                </td>
                                <td colspan="2">

                                </td>
                            </tr>
                        </tfoot>
                    </table>   
                    <div class="pagination-div">                        
                        <a href="trip.php?p=<?=$page-1?>" class="pagination-prev pagination-btn">PREVIOUS</a>
                        <?php
                        if($page<0){
                            ?>
                            <a href="trip.php?p=<?=$page+1?>" class="pagination-next pagination-btn">NEXT</a>
                            <?php
                        }
                        ?>
                        
                    </div> 
                </div>        
        </div>
    </div>
</div>
<?php
include 'modal.php';
include 'parts/footer.php';
?>
		
		
	