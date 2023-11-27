<?php

namespace App\Models;

require "../core/Model.php";

use Core\Model;
use PDO;

class User extends Model

{

    // @return Todos los registros de la tabla user de la bdd
    public static function all()
    {
        $dbh = USER::db();
        // $dbh = self::db(); //Otra forma de hacerlo.
        $sql = "SELECT * FROM users";
        $statement = $dbh->query($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        $users = $statement->fetchAll(PDO::FETCH_CLASS);
        return $users;
    }

    //return un usuario en particular del a bdd
    // para id
    public static function find($id)
    {
        $dbh = USER::db();
        $sql = "SELECT * FROM users WHERE id = :id";
        $statement = $dbh->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        $user = $statement->fetch(PDO::FETCH_CLASS);
        return $user;
    }

    public function insert()
    {
        $db = User::db();
        $statement = $db->prepare('INSERT INTO users(name, surname, birthdate, email) VALUES(:name, :surname, :birthdate, :email)');
        $statement->bindValue(':name', $this->name);
        $statement->bindValue(':surname', $this->surname);
        $statement->bindValue(':email', $this->email);
        $statement->bindValue(':birthdate', $this->birthdate);
        return $statement->execute();
    }

    public function save()
    {
        $db = User::db();
        $sql = "UPDATE users SET name = :name, surname = :surname, birthdate = :birthdate, email = :email WHERE id = :id";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id', $this->id);
        $statement->bindValue(':name', $this->name);
        $statement->bindValue(':surname', $this->surname);
        $statement->bindValue(':email', $this->email);
        $statement->bindValue(':birthdate', $this->birthdate);
        return $statement->execute();
    }

    public function delete()
    {
        $db = User::db();
        $stmt = $db->prepare('DELETE FROM users WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        return $stmt->execute();
    }

    public function setPassword($password){
        $dbh  = User::db();
        $password = password_hash($password,PASSWORD_BCRYPT);
        $sql = "UPDATE users SET password = :password WHERE id = :id";
        $statement = $dbh->prepare($sql);
        $statement->bindValue(":id",$this->id);
        $statement->bindValue(":password",$this->$password);
        return $statement->execute();
    }

    public function passwordVerify($password,$user) {
        return password_verify($password,$user->$password);
    }

    //Crear un enlace por cada usuario en el que se le resetee a una password por defecto (password, secret, passw0d..)

    //Crear un boton (enlace) para resetear todos los password de todos los usuarios de la base de datos a un password por defecto.
}

