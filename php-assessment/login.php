<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "react-login-register");

$data = json_decode(file_get_contents("php://input"));

//$email = $data->email;
$email = mysqli_real_escape_string($con, htmlspecialchars($data->email, ENT_QUOTES, 'UTF-8'));
//$password = md5($data->password);
$password = mysqli_real_escape_string($con, htmlspecialchars(md5($data->password), ENT_QUOTES, 'UTF-8'));



$result = mysqli_query($con, "SELECT * FROM register WHERE email= '$email' AND password='$password'");

$nums = mysqli_num_rows($result);
$rs = mysqli_fetch_array($result);

if($nums >=1){
	http_response_code(200);
	$output = "";
	
	$output .= '{"email":"' . $rs["email"] . '", ';
	$output .= '"first_name":"' . $rs["first_name"] . '", ';
	$output .= '"last_name":"' . $rs["last_name"] . '", ';
	 // Add profile data to the response
    $output .= '"profile":"' . $rs["profile"] . '", ';
	//$output .= '{"Status":"' . $rs["200"] . '", ';
	$output .= '"Status":"200"}'; 
	
	echo $output;
	
}

else{
	http_response_code(202);
}

?>