<?php
	if (isset($_POST["submit"])) {
		$nombre = $_POST['nombre'];
		$email = $_POST['email'];
		$mensaje = $_POST['mensaje'];
		$from = 'Contacto Web NBL'; 
		$to = 'contacto@nbl.cl'; 
		$subject = 'Mensaje Contacto Web NBL ';
		
		$body ="De: $nombre\n E-Mail: $email\n Mensaje:\n $mensaje";

    // Revisar si el nombre fue ingresado
    if (!$_POST['nombre']) {
        $errnombre = 'Introduzca su nombre y apellido';
    }
    
    // Revisar si email fue ingresado y es valido
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errEmail = 'Introduzca un email valido';
    }
    
    // Revisar si fue ingresado uin mensaje
    if (!$_POST['mensaje']) {
        $errmensaje = 'Introduzca un mensaje';
    }

    // Si no hay errores, enviar email
    if (!$errnombre && !$errEmail && !$errmensaje) {
        if (mail ($to, $subject, $body, $from)) {
            $result='<div class="alert alert-success">Mensaje enviado satisfactoriamente</div>';
            
        } else {
            $result='<div class="alert alert-danger">Ha ocurrido un error al enviar su mensaje. Favor intente nuevamente mas tarde.</div>';
        }
    }
        }
    ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
        <link rel="stylesheet" href="../asset/css/estilos.css">

        <script type="text/javascript" src="../asset/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../asset/js/popper.js"></script>
        <script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>

        <title>NBL Ingenieria Ltda.</title>
   </head>
   <body>
        <!-- CABECERA -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-4 pt-4" style="text-align:center;height: 120px;">
                    <img src="../asset/img/logo.png" style="width: 230px;" alt="Logo" >
                </div> 
                          
            </div>
        </div>
        <!-- FIN CABECERA -->

        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-sm navbar-dark bg">
            <button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" style="height: 20px" id="collapsibleNavbar">
                <ul class="navbar-nav bg">
                    <li class="nav-item">
                        <a class="bgnav"  href="../index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="bgnav" href="../vista/nuestra-empresa.html">Empresa</a>
                    </li>
                    <li class="nav-item">
                        <a class="bgnav" href="../vista/servicios.html">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="bgnav" href="../vista/clientes.html">Clientes</a>
                    </li> 
                    <li class="nav-item">
                        <a class="bgnav" href="../vista/contacto.php">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="bgnav" href="../controlador/correos.php">Intranet</a>
                    </li> 
                </ul>
            </div>  
        </nav>
        <!-- FIN NAVBAR -->
        <!-- CONTENIDO -->
        <div class="container">
            <div class="row ">
                <div class="col-10 col-sm-9 col-md-8 col-xl-7 col-center">
                    <h1 class="titulo text-center pt-3">Formulario de contacto</h1>
                  <form class="form-horizontal" id="formcontacto" role="form" method="post" action="contacto.php">
                      <div class="form-group texto ">
                          <label for="nombre" class="col-12 control-label">Nombre</label>
                          <div class="col-12">
                              <input type="text" class="form-control texto" id="nombre" name="nombre" placeholder="Nombre y apellido" value="<?php echo htmlspecialchars($_POST['nombre']); ?>">
                              <?php echo "<p class='text-danger'>$errnombre</p>";?>
                          </div>
                      </div>
                      <div class="form-group texto">
                          <label for="email" class="col-12 control-label">Email</label>
                          <div class="col-12">
                              <input type="email" class="form-control texto" id="email" name="email" placeholder="ejemplo@dominio.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                              <?php echo "<p class='text-danger'>$errEmail</p>";?>
                          </div>
                      </div>
                      <div class="form-group texto">
                          <label for="mensaje" class="col-12 control-label">Mensaje</label>
                          <div class="col-12">
                              <textarea class="form-control texto" rows="4" name="mensaje"><?php echo htmlspecialchars($_POST['mensaje']);?></textarea>
                              <?php echo "<p class='text-danger'>$errmensaje</p>";?>
                          </div>
                      </div>                      
                      <div class="form-group texto">
                          <div class="col-12">
                              <input id="submit" name="submit" type="submit" value="Enviar" class="btn btn-primary btn-sm">
                          </div>
                      </div>
                      <div class="form-group texto">
                          <div class="col-12">
                              <?php echo $result; ?>	
                          </div>
                      </div>
                  </form> 
              </div>
          </div>
    </div>  
        <!-- FIN CONTENIDO -->

   </body>
   <footer>
        <!-- PIE DE PAGINA -->
        <div class="container-fluid mt-1">
            <div class="row ">
                <div class="col-12 bgfooter" >
                    <div class="col-12 col-sm-6 bgfooter footercentrado">
                        <p class="bgfooter1 pt-2">NBL Asesorias En Proyectos LTDA. <br> Rut : 76.017.428-9 </p>
                        <p class="bgfooter2"> <!--DIRECCION Los Militares N°5620 Of. 204 <br> Las Condes, Santiago, Chile <br>--> Fono  : 2 2 47 88 245 <br> Email : contacto@nbl.cl</p> 
                    </div>
                </div>            
            </div>
        </div>
        <!-- FIN PIE DE PAGINA -->
   </footer>
</html>