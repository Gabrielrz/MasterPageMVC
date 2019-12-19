<?php
include_once "model/AccesoBD.class.php";
//Controlar el login

if (!isset($_POST["submit"])){
  //Cargar la vista
  $exito=false;
  $resp="";
  include "view/login.php";
}else{
    //Comprobar datos
    $mail=$_POST["mail"];
    $pass=$_POST["pass"];
    $bd=new AccesoBD();
    $usuario=$bd->getUsuario($mail,$pass);
    if ($usuario!=null){
      $exito=true;
      $resp= "<div class='alert alert-success' role='alert' >"
          ."datos correctos"
          ."</div>";
          echo $resp;
          //include "view/login.php";
    }else{
      $exito=false;

      $resp= "<div class='alert alert-danger' role='alert'>"
          ."datos incorrectos"
          ."</div>";

      include "view/login.php";

    }


}

?>
