<?php // local host side page -- api page to read data ?>

<?php
$URL ="http://localhost/Youtube-Gallery/api_pagination.php?pagenum=3&pagelen=2";
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
