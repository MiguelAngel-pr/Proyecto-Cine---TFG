<?php 
session_start(); 
include("funciones.php");
$msg = "";
$funcion = ($_POST['funcion']);
switch ($funcion)
{
    case "login":login(); break;
    case "registro":registro(); break;
    case "logout":logout(); break;
    case "comprobar_sesion":comprobarSesion(); break;
    case "actualiza_valores":actualizaValores(); break;
    case "actualiza_contraseña":actualizaContraseña(); break;
    case "consulta_tabla":consultaTabla(); break;
    case "obtener_avatar":obtenerUsuarioAvatar(); break;
}
function login()
{
    $usuario_nombre = limpiaPalabra($_POST['username']);
    $usuario_password = limpiaPalabra($_POST['password']);
    $recordar = ($_POST['recordar']);

    $mysqli = conectaBBDD(); //me conecto a la base de datos

    //Consulta Bien Hecha
    $consultaUsuario = $mysqli ->prepare("SELECT nombre_usuario, contraseña, avatar FROM usuarios WHERE nombre_usuario = '$usuario_nombre' or email = '$usuario_nombre'");
    $consultaUsuario -> execute();
    $consultaUsuario -> store_result();//guarda el resultado en la query
    $consultaUsuario -> bind_result($user_name, $user_pass, $user_avatar);//guarda en variables la consulta
    $consultaUsuario->fetch();
    $numUsuarios = $consultaUsuario -> num_rows;

    if($numUsuarios > 0)
    {
        if(password_verify($usuario_password,$user_pass))//Compruebo que la contraseña coincida con la hasheada de la base de datos
        {
            $_SESSION['username'] = $user_name;  

            $time = 3600;//1 hora
            //Creamos la cookie para mantener la sesión abierta
            if($recordar == 'true')
            {
                $time = 604800;//1 semana
            }
            $user_name_pass = password_hash($user_name, PASSWORD_BCRYPT);
            setcookie("sesion_activa", TRUE, time()+$time);
            setcookie("sesion_activa[usuario_nombre]", $user_name, time()+$time);
            setcookie("sesion_activa[usuario_nombre_pass]", $user_name_pass, time()+$time);
            if($user_avatar != null)
            {
                setcookie("sesion_activa[usuario_avatar]", 'si', time()+$time);
            }
            
            $msg = "ok";
        }
        else
        {
            $msg = "El usuario no existe o la contraseña es incorrecta";
        }
    }
    else
    {
        $msg = "El usuario no existe o la contraseña es incorrecta";
    }
    echo $msg;
}

function registro()
{
    $usuario_nombre = limpiaPalabra($_POST['newusername']);
    $usuario_email = limpiaPalabra($_POST['newemail']);
    $usuario_password = password_hash(limpiaPalabra($_POST['newpassword']), PASSWORD_BCRYPT);
    $mysqli = conectaBBDD(); //me conecto a la base de datos

    if(comprobarExistencia('usuarios','nombre_usuario',$usuario_nombre) == "si" && comprobarExistencia('usuarios','email',$usuario_email) == "si")
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
            $user_name_pass = password_hash($usuario_nombre, PASSWORD_BCRYPT);
            setcookie("sesion_activa[usuario_nombre]", $usuario_nombre, time()+3600);
            setcookie("sesion_activa[usuario_nombre_pass]", $user_name_pass, time()+3600);
            $msg = "ok";
        }
        else
        {
            $msg = "Ha habido un error al introducir el nuevo usuario";
        }
    }
    echo $msg;
}

function logout()
{  
    desactivaCookies();
    $_SESSION=[];
    session_destroy();
    $msg = "ok";
    echo $msg;
}

function comprobarSesion()
{
    if (isset($_COOKIE['sesion_activa'])) 
    {
        $_SESSION['username'] = $_COOKIE['sesion_activa']['usuario_nombre'];
        if ($_COOKIE['sesion_activa'] && password_verify($_COOKIE['sesion_activa']['usuario_nombre'],$_COOKIE['sesion_activa']['usuario_nombre_pass'])) 
        {
            $msg = "si";
        }
        else
        {
            $msg = "no";
        }
    }
    else
    {
        $msg = "No hay una sesión activa";
    }
    echo $msg;
}

