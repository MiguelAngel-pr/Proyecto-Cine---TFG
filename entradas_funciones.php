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
    case "obtener_asientos_vendidos":obtenerAsientosVendidos(); break;
}

function prepararCompra()
{
    $msg = "no";
    $id_cine = limpiaPalabra($_POST['cine']);
    $hora = limpiaPalabra($_POST['hora']);
    $id_sala = limpiaPalabra($_POST['sala']);
    $id_pelicula = limpiaPalabra($_POST['pelicula']);
    $mysqli = conectaBBDD(); 

    $query = "SELECT p.titulo,s.n_sala, s.filas_butacas, s.columnas_butacas, s.tipo, h.* FROM horario h, sala s, pelicula p WHERE h.cine = $id_cine AND h.hora = '$hora' AND s.id_sala = $id_sala AND p.id_pelicula = $id_pelicula";
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

function obtenerAsientosVendidos()
{
    $id_horario = limpiaPalabra($_POST['horario']);
    $mysqli = conectaBBDD(); 
    $query = "SELECT asiento_fila, asiento_columna FROM entradas WHERE id_horario = '$id_horario' ORDER BY asiento_fila asc, asiento_columna asc;";
    $consulta = mysqli_query($mysqli, $query);
    $numEntradas = $consulta -> num_rows;
    
    if($numEntradas > 0)
    {
        for ($i = 0; $i < $numEntradas; $i++)
        {
            $msg[] = mysqli_fetch_assoc($consulta);
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    }
    else
    {
        echo "no";
    }
    
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
    $msg = "no";
    $usuario = 'NULL';
    $n_sala = "";
    if(isset($_COOKIE['entrada_valores']))
    {
        if(isset($_SESSION['username']))
        {
            $usuario = obtenerUsuarioId();
        }

        $array_entrada = json_decode($_COOKIE['entrada_valores'],true);
        $n_sala = limpiaPalabra($array_entrada[1]);
        $id_horario = limpiaPalabra($array_entrada[5]);
        $id_pelicula =  limpiaPalabra($array_entrada[6]);
        $id_cine = limpiaPalabra($array_entrada[7]);
        $fila_asiento = limpiaPalabra($_POST['fila_asiento']);
        $columna_asiento = limpiaPalabra($_POST['columna_asiento']);
        $mysqli = conectaBBDD(); 

        if(comprobarExistenciaEntrada($id_horario, $fila_asiento, $columna_asiento) == "no")
        {
            $query = "INSERT INTO entradas VALUES (NULL, '$n_sala', '$fila_asiento', '$columna_asiento', '$id_cine', '$id_pelicula', '$id_horario', $usuario)";
            $añadeEntrada = $mysqli ->prepare($query);
            $añadeEntrada -> execute();
            $filasAfectadas = $mysqli -> affected_rows;         
            if($filasAfectadas > 0)
            {
                $msg = "ok";      
            }
        }
        else
        {
            $mysqli -> rollback();
        }
    }

    echo $msg;
}

function comprobarExistenciaEntrada($id_horario, $fila, $columna)
{
    $mysqli = conectaBBDD(); //me conecto a la base de datos
    $query = "SELECT cod_entrada FROM entradas WHERE id_horario = '$id_horario' AND asiento_fila = '$fila' AND asiento_columna = '$columna'";
    $consulta = mysqli_query($mysqli, $query);
    $numFilas = $consulta -> num_rows;
    $msg = "no";
    if($numFilas > 0)
    {
        $msg = "si";
    }
    return $msg;
}

function obtenerUsuarioId()
{
    $mysqli = conectaBBDD(); 
    $usuario_actual = limpiaPalabra($_SESSION['username']);
    $resultado = mysqli_query($mysqli,"SELECT id_usuario FROM usuarios WHERE nombre_usuario = '$usuario_actual'");
    $msg = $resultado->fetch_assoc();
    if($msg["id_usuario"] == null)
    {
        return NULL;
    }
    else
    {
        return $msg["id_usuario"];
    }
}

?>