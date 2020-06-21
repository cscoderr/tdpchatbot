<?php

$dbname = "banks";
$user = "root";
$password ='';
$server = "localhost";

$con = mysqli_connect($server, $user, $password, $dbname);

if($con) {
	$url = "https://api.paystack.co/bank";


$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => $url,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_CUSTOMREQUEST => 'GET',
));

$data = curl_exec($curl);

if(curl_errno($curl)){
	echo "Error : " . curl_error($curl);
}

curl_close($curl);

$data = json_decode($data, true);
print_r($data['data']);
// $data = $data['data'];
// for ($i=0; $i < count($data); $i++) { 
// 	$name = $data[$i]['name'];
// 	$code = $data[$i]['code'];
// 	$query = "INSERT INTO `bank_details`(`bank_name`, `bank_code`) VALUES ('$name', '$code')";
// 	if(mysqli_query($con, $query)) {
// 		echo "inserted";
// 	} else {
// 		echo mysqli_error($con);
// 	}
	//echo $data[$i]['name'] . ' ' , $data[$i]['code'] . "<br>";
// }	
}

?>