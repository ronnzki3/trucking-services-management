<?php
include '../classes/Dbclass.php';
$db=new Dbclass();

if(isset($_POST['form-mode-edit'])){
    $id=$_POST['id'];
    $newdestination=strtoupper($_POST['destination']);
    $newareacode=strtoupper($_POST['areacode']);
    $newrate=$_POST['destination_rate'];

    // $newdata=[
    //     'destination' => $newdestination,
    //     'destination_rate' => $newrate,
    //     'areacode' => $newareacode,
    // ];
    // $db->update('destination' , $newdata,"ID='$id'"); 
    echo $newrate." ---";
    $db->update('destination' , ['destination'=>$newdestination, 'areacode'=>$newareacode,'destination_rate'=>$newrate],"ID='$id'"); 
    echo $newrate." +++";
    if($db){
        echo '<div>Route <b>'.strtoupper($_POST['destination']).'</b> ('.strtoupper($_POST['areacode']).') successfully updated.<div>';
        echo '<div><a href="destination.php">Show all Route</a></div>';
        echo $newrate;
    }

    // $newdata=[
    //     'destination' => strtoupper($_POST['destination']),
    //     'destination_rate' => (int)$_POST['destination_rate'],
    //     'areacode' => strtoupper($_POST['areacode']),
    // ];
    // $db->insert('destination' , $newdata); 
    // if($db){
    //     echo '<div>Route <b>'.strtoupper($_POST['destination']).'</b> ('.strtoupper($_POST['areacode']).') successfully updated.<div>';
    //     echo '<div><a href="destination.php">Show all Routes</a></div>';
    // }
};


?>
