<?php // local host side page -- api page to read data 
$vid =$_GET["vid"];
 $uid =$_GET["uid"];?>

<?php
$URL ="http://localhost/Youtube-Gallery/api_extractlike.php?vid=$vid&uid=$uid";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$URL);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$result = curl_exec($ch);
curl_close($ch);
$result2 = json_decode($result, true);
echo $result;
echo "<pre>";
print_r($result2);
echo"</pre>";
?>