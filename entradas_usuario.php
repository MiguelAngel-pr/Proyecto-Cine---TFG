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
        <button id="menu_usuario" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false"><div id="cuadro_usuario"><h6><?php if (isset($_SESSION['username'])){ echo $_SESSION['username']; }?></h6><img id="avatar" src="assets/img/avatar.png" alt="Avatar"></div></button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
          <li><a href="perfil.php"><button class="dropdown-item" type="button"><i class="bi bi-person-lines-fill"></i>  Mi Perfil</button></a></li>
          <li><a href="entradas_usuario.php"><button class="dropdown-item" type="button"><i class="bi bi-card-checklist"></i>  Mis Entradas</button></a></li>
          <li><button id="boton_logout" class="dropdown-item" type="button"><i class="bi bi-box-arrow-left"></i>  Logout</button></li>
        </ul>
      </div>
    </section>

  <!-- ======= Header ======= -->
    <header id="header" style="height: 70px;" class="d-flex align-items-center">
      <div class="container d-flex align-items-center justify-content-between">
        <a id="boton_inicio" href="index.php"><img style="width:75px" src="assets/img/cineGalaxy.png" alt=""></a>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto" href="eleccion_peliculas.php">Todas las Películas</a></li>
            <li><a class="nav-link scrollto" href="eleccion_peliculas.php?estrenos=si">Proximos Estrenos</a></li>
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

  <!-- ======= Mis Entradas ======= -->
    <div id="fondo2"></div>
    <div id="contenedor">
        <table id="tabla_entradas" class="table table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col">Nº Sala</th>
                    <th scope="col">Fila</th>
                    <th scope="col">Nº Asiento</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Idioma</th>
                    <th scope="col">Cine</th>
                    <th scope="col">Película</th>
                    <th scope="col">Usuario</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>-</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>-</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>-</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>-</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>-</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>-</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>-</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>-</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>-</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>-</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class="row align-items-center">
            <div class="col">
                <button id="boton_izq" onclick="cambioPagina('-')"><i class="bi bi-arrow-left-short"></i></button>
            </div>
            <div class="col text-center">
                <p id="n_pagina">1</p>
            </div>
            <div class="col text-end">
                <button id="boton_der" onclick="cambioPagina('+')"><i class="bi bi-arrow-right-short"></i></button>
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
    $('#boton_izq').prop('disabled', true);
    let n_pagina = 0;
    comprobarSesion(); 
    construyeTabla();
    $(document).ready(function(){
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
              document.getElementById('boton_inicio').click();
            }
          }
        });
      });
    });

    function comprobarSesion(){//Comprueba si estas conectado para enviarte al inicio o no
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
                  //console.log(msg);
                  document.getElementById('avatar').src = msg;
                }
              }
            });
          }
          else
          {
            document.getElementById('boton_inicio').click();
          }
        }
      });
    }

    function construyeTabla(){
      $.ajax(
      {  
        url:"entradas_funciones.php",  
        type:"POST",
        data: {funcion:"obtener_entradas_usuario"},
        success:function(msg) 
        {
          console.log("DATOS: " + msg);
          if(msg != "no")
          {
            var datos_tabla = $.parseJSON(msg);
            console.log("DATOS1" + datos_tabla.length + ", " + n_pagina);
            if(datos_tabla.length <= (9*(n_pagina+1)))
            {
                $('#boton_der').prop('disabled', true);
            }
            formacionTabla(datos_tabla);
          }
          else
          {
            $('#boton_der').prop('disabled', true);
            if(n_pagina != 0)
            {
                limpiaTabla();
            }
          }
        }
      });
    }
    
    function formacionTabla(datos_tabla)//forma la tabla a partir de las entradas compradas por el usuario
    {
        console.log("DATOS2" + datos_tabla.length + ", " + n_pagina);
        if(datos_tabla.length >= (9*n_pagina))
        {
            var titulos = document.querySelectorAll("thead tr th");
            var filaSeleccionada = document.querySelectorAll("tbody tr");
            for(let i = 0; i < filaSeleccionada.length; i++)
            {
                var columnaSeleccionada = filaSeleccionada[i].querySelectorAll("td");
                for(let j = 0; j < columnaSeleccionada.length; j++)
                {
                    
                    if(i < datos_tabla.length - (9*n_pagina))
                    {
                        columnaSeleccionada[j].textContent = datos_tabla[i + (9*n_pagina)][j];
                    }
                }
            }
        }
        else
        {
            $('#boton_der').prop('disabled', true);
        }
    }

    function cambioPagina(direccion)
    {
        $('#boton_der').prop('disabled', false);
        n_pagina += parseInt(direccion + 1);
        //$('#n_pagina').text("Hola");
        $('#n_pagina').text(parseInt(n_pagina + 1));
        console.log(n_pagina);
        construyeTabla();
        limpiaTabla();
        if(n_pagina != 0)
        {
            $('#boton_izq').prop('disabled', false);
        }
        else
        {
            $('#boton_izq').prop('disabled', true);
        }
    }

    function limpiaTabla()
    {
        $('#tabla_entradas').find('td').empty();
        $('#tabla_entradas').find('td:first-child').text('-');
    }
  </script>
</body>
</html>