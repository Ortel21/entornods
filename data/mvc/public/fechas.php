<?php

$cadenafecha = "12/10/2022";
$fecha = DateTime::createFromFormat( 'd/m/Y', $cadenafecha);
echo "Objeto fecha<br>";
var_dump($fecha);
$sfecha = $fecha->format('#Y#m#d');
echo "<br> Fecha " . $sfecha;