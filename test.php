<?php
$data = file_get_contents("https://swgoh.gg/api/player/269188168/");
$con = utf8_encode($data);
$datos = json_decode($con, true);

//print_r( $datos['units'][0]['data']['name'] );

//$hay = count($datos["name"]);

$units = $datos['units'];

//print_r( $units );

foreach ($units as $key ) {
    print_r($key['data']['name'] );
    echo '<br>';
}


/*
foreach ($datos as $product) {
    foreach ($product as $key) {
        print_r($key['data']['name'] );
        echo '<br>';
    }  
}
*/

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="asset/datepicker/datepicker.css"/>

    <!-- JS -->
    <script src="asset/js/jquery-3.3.1.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/bootstrap-select.min.js"></script>



    <title>Document</title>
</head>
<body>


<div>
    <br>
    Leonidasthyrael
</div>


</body>
</html>