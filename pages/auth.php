<?php
session_start();
include '../classes/Dbclass.php';
$db=new Dbclass();

// $newdata=[
//     'username'=>md5('admin'),
//     'userpassword'=> md5('052218'),
// ];
// $db->insert('login',$newdata);


if(isset($_POST['userlogin'])){
    $username=strtolower($_POST['user']);
    $pass=strtolower($_POST['pass']);

    $reslogin=$db->select('login','*',"username='".md5($username)."' AND userpassword='".md5($pass)."'");
    $count=mysqli_num_rows($reslogin);
    if($count>0){
        while($r=mysqli_fetch_assoc($reslogin)){
            echo $r['ID'];
        }
    }else{
        echo 0;
    }
    
}







if(isset($_POST['userupdate'])){
    $username=strtolower($_POST['user']);
    $pass=strtolower($_POST['pass']);

   $newdata=[
        'username'=>md5($username),
        'userpassword'=> md5($pass),
    ];
    $id=$_SESSION['auth'];
    $db->update('login',$newdata,'ID='.$id);    
    if($db){
        echo "New username and password succesfully updated.";
    }
}