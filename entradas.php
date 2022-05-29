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
            <li class="dropdown"><a href="lista_cines.php"><span>Negocios</span> <i class="bi bi-chevron-down"></i></a>
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
      <div id="entradas">
        <h3 id="n_sala" class="text-center">Sala nº</h3>
        <div class="seccion_horizontal"><h6 id="idioma">Idioma: </h6>&nbsp;<p>|</p>&nbsp;&nbsp;<h6 id="subs">Subtitulos: </h6></div>
        <div class="movie-container text-center">
          <label>Película Seleccionada:</label>
          <select id="movie">
          </select>
        </div>

        <ul class="showcase">
          <li>
            <div class="seat"></div>
            <small>Disponible</small>
          </li>
          <li>
            <div class="seat selected"></div>
            <small>Seleccionado</small>
          </li>
          <li>
            <div class="seat sold"></div>
            <small>Vendido</small>
          </li>
        </ul>
        <div class="container_seats"></div>

        <p class="text">Has elegido <span id="count">0</span> asientos por el precio de <span id="total">0</span> €</p>  
        <div class="text-center"><button type="button" id="boton_compra" class="btn btn-outline-warning">Comprar</button></div> 
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
    $(document).ready(function(){
      
      comprobarSesion();
      obtenerDatosCompra();
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
          //console.log("Hola");
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

      $('#boton_compra').click(function(){
        var asientosSeleccionados = JSON.parse(localStorage.getItem("selectedSeats")).length;
        if(asientosSeleccionados == 0)
        {
          alert("Debes seleccionar al menos un asiento");
        }
        else
        {
          //Conseguir asientos seleccionados
          var filas = $('.row').length;
          var filaSeleccionada = document.querySelectorAll(".row");
          let array_asientos = new Array(asientosSeleccionados);
          let x = 0;
          for(let i = 0; i < filas; i++)
          {
            var asientos = filaSeleccionada[i].querySelectorAll(".seat").length;
            var asientoSeleccionado = filaSeleccionada[i].querySelectorAll(".seat");
            for(let j = 0; j < asientos; j++)
            {
              //console.log(asientoSeleccionado[j].className);
              if(asientoSeleccionado[j].className == 'seat selected')
              {
                //console.log(x);
                array_asientos[x] = new Array(2);
                array_asientos[x][0] = i;
                array_asientos[x][1] = j;
                x++;
                //console.log("Asiento Seleccionado: " + i + ", " + j);
              }
            }
          }
          var error = "no";
          //console.log(array_asientos);
          //console.log(asientosSeleccionados + ", " + array_asientos[0][0]);
          for(let i = 0; i < asientosSeleccionados; i++)
          {
            //console.log("Vuelta " + i);
            $.ajax(
            {  
              url:"entradas_funciones.php",  
              type:"POST",  
              data: {funcion:"añadir_entradas", fila_asiento:array_asientos[i][0], columna_asiento:array_asientos[i][1]},  
              success:function(msg) 
              { 
                //console.log(msg);
                if(msg != "ok")
                {
                  error = "si";
                }
              }
            });
          }

          if(error == "si")
          {
            alert("Ha habido un problema al introducir los datos");
          }
          else
          {
            alert("El envio ha sido tramitado correctamente");
            //document.getElementById('boton_inicio').click();   
          }
        }
      }); 
    });

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
    }

    function obtenerDatosCompra()
    {
      $.ajax(
      {  
        url:"entradas_funciones.php",  
        type:"POST",
        data: {funcion:"obtener_valores"},
        success:function(msg) 
        {
          //console.log("MSG: " + msg);
          if(msg == "no")
          {
            alert("La sesión no esta disponible");
            document.getElementById('boton_inicio').click();            
          }
          else
          {      
            let datos = $.parseJSON(msg);
            $('#n_sala').append(datos[1] + " - " + datos[4]);
            $('#idioma').append(datos[11]);
            $('#subs').append(datos[12]);

            var opt = document.createElement('option');
            opt.appendChild(document.createTextNode(datos[0]));
            opt.value = datos[13]; 
            movieSelect.appendChild(opt);
            ticketPrice = + movieSelect.value;

            
            //Formación de la sala asientos
            
            $.ajax(
            {  
              url:"entradas_funciones.php",  
              type:"POST",
              data: {funcion:"obtener_asientos_vendidos", horario:datos[5]},
              success:function(msg) 
              {
                if(msg != "no")
                {
                  var asientos_vendidos = $.parseJSON(msg);
                  formacionAsientos(asientos_vendidos, datos);
                }
                else
                {
                  formacionAsientos("", datos);
                }
              }
            });

            populateUI();
            updateSelectedCount();
          }           
        }
      });
    }

    function formacionAsientos(asientos_vendidos, datos)
    {
      var vendido = "";
      let n_asientos = 0;
      //console.log(asientos_vendidos);

      var total_html = "<div class='screen'></div>";
      for(let i = 0; i < datos[2]; i++)
      {
        var row = "<div class='row'>";
        var seat_html = "";
        for(let j = 0; j < datos[3]; j++)
        {
          vendido = "";
          if(asientos_vendidos != "")
          {
            if(asientos_vendidos[n_asientos]['asiento_fila'] == i && asientos_vendidos[n_asientos]['asiento_columna'] == j)
            {
              vendido = "sold";
              if(n_asientos < asientos_vendidos.length-1)
              {
                n_asientos++;
              }
            }
          }         
          seat_html = seat_html + "<div class='seat " + vendido + "'></div>";  
        }
        row = row + seat_html + "</div>";
        if(datos[2] >= 7)
        {
          if(i==1 || i == datos[2] - 3)
          {
            row = row + "<br>";
          }
        }
        total_html = total_html + row;
      }
      container.insertAdjacentHTML("afterbegin",total_html);  
    }

    const container = document.querySelector(".container_seats");
    const seats = document.querySelectorAll(".row .seat:not(.sold)");
    const count = document.getElementById("count");
    const total = document.getElementById("total");
    const movieSelect = document.getElementById("movie");
    let ticketPrice = + movieSelect.value;
    //Seleccion Asientos
    populateUI();

    

    // Save selected movie index and price
    function setMovieData(movieIndex, moviePrice) {
      localStorage.setItem("selectedMovieIndex", movieIndex);
      localStorage.setItem("selectedMoviePrice", moviePrice);
    }

    // Update total and count
    function updateSelectedCount() {
      const selectedSeats = document.querySelectorAll(".row .seat.selected");
      const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat));

      localStorage.setItem("selectedSeats", JSON.stringify(seatsIndex));
      const selectedSeatsCount = selectedSeats.length;
      count.innerText = selectedSeatsCount;
      total.innerText = selectedSeatsCount * ticketPrice;

      setMovieData(movieSelect.selectedIndex, movieSelect.value);
    }


    function populateUI() {
      const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));

      if (selectedSeats !== null && selectedSeats.length > 0) {
        seats.forEach((seat, index) => {
          if (selectedSeats.indexOf(index) > -1) {
            //console.log(seat.classList.add("selected"));
          }
        });
      }

      const selectedMovieIndex = localStorage.getItem("selectedMovieIndex");

      if (selectedMovieIndex !== null) {
        movieSelect.selectedIndex = selectedMovieIndex;
        //console.log(selectedMovieIndex)
      }
    }
    // Movie select event
    movieSelect.addEventListener("change", (e) => {
      ticketPrice = +e.target.value;
      setMovieData(e.target.selectedIndex, e.target.value);
      updateSelectedCount();
    });

    // Seat click event
    container.addEventListener("click", (e) => {
      if (
        e.target.classList.contains("seat") &&
        !e.target.classList.contains("sold")
      ) {
        e.target.classList.toggle("selected");

        updateSelectedCount();
      }
    });

    // Initial count and total set
    updateSelectedCount();
  </script>
</body>
</html>