<?php
include '../classes/Dbclass.php';
$db=new Dbclass();

if(isset($_POST['form-plate-add'])){
    $newdata=[
        'plate' => strtoupper($_POST['plate']),
    ];
    $db->insert('plate' , $newdata); 
    if($db){
        echo '<div>Truck plate # <b>'.strtoupper($_POST['plate']).'</b> successfully added.<div>';
    }
};


//update plate # details
if(isset($_POST['form-plate-edit'])){
    $id=$_POST['id'];
    $newdata=[
        'plate' => strtoupper($_POST['plate']),
    ];
    $db->update('plate' , $newdata,'ID='.$id); 
    if($db){
        echo '<div>Truck plate # <b>'.strtoupper($_POST['plate']).'</b> successfully updated.<div>';
        echo '<div><a href="plate.php">Show all Trucks</a></div>';
    }
};



if(isset($_POST['plateis_active'])){
    $plates=$_POST['plateids'];

    //reset all driver active status first
    $resetchecked=[
        'is_active' => 0,
    ];
    $db->update('plate',$resetchecked,'ID>0'); 

    //get all checked drivers
    foreach($plates as $plate){        
        //then update active status of each checked drivers
        $updatechecked=[
            'is_active' => 1,
        ];
        $db->update('plate',$updatechecked,'ID='.$plate); 
    }

    if($db){
        echo '<div>Lists of active / inactive trucks successfully updated.<div>';
        echo '<div><a href="plate.php">Show all active trucks</a></div>';
    }
};





//delete plate # details
if(isset($_POST['form-plate-delete'])){
    $id=$_POST['id'];
    $res=$db->select('dailytrip','*','plateid='.$id);
    $count=mysqli_num_rows($res);
    if($count>0){
        echo '<div style="color:red;">Unable to continue delete. <br /> Plate Number <b>'.strtoupper($_POST['platename']).'</b> is present in other transaction. <br /> <a href="plate.php" style="color:blue;">Go Back</a></div>';
    }else{
        $db->delete('plate','ID='.$id); 
        if($db){
            echo '<div>Plate Number <b>'.strtoupper($_POST['platename']).'</b> successfully deleted. <br /><a href="plate.php">Show all Trucks</a></div>';
        }
    }
    
};
?>
