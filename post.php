<?php
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$id = $_POST['id'];
date_default_timezone_set("America/Costa_Rica");
$dateSystem=date("dmY");


//validate

if(empty($name) || empty($lastname) || empty($email) || empty($phone) || empty($id)){

$message = 'Fill in areas in red!';
$aClass = 'errorClass';
}

//this is where the creating of the csv takes place
$cvsData = $name . ";" . $lastname . ";" . $email . ";". $phone . ";" . $id . ";" ."\n";

$fp = fopen($dateSystem.".csv","a"); // $fp is now the file pointer to file $filename

if($fp){
fwrite($fp,$cvsData); // Write information to the file
fclose($fp); // Close the file
}
?>