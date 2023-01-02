<?php
include '../classes/Dbclass.php';
$db=new Dbclass();

if(isset($_POST['driver'])){
    $newdata=[
        'driver' => strtoupper($_POST['driver']),
    ];
    $db->insert('driver' , $newdata); 
    if($db){
        echo '<div>Driver <b>'.strtoupper($_POST['driver']).'</b> successfully added.<div>';
    }
};


if(isset($_POST['driveredit'])){
    $driverid=$_POST['driverid'];
    $newdata=[
        'driver' => strtoupper($_POST['driveredit']),
    ];
    $db->update('driver',$newdata,'ID='.$driverid); 
    if($db){
        echo '<div>Driver <b>'.strtoupper($_POST['driveredit']).'</b> successfully updated.<div>';
        echo '<div><a href="../page/drivers.php">Show all drivers</a></div>';
    }
};




if(isset($_POST['driveris_active'])){
    $driverids=$_POST['driverids'];

    //reset all driver active status first
    $resetchecked=[
        'is_active' => 0,
    ];
    $db->update('driver',$resetchecked,'ID>0'); 

    //get all checked drivers
    foreach($driverids as $driverid){        
        //then update active status of each checked drivers
        $updatechecked=[
            'is_active' => 1,
        ];
        $db->update('driver',$updatechecked,'ID='.$driverid); 
    }

    if($db){
        echo '<div>Lists of active/inactive drivers successfully updated.<div>';
        echo '<div><a href="../page/drivers.php">Show all active drivers</a></div>';
    }
};


if(isset($_POST['driveriddelete'])){
    $driverid=$_POST['driveriddelete'];
    $res=$db->select('dailytrip','*','driverid='.$driverid);
    $count=mysqli_num_rows($res);
    if($count>0){
        echo '<div style="color:red;">Unable to continue delete. <br /> Driver <b>'.strtoupper($_POST['drivername']).'</b> is present in other transaction. <br /> <a href="../page/drivers.php" style="color:blue;">Go Back</a></div>';
    }else{
        $db->delete('driver','ID='.$driverid); 
        if($db){
            echo '<div>Driver <b>'.strtoupper($_POST['drivername']).'</b> successfully deleted.<br /><a href="../page/drivers.php">Show all drivers</a></div>';
        }
    }
    
};

?>
