<?php
//Variables que obtiene los datos que se introducen en el formulario
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$id = $_POST['id'];
date_default_timezone_set("America/Costa_Rica");	// Configuramos la zona horaria para que nos de la fecha exacta
$dateSystem=date("dmY");	//Variable que guarda la fecha del sistema



$cvsData = $name . ";" . $lastname . ";" . $email . ";". $phone . ";" . $id . ";" ."\n";	//aquí es donde creamos nuestro archivo csv

$fp = fopen($dateSystem.".csv","a");

if($fp){
	fwrite($fp,$cvsData);	 // Se escribe la información en el archivo csv
	fclose($fp); 	// Cerramos nuestro archivo
}
?>