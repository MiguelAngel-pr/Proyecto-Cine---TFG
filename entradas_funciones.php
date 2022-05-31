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
    case "obtener_entradas_usuario":obtenerEntradasUsuario(); break;
}

function prepararCompra()//manda todos los datos para generar la sala y los asientos, y poder mostrar la información de esta
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

function obtenerAsientosVendidos()//obtiene todos los asientos ya vendidos
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

function obtenerValores()//obtiene los valores de la entrada
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

function añadirEntrada()//realiza la petición de la entrada. Dependiendo de si el usuario esta conectado o no se pondrá su id para identificar al propietario de la entrada
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

function comprobarExistenciaEntrada($id_horario, $fila, $columna)//Comprueba la existencia de la entrada para asegurarse que no este cogida ya
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

function obtenerUsuarioId()//obtiene el usuario id del usuario que esta conectado
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

function obtenerEntradasUsuario()//obtiene las entradas del usuario
{
    if(isset($_SESSION['username']))
    {
        $usuario = obtenerUsuarioId();
    }
    $mysqli = conectaBBDD(); 
    $query = "SELECT e.n_sala, e.asiento_fila, e.asiento_columna, h.hora, h.fecha , h.idioma, c.ciudad, p.titulo, u.nombre_usuario FROM entradas e INNER JOIN horario h, cine c, pelicula p, usuarios u WHERE u.id_usuario = $usuario AND e.id_usuario = $usuario AND e.id_pelicula = p.id_pelicula AND e.id_cine = c.id_cine AND e.id_horario = h.id ORDER BY fecha asc, hora asc";
    $consulta = mysqli_query($mysqli, $query);
    $numEntradas = $consulta -> num_rows;
    
    if($numEntradas > 0)
    {
        for ($i = 0; $i < $numEntradas; $i++)
        {
            $msg[] = mysqli_fetch_row($consulta);
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    }
    else
    {
        echo "no";
    } 
}

?>