<?php

function conexionBD(){
//todas la funcionalidades que iran en el sistema
 
 //conexion ala base de datos
 $pdo = new PDO("mysql:host=localhost;dbname=Inventario","root","1234");

 //ejemplo de una consulta
 //$pdo->query("INSERT INTO categoria (nombre, ubicacion) VALUES ('Electrónica', 'Sección A'); ")

 return $pdo;
}


?>