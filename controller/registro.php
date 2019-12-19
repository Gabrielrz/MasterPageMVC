<?php
include_once "model/AccesoBD.class.php";
require("PHPMailer.php");
require("SMTP.php");

//Cargar la Vista

if (!isset($_POST["submit"])){
  //Cargar la vista
  include "view/registro.php";
}else{
    //Comprobar datos
    $mail=$_POST["mail"];
    $nombre=$_POST["nombre"];
    $edad=$_POST["edad"];
    $ciudad=$_POST["ciudad"];
    $pass=$_POST["pass"];

    $usuario=new Persona($nombre,$edad,$ciudad,$mail);

    $bd=new AccesoBD();
    //Generar token para la activacion posterior
    $token=md5(uniqid());

    $bd->nuevoUsuario($usuario,$pass,$token);
    $bd->enviarCorreoActivacion($mail,$token);
    $resp= "<div class='alert alert-success' role='alert' >"
        ."usuario registrado correctamente"
        ."</div>";
      

    include "view/login.php";
}


?>
