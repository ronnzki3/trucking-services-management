<?php
include 'classes/Dbclass.php';
$db=new Dbclass();

if (!empty($_POST["keyword"])) {
    $search = $_POST['keyword'];
    $result=$db->select('driver','*',"driver LIKE '".$search."%'");
   
    if(mysqli_num_rows($result)>0){
        ?>
         <ul class="database-list">
        <?php
         while($rw=mysqli_fetch_assoc($result)){
            ?>  
                <li class="getdriverName" id="driver-<?=$rw["ID"]?>"><?php echo $rw["driver"]; ?></li>                
            <?php
         }
         ?>
             </ul>
         <?php
    }
}
        ?>


    <script src="js/jquery-3.6.1.min.js"></script>	
	<script src="datepicker/jquery-ui.min.js"></script>
	<script src="datepicker/jquery-ui.js"></script>
	<script src="modal/jquery.modal.min.js"></script>
	<script src="js/script.js"></script>
