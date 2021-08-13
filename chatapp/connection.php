<?php

$DBHOST = 'localhost';
$DBUSER = 'root';
$DBPASS = '';
$DBNAME = 'chat';
$conn;

$conn = mysqli_connect($DBHOST, $DBUSER, $DBPASS, $DBNAME);

if($conn)
{
    ?>
    <script>alert("Connection succesful!");</script>
    <?php
}
else{
    die("No Connection!");
    ?>
    <script>alert("Could Not Connection!")</script>
   <?php
}

?>