<?php
require_once "model/Persona.class.php";
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';


class AccesoBD{
  const RUTA="localhost";
  const USER="root";
  const PASS="";
  const NOMBRE_BD="basephp";
  public $conexion;

  //Se establece la conexión automáticamente
  function __construct(){
      $this->establecerConexion();
  }


  //Funcion para enviar correo de activación
  function enviarCorreoActivacion($correoDestino,$token){
    $mail = new PHPMailer();
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->Username = 'csldaw2mailing@gmail.com';
    $mail->Password = 'csldaw2mailing1234';
    $mail->From = 'csldaw2mailing@gmail.com';
    $mail->FromName = 'Sharefy';
    $mail->AddAddress($correoDestino);
    $mail->AddReplyTo('csldaw2mailing@gmail.com', 'Information');

    $mail->IsHTML(true);
    $mail->Subject    = "Sharefy - Activa tu nueva cuenta";
    $mail->AltBody    = "Para ver este mensaje, por favor, utilice un gestor de correo  compatible con HTML!";
    $mail->Body    = "<p>Pulsa en el siguiente enlace para activar tu cuenta:</p>
                      <a href='http://localhost/EjerciciosPHP/MasterPageMVC/index.php?seccion=activarcuenta&mail=$correoDestino&token=$token'>ACTIVAR</a>";

    if(!$mail->Send())
    {
      echo "Error al enviar el correo: " . $mail->ErrorInfo;
    }
    else
    {
      echo "Correo enviado :)!";
    }
  }

  function enviarCorreo($correoDestino,$token){
    $mail = new PHPMailer();
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->Username = 'csldaw2mailing@gmail.com';
    $mail->Password = 'csldaw2mailing1234';
    $mail->From = 'csldaw2mailing@gmail.com';
    $mail->FromName = 'Sharefy';
    $mail->AddAddress($correoDestino);
    $mail->AddReplyTo('csldaw2mailing@gmail.com', 'Information');

    $mail->IsHTML(true);
    $mail->Subject    = "Sharefy - Activa tu nueva cuenta";
    $mail->AltBody    = "Para ver este mensaje, por favor, utilice un gestor de correo  compatible con HTML!";
    $mail->Body    = "<p>Pulsa en el siguiente enlace para activar tu cuenta:</p>
                      <a href='http://localhost/EjerciciosPHP/MasterPageMVC/index.php?seccion=recuperarCuentaFinal&mail=$correoDestino&token=$token'>Recuperar Cuenta</a>";

    if(!$mail->Send())
    {
      echo "Error al enviar el correo: " . $mail->ErrorInfo;
    }
    else
    {
      echo "Correo enviado :)!";
    }
  }
  function actualizarTokenRecuperacion($token,$mail){
      $sql="UPDATE usuarios SET tokenRecuperacion='$token' WHERE mail='$mail'";
      $resultado=$this->lanzarConsulta($sql);

  }

  function actualizarContrasena($pass,$mail){
      $sql="UPDATE usuario SET pass='$pass' where mail=$mail";
      $resultado=$this->lanzarConsulta($sql);
  }

  function getTokenRecuperacion($mail){
    $sql="SELECT tokenRecuperacion FROM usuarios WHERE mail='$mail'";
    $resultado=$this->lanzarConsulta($sql);
    if(($fila = mysqli_fetch_array($resultado))!=null){//si hay un token
        return $fila;
    }else{
      return false;
    }
  }
  //Funcion para el Login
  //Se puede pasar estado de activación (0,1), sino, traerá cualquiera esté o no esté activado
  function getUsuario($mail, $pass,$activado="1"){
    //Cifrar pass
    $pass=md5($pass);

    //select * from usuarios where activado= . .. .
    $sql="SELECT * from usuarios where mail='$mail' and pass like '$pass' and activa ='$activado'";
    $resultado=$this->lanzarConsulta($sql);

    //En caso de haber resultado-> lo almaceno en fila y creo el usuario
    if (($fila = mysqli_fetch_array($resultado))!=null){
      //  $fila['nombre'],     $fila['ciudad'] . .. . .
      extract($fila); // genera variables  $nombre   $ciudad $edad $mail   $pass
      $persona=new Persona($nombre,$edad,$ciudad,$mail);
    }else{
      //datos incorrectos, devuelvo null
      $persona=null;
    }


    return $persona;
}

  //Funcion para el registro
  function nuevoUsuario($usuario,$pass,$token){


    $sql="INSERT INTO usuarios (mail, pass, nombre, edad, ciudad, activa, token_activacion)
    VALUES (     '$usuario->mail',
            md5('$pass'),
               '$usuario->nombre',
                 '$usuario->edad',
               '$usuario->ciudad',
                            b'0',
                          '$token')";

   $this->lanzarConsulta($sql);
  }

function cerrarConexion(){
  mysqli_close($this->conexion);
}

  //Establecer conexión con las constantes declaradas
  function establecerConexion(){
    $this->conexion=mysqli_connect(self::RUTA,self::USER,self::PASS,self::NOMBRE_BD) or
    die("Oh no, problemas al conectar.");
    //echo "Conectado correctamente.";

  }



  //Devuelve un array de Personas
  function getPersonas(){

  }

  function lanzarConsulta($sql){

    $tipoSQL=substr($sql,0,6);
    if (strtoupper($tipoSQL)=="SELECT"){
        //Bidireccional

        //TODO: 1)Lanzar SQL 2) Retornar resultados

        $result=mysqli_query($this->conexion,$sql) or
        die(mysqli_error($this->conexion));

        return $result;
    }else{
        //Unidireccionales
        //delete, update, etc.
          //TODO: 1)Lanzar SQL
        $result=mysqli_query($this->conexion,$sql) or
        die(mysqli_error($this->conexion));
        return $result;
    }




  }


  function activarcuenta($mail,$token){
    $sql="UPDATE usuarios SET activa=1 WHERE mail='$mail' and token_activacion='$token'";
    $result=$this->lanzarConsulta($sql);
    echo $result;
  }


  function recuperarCuenta($mail){


      $sql="SELECT mail FROM  usuarios WHERE mail='$mail'";

      $resultado=$this->lanzarConsulta($sql);
      if(($fila = mysqli_fetch_array($resultado))==null){//si el usuario no coincide
          return false;
      }else{
        return true;
      }


  }


  function personal(){
      $sql="SELECT * from usuarios";
      $resultado=$this->lanzarConsulta($sql);

        return $resultado;

  }



}
?>
