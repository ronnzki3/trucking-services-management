<?php
include '../classes/Dbclass.php';
$db=new Dbclass();

if(isset($_POST['form-ca-add']) && isset($_POST['driverid']) ){
    $gdate=date("Y-m-d", strtotime($_POST['getdate']));
    $driverid=$_POST['driverid'];
    $ca_amount=(int)$_POST['ca_amount'];
    $remarks=$_POST['remarks'];
    $newdata=[
        'ca_date' => $gdate,
        'driverid' => $driverid,
        'amount' => $ca_amount,
        'remarks' => nl2br($remarks),
    ];
    $db->insert('ca' , $newdata); 
    if($db){
        echo '<div style="background-color:darkslategray;color:#fff;padding:10px;margin-bottom:10px;margin-top:15px;">Cash advance successfully added. &nbsp;&nbsp;&nbsp;<a href="ca.php" style="color:beige;">Show All Cash Advances</a><div>';
    }
};


if(isset($_POST['form-ca-edit']) && isset($_POST['driverid']) ){
    $gdate=date("Y-m-d", strtotime($_POST['getdate']));
    $driverid=$_POST['driverid'];
    $ca_amount=(int)$_POST['ca_amount'];
    $remarks=$_POST['remarks'];
    $id=$_POST['id'];
    $newdata=[
        'ca_date' => $gdate,
        'driverid' => $driverid,
        'amount' => $ca_amount,
        'remarks' =>nl2br($remarks),
        'id'=>$id,
    ];
    $db->update('ca', $newdata,'ID='.$id); 
    if($db){
        echo '<div style="margin-top:15px;">Cash advance successfully updated.<div>';
        echo '<div><a href="ca.php">Show all Cash Advances</a></div>';
    }
};


if(isset($_POST['form-ca-delete']) && isset($_POST['id']) ){    
    $id=$_POST['id'];
    $db->delete('ca','ID='.$id); 
    if($db){
        echo '<div>Cash advance successfully deleted.<br /><a href="ca.php">Show all Cash Advances</a></div>';
    }
};

?>
