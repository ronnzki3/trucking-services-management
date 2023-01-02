<?php
include '../classes/Dbclass.php';
$db=new Dbclass();

if(isset($_POST['form-mode-add'])){
    $newdata=[
        'destination' => strtoupper($_POST['destination']),
        'destination_rate' => (float)$_POST['destination_rate'],
        'destination_distance' => (float)$_POST['destination_distance'],
        'areacode' => strtoupper($_POST['areacode']),
    ];
    $db->insert('destination' , $newdata); 
    if($db){
        echo '<div>Route <b>'.strtoupper($_POST['destination']).'</b> ('.strtoupper($_POST['areacode']).') successfully added.<div>';
    }
};


if(isset($_POST['form-mode-edit'])){
    $id=$_POST['id'];
    $newdestination=strtoupper($_POST['destination']);
    $newareacode=strtoupper($_POST['areacode']);
    $newrate=$_POST['destination_rate'];
    $newdistance=$_POST['destination_distance'];

    $newdata=[
        'destination' => $newdestination,
        'destination_rate' => $newrate,
        'areacode' => $newareacode,
        'destination_distance'=>$newdistance,
    ];
    $db->update('destination' , $newdata,"ID='$id'"); 
    // $db->update('destination' , ['destination'=>$newdestination, 'areacode'=>$newareacode,'destination_rate'=>$newrate],"ID='$id'"); 
    if($db){
        echo '<div>Route <b>'.strtoupper($_POST['destination']).'</b> ('.strtoupper($_POST['areacode']).') successfully updated.<div>';
        echo '<div><a href="../page/destination.php">Show all Route</a></div>';
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


if(isset($_POST['routeis_active'])){
    $routes=$_POST['routeids'];

    //reset all routes active status first
    $resetchecked=[
        'is_active' => 0,
    ];
    $db->update('destination',$resetchecked,'ID>0'); 

    //get all checked routes
    foreach($routes as $route){        
        //then update active status of each checked routes
        $updatechecked=[
            'is_active' => 1,
        ];
        $db->update('destination',$updatechecked,'ID='.$route); 
    }

    if($db){
        echo '<div>Lists of active/inactive routes successfully updated.<div>';
        echo '<div><a href="../page/destination.php">Show all active routes</a></div>';
    }
};


if(isset($_POST['form-mode-delete'])){
    $id=$_POST['id'];    
    $res=$db->select('dailytrip','*','destinationid='.$id);
    $count=mysqli_num_rows($res);
    if($count>0){
        echo '<div style="color:red;">Unable to continue delete. <br /> Route <b>'.strtoupper($_POST['destination']).'</b> ('.strtoupper($_POST['areacode']).') is present in other transaction. <br /> <a href="../page/destination.php" style="color:blue;">Go Back</a></div>';
    }else{
        $db->delete('destination','ID='.$id); 
        if($db){
            echo '<div>Route <b>'.strtoupper($_POST['destination']).'</b> ('.strtoupper($_POST['areacode']).') successfully deleted. <br /><a href="../page/destination.php">Show all Routes</a></div>';
        }
    }
};

?>
