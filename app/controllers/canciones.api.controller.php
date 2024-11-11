<?php
    require_once './app/models/canciones.model.php';
    require_once './app/views/json.view.php';

    class cancionesApiController {
        private $model;
        private $view;

        function __construct() {
            $this->model = new CancionesModel();
            $this->view = new JSONview();
        }

        function showAllCanciones($req, $res) {

            $orden = false;
            if(isset($req->query->orden))
                $orden = $req->query->orden;
            
    
            $tasks = $this->model->getAllCanciones($orden);

            return $this->view->response($tasks);
    
        }

        function showCanciones($req, $res) {
            $id = $req->params->id;

            $tasks = $this->model->getCanciones($id);

            if(!$tasks){
                return $this->view->response("la tarea con el id=$id no existe ", 404);
            }

            $this->view->response($tasks);
        }
    }