<?php 
session_start(); 
include("funciones.php");
$msg = "";

$usuario_nombre = limpiaPalabra($_POST['newusername']);
$usuario_email = limpiaPalabra($_POST['newemail']);
$usuario_password = limpiaPalabra($_POST['newpassword']);
$usuario_password = password_hash($usuario_password, PASSWORD_BCRYPT);

$mysqli = conectaBBDD(); //me conecto a la base de datos

$consulta = $mysqli ->query("SELECT * FROM usuarios WHERE email='$usuario_email' OR nombre_usuario='$usuario_nombre'");
$resultados = $consulta -> num_rows;

//echo "<script>console.log('Datos2: " . $usuario_nombre . ", " . $usuario_email . ", " . $usuario_password . ", " . $resultados . "' );</script>";

if($resultados>0)
{
    $msg = "El nombre de usuario o el email ya estan siendo usados";
}
else
{
    $añadirUsuario = $mysqli -> query("INSERT INTO usuarios (`id_usuario`, `email`, `nombre_usuario`, `contraseña`)  VALUES (NULL, '$usuario_email', '$usuario_nombre', '$usuario_password')");
    $numUsuarios = $mysqli -> affected_rows;
    if ($numUsuarios > 0)
    {
        $_SESSION['username'] = $usuario_nombre;
        $_SESSION['email'] = $usuario_email;
        //header("Location: index.php");
        $msg = "ok";
    }
    else
    {
        $msg = "Ha habido un error al introducir el nuevo usuario";
    }
}
echo $msg;
?>
