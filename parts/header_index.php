<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LXAP Trucking Services</title>
	
	<!-- Bootstrap Select  -->
	<link rel="stylesheet" href="bootstrap_select/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap_select/bootstrap-select.min.css">
    <!-- <link rel="stylesheet" href="bootstrap.css"> -->
	
	<!-- datepicker -->
	<link rel="stylesheet" href="datepicker/jquery-ui.css">
	
	<!-- jQuery Modal css-->
	<link rel="stylesheet" href="modal/jquery.modal.min.css" />

	
	
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
		
	<?php
	$cnt=0;
	$resf=$db->select('vwmaintenance','MAX(transactiondate) as latestdate,plateid',"remarks like '%change oil%' or remarks like '%changeoil%' group by plateid");
	while($rwf=mysqli_fetch_assoc($resf)){
		$getldate=$rwf['latestdate'];
		$plateid0=$rwf['plateid'];
		$km=0;
		$res1f=$db->select('vwdailytripall','SUM(destination_distance) as totalkm',"plateid=".$plateid0." AND tripdate>'$getldate'");
		while($rwwf=mysqli_fetch_assoc($res1f)){
			$km=$rwwf['totalkm'];
			if($km>=10000){
				$cnt++;
			}
		}
	}

	if($cnt>0){
	?>
		<div class="warning-changeoil">
		<h4 class="blinking">Warning!!!</h4>
		<h5 style="font-size:1rem;">List of truck/s need to change oil</h5>
		<?php
			$resf2=$db->select('vwmaintenance','MAX(transactiondate) as latestdate,plateid',"remarks like '%change oil%' or remarks like '%changeoil%' group by plateid");
			while($rwf2=mysqli_fetch_assoc($resf2)){
				$getldate=$rwf2['latestdate'];
				$plateid0=$rwf2['plateid'];
				$km2=0;
				$res1f2=$db->select('vwdailytripall','SUM(destination_distance) as totalkm,plate',"plateid=".$plateid0." AND tripdate>'$getldate'");
				while($rwwf2=mysqli_fetch_assoc($res1f2)){
					$km2=$rwwf2['totalkm'];
					if($km2>=10000){
						echo '<span>'.'<b>'.$rwwf2['plate'].'</b> <br/>
						<i style="color:red;">Last change oil: <b>'.date('M d, Y',strtotime($getldate)).'</b></i>
						<br/>
						<i style="color:black;">Current Mileage: <b>'.number_format($km2).' km</b></i>
						</span> <br/>';
					}
				}
			}
		?>
		</div>
	<?php
	}

	
	?>

	<div class="main-container">    