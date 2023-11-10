<?php
require "../bdcon.php";

echo "<h2>Bbdd con PHP</h2>";

try {
    $dbh = new PDO(DSN, USERNAME, PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO " .TABLACLIENTES."(ID,Name,Address,Age,Telephone,Fecha) 
    VALUES(:id,:nombre,:direccion,:edad,:telefono,:fecha)";
    
    $statement = $dbh->prepare($sql);

    

} catch (Exception $ex) {
    echo "Fallo en la conexion : " . $ex->getMessage();
    //throw $th;
} finally {
    $dbh = null; // cierro la conexion
    echo "<br>Conexion cerrada";
}