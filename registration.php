<?php
$fname = $_GET["fname"];
$uname = $_GET["uname"]; 
$pswrd = $_GET["pswrd"]; 
$email = $_GET["email"]; 
$dptmt = $_GET["dptmt"]; 

$post = [
	'fname' => $fname,
    'uname' => $uname, 
    'pswrd' => $pswrd,
    'email' => $email,
    'dptmt' => $dptmt,
];

$ch = curl_init('http://lms2019.azurewebsites.net/api/Registration');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$server_code = curl_exec($ch);
curl_close($ch);

if($server_code == 200) {
	header("Location: verification.html");
    exit();
} else{
		echo "error";
		echo $server_code;
			}

?>