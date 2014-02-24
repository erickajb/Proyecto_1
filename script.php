<?php
    
function Conectarse() //Función para conectarse a la BD
{
    global $argv;//Variable para obtener el nombre digitado por parametro
    $_SERVER["argv"];
    $parameterJson=$argv[1];

    $json = file_get_contents($parameterJson . ".json");//Guardamos los datos que obtuvimos de esta funcion en la variable  llamada json.
    $data = json_decode($json, true);//esta funcion nos dara los datos de json en un formato que php pueda leer adecuadamente, y la guardaremos en otra variable llamada data.
    $IP=$data["ip"];//Variable que guarda lo ip del servidor
    $USER=$data["user"];//Variable que guarda el user
    $PASSWORD=$data["password"];//Variable que guarda el password
    $DB=$data["db"];//Variable que guarda el nombre de nuestra base de datos

   if (!($link = mysqli_connect($IP, $USER, $PASSWORD, $DB)))
    {
        echo "Error conectando a la base de datos.";
        exit();
    }
    return $link;
}
date_default_timezone_set("America/Costa_Rica");
$dateSystem=date("dmY");
$row    = 0;
$handle = fopen($dateSystem . ".csv", "r"); // nombre del archivo csv que contiene los datos
while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) { //Lee toda una linea completa y ingresa los datos en el array 'data'
    $num = count($data); //Cuenta cuantos campos contiene la linea (el array 'data')
    $row++;
    $cadena = "INSERT INTO estudiantes_ingresados (Name,Last_Name,Email,Phone,Id) VALUES ("; //campos de la tabla
    
    for ($c = 0; $c < $num; $c++) { //Aquí va colocando los campos en la cadena, si aun no es el último campo, le agrega la coma (,) para separar los datos
        if ($c == ($num - 1))
            $cadena = $cadena . "'" . $data[$c] . "'";
        else
            $cadena = $cadena . "'" . $data[$c] . "',";
    }
    
    $cadena = $cadena . ");"; //Termina de armar la cadena para poder ser ejecutada
    echo $cadena; //Muestra la cadena para ejecutarse
    
    $enlace = Conectarse();
    $result = mysqli_query($enlace, $cadena); //Aquí está la clave, se ejecuta con MySQL la cadena del insert formada
    mysqli_close($enlace);
}
fclose($handle);

?>
