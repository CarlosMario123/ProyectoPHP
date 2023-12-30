<?php

#funcion que verifica datos

function verificarDatos($filtro,$cadena){
  
    if(preg_match("/^".$filtro."$/",$cadena)){
        return true;
    }else{
        return false;
    }
}


//probando la funcion
/*

$name = "carlosM";
#solo permitiremos caracteres de a a Z y que sea de 6 a 10 caracteres
if(verificarDatos("[a-zA-Z]{6,10}",$name)){
   echo "paso la prueba";
}else{
    echo "error";
}

*/
?>