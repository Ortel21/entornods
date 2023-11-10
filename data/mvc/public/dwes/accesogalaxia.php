<?php
namespace Dwes;

require "galaxia.php";
require "galaxiaenana/galaxiaenana.php";

echo "Namespace Actual:" . __NAMESPACE__;

echo "<br><h2>Acceso SIN cualificar</h2>"; //clases del mismo paquete (namespace)
observar("Via Lactea");
echo "<br>el radio es " . RADIO;
$gl = new galaxia();
galaxia::muerte();

echo "<br><h2>Acceso Cualificado</h2>"; //absoluto desde mi ubicacion
Galaxiaenana\observar("Los 3 Pilares");
echo "<br>el radio es " . Galaxiaenana\RADIO;
$gl = new Galaxiaenana\galaxia();
Galaxiaenana\galaxia::muerte();

echo "<br><h2>Acceso Totalmente Cualificado</h2>"; //absoluto desde mi ubicacion
\Dwes\Galaxiaenana\observar("NGC 5709");
echo "<br>el radio es " . \Dwes\Galaxiaenana\RADIO;
$gl = new \Dwes\Galaxiaenana\galaxia();
\Dwes\Galaxiaenana\galaxia::muerte();

//Importa las clases : comando use
echo "<br><h2>Importar con use</h2>";
use function \Dwes\Galaxiaenana\observar;
use const \Dwes\Galaxiaenana\RADIO;
observar("<br>Otra Galaxia");
echo "<br> El radio es " . RADIO;

echo "<br><h2>Apodar / alias namespace</h2>"; // Con alias
use function \Dwes\Galaxiaenana\observar as mirar;
mirar("Cometa Halley");

echo "<br><h2>Namespace GLOBAL</h2>";

echo time();
echo "<br>";
echo "<br>Vida de la galaxia " . \time(); 