function actualizaValores()
{
    $mysqli = conectaBBDD(); //me conecto a la base de datos
    $msg = "no";

    $usuario_actual = limpiaPalabra($_SESSION['userid']);
    $usuario_nombre = limpiaPalabra($_POST['newusername']);
    $usuario_email = limpiaPalabra($_POST['newemail']);
    $usuario_genero = limpiaPalabra(comprobarNulo($_POST['newgender']));
    $usuario_pais = limpiaPalabra(comprobarNulo($_POST['newcountry']));
    $usuario_nacimiento = limpiaPalabra(comprobarNulo($_POST['newbirthday']));
    $usuario_bio = limpiaPalabra(comprobarNulo($_POST['newbio']));
    $usuario_avatar = $_POST['newavatar'];    

    if(comprobarExistencia('usuarios','nombre_usuario',$usuario_nombre) == "no" && $usuario_nombre != $_SESSION['username'])
    {
        $actualizaUsuario = $mysqli ->prepare("UPDATE usuarios SET email = '$usuario_email', nombre_usuario = '$usuario_nombre', genero = '$usuario_genero', pais = '$usuario_pais', fecha_nacimiento = '$usuario_nacimiento', descripcion = '$usuario_bio', avatar = '$usuario_avatar' WHERE id_usuario = '$usuario_actual'");
        $actualizaUsuario -> execute();
        $usuariosAfectados = $mysqli -> affected_rows;         
        if($usuariosAfectados > 0)
        {
            $msg = "ok";
            $_SESSION['username'] = $usuario_nombre; 
            if ($_COOKIE['sesion_activa'] && !password_verify($_SESSION['username'] ,$_COOKIE['sesion_activa']['usuario_nombre_pass'])) 
            {
                $user_name_pass = password_hash($_SESSION['username'], PASSWORD_BCRYPT);
                setcookie("sesion_activa[usuario_nombre]", $_SESSION['username'], time()+3600);
                setcookie("sesion_activa[usuario_nombre_pass]", $user_name_pass, time()+3600);
            }            
        }
    }
    else
    {
        $msg = "no";
    }
    
    echo $msg;
}

function consultaTabla()
{
    $mysqli = conectaBBDD();
    $consulta = $mysqli ->prepare("SELECT * FROM usuarios WHERE nombre_usuario = ?");
    $consulta -> bind_param("s", $_SESSION['username']);
    $consulta -> execute();
    $consulta -> store_result();
    $consulta -> bind_result($user_id, $user_email, $user_name, $user_pass, $user_gender, $user_country, $user_birthday, $user_bio, $user_avatar);//guarda en variables la consulta
    $consulta->fetch();
    $numUsuarios = $consulta -> num_rows;

    $_SESSION['userid'] = $user_id;
    if($numUsuarios > 0)
    {
        $msg = array($user_email, $user_name, $user_gender, $user_country, $user_birthday, $user_bio, $user_avatar);
    }
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
}

function actualizaContraseña()
{
    $msg = "no";
    $mysqli = conectaBBDD(); 
    $usuario_actual = $_SESSION['userid'];
    $usuario_password = limpiaPalabra($_POST['oldpassword']);
    $consulta = $mysqli ->prepare("SELECT contraseña FROM usuarios WHERE id_usuario = $usuario_actual ;");
    $consulta -> execute();
    $consulta -> bind_result($user_pass);
    $consulta->fetch();
    if(password_verify($usuario_password,$user_pass))//Compruebo que la contraseña coincida con la hasheada de la base de datos
    {
        $mysqli2 = conectaBBDD(); 
        $usuario_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
        $sql = "UPDATE usuarios SET contraseña = '$usuario_password' WHERE id_usuario = $usuario_actual";
        if ($mysqli2 -> query($sql))
        {
            echo "ok";
        }
        else
        {
            echo $msg;
        }
    }
    else
    {
        echo $msg;
    }
}

function obtenerUsuarioAvatar()
{
    $mysqli = conectaBBDD(); 
    $usuario_actual = limpiaPalabra($_SESSION['username']);
    $resultado = mysqli_query($mysqli,"SELECT avatar FROM usuarios WHERE nombre_usuario = '$usuario_actual' AND avatar IS NOT NULL LIMIT 1");
    $msg = $resultado->fetch_assoc();
    if($msg["avatar"] == null)
    {
        echo 'no';
    }
    else
    {
        echo $msg["avatar"];
    }
}

?>