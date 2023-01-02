<?php
include '../classes/Dbclass.php';
$db=new Dbclass();

if(isset($_POST['maintenance-form-add'])){
    $tripdate=$_POST['datepick'];
    $plateid=$_POST['plateid'];
    $rate=(int)$_POST['rate'];
    $remarks=trim($_POST['remarks']);
    $newdate=date("Y-m-d", strtotime($tripdate));  
    $newdata=[
        'transactiondate' => $newdate,
        'plateid'=>$plateid,
        'amount'=>$rate,
        'remarks'=> nl2br($remarks),
    ];

    $db->insert('maintenance' , $newdata); 

    if($db){
        echo '<div style="background-color:darkslategray;color:#fff;padding:10px;margin-bottom:10px;margin-top:15px;">Expense information successfully added. &nbsp;&nbsp;&nbsp;<a href="maintenance.php" style="color:beige;">Show Expenses</a><div>';
    }
};




if(isset($_POST['maintenance-form-edit'])){
    $tripdate=$_POST['datepick'];
    $plateid=$_POST['plateid'];
    $rate=(int)$_POST['rate'];
    $remarks=trim($_POST['remarks']);
    $newdate=date("Y-m-d", strtotime($tripdate));  
    $id=$_POST['id'];
    $newdata=[
        'transactiondate' => $newdate,
        'plateid'=>$plateid,
        'amount'=>$rate,
        'remarks'=>nl2br($remarks),
    ];

    $db->update('maintenance' ,$newdata,'ID='.$id); 

    if($db){
        echo '<div style="margin-top:15px;padding:7px;">Expense information successfully updated.<div>';
        echo '<div><a href="maintenance.php">Show Expenses</a></div>';
    }
};


if(isset($_POST['maintenance-form-delete'])){
    $id=$_POST['id'];
    $db->delete('maintenance','ID='.$id); 
    if($db){
        echo '<div>Expense information successfully deleted. <br /><a href="maintenance.php">Show Expenses</a></div>';
    }
};
?>
