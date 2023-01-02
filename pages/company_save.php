<?php
include '../classes/Dbclass.php';
$db=new Dbclass();

if(isset($_POST['companyadd'])){
    $newdata=[
        'company' => strtoupper($_POST['company']),
    ];
    $db->insert('company' , $newdata); 
    if($db){
        echo '<div>Company <b>'.strtoupper($_POST['company']).'</b> successfully added.<div>';
    }
};


if(isset($_POST['companyedit'])){
    $driverid=$_POST['companyid'];
    $newdata=[
        'company' => strtoupper($_POST['companyedit']),
    ];
    $db->update('company',$newdata,'ID='.$driverid); 
    if($db){
        echo '<div>Company <b>'.strtoupper($_POST['companyedit']).'</b> successfully updated.<div>';
        echo '<div><a href="payable.php">Show company list</a></div>';
    }
};



if(isset($_POST['companyiddelete'])){
    $companyid=$_POST['companyiddelete'];
    $resz=$db->select('payables','*','companyid='.$companyid);
    $countz=mysqli_num_rows($resz);
    if($countz>0){
        echo '<div style="color:red;">Unable to continue delete. <br /> Company <b>'.strtoupper($_POST['company']).'</b> is present in other transaction. <br /> <a href="payable.php" style="color:blue;">Go Back</a></div>';
    }else{
        $db->delete('company','ID='.$companyid); 
        if($db){
            echo '<div>Company <b>'.strtoupper($_POST['company']).'</b> successfully deleted.<br /><a href="payable.php">Show company list</a></div>';
        }
    }
    
};

?>
