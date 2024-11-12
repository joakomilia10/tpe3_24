<?php
 require_once './app/model/categories.model.php';
 require_once './app/views/json.view.php';

class artistasApiController {
        private $model;
        private $view;

        function __construct() {
            $this->model = new categoriesModel();
            $this->view = new JSONview();
        }
        
        //OBTENER ARTISTA POR ID
        function showArtistas($req, $res) {
            $id = $req->params->id;

            $tasks = $this->model->getArtistaById($id);

            if(!$tasks){
                return $this->view->response("el atrista con el id=$id no existe ", 404);
            }

            $this->view->response($tasks);
        }



        //POST
        function create ($req, $res){

            $body = $req->body;
            //valido 39:00 VER
            if(empty($body->name) || empty($body->fechaNacimiento) || empty($body->pais)){
                return $this->view->response("falta completar datos", 400);
             }

            //obtengo datos
            $name = $req->body->name;
            $fechaNacimiento = $req->body->fechaNacimiento;
            $pais = $req->body->pais;

            //inserto
            $id = $this->model->insertArtista($name, $fechaNacimiento, $pais);

            if(!$id){
                return $this->view->response("error al insertar artista", 500);
            }
            //buena practica, devolver recurso insertado
            $tasks = $this->model->getArtistaById($id);
            return $this->view->response($tasks, 201);
            
        }

        function getFiltrado($req){
            $body = $req->body;

            if (is_null($body)) {
                $tasks = $this->model->getArtistas();
                $this->view->response($tasks);

            } else {
                $name = $body->name;
                $tasks = $this->model->getArtistasFiltrado($name);
                $this->view->response($tasks);
            }
        }
    }

