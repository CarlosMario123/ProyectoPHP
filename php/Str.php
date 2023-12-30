<?php
   //funcion que permite limpiar la cadena de texto con trim
   function limpiarCadena($cadena){
     //procedemos a limpiar la cadena de texto
     $cadena=trim($cadena);
     $cadena = stripslashes($cadena);

     //para eliminar los que son ataques por script e injection sql

    
     $cadena = str_ireplace("<script>","",$cadena);
     $cadena=str_ireplace("<script src", "", $cadena);
		$cadena=str_ireplace("<script type=", "", $cadena);
		$cadena=str_ireplace("SELECT * FROM", "", $cadena);
		$cadena=str_ireplace("DELETE FROM", "", $cadena);
		$cadena=str_ireplace("INSERT INTO", "", $cadena);
		$cadena=str_ireplace("DROP TABLE", "", $cadena);
		$cadena=str_ireplace("DROP DATABASE", "", $cadena);
		$cadena=str_ireplace("TRUNCATE TABLE", "", $cadena);
		$cadena=str_ireplace("SHOW TABLES;", "", $cadena);
		$cadena=str_ireplace("SHOW DATABASES;", "", $cadena);
		$cadena=str_ireplace("<?php", "", $cadena);
		$cadena=str_ireplace("?>", "", $cadena);
		$cadena=str_ireplace("--", "", $cadena);
		$cadena=str_ireplace("^", "", $cadena);
		$cadena=str_ireplace("<", "", $cadena);
		$cadena=str_ireplace("[", "", $cadena);
		$cadena=str_ireplace("]", "", $cadena);
		$cadena=str_ireplace("==", "", $cadena);
		$cadena=str_ireplace(";", "", $cadena);
		$cadena=str_ireplace("::", "", $cadena);
		$cadena=trim($cadena);
		$cadena=stripslashes($cadena);
		return $cadena;
   }


   function renombrar_fotos($nombre){
    // Reemplazar espacios en blanco por guiones bajos
    $nombre = str_ireplace(" ", "_", $nombre);

    // Reemplazar barras diagonales por guiones bajos
    $nombre = str_ireplace("/", "_", $nombre);

    // Reemplazar signos de numeral (#) por guiones bajos
    $nombre = str_ireplace("#", "_", $nombre);

    // Reemplazar guiones por guiones bajos
    $nombre = str_ireplace("-", "_", $nombre);

    // Reemplazar signos de dólar ($) por guiones bajos
    $nombre = str_ireplace("$", "_", $nombre);

    // Reemplazar puntos por guiones bajos
    $nombre = str_ireplace(".", "_", $nombre);

    // Reemplazar comas por guiones bajos
    $nombre = str_ireplace(",", "_", $nombre);

    // Agregar un guion bajo y un número aleatorio al final del nombre
    $nombre = $nombre . "_" . rand(0, 100);

    // Devolver el nombre modificado
    return $nombre;
}


function IsStrVacio($cadena){
  //empty verifica si esta vacia
  //trim quita los espacio en blanco
  return empty(trim($cadena)); //retorna verdadero si esta vacia
}

?>