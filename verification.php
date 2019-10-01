<?php
 
$post = json_decode($_COOKIE['regData'], true);

$post["code"]=$_GET['code'];

$web = "http://lms2019.azurewebsites.net/api/Verification";
//$local = "http://localhost:7071/api/Registration";

$data_string = json_encode($post);
$ch = curl_init($web);
echo $data_string;                                                                      
echo "<br>";
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
                 
$result = curl_exec($ch);
$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($http_status == 200) {
	header("Location: login.html");
    exit();
} else{
		echo "error";
        echo $http_status;
		
			}

?>