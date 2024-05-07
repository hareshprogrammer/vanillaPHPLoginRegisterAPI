<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = $_POST;

$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "react-login-register");

$first_name = mysqli_real_escape_string($con, htmlspecialchars($data['first_name'], ENT_QUOTES, 'UTF-8'));
$last_name = mysqli_real_escape_string($con, htmlspecialchars($data['last_name'], ENT_QUOTES, 'UTF-8'));
$email = mysqli_real_escape_string($con, htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8'));
$password = mysqli_real_escape_string($con, htmlspecialchars(md5($data['password']), ENT_QUOTES, 'UTF-8'));

// Check if the email already exists in the database
$sql_check = "SELECT * FROM register WHERE email = '$email'";
$result_check = mysqli_query($con, $sql_check);

if (mysqli_num_rows($result_check) > 0) {
    // If email already exists, return an error response
    echo json_encode(array("status" => "invalid", "message" => "Email already exists. Please choose a different Email."));
    exit;
}

// Generate a unique filename for the uploaded image
$image_name = uniqid() . '_' . $_FILES['profile']['name'];
$image_temp = $_FILES['profile']['tmp_name'];
$image_size = $_FILES['profile']['size'];
$image_type = $_FILES['profile']['type'];

// Specify the directory where you want to store the uploaded images
$upload_directory = "uploads/";

// Move the uploaded image to the specified directory with the unique filename
$uploaded = move_uploaded_file($image_temp, $upload_directory . $image_name);

if (!$uploaded) {
    // If the image upload fails, return an error response
    echo json_encode(array("status" => "invalid", "message" => "Error uploading image."));
    exit;
}

// Proceed with insertion if email doesn't exist and image uploaded successfully
$sql = "INSERT INTO register(first_name, last_name, email, profile, password) VALUES ('$first_name', '$last_name', '$email', '$image_name', '$password')";
$result = mysqli_query($con, $sql);

if ($result) {
    echo json_encode(array("status" => "valid", "message" => "User registered successfully."));
} else {
    echo json_encode(array("status" => "invalid", "message" => "Error registering user."));
}
?>
