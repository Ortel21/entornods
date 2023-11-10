<?php

/*

http://mvc.local/user/index
http://mvc.local/index.php?url=user/index

La peticion get:
http://mvc.local/controlador/metodo/arg1/arg
http://mvc.local/user/show/1

    /user/show/1/ -> user/show/1 (trim) -> [user,show,1] (explode)

*/
 class App
 {
    function __construct()
    {
        // Transformacion para el controlador
        isset($_GET["url"]) ? $url = $_GET["url"] : $url = "home";
        // $url = isset($_GET["url"]) ? $_GET["url"] : "home";  //Otra forma de hacerlo
            $arguments = explode("/",trim($url,"/")) ;

            //obtener cotrolador
            $controllerName = array_shift($arguments); // user | product | home (la primera de cada url)
                                                       // UserController , ProductController
            $controllerName = ucwords($controllerName) . "Controller";

            //Transformacion para el metodo
            count($arguments) ? $method = array_shift($arguments) : $method = "index";
            // $method = count($arguments) ? array_shift($arguments) : "index"; //Otra forma de hacerlo

            // $edad = rand(1,99);
            // echo $edad >=18 ? "Adulto" : "Menor";

            // Importar el controlador
            $file = "../app/controllers/$controllerName" . ".php";
            if(file_exists($file))
            {
                require "$file"; //importo el controlador
            } else {
                http_response_code(404);
                echo "Recurso no encontrado";
                die();
            }

            // Crear instancia del controlador y llamar al metodo
            $controllerObject = new $controllerName;
            //verificar si existe el metodo de la peticion en la clase
            if(method_exists($controllerObject,$method))
            {
                //Invocarlo
                $controllerObject->$method($arguments);
            } else {
                http_response_code(404);
                echo "Metodo no encontrado";
                die();
            }

    }//fin cosntruct
 }//fin clase