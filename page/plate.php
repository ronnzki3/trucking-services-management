<?php
include '../classes/Dbclass.php';
$db=new Dbclass();
include '../parts/header.php';
include '../parts/menu.php';
?>
<div class="main-content">
    <div class="content-wrapper">
    <div class="header-title">
        <h1>Truck Lists</h1>
    </div>
    <hr />
        <div class="plate-container">  
                <div class="plate-wrapper">
                    <a href="#" class="active_plate">Active/Inactive Trucks</a>
                    <div class="container-button">
                        <span class="btnaddnewPlate">Add New Truck</span>
                    </div>
                    <table>
                        <thead>
                            <th></th>
                            <th>Trucks</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                $res=$db->select('plate','*','is_active=1 ORDER BY plate ASC');
                                while($rw=mysqli_fetch_assoc($res)){
                            ?>
                            <tr>
                                <td><?=$i++;?></td>
                                <td class="td-plate-id<?=$rw['ID']?>">
                                    <?=$rw['plate'];?>
                                </td>
                                <td>
                                    <a href="#" class="plate-edit" id="plate-edit-id<?=$rw['ID'];?>"><img src="../icons/edit.png" /> Edit</a>
                                    <a href="#" class="plate-del" id="plate-del-id<?=$rw['ID'];?>"><img src="../icons/delete.png" /> Delete</a>
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
		
		
	