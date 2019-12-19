<?php
include 'model/AccesoBD.class.php';

//se hace una consulta para verificar el token


        $bd=new AccesoBD();
        if(!isset($_POST["submit"])){
          $mail=$_GET['mail'];
          $tokenMail=$_GET['token'];

          $bd=new AccesoBD();



            $tokenBd=$bd->getTokenRecuperacion($mail);
            $concederPermiso=true;
            if($tokenMail==$tokenBd['tokenRecuperacion']){
              include 'view/recuperarCuentaFinal.php';
          }else{
            echo "token invalido no puede acceder!!!!!!!!";
          }
        }else{
          $mail=$_POST['mail'];
          $pass=$_POST['pass'];
          $passN=$_POST['passVerify'];

          if($pass==$passN){
              //actualizar contraseña

              $bd->actualizarContrasena($pass,$mail);
              echo "la contraseña ha sido actualizada";

          }

        }
