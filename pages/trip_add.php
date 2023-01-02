<?php
include '../classes/Dbclass.php';
$db=new Dbclass();

if(isset($_POST['trip-form-add'])){
    $tripdate=$_POST['datepick'];
    $driverid=$_POST['driverid'];
    $destinationid=$_POST['destinationid'];
    $plateid=$_POST['plateid'];
    $rate=(int)$_POST['rate'];
    $diesel=(int)$_POST['diesel'];
    $expense=(int)$_POST['expense'];
    $remarks=$_POST['remarks'];
    $newdate=date("Y-m-d", strtotime($tripdate));  
    $newdata=[
        'tripdate' => $newdate,
        'driverid'=>$driverid,
        'destinationid'=>$destinationid,
        'plateid'=>$plateid,
        'rateamount'=>$rate,
        'diesel'=>$diesel,
        'other_expense'=>$expense,
        'expense_remarks'=>nl2br($remarks),
    ];
    $db->insert('dailytrip',$newdata); 
    if($db){
        echo '<div style="background-color:darkslategray;color:#fff;padding:10px;margin-bottom:10px;margin-top:15px;">Trip details successfully added. &nbsp;&nbsp;&nbsp;<a href="../page/trip.php" style="color:beige;">Show Trips</a><div>';
    }
};




if(isset($_POST['trip-form-edit'])){
    $tripdate=$_POST['datepick'];
    $driverid=$_POST['driverid'];
    $destinationid=$_POST['destinationid'];
    $plateid=$_POST['plateid'];
    $rate=(int)$_POST['rate'];
    $diesel=(int)$_POST['diesel'];
    $expense=(int)$_POST['expense'];
    $remarks=$_POST['remarks'];
    $newdate=date("Y-m-d", strtotime($tripdate));  
    $id=$_POST['id'];
    $newdata=[
        'tripdate' => $newdate,
        'driverid'=>$driverid,
        'destinationid'=>$destinationid,
        'plateid'=>$plateid,
        'rateamount'=>$rate,
        'diesel'=>$diesel,
        'other_expense'=>$expense,
        'expense_remarks'=>nl2br($remarks),
    ];

    $db->update('dailytrip' ,$newdata,'ID='.$id); 

    if($db){
        echo '<div style="padding:5px;margin-top:15px;">Trip details successfully updated.<div>';
        echo '<div><a href="../page/trip.php">Show Trips</a></div>';
    }
};


if(isset($_POST['trip-form-delete'])){
    $id=$_POST['id'];
    $db->delete('dailytrip','ID='.$id); 
    if($db){
        echo '<div style="padding:5px;margin-top:15px;">Trip details successfully deleted.<br /><a href="../page/trip.php">Show Trips</a></div>';
    }
};
?>
