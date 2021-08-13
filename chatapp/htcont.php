<?php
$room = $_POST['room'];
include 'connection.php';
$sql= "SELECT * FROM `msg` WHERE `room`='$room'";
$res= "";
$result =mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
    while($row= mysqli_fetch_assoc($result))
    {
           echo $res = "<div class='container'>";
          echo  $res = $row['ip'];
           echo $res = " says <p>".$row['msg'];
          echo  $res = "</p> <span class='time-right'>".$row['rtime']."</span></div>";
    }
 
}
else{
    $res = $res."sorry";
}

?>