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
        <button id="menu_usuario" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false"><div id="cuadro_usuario"><h6><?php echo $_SESSION['username']?></h6><img id="avatar" src="assets/img/avatar.png" alt="Avatar"></div></button>
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

  <!-- ======= Perfil ======= -->
    <div id="fondo2"></div>
    <div id="contenedor">
      <h3><i class="bi bi-person-fill"></i>Perfil</h3>
      <div id="perfil">
        <form onsubmit="return false">
          <div id="datos_img">
            <img id="img_perfil" src="assets/img/avatar.png" alt="">
            <div><label for="name">Avatar: </label><input class="editSelector" id="input_img" type="file" name="imagen_elegida" accept="image/png, image/jpeg" onchange="cambioImagen(this)"/></div>
          </div>
          <div id="datos">
            <div><label for="name">Usuario:</label><span class="text-danger">*</span><input id="cuadro_nombre" type="text" class="editField" maxlength="30" value="" readonly pattern="[a-zA-Z0-9].{5,}" title="El usuario debe tener entre 5 y 30 carácteres, y no puede contener carácteres especiales" required></div>
            <div><label for="name">Email: </label><span class="text-danger">*</span><input id="cuadro_email" type="email" class="editField" maxlength="50" value="" readonly pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{5,}$" required></div>
            <div>
              <label for="name">Género: </label>
              <select class="editSelector" id="cuadro_genero" name="pais">
                <option value=0>-</option>
                <option value=1>Femenino</option>
                <option value=2>Masculino</option>
                <option value=3>No binario</option>
              </select>
            </div>
            <div>
              <label for="name">País: </label>
              <select class="editSelector" id="cuadro_pais" name="pais">
                <option value=0>-</option>
                <option value=1>Argentina</option>
                <option value=2>Bolivia</option>
                <option value=3>Brasil</option>
                <option value=4>Canada</option>
                <option value=5>Chile</option>
                <option value=6>Colombia</option>
                <option value=7>Costa Rica</option>
                <option value=8>Cuba</option>
                <option value=9>Ecuador</option>
                <option value=10>El Salvador</option>
                <option value=11>España</option>
                <option value=12>Estados Unidos</option>
                <option value=13>Groenlandia</option>
                <option value=14>Guatemala</option>
                <option value=15>Guayana Francesa</option>
                <option value=16>Guyana</option>
                <option value=17>Haiti</option>
                <option value=18>Honduras</option>
                <option value=19>Islas Malvinas</option>
                <option value=20>Mexico</option>
                <option value=21>Nicaragua</option>
                <option value=22>Panama</option>
                <option value=23>Paraguay</option>
                <option value=24>Peru</option>
                <option value=25>Puerto Rico</option>
                <option value=26>Republica dominicana</option>
                <option value=27>Surinam</option>
                <option value=28>Uruguay</option>
                <option value=29>Venezuela</option>
              </select>
            </div>
            <div><label for="name">Fecha Nacimiento: </label><input type="date" class="editSelector" id="cuadro_fecha" name="date" min="1922-01-01" max="2022-05-20" disabled></div>
            <div id="descripcion"><label for="name">Descripción: </label><textarea id="cuadro_descripcion" type="text" class="editField" maxlength="250" value="" pattern="[a-zA-Z0-9]" title="La descripción puede tener como máximo 250 carácteres, y no puede contener carácteres especiales" readonly></textarea></div>
            <div>
              <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" href="#cambio_contraseña">Cambiar Contraseña</button>
              <div class="modal fade" id="cambio_contraseña" tabindex="-1" aria-hidden="true">
                <form onsubmit="return false">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 style="color:black" class="modal-title">Cambio de Contraseña</h3>
                        <button id="cerrar_modal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div id="error" class="alert alert-danger" role="alert"></div>
                        <div class="mb-3 input_contraseña">
                          <label for="oldpassword">Antigua Contraseña<span class="text-danger">*</span></label><input type="password" name="oldpassword" class="form-control" id="oldpass" required >
                        </div>
                        <div class="mb-3 input_contraseña">
                          <label for="oldpassword">Nueva Contraseña<span class="text-danger">*</span></label><input type="password" name="newpassword" class="form-control" id="newpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La contraseña debe contener al menos un numero, una mayúsculas y una minúscula, y debe tener 6 o más carácteres" required >
                        </div>
                        <div class="mb-3 input_contraseña">
                          <label for="oldpassword">Repite la Nueva Contraseña<span class="text-danger">*</span></label><input type="password" name="newpassword2" class="form-control" id="newpass2" required >      
                        </div>
                      </div>
                      <div class="modal-footer pt-3">                  
                        <button id="btn_cambiar" class="btn btn-success mx-auto w-100" style="background:#ff5821">Cambiar</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="seccion_horizontal"><a class="btn btn-danger editBtn" style="margin-right: 10px;" >Editar</a><button id="btn_guardar" type="button" href="#" class="btn btn-success">Guardar Cambios</button></div>
          </div>
        </form>   
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
        $('.editBtn').click(function () {
            if ($('.editField').is('[readonly]')) 
            { 
                $('.editField').prop('readonly', false);
                $('.editSelector').prop('disabled', false);
                $('.editBtn').html('Dejar de Editar'); 
                $('.editBtn').css("background", "orange"); 
                $('.editBtn').css("border", "orange"); 
            } 
            else 
            { 
                $('.editField').prop('readonly', true);
                $('.editSelector').prop('disabled', true);
                $('.editBtn').html('Editar');
                $('.editBtn').css("background", "red");
            }
        });

        comprobarSesion();
              
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

      //Actualiza Valores
      $('#btn_guardar').click(function(){
        var newusername = $('#cuadro_nombre').val();
        var newemail = $('#cuadro_email').val();
        var newgender = $('#cuadro_genero option:selected').text();
        var newcountry = $('#cuadro_pais option:selected').text();
        var newbirthday = $('#cuadro_fecha').val();
        var newbio = $('#cuadro_descripcion').val();
        var newavatar = document.getElementById('img_perfil').getAttribute("src");

        $.ajax(
        {  
          url:"login.php",  
          type:"POST",  
          data: {newusername:newusername, newemail:newemail, newgender:newgender, newcountry:newcountry, newbirthday:newbirthday, newbio:newbio, newavatar:newavatar, funcion:"actualiza_valores"},  
          success:function(msg) 
          { 
            //console.log(msg);
            if(msg == 'ok')
            {
              alert("Se han actualizado los valores");
              location.reload();
            }
            else
            {
              alert("Ha habido un error al actualizar los datos");
            }
          }
        });
      });

      //Cambio de contraseña
      $('#btn_cambiar').click(function(){
        var oldpassword = $('#oldpass').val();
        var newpassword = $('#newpass').val();
        var newpassword2 = $('#newpass2').val();

        if(newpassword == newpassword2 && !newpassword.includes(oldpassword))
        {
          //console.log('PASS OK');
          $.ajax(
          {  
            url:"login.php",  
            type:"POST",  
            data: {oldpassword:oldpassword, newpassword:newpassword, funcion:"actualiza_contraseña"},  
            success:function(msg) 
            { 
              //console.log(msg);
              if(msg == 'ok')
              {
                alert("La contraseña se ha actualizado correctamente");
                document.getElementById('cerrar_modal').click();
                location.reload();
              }
              else
              {
                $('#error').css('display','block'); 
                setTimeout(function(){$('#error').css('display','none');}, 6000);
                document.getElementById('error').textContent = "Ha habido un error al actualizar la contraseña";
              }
            }
          });
        } 

        else
        {
          $('#error').css('display','block'); 
          setTimeout(function(){$('#error').css('display','none');}, 6000);
          document.getElementById('error').textContent = 'Las contraseñas deben coincidir y no ser similares a la antigua';  
        }
      });
    });

    function cambioImagen(target) //si la imagen tiene el peso correcto cambia la imagen anterior por la nueva
    {
      var imagen = target.files[0];
      var peso = target.files[0].size;
      //console.log(peso);
      if(peso < 3000000)
      {
        loadImage(imagen);
      }
      else
      {
        alert("La imagen no puede superar los 3 Mb");
        document.getElementById("input_img").value = "";
      }
    }

    function loadImage(imagen) //carga la imagen si esta tiene las dimensiones correctas
    {
      var _url = window.URL || window.webkitURL;
      var img = new Image();
      img.src = _url.createObjectURL(imagen);
      var proporcion = 0;
      img.onload = function(){
        var ancho = img.width;
        var alto = img.height;
        //console.log(ancho + ' ' + alto + ' ' + ancho/alto);
        proporcion = (ancho/alto).toFixed(2);
        if(proporcion < 1.20 && proporcion > 0.80 && alto > 150)
        {
          var reader = new FileReader();
          reader.readAsDataURL(imagen);
          reader.onloadend = function () {
            document.getElementById("img_perfil").src = reader.result;
            document.getElementById("avatar").src = reader.result;
          }
        }
        else
        {
          alert("La imagen no puede tener menos de 150px de ancho y de alto y debe tener una proporcion de 1,2 o 0,8");
        }
      } 
    }

    function comprobarSesion(){//Comprueba si estas conectado para desconectarte o no
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
              data: {funcion:"consulta_tabla"},
              success:function(msg) 
              {
                  
                let datos = $.parseJSON(msg);//Me paso el array con los datos
                document.getElementById('cuadro_email').value = datos[0];
                document.getElementById('cuadro_nombre').value = datos[1];
                $('.editSelector').prop('disabled', false);
                seleccionaOpcionActual('cuadro_genero',datos[2]);
                seleccionaOpcionActual('cuadro_pais',datos[3]);
                document.getElementById('cuadro_fecha').value = datos[4];
                $('.editSelector').prop('disabled', true);
                document.getElementById('cuadro_descripcion').value = datos[5];
                
                if(datos[6] != null)
                {
                  document.getElementById('img_perfil').src = datos[6];
                  document.getElementById('avatar').src = datos[6];
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

    function seleccionaOpcionActual(nombre, valor)//selecciona en el selector la opcion que le digas
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
  </script>
</body>
</html>