<?php
  //Acceso a BD   -->Obtener personas
  //Select * from personas;
  include_once "model/AccesoBD.class.php";


  $bd=new AccesoBD();
  $personas=$bd->personal();
  
  //Cargar la vista (pasandole los datos)
  include "view/personal.php";
?>
