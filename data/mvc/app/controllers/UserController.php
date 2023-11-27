<?php

namespace App\Controllers;

use App\Models\User;

require "../app/models/User.php";

class UserController
{
    function __construct()
    {
        // echo "<br>Contruyendo USER controller...";
    }

    function index()
    {
        $users = User::all();
        // print_r($users);
        // die();
        require('../views/user/index.php');
    }

    function show($args)
    {
        $id = (int)$args[0];
        $user = User::find($id);
        require('../views/user/show.php');
    }

    function create()
    {
        require "../views/user/create.php";
    }

    public function store()
    {
        $user = new User();
        $user->name = $_REQUEST['name'];
        $user->surname = $_REQUEST['surname'];
        $user->birthdate = $_REQUEST['birthdate'];
        $user->email = $_REQUEST['email'];
        $user->insert();
        header('Location:/user');
    }

    public function edit($args)
    {
        $id = (int)$args[0];
        $user = User::find($id);
        require "../views/user/edit.php";
    }

    public function update()
    {
        $user = new User();
        $user->id = $_REQUEST['id'];
        $user->name = $_REQUEST['name'];
        $user->surname = $_REQUEST['surname'];
        $user->birthdate = $_REQUEST['birthdate'];
        $user->email = $_REQUEST['email'];
        $user->save();
        header('Location:/user');
    }

    public function delete($args){

        $id = (int)$args[0];
        $user = User::find($id);

        if ($user) {
            $user->delete();
            header('Location:/user');
        } else {
            echo "User not found.";
        }
    }
}// Fin clase
