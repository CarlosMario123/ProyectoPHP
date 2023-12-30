<?php require "./inc/seccionStart.php"; ?>
<!DOCTYPE html>
<html lang="es" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica phpBD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class ="h-screen ">
<?php
    
    //preguntaremos si existe vista y que vista tenga algo
    if(!isset($_GET["vista"]) || $_GET["vista"] == ""){
        $_GET["vista"] == "login";    
    }

     //preguntaremos si existe el archibo
    if(is_file("./vistas/".$_GET["vista"].".php") && $_GET["vista"] != "404" && $_GET["vista"] != "login"){
        //aca solo mostrara los archivos que no sea el login ni el 404
        include "./inc/navbar.php";

        //mostraremos de manera dinamica
        include "./vistas/".$_GET["vista"].".php";
        include "./inc/script.php";
    }else{

         //si es login mostraremos el login
        if($_GET["vista"] == "login"){
           include "./vistas/login.php";
        }else{
            //Caso contrario un error 404
            include "./vistas/404.php";
        }
    }
      
     ?>
     
</body>
</html>