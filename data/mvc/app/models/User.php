<?php
namespace App\Models;
require "../core/Model.php";

use Core\Model;

class User extends Model
{
    // @return Todos los registros de la tabla user de la bdd
    public static function all()
    {
        /* $bdh = USER::db();
        // $dbh = self::db(); //Otra forma de hacerlo.
        $sql = "SELECT * FROM users";
        $statement = $dbh->query($sql);
        */
    }

    //return un usuario en particular del a bdd
    // para id
    public static function find($id)
    {
        echo "<br> Recupero un usuario..";
    }

    public function insert() {
        echo "<br> Insertando un registro..";
    }

    public function save() {
        echo "<br> Actualizando un registro..";
    }

    public function delete() {
        echo "<br> Borrando un registro..";
    }
}