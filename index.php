
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS  -->
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <link rel="stylesheet" href="asset/css/glyphicons.css">
    <link rel="stylesheet" href="asset/css/login.css">

    <!-- JS -->
    <script src="asset/js/jquery-3.3.1.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>

    <title>NBL HH Login</title>
</head>
<body>

   
<div class="container">
    <div class="login login-container">
        <form class="form-signin" action="controlador/sesionActiva.php" method="POST">
            <img src="asset/img/logo.png" class="mb-3" alt="LOGO">
            <input type="email" id="email" name="email" class="form-control mb-3" placeholder="Usuario" required>
            <input type="password" id="inputPassword" name="password" class="form-control mb-3" placeholder="Password" required>
            <button class="btn btn-primary btn-block btn-signin" type="submit">INGRESAR</button>
        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->


<script type="text/javascript" src="asset/js-prisma/login.js"></script>

</body>
</html> 

