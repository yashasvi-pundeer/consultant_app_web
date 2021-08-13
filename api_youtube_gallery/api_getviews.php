<?php  // this is serverside page === api key?>
<?php

$DBHOST = 'localhost';
$DBUSER = 'ostechnix';
$DBPASS = 'Password123#@!';
$DBNAME = 'gallery2';
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
 $vid =$_GET["vid"];
 //$uid =$_GET["uid"];

?>
<?php
        
       $sql= "SELECT *
       FROM `videos`
       WHERE `v_id`='$vid'
       ORDER BY `v_id`";
        $res = mysqli_query($conn,$sql);
        header('Content-Type:application/json');   // connecting to database


        //checking whether query is excuted or not
        if($res){
            // count that data is there or not in database
            $count= mysqli_num_rows($res);
            if($count>0){
                // we have data in database
                while($row = mysqli_fetch_assoc($res))
                {

                    $arr = array($row['v_id'],$row['views']);   // making array of data
                 
                }
               echo json_encode(['status'=>'true','data'=>$arr,'result'=>'found']);   // displaying data

            }
            else{
                echo json_encode(['status'=>'true','msg'=>"NO DATA FOUND"]);   // displaying data not found msg
            }
        }
        else{
            echo "error";
        }

            ?>