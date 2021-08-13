<?php

$DBHOST = 'localhost';
$DBUSER = 'root';
$DBPASS = '';
$DBNAME = 'gallery';
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

<?php

header('Content-Type:application/json');
header('Acess-Control-Allow-Origin: *');
/*$data = json_decode(file_get_contents("php://input"),true);
$vid = $data['vid'];*/

$sql= "SELECT *
FROM `videos`
 WHERE `v_id`='$vid'
 ORDER BY `v_id`";
$res = mysqli_query($conn,$sql);


if($res){
    $count= mysqli_num_rows($res);
    if($count>0){
        while($row = mysqli_fetch_assoc($res))
        {
         $arr[] = $row;   
         
        }
        echo json_encode(['status'=>'true','data'=>$arr,'result'=>'found']);
    }
    else{
        echo json_encode(['status'=>'true','msg'=>"NO DATA FOUND"]);   // displaying data not found msg
    }
}
else{
    echo "error";
}

?>