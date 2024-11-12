<?php 

    require_once './libs/router.php';
    require_once './app/controllers/canciones.api.controller.php';
    require_once './app/controllers/artistas.api.controller.php';

    //TODO incluir controllers

    $router = new router();

    #                  endpoint               verbo         controller                      metodo
    $router->addRoute('canciones'             ,'GET'       ,'cancionesApiController'       ,'showAllCanciones');
    $router->addRoute('canciones/:id'         ,'GET'       ,'cancionesApiController'       ,'showCanciones');

    //AGREGO SOFI
    $router->addRoute('artistas/:id'          ,'GET'       ,'artistasApiController'        ,'showArtistas' );
    $router->addRoute('artista'               ,'POST'      ,'artistasApiController'        ,'create');
    $router->addRoute('artistas'          ,'GET'       ,'artistasApiController'        ,'getFiltrado' );


                   #tareas/12 
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);