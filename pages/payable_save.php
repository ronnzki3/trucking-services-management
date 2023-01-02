<?php
include '../classes/Dbclass.php';
$db=new Dbclass();

if(isset($_POST['form-mode-add'])){
    $payabledate=date('Y-m-d',strtotime($_POST['payabledate']));
    $companyid=$_POST['companyid'];
    $newdata=[
        'particulars' => nl2br(strtoupper($_POST['particular'])),
        'credit' => (int)$_POST['credit'],
        'debit' => (int)$_POST['debit'],
        'companyid'=>$companyid,
        'payable_date' => $payabledate,
    ];
    $db->insert('payables' , $newdata); 
    if($db){
        echo '<div>Successfully added new payable records.<div>';
    }
};


if(isset($_POST['form-mode-edit'])){
    $id=$_POST['payid'];
    $payabledate=date('Y-m-d',strtotime($_POST['payabledate']));
    $companyid=$_POST['companyid'];

    $newdata=[
        'particulars' =>  nl2br(strtoupper($_POST['particular'])),
        'credit' => (int)$_POST['credit'],
        'debit' => (int)$_POST['debit'],
        'companyid'=>$companyid,
        'payable_date' => $payabledate,
    ];
    $db->update('payables' , $newdata,"ID='$id'"); 
    // $db->update('destination' , ['destination'=>$newdestination, 'areacode'=>$newareacode,'destination_rate'=>$newrate],"ID='$id'"); 
    if($db){
        echo '<div>Successfully updated payable records.<div>';
        echo '<div><a href="../page/payable.php?id='.$companyid.'">Show payable records</a></div>';
    }

};


if(isset($_POST['form-mode-delete'])){
    $id=$_POST['payid'];
    $compid=$_POST['companyid'];   
    $db->delete('payables','ID='.$id); 
    if($db){
        echo '<div>Record successfully deleted. <br /><a href="../page/payable.php?id='.$compid.'">Show payable records</a></div>';
    }
};

?>
