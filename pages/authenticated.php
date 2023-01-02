<?php
session_start();
$_SESSION['auth']=$_GET['id'];
header('Location: ../page/payable.php');
exit;

