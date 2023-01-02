<?php
include 'classes/Dbclass.php';
$db=new Dbclass();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap_select/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap_select/bootstrap-select.min.css">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Document</title>
</head>
<body>
    

    <!-- <div class="search_select_box">
        <select data-live-search="true">
            <option>Web</option>
            <option>Web Dev</option>
            <option>Web Design</option>
            <option>Programmer</option>
            <option>Design</option>
            <option>Drawing</option>
            <option>Photoshop</option>
        </select>
    </div> -->

    <div class="search_select_box">
        <select data-live-search="true">
            <option value="" disabled>- Select Option -</option>
            <?php
            $res=$db->select('driver');
            while($rw=mysqli_fetch_assoc($res)){
                echo "<option value='".$rw['ID']."'>".$rw['driver']."</option>";
            }
            ?>
        </select>
    </div>

    <a href="#" class="getselect">Get Selected Value</a>

<script src="bootstrap_select/jquery-3.3.1.slim.min.js"></script>
<script src="bootstrap_select/popper.min.js"></script>
<script src="bootstrap_select/bootstrap.min.js"></script>
<script src="bootstrap_select/bootstrap-select.min.js"></script>
<script src="bootstrap.js"></script>
</body>
</html>