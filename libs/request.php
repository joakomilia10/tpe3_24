<?php 

class request {
    public $body;       #ej: {nombre: 'saludar' , description: 'saludar a todos'}
    public $params;     #ej: /api/tareas/:d
    public $query;      #ej: ?soloFinalizadas=true

    public function __constructor() {
        try{
            #file_get_contents('php://input') lee el body de una request
            $this->body = json_decode(file_get_contents('php://input'), false);
        }
        catch(Exception $e){
            $this->body= null;
        }
        $this->query = (object) $_GET;
    }
}