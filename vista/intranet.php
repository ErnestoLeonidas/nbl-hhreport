<?php
    session_start();
    $correos = $_SESSION['correos'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/estilos.css">
    <link rel="stylesheet" href="../asset/css/login.css">

    <script type="text/javascript" src="../asset/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../asset/js/popper.js"></script>
    <script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>

    <title>NBL Ingenieria Ltda.</title>
</head>
<body>  
     
   
  <div class="container">
    <div class="login login-container">
     
      <img src="../asset/img/logo.png" class="mb-3" alt="LOGO">

      <form class="form-signin" action="../controlador/sesionActiva.php" autocomplete="off" method="POST">
            <select class="form-control mb-3" name="email">
              <?php foreach($correos as $row){ ?>
                <option value="<?php echo $row['USUARIO'] ?>"><?php echo $row['USUARIO'] ?></option>
              <?php } ?>
            </select>
        <input type="password" id="inputPassword" name="password" class="form-control mb-3" placeholder="Password" required>
        <button class="btn btn-primary btn-block btn-signin" type="submit">INGRESAR</button>
      </form><!-- /form -->
    </div><!-- /card-container -->
  </div><!-- /container -->

    
</body><!-- FIN CONTENIDO -->

</html>