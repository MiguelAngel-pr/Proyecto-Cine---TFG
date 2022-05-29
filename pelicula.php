<?php
if (session_status() !== PHP_SESSION_ACTIVE) //Con esto detecto si la sesión esta iniciada ya
{
    session_start();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Galaxy Cinema</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/icono.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/extended-carousel.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
  <!-- ======= Barra Superior ======= -->
    <section id="topbar" class="d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:cinegalaxy@gmail.com">cinegalaxy@gmail.com</a></i>
          <i style="margin-right:5px;" class="bi bi-phone d-flex align-items-center ms-4"><span>+34 916738191</span></i>
        </div>
        <button id="menu_usuario" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false"><div id="cuadro_usuario"><h6><?php  if (isset($_SESSION['username'])){ echo $_SESSION['username']; } ?></h6><img id="avatar" src="assets/img/avatar.png" alt="Avatar"></div></button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
          <li><a href="perfil.php"><button class="dropdown-item" type="button"><i class="bi bi-person-lines-fill"></i>  Mi Perfil</button></a></li>
          <li><a href="entradas_usuario.php"><button class="dropdown-item" type="button"><i class="bi bi-card-checklist"></i>  Mis Entradas</button></a></li>
          <li><button id="boton_logout" class="dropdown-item" type="button"><i class="bi bi-box-arrow-left"></i>  Logout</button></li>
        </ul>
        <button id="boton_modal" type="button" class="btn btn-success" style="background:#ffa343; margin-left: 20px; border-radius: 0;" data-bs-toggle="modal" href="#login">Iniciar Sesión</button>

        <!-- Modal Login -->
          <div class="modal fade" id="login" tabindex="-1" aria-hidden="true">
            <form onsubmit="return false">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 style="color:black" class="modal-title">Inicio de Sesión</h5>
                    <button id="cerrar" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div id="error" class="alert alert-danger" role="alert"></div>
                    <div class="mb-3">
                        <label style="color:black" for="username">Nombre de Usuario/Email<span class="text-danger">*</span></label>
                        <input name="username" class="form-control" id="username" required>
                    </div>

                    <div class="mb-3">
                        <label style="color:black" for="password">Contraseña<span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <div class="mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="remember">
                        <label style="color:black" class="form-check-label" for="remember">Recuerdame</label>
                        <a data-bs-target="#olvidado" data-bs-bac="false" data-bs-toggle="modal" data-bs-dismiss="modal" href="#" class="float-end">¿Olvidaste tu contraseña?</a>
                    </div>
                  </div>
                  <div class="modal-footer pt-4">                  
                    <button id="boton_login" class="btn btn-success mx-auto w-100" style="background:#ff5821">Entrar</button>
                  </div>
                  <p style="color:black" class="text-center">¿No tienes cuenta?,  <a data-bs-target="#registro" data-bs-bac="false" data-bs-toggle="modal" data-bs-dismiss="modal" href="#">Registrate</a></p> 
                </div>
              </div>
            </form>
          </div>

        <!-- Modal Registro -->
          <div class="modal fade" id="registro" role="dialog" tabindex="-1" aria-hidden="true">
            <form onsubmit="return false">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 style="color:black" class="modal-title">Registro</h5>
                    <button id="cerrar2" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div id="error2" class="alert alert-danger" role="alert"></div>
                    <div id="ok" class="alert alert-success" role="alert"></div>

                    <div class="mb-3">
                        <label style="color:black" for="newusername">Nombre de Usuario<span class="text-danger">*</span></label>
                        <input type="name" name="newusername" class="form-control" id="newusername" placeholder="Introduce tu nombre de usuario" maxlength="30" pattern="[a-zA-Z0-9].{5,}" title="El usuario debe tener entre 5 y 30 carácteres, y no puede contener carácteres especiales" required>
                    </div>

                    <div class="mb-3">
                        <label style="color:black" for="newemail">Email<span class="text-danger">*</span></label>
                        <input type="email" name="newemail" class="form-control" id="newemail" placeholder="Introduce tu email" maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                    </div>

                    <div class="mb-3">
                        <label style="color:black" for="newpassword">Nueva Contraseña<span class="text-danger">*</span></label>
                        <input type="password" name="newpassword" class="form-control" id="newpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La contraseña debe contener al menos un numero, una mayúsculas y una minúscula, y debe tener 6 o más carácteres" required>
                    </div>

                    <div class="mb-3">
                        <label style="color:black" for="newpassword2">Repite tu Contraseña<span class="text-danger">*</span></label>
                        <input type="password" name="newpassword2" class="form-control" id="newpassword2" required>
                    </div>
                  </div>
                  <div class="modal-footer pt-4">                  
                    <button id="boton_registro" class="btn btn-success mx-auto w-100" style="background:#ff5821">Registrarte</button>
                  </div>
                  <p style="color:black" class="text-center">¿Ya tienes cuenta?, <a data-bs-target="#login" data-bs-toggle="modal" data-bs-dismiss="modal" href="">Inicia Sesión</a></p> 
                </div>
              </div>
            </form>
          </div>

        <!-- Modal Recuperación Contraseña -->
          <div class="modal fade" id="olvidado" tabindex="-1" aria-hidden="true">
            <form>
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 style="color:black" class="modal-title">¿Has Olvidado tu Contraseña?</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-2">
                        <input type="email" name="emailpass" class="form-control" id="EmailPass" placeholder="Introduce tu email" required >
                    </div>
                  </div>
                  <div class="modal-footer pt-3">                  
                    <button type="submit" class="btn btn-success mx-auto w-100" style="background:#ff5821">Recuperar Contraseña</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
    </section>

  <!-- ======= Header ======= -->
    <header id="header" style="height: 70px;" class="d-flex align-items-center">
      <div class="container d-flex align-items-center justify-content-between">
        <a id="boton_inicio" href="index.php"><img style="width:75px" src="assets/img/cineGalaxy.png" alt=""></a>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto" href="">Todas las Películas</a></li>
            <li><a class="nav-link scrollto" href="">Proximos Estrenos</a></li>
            <li><a class="nav-link scrollto " href="contacto.php">Contacto</a></li>
            <li><a class="nav-link scrollto" href="lista_cines.php">Lista de Cines</a></li>
            <li><a class="nav-link scrollto" href="">Promociones</a></li>
            <li class="dropdown"><a href=""><span>Negocios</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="">Colaboradores</a></li>
              </ul>
              <ul>
                <li><a href="">Unete a nosotros!</a></li>
              </ul>
            </li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
      </div>
    </header>

  <!-- ======= Película ======= -->
    <div id="fondo2"></div>
    <div id="contenedor">
      <div id="pelicula">
        <div id="pelicula_datos_img">
          <div id="titulo_pelicula" class="seccion_cine text-center"><h4>-</h4></div>
          <div id="img_trailer" class="seccion_cine">
            <img src="assets/img/pelicula_default.jpg">
            <button id="boton_trailer" type="button" class="btn btn-success" data-bs-toggle="modal" href="#modal_trailer"><i class="bi bi-play-fill"></i></button>
            <div class="modal fade" id="modal_trailer" role="dialog" tabindex="-1" aria-hidden="true">
              <form>
                <div class="modal-dialog modal-dialog-centered modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <iframe frameborder="0" id="iframeVideo" src="" allow="accelerometer; autoplay; encrypted-media;" allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div>
            <div class="seccion_horizontal">
              <div class="seccion_cine">
                <span class="imdbRatingPlugin" data-user="ur153070837" data-title="" data-style="p1">
                  <a href=""><img src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/images/imdb_46x22.png"/></a>
                </span>
              </div>
              <div id="fecha_estreno_pelicula" class="seccion_cine" ><i class="bi bi-calendar"></i>&nbsp;&nbsp;<b>-</b></div>
            </div>  
          </div>    
        </div>
        <div id="pelicula_datos">
          <br>
          <div id="info_pelicula" class="seccion_cine">
            <div class="seccion_horizontal2"><label><b>Título Original: </b></label><p id="tit_original">-</p></div>
            <div class="seccion_horizontal2"><label><b>País de Origen: </b></label><p id="pais_origen">-</p></div>
            <div class="seccion_horizontal2"><label><i class="bi bi-clock"></i>&nbsp;&nbsp;<b>Duración: </b></label><p id="duracion">-</p></div>
            <div class="seccion_horizontal2"><label><i class="bi bi-caret-right"></i>&nbsp;&nbsp;<b>Dirección: </b></label><p id="direccion">-</p></div>
            <div class="seccion_cine"><label><b>Sinopsis:</b></label><textarea id="descripcion_pelicula" readonly>-</textarea></div>
          </div> 
          
          <div id="compra_entradas" class="seccion_cine">
            <form onsubmit="return false">
              <div class="seccion_cine"><h4>Compra de Entradas</h4></div>
              <div id="seleccion_entradas">
                <div class="seccion_cine">
                  <label for="name">Selecciona el Cine:&nbsp;</label>
                  <select id="cuadro_cine" name="cine" onchange="cambiaHorario()">
                    <option value=0>-</option>
                  </select>
                </div>
                <div class="seccion_cine">
                  <label for="name">Selecciona la Hora:</label>
                  <select id="cuadro_horario" name="horario">
                    <option value=0>-</option>
                  </select>
                </div>
              </div>
              <div class="text-center"><button type="button" id="boton_comprar" class="btn btn-warning">Comprar</button></div> 
            </form>
          </div>
        </div>
      </div>  
    </div>
    <div id="fondo2"></div>

  <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 footer-contact">
              <h3><i class="bi bi-stars" style="color:#ff5821"></i>Cine Galaxy</h3>
              <p>
                C/ Santa Isabel, 3<br>
                28012 Madrid<br>
                España <br><br>
                <strong>Teléfono:</strong> +34 916738191<br>
                <strong>Email:</strong> cinegalaxy@gmail.com<br>
              </p>
            </div>

            <div class="col-lg-2 col-md-6 footer-links">
              <h4>Eventos</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Estrenos</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Musicales</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Teatro</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Ópera</a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Ayuda</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Preguntas Frecuentes</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Contacto</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Política de privacidad</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Gestión de cookies</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Aviso Legal</a></li>
              </ul>
            </div>

            <div class="col-lg-4 col-md-6 footer-newsletter">
              <h4>Unete a nuestro boletín</h4>
              <p>Recibirás las últimas noticias sobre los próximos estrenos, eventos y promociones limitadas.</p>
              <form action="" method="post">
                <input type="email" name="email"><input type="submit" value="Suscribirte">
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="container d-lg-flex py-4">
        <div class="me-lg-auto text-center text-lg-start">
          <div class="copyright">
            &copy; Copyright <strong><span>Galaxy</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">Miguel</a>
          </div>
        </div>
        <div class="social-links text-center text-lg-right pt-3 pt-lg-0">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>
    </footer><!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Archivos JS -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/extended-carousel.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

  <script>
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    var idpelicula = urlParams.get('pelicula');

    $(document).ready(function(){
      comprobarSesion();
      //console.log(getCookie("sesion_activa[usuario_nombre]"));
      //document.getElementById('cuadro_nombre').value = getCookie("sesion_activa[usuario_nombre]");
    
      $('#boton_registro').click(function(){
        $('#error2').css('display','none');
        var newusername = $('#newusername').val();
        var newemail = $('#newemail').val();
        var newpassword = $('#newpassword').val();
        var newpassword2 = $('#newpassword2').val();
        //console.log('Datos: ' + newusername + ' ' + newemail + ' ' + newpassword + ' ' + newpassword2 + '');
        if(newpassword != newpassword2)
        {
          $('#error2').css('display','block'); 
          setTimeout(function(){$('#error2').css('display','none');}, 6000);
          document.getElementById('error2').textContent = 'Las contraseñas deben coincidir';
        }
        else
        {
          $.ajax(
          {  
            url:"login.php",  
            type:"POST",  
            data: {newusername:newusername, newemail:newemail, newpassword:newpassword, funcion:"registro"},  
            success:function(msg) 
            { 
              //console.log(msg);
              $('#ok').css('display','none'); 
              $('#error2').css('display','none'); 
              if(msg == 'ok')
              {
                $('#ok').css('display','block'); 
                setTimeout(
                  function(){$('#ok').css('display','none'); 
                  document.getElementById('cerrar2').click();
                  location.reload();
                }, 6000);
                document.getElementById('ok').textContent = 'El usuario se ha añadido correctamente';
                $('#boton_modal').css('display','none'); 
                $('#menu_usuario').css('display','flex'); 
              }
              else
              {
                $('#error2').css('display','block'); 
                setTimeout(function(){$('#error2').css('display','none');}, 6000);
                document.getElementById('error2').textContent = msg;
              }
            }
          });
        }
      });

      $('#boton_login').click(function(){
        $('#error').css('display','none');
        var username = $('#username').val();
        var password = $('#password').val();
        var recordar = false;
        if ($("#remember").prop('checked')) 
        {
          recordar = true;
        }
        $.ajax(
        {  
          url:"login.php",  
          type:"POST",  
          data: {username:username, password:password, recordar:recordar, funcion:"login"},  
          success:function(msg) 
          { 
            //console.log(msg);
            if(msg == 'ok')
            {
              document.getElementById('cerrar').click();
              $('#boton_modal').css('display','none'); 
              $('#menu_usuario').css('display','flex');  
              location.reload();
            }
            else
            {
              $('#error').css('display','block'); 
              setTimeout(function(){$('#error').css('display','none');}, 6000);
              document.getElementById('error').textContent = msg;
            }
            //console.log(idpelicula);
          }
        });
      });

      $('#boton_logout').click(function(){
        $.ajax(
        {  
          url:"login.php",  
          type:"POST",  
          data: {funcion:"logout"},  
          success:function(msg) 
          { 
            if(msg == 'ok')
            {
              $('#boton_modal').css('display','block'); 
              $('#menu_usuario').css('display','none'); 
            }
            location.reload();
          }
        });
      });

      $('#boton_comprar').click(function(){
        var id_cine = $('#cuadro_cine option:selected').val();
        var id_sala = $('#cuadro_horario option:selected').val();
        var seleccion_horario = $('#cuadro_horario option:selected').text();

        let separacion = seleccion_horario.indexOf(" | ");
        let dia = seleccion_horario.substring(0, 1);
        let hora = seleccion_horario.substring(separacion+3, seleccion_horario.length);

        const hoy = new Date(Date.now());
        let hoy2 = new Date(hoy.getTime() - 30*60000);//La fecha de hoy 30 min antes
        const diaActual = 9 //hoy.getDay();
        const horaLimite = hoy2.toLocaleTimeString();
        //console.log(hora+", "+horaLimite+", "+dia+", "+diaActual);
        
        if(seleccion_horario != "-" && seleccion_horario.includes(" | "))
        {
          if(diaActual == dia && horaLimite > hora)
          {
            alert("La sesión ya esta en curso");
          }
          else
          {
            //console.log("BIEN")
            $.ajax(
            {  
              url:"entradas_funciones.php",  
              type:"POST",  
              data: {funcion:"preparar_compra", cine:id_cine, hora:hora, sala:id_sala, pelicula:idpelicula},  
              success:function(msg) 
              { 
                //console.log(msg);
                if(msg == 'ok')
                {
                  $('#boton_modal').css('display','block'); 
                  $('#menu_usuario').css('display','none'); 
                  location.href = "entradas.php";
                }
                else
                {
                  alert("Por el momento la compra de entradas no esta disponible");
                }
              }
            });
          }
        }
        else
        {
          alert("Debes seleccionar una hora!");
        }
      });

      $('.modal').on('hidden.bs.modal', function (e){
        $iframe = $(this).find("iframe");
        $iframe.attr("src", $iframe.attr("src"));
      });
    });

    function getCookie(cname) 
    {
      try
      {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for(let i = 0; i <ca.length; i++) {
          let c = ca[i];
          while (c.charAt(0) == ' ') {
            c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
          }
        }
      }
      catch (e)
      {
        return "no";
      }   
      return "no";
    }

    function comprobarSesion(){
      $.ajax(
      {  
        url:"login.php",  
        type:"POST",
        data: {funcion:"comprobar_sesion"},
        success:function(msg) 
        {
          //console.log("COOKIE: " + msg);
          if(msg == 'si')
          {
            $('#boton_modal').css('display','none'); 
            $('#menu_usuario').css('display','flex'); 
            
            $.ajax(
            {  
              url:"login.php",  
              type:"POST",
              data: {funcion:"obtener_avatar"},
              success:function(msg) 
              {
                if(msg != "no")
                {
                  document.getElementById('avatar').src = msg;
                }
              }
            });
          }
        }
      });
  
      $.ajax(
      { 
        
        url:"cine_funciones.php",  
        type:"POST",
        data: {funcion:"consulta_pelicula", idpelicula:idpelicula},
        success:function(msg) 
        {  
          if($.parseJSON(msg) == 'no')
          {
            document.getElementById('boton_inicio').click();
            alert("La pelicula no se encuentra disponible");
          }   
          else
          {
            let datos = $.parseJSON(msg);//Me paso el array con los datos
            $('#titulo_pelicula h4').text(datos[1]);
            if(datos[2] != null)
            {
              $('#tit_original').text(datos[2]);
            }
            
            $('#pais_origen').text(datos[3]);
            $('#duracion').text(datos[5] + " min");
            $('#direccion').text(datos[10]);
            $('#fecha_estreno_pelicula').find('b').text(datos[4]);

            $('#descripcion_pelicula').text(datos[6]);
            $('#descripcion_pelicula').css('height', $('#descripcion_pelicula').get(0).scrollHeight + "px");

            document.getElementById('iframeVideo').src = "https://www.youtube.com/embed/" + datos[7];
            $('#img_trailer').find('img').attr("src", "assets/img/pelicula" + idpelicula + ".jpg");

            //IMBD
            $('.imdbRatingPlugin').find('a').attr("href", "https://www.imdb.com/title/" + datos[9] + "/?ref_=plg_rt_1");
            $('.imdbRatingPlugin').attr("data-title", ""+datos[9]);
            actualizaValorImbd();
            
            //console.log(datos[8]);
            if(datos[8] != 0)
            {
              //console.log("HOLA");
              if(datos[8] == 2)
              {
                $('#compra_entradas').find('h4').text("Reserva de Entradas");
                $('#boton_comprar').text("Reservar");
              }
              obtenerLista(idpelicula);
            }
            else
            {
              deshabilitarPelicula();
            }
            //console.log(msg);
          }        
        }
      });
    }

    function seleccionaOpcionActual(nombre, valor)
    {
      var lg_selector = document.getElementById(nombre).length;
      for(var i=0; i<lg_selector; i++)
      {
        if(document.getElementById(nombre).options[i].text == valor)
        {
          document.getElementById(nombre).options[i].selected = true; 
        }
      }
    }

    function actualizaValorImbd()
    {
      (function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;js.src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/js/rating.js";stags.parentNode.insertBefore(js,stags);})
      (document,"script","imdb-rating-api");
    }

    function obtenerLista(idpelicula)
    {
      $.ajax(
      { 
        url:"cine_funciones.php",  
        type:"POST",
        data: {funcion:"obtener_cines", idpelicula:idpelicula},
        success:function(msg) 
        {
          //console.log("DATOS CINE: " + msg);
          if($.parseJSON(msg) != "no")
          {
            let datos = $.parseJSON(msg);

            //console.log(datos.length);
            for(let i=0; i<datos.length; i++)
            {
              var opt = document.createElement('option');
              var info = datos[i]['ciudad'];
              if(datos[i]['nombre'] != null)
              {
                info = datos[i]['ciudad'] + " - " + datos[i]['nombre'];
              }
              opt.appendChild(document.createTextNode(info));
              opt.value = (datos[i]['id_cine']) + ''; 

              document.getElementById('cuadro_cine').appendChild(opt);
            }
          }
          else
          {
            deshabilitarPelicula();
          }
        }  
      });
    }

    function cambiaHorario()
    {
      var seleccionValor = $('#cuadro_cine option:selected').val();
      var opcionSeleccionada = $('#cuadro_cine option:selected').text();
      //console.log(seleccionValor);

      $('#cuadro_horario').empty();
      $('#cuadro_horario').append('<option selected="selected" value="0">-</option>');
      if(opcionSeleccionada != "-")
      {
        $.ajax(
        { 
          url:"cine_funciones.php",  
          type:"POST",
          data: {funcion:"obtener_horarios", idcine:seleccionValor, idpelicula:idpelicula},
          success:function(msg) 
          {
            //console.log("DATOS HORARIO: " + msg);
            if($.parseJSON(msg) != 'no')
            {
              let datos = $.parseJSON(msg);

              //console.log(datos.length);
              for(let i=0; i<datos.length; i++)
              {
                var fecha = (new Date (datos[i]['fecha']));
                fecha = fecha.toLocaleDateString("es-ES", { month: 'long', day: 'numeric' });
                var opt = document.createElement('option');
                var info = fecha + " | " + datos[i]['hora'];
                opt.appendChild(document.createTextNode(info));
                opt.value = (datos[i]['sala']) + ''; 

                // console.log("Dato1: " + fecha);
                // console.log("Dato2: " + datos[i]['hora']);
                // console.log("Dato3: " + datos[i]['sala']);
                document.getElementById('cuadro_horario').appendChild(opt);
              }
            }
            else
            {
              $('#cuadro_horario').prop('disabled', true);
              $('#cuadro_horario option').text("No hay sesiones próximas en este cine");
              //console.log("No hay sesiones próximas en este cine");
            }
          }  
        });
      }
    }

    function deshabilitarPelicula()
    {
      $('#boton_comprar').prop('disabled', true);
      $('#cuadro_cine').prop('disabled', true);
      $('#cuadro_horario').prop('disabled', true);
      $('#cuadro_cine option').text("La película no esta disponible");
      //console.log("La película no esta disponible");
    }
  </script>
</body>
</html>