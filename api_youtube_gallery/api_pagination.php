<?php  // this is serverside page === api key?>
<?php include("connection.php")?>
<?php
 $pagenum =$_GET["pagenum"];
 $pagelen =$_GET["pagelen"];
 $page = $pagelen*($pagenum - 1);
//echo 'pagelen<br> ' . htmlspecialchars($_GET["pagelen"]) . '!';
?>
<?php
        // showing admin added from database
       // $sql = "SELECT * FROM `videos`";
        $sql= "SELECT *
        FROM `videos`
        WHERE `status`='free'
        ORDER BY `v_id`
        Limit $page,$pagelen ";
        $res = mysqli_query($conn,$sql);
        header('Content-Type:application/json');   // connecting to database
        header('Acess-Control-Allow-Origin: *');

        //checking whether query is excuted or not
        if($res){
            // count that data is there or not in database
            $count= mysqli_num_rows($res);
            if($count>0){
                // we have data in database
                while($row = mysqli_fetch_assoc($res))
                {
                    // extracting values from dATABASE

                   /* $id=$row['v_id'];
                    $url=$row['v_url'];
                    $name=$row['title'];
                    $vedio_length=$row['length'];*/  // no need 

                    $arr[] = $row;   // making array of data
                 
                }
               echo json_encode(['status'=>'true','data'=>$arr,'result'=>'found']);   // displaying data

            }
            else{
                echo json_encode(['status'=>'true','msg'=>"NO DATA FOUND"]);   // displaying data not found msg
            }
        }
        else{
            echo "no data";
        }

            ?>