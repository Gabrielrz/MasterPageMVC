<?php
include 'model/AccesoBD.class.php';
//Activa una cuenta de usuario
echo "Se está intentando activar una cuenta.";



$mail=$_GET["mail"];
$token=$_GET["token"];



$bd=new AccesoBD();
$bd->activarcuenta($mail,$token);
echo "cuenta activada con exito";
?>
