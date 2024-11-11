<?php 

    require_once './libs/router.php';
    require_once './app/controllers/canciones.api.controller.php';

    //TODO incluir controllers

    $router = new router();

    #                  endpoint               verbo         controller                      metodo
    $router->addRoute('canciones'             ,'GET'       ,'cancionesApiController'       ,'showAllCanciones');
    $router->addRoute('canciones/:id'         ,'GET'       ,'cancionesApiController'       ,'showCanciones');

                   #tareas/12 
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);