<?php
$fname = $_GET["fname"];
$uname = $_GET["uname"]; 
$pswrd = $_GET["pswrd"]; 
$email = $_GET["email"]; 
$dptmt = $_GET["dptmt"]; 


$post = array(
	'fname' => $fname,
    'uname' => $uname, 
    'pswrd' => $pswrd,
    'email' => $email,
    'dptmt' => $dptmt,
);

$web = "http://lms2019.azurewebsites.net/api/Registration";

$data_string = json_encode($post);
$ch = curl_init($web);

$cookie_name = "regData";
setcookie($cookie_name, $data_string, time() + (86400), "/");

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
	header("Location: validation.html");
    exit();
} else{
		echo "error";
		
			}

?>