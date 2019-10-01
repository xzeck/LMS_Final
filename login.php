<?php
$uname = $_GET["uname"]; 
$pswrd = $_GET["pswrd"]; 

$post = array(
    'uname' => $uname, 
    'pswrd' => $pswrd,
);

$web = "http://lms2019.azurewebsites.net/api/Login";

$data_string = json_encode($post);
$ch = curl_init($web);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
                 
$token = curl_exec($ch);
$cookie_token = "token";

$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($http_status == 200) {
    setcookie($cookie_token, $token, time() + (86400), "/");
	header("Location: dashboard.html");
    exit();
} else{
		echo "error";
		
			}

?>