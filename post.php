<?php
//Variables que obtiene los datos que se introducen en el formulario
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$id = $_POST['id'];
date_default_timezone_set("America/Costa_Rica");	// Configuramos la zona horaria para que nos de la fecha exacta
$dateSystem=date("dmY");	//Variable que guarda la fecha del sistema



$cvsData = $name . ";" . $lastname . ";" . $email . ";". $phone . ";" . $id . "\n";	//aquí es donde creamos nuestro archivo csv

$fp = fopen($dateSystem.".csv","a");

if($fp){
	fwrite($fp,$cvsData);	 // Se escribe la información en el archivo csv
	fclose($fp); 	// Cerramos nuestro archivo
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>   
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta http-equiv="Refresh" content="3;url=index.html">
    <link rel="stylesheet" type="text/css" href="style/index.css">
</head>
<body>    
    <div>
        <header>
            <div>
                <form class="form2">
                    <h2><b>Registration completed successfully</b></h2>
                    <div><img src="img/check.png"></div>
                    
                </form>     
                
            </div>

         </header>
        <section>
                    
</body>
</html> 

