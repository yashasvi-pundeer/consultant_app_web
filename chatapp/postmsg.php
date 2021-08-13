<?php
include 'connection.php';

$msg= $_POST['text'];
$room= $_POST['room'];
$ip= $_POST['ip'];

$sql="INSERT INTO `msg`( `msg`, `room`, `ip`, `rtime`) VALUES ('$msg','$room','$ip',CURRENT_TIMESTAMP)";
$res = mysqli_query($conn,$sql);


?>