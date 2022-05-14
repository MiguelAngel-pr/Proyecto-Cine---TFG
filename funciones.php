<?php
function conectaBBDD()
{
    include("configuracion.php");
    $mysqli = new mysqli($servidor,$usuario,$clave,$BBDD); //variable que permite la conexión con la base de datos
    $mysqli -> query("SET NAMES utf8"); //para q salgan bien los acentos
    return $mysqli;
}

function limpiaPalabra($palabra)//filtro básico para evitar inyección SQL
{
    $palabra = trim($palabra);
    $palabra = stripslashes($palabra);
    $palabra = htmlspecialchars($palabra);
    return $palabra;
}

function comprobarNulo($palabra)//Convierte las palabras con un guion (nulas) en NULL para poder insertarlas correctamente en la BBDD
{
    if(is_null($palabra) || $palabra == "-")
    {
        $palabra = 'NULL';
    }
    
    return $palabra;
}

function comprobarExistencia($tabla,$campo,$valor)//Comprueba si el valor esta repetido o existe en la base de datos
{
    
    $mysqli = conectaBBDD(); //me conecto a la base de datos
    $sql = "SELECT * FROM $tabla WHERE $campo = '$valor'";
    $consulta = $mysqli ->prepare($sql);
    $consulta -> execute();
    $consulta -> store_result();
    $consulta->fetch();
    $numFilas = $consulta -> num_rows;
    $msg = "no";
    if($numFilas > 0)
    {
        $msg = "ok";
    }

    return $msg;
}

function desactivaCookies()
{
    //Desactivar todas las cookies de la página
    if (isset($_SERVER['HTTP_COOKIE'])) 
    { 
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']); 
        foreach($cookies as $cookie) { 
            $parts = explode('=', $cookie); 
            $name = trim($parts[0]); 
            setcookie($name, '', time()-1000); 
            setcookie($name, '', time()-1000, '/'); 
        } 
    }
}
?>