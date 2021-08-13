<?php
$roomname = $_GET['roomname'];
 include 'connection.php';
 $sql= "SELECT * FROM `chat` WHERE `room_name`='$roomname'";
 $res = mysqli_query($conn,$sql);
 if($res)
 {
     if(mysqli_num_rows($res)==0){
        $message = "this room does not exits";
        echo "<script language='javascript'> alert('$message')</script>";
        echo "<script language='javascript'> ";
       echo "window.location='http://localhost/chatapp';";
        echo'</script>';
     }
     else{

     }

 }
 else{
     echo "error:". mysqli_error($conn);
 }
 ?>
 <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
 
<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
.anyclass{
    height:350px;
    overflow-y: scroll ;
}
</style>
</head>
<body>

<h2>Chat Messages- <?php echo $roomname ;?></h2>

<div class="container">
    <div class="anyclass">

  </div>
</div>
<input type="text" class="form-control" name="usermsg" id="usermsg" placeholder="add msg"><br>
<button class="btn btn-default" name="submit" id="submit">send</button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
// new msg in 1s check
setInterval(runFunction, 1000);
function runFunction()
{
    $.post("htcont.php",{room: '<?php echo $roomname ?>'},
    function(data,status)
    {
        document.getElementsByClassName('anyclass')[0].innerHTML= data;
    }
    )
}

// submitting on enter:credit w3 school
var input = document.getElementById("usermsg");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
    event.preventDefault();
    document.getElementById("submit").click();
  }
});
$("#submit").click(function(){
    var clientmsg =$('#usermsg').val();
  $.post("postmsg.php", {text : clientmsg , room: '<?php echo $roomname ?>' , ip:'<?php echo $_SERVER['REMOTE_ADDR'] ?>' },
  function(data,status){
      document.getElementsByClassName('anyclass')[0].innerHTML = data;
  });
  $("#usermsg").val("");
  return false;
});

</script>
</body>
</html>



