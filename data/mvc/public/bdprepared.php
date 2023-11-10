<?php
require "../bdcon.php";

echo "<h2>Bbdd con PHP</h2>";

/*
    1- Preparar la sentencia -> prepare ;
        - named placeholder ;   .nomvariable
        question mark placeholder ; ?
    
    2 - Vincular valores a las variables
        - bindParam
        - bindValue
    
    3 - Ejecutar la sentencia -> execute
*/


try {
    $dbh = new PDO(DSN, USERNAME, PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //FORMA A : NAMED PLACEHOLDER
    // $sql = "INSERT INTO " .TABLACLIENTES."(ID,Name,Address,Age,Telephone) 
    // VALUES(:id,:nombre,:direccion,:edad,:telefono)"; 

    //FORMA B : QUESTION MARK PLACEHOLDER
    $sql2 = "INSERT INTO " .TABLACLIENTES."(ID,Name,Address,Age,Telephone) 
    VALUES(?,?,?,?,?)"; 

    $statement = $dbh->prepare($sql2);

    // OPCION 1: bindParama -> variable es una referencia.
    // son valores que recojo $_POST , $_GET, $_COOKIE ,...
    $id = null;
    $nombre = "Esther";
    $direccion = "Avenida Navarra";
    $edad = 43;
    $telefono = "978665522";

    // $statement->bindParam(":id",$id);
    // $statement->bindParam(":nombre",$nombre);
    // $statement->bindParam(":direccion",$direccion);
    // $statement->bindParam(":edad",$edad);
    // $statement->bindParam(":telefono",$telefono);

    // OPCION 2: bindValue -> asocia los valores.
    // $statement->bindValue(":id",$id);
    // $statement->bindValue(":nombre",$nombre);
    // $statement->bindValue(":direccion",$direccion);
    // $statement->bindValue(":edad",$edad);
    // $statement->bindValue(":telefono",$telefono);

    // $edad = 64;
    // $nombre = "Alfredo";

    // //Ejecutar la sentencia
    // $statement->execute();

    // Con Question Mark Placeholder
    // Con bindParam
    // $statement->bindParam(1,$id);
    // $statement->bindParam(2,$nombre);
    // $statement->bindParam(3,$direccion);
    // $statement->bindParam(4,$edad);
    // $statement->bindParam(5,$telefono);

    // Con bindValue
    $statement->bindValue(1,$id);
    $statement->bindValue(2,$nombre);
    $statement->bindValue(3,$direccion);
    $statement->bindValue(4,$edad);
    $statement->bindValue(5,$telefono);

    $nombre = "Alfredo";

    $statement->execute();

    echo "<h4>Insercion establecida!</h4>";

} catch (Exception $ex) {
    echo "Fallo en la conexion : " . $ex->getMessage();
    //throw $th;
} finally {
    $dbh = null; // cierro la conexion
    echo "<br>Conexion cerrada";
}