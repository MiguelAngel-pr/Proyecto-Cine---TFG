<?php 
session_start(); 
include("funciones.php");
$msg = "";
$funcion = ($_POST['funcion']);
switch ($funcion)
{
    case "consulta_pelicula":consultaPelicula(); break;
}

function consultaPelicula()
{
    $mysqli = conectaBBDD();
    $id_pelicula = $_POST['idpelicula'];
    $consulta = $mysqli ->prepare("SELECT * FROM pelicula WHERE id_pelicula = $id_pelicula");
    $consulta -> execute();
    $consulta -> store_result();
    $consulta -> bind_result($film_id, $film_title, $film_title2, $film_language, $film_language2, $film_country, $film_releasedate, $film_synopsis, $film_image, $film_trailer, $film_billboard, $film_director, $film_distributor);
    $consulta->fetch();
    $numPeliculas = $consulta -> num_rows;

    if($numPeliculas > 0)
    {
        $msg = array($film_title, $film_title2, $film_language, $film_language2, $film_releasedate, $film_synopsis, $film_image, $film_trailer, $film_billboard, $film_director, $film_distributor);
    }
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
}

?>