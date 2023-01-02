<?php
include '../classes/Dbclass.php';
$db=new Dbclass();
include '../parts/header.php';
include '../parts/menu.php';
?>
<div class="main-content">
    <div class="content-wrapper">
    <div class="header-title">
        <h1>Routes</h1>
    </div>
    <hr />
        <div class="destination-container">  
                <div class="destination-wrapper">
                    <a href="#" class="active_routes">Active/Inactive Routes</a>
                    <div class="container-button">
                        <span class="btnaddnewDestination">Add New Route</span>
                    </div>
                    <table>
                        <thead>
                            <th></th>
                            <th>Routes</th>
                            <th>Area Code</th>
                            <th>Distance (km)</th>
                            <th>Rate</th>                          
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                //get latest ID from group of fields
                                // $res=$db->select('destination','*','ID IN (SELECT MAX(ID) FROM destination GROUP BY destination) ORDER BY destination ASC');
                                $res=$db->select('destination','*','is_active=1 ORDER BY destination ASC,areacode ASC');
                                while($rw=mysqli_fetch_assoc($res)){
                            ?>
                            <tr>
                                <td><?=$i++;?></td>
                                <td class="td-dest-name-id<?=$rw['ID']?>">
                                    <?=$rw['destination'];?>
                                </td>
                                <td class="td-dest-area-id<?=$rw['ID']?>">
                                    <?=$rw['areacode'];?>
                                </td>
                                <td class="td-dest-distance-id<?=$rw['ID']?>">
                                    <?=$rw['destination_distance'];?>
                                </td>
                                <td class="td-dest-rate-id<?=$rw['ID']?>">
                                    <!-- <?=number_format($rw['destination_rate']);?> -->
                                    <?=$rw['destination_rate'];?>
                                </td>                                
                                <td>
                                    <a href="#" class="destination-td-edit" id="destination-edit-id<?=$rw['ID']?>"><img src="../icons/edit.png"> Edit</a>
                                    <a href="#" class="destination-td-delete" id="destination-del-id<?=$rw['ID']?>"><img src="../icons/delete.png"> Delete</a>
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
include '../modal.php';
include '../parts/footer.php';
?>
		
		
	