<?php
namespace Core;

require "../config/db.php";
use PDO;
use PDOException;
use const Config\DSN;
use const Config\USUARIO;
use const Config\PASSWORD;



class Model
{
    static function db(){
        
        try {
            $dbh = new PDO(DSN,USUARIO,PASSWORD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            echo "Conexion correcta.";
        } catch (PDOException $ex) {
            echo "Fallo en la conexion : " . $ex->getMessage();
            //throw $th;
        }

        return $dbh; // Devuelvo conexion a la BDD

    }// fin bd
}// fin de la clase