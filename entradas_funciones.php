<?php 
session_start(); 
include("funciones.php");
$msg = "";
$funcion = ($_POST['funcion']);
switch ($funcion)
{
    case "preparar_compra":prepararCompra(); break;
    case "obtener_valores":obtenerValores(); break;
    case "añadir_entradas":añadirEntrada(); break;
}

function prepararCompra()
{
    $msg = "no";
    $id_cine = limpiaPalabra($_POST['cine']);
    $hora = limpiaPalabra($_POST['hora']);
    $id_sala = limpiaPalabra($_POST['sala']);
    $id_pelicula = limpiaPalabra($_POST['pelicula']);
    $mysqli = conectaBBDD(); 

    $query = "SELECT p.titulo,s.n_sala, s.filas_butacas, s.columnas_butacas, s.tipo, h.idioma, h.subtitulos, h.precio, h.fecha, h.hora, h.cine FROM horario h, sala s, pelicula p WHERE h.cine = $id_cine AND h.hora = '$hora' AND s.id_sala = $id_sala AND p.id_pelicula = $id_pelicula";
    $consulta = mysqli_query($mysqli, $query);
    $numConsulta = $consulta -> num_rows;
    
    if($numConsulta > 0)
    {
        $row = mysqli_fetch_row($consulta);
        setcookie('entrada_valores', json_encode($row, JSON_UNESCAPED_UNICODE), time()+1800);//30 min
        $msg = "ok";
    }

    echo $msg;
}

function obtenerValores()
{   
    if(isset($_COOKIE['entrada_valores']))
    {
        echo $_COOKIE['entrada_valores'];
    }
    else
    {
        echo "no";
    } 
}

function añadirEntrada()
{
    $mysqli = conectaBBDD(); 
    $array_entrada = var_dump(json_decode($_COOKIE['entrada_valores'],true));
    $id_cine = limpiaPalabra($_POST['cine']);
    $actualizaUsuario = $mysqli ->prepare("INSERT INTO entradas VALUES (NULL, '$array_entrada[8]', '$array_entrada[9]', '$array_entrada[7]', '', '', '$array_entrada[0]', '$array_entrada[10]', NULL, '$array_entrada[1]')");
    $actualizaUsuario -> execute();
    $usuariosAfectados = $mysqli -> affected_rows;         
    if($usuariosAfectados > 0)
    {
        $msg = "ok";
        if ($_COOKIE['sesion_activa'] && !password_verify($_SESSION['username'] ,$_COOKIE['sesion_activa']['usuario_nombre_pass'])) 
        {
            $user_name_pass = password_hash($_SESSION['username'], PASSWORD_BCRYPT);
        }            
    }
}