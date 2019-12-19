<?php

//Definición de la clase
class Persona{
  //Atributos
  public $nombre;
  public $edad;
  public $ciudad;
  public $mail;
  //public $pass

  //Constructor
  function __construct($nombre,$edad,$ciudad,$mail)
  {
      $this->nombre=$nombre;
      $this->edad=$edad;
      $this->ciudad=$ciudad;
      $this->mail=$mail;
  }

  //Metodos/funciones
  function saludar(){
    return "Heyyyy que tal. Me llamo $this->nombre";
  }


}








 ?>
