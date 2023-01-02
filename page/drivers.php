<?php
include '../classes/Dbclass.php';
$db=new Dbclass();
include '../parts/header.php';
include '../parts/menu.php';
?>
<div class="main-content">
    <div class="content-wrapper">
        <div class="header-title">
            <h1>Driver Lists</h1>
        </div>
        <hr />
        <div class="drivers-container">  
                <div class="drivers-wrapper"> 
                <a href="#" class="active_drivers">Active/Inactive Drivers</a>
                    <div class="container-button">                        
                        <span class="btnaddnewDriver">Add New Driver</span>
                    </div>
                    <table>
                        <thead>
                            <th></th>
                            <th>Drivers</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                $res=$db->select('driver','*','is_active=1 ORDER BY driver ASC');
                                while($rw=mysqli_fetch_assoc($res)){
                            ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td class="tr-drv-Name<?=$rw['ID']?>">
                                    <?=$rw['driver'];?>
                                </td>
                                <td>
                                    <a href="#" class="drv-edit" id="drvEdit-<?=$rw['ID']?>"><img src="../icons/edit.png" /> Edit</a>
                                    <a href="#" class="drv-del" id="drvDel-<?=$rw['ID']?>"><img src="../icons/delete.png" /> Delete</a>
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
		
		
	