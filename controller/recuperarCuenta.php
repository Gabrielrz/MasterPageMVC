<?php
include 'model/AccesoBD.class.php';
//si el email coninside con el del usuario registrado se envia un email

  if(!isset($_POST['submit'])){
    $concederPermiso=false;
    include 'view/recuperarCuenta.php';
  }else{
      $bd=new AccesoBD();
      $email=$_POST['mail'];

      $result=$bd->recuperarCuenta($email);
      if($result){//si el usuario existe

        //se genera el token
        $token=md5(uniqid());

        //se prepara el token de recuperacion para la verificacion
        $bd->actualizarTokenRecuperacion($token,$email);



        //se envia un email
        $bd->enviarCorreo($email,$token);

        echo "Se ha enviado un email con los datos de recuperacion de la cuenta";

      }else{
          echo "el email digitado no ha sido encontrado";
      }


  }


?>
