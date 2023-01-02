<?php
include '../classes/Dbclass.php';
$db=new Dbclass();
$getid='';
if(!empty($_GET['filter'])){
    $getid=$_GET['filter'];
}
include '../parts/header.php';
include '../parts/menu.php';
?>
<div class="main-content">
    <div class="content-wrapper">
    <div class="header-title">
        <h1>Reports</h1>
    </div>
    <hr />
        <div class="rp-container">  
                <div class="rp-wrapper">
                    <div class="container-button">
                       
                    </div>
                    <div class="rpt-err">

                    </div>
                    <table>                        
                        <tr>
                            <td>Filter By:</td>
                            <td>
                                <select id="filter" class="txtopt rptoption">
                                    <option value="99999999">--Please choose an option--</option>
                                    <option value="1" <?php if(!empty($_GET['filter'])){ if($getid==1){ echo 'selected="selected"';} } ?>>SOA</option>
                                    <option value="2" <?php if(!empty($_GET['filter'])){ if($getid==2){ echo 'selected="selected"';} } ?>>Driver</option>
                                    <option value="3" <?php if(!empty($_GET['filter'])){ if($getid==3){ echo 'selected="selected"';} } ?>>Truck</option>
                                    <option value="7" <?php if(!empty($_GET['filter'])){ if($getid==7 ){ echo 'selected="selected"';} } ?>>Truck (Summary)</option>
                                    <!-- <option value="4" <?php if(!empty($_GET['filter'])){ if($getid==4){ echo 'selected="selected"';} } ?>>Cash Advances</option> -->
                                    <option value="5" <?php if(!empty($_GET['filter'])){ if($getid==5){ echo 'selected="selected"';} } ?>>Maintenance</option>
                                    <!-- <option value="6" <?php if(!empty($_GET['filter'])){ if($getid==6){ echo 'selected="selected"';} } ?>>Monthly Trips</option> -->
                                </select>
                            </td>
                        </tr>
                        
                        <tr class="tr-driver <?php if(!empty($_GET['filter'])){if($getid==2){}else{ echo 'tr-display-none';}}else{echo 'tr-display-none';} ?> ">
                            <td>Driver</td>
                            <td>
                                <div class="search_select_box searchbox_driver">
                                    <select data-live-search="true">
                                        <option value="">--Select Driver--</option>
                                        <?php
                                        $res=$db->select('driver','*','ID>0 ORDER BY driver ASC');
                                        while($rw=mysqli_fetch_assoc($res)){
                                            echo "<option value='".$rw['ID']."'>".$rw['driver']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr class="tr-plate 
                            <?php if(!empty($_GET['filter'])){
                                if($getid==3 || $getid==7){
                                }else{ 
                                    echo 'tr-display-none';
                                }
                            }else{echo 'tr-display-none';} ?> ">
                            <td>Plate</td>
                            <td>
                                <div class="search_select_box searchbox_plate">
                                    <select data-live-search="true">
                                        <option value="">--Select Truck--</option>
                                        <?php
                                        $res=$db->select('plate','*','ID>0 ORDER BY plate ASC');
                                        while($rw=mysqli_fetch_assoc($res)){
                                            echo "<option value='".$rw['ID']."'>".$rw['plate']."</option>";
                                        }
                                        
                                        ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Date From:</td>
                            <td>
                                <input type="text" id="datefrom" autoComplete="off" class="txtopt" placeholder="select date" value="<?php if(!empty($_GET['datefr'])){ echo date("M d, Y", strtotime($_GET['datefr']));} ?>">
                            </td>
                        </tr>
                        <tr class="tr-dateto 
                                    <?php 
                                    if(!empty($_GET['filter'])){
                                        if($getid==6){
                                            echo 'tr-display-none';
                                        }else{ 
                                        }
                                    }else{
                                            // echo 'tr-display-none';
                                    }
                                    ?>">
                            <td>Date To:</td>
                            <td>
                                <input type="text" id="dateto" autoComplete="off" class="txtopt" placeholder="select date" value="<?php if(!empty($_GET['dateto'])){ echo date("M d, Y", strtotime($_GET['dateto']));} ?>">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="td-report-btn">
                                <button class="vwreport">View Report</button>
                            </td>
                        </tr>
                    </table>
                </div>        
        </div>
    </div>
</div>
<?php
include '../modal.php';
include '../parts/footer.php';
?>
		
		
	