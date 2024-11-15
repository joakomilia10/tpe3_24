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

        public function updateCanciones($req, $res) {
            $id = $req->params->id;

            $task = $this->model->getCanciones($id);

            if(!$task){
                return $this->view->response("la tarea con el id=$id no existe", 400);
            }

            if(empty($req->body->nombre_cancion) || empty($req->body->top_cancion || empty($req->body->duracion) || empty($req->body->genero))){
                return $this->view->response("datos incompletos", 400);    
            }

            $nombre_cancion = $req->body->nombre_cancion;
            $top_cancion = $req->body->top_cancion;
            $duracion = $req->body->duracion;
            $genero = $req->body->genero;

            $this->model->updateCancion($id, $nombre_cancion, $top_cancion, $duracion, $genero);

            $task = $this->model->getCanciones($id);
            $this->view->response($task, 200);
        }
    }