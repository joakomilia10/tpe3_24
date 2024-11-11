<?php

class CancionesModel {
    private $db;

    function __construct() {
        $this->db = $this->getConection();
    }

    private function getConection() {
        return new PDO('mysql:host=localhost;dbname=play_music;charset=utf8', 'root' , '');
    }

    function getAllCanciones($orden = false){
        $db = $this->getConection();
        $sql = 'SELECT * FROM canciones';

        if($orden){
            switch($orden){
                case 'nombre_cancion':
                    $sql .= ' ORDER BY nombre_cancion';
                    break;
                case 'top_cancion':
                    $sql .= ' ORDER BY top_cancion';
                    break;
            }
        }
        
        $query = $db->prepare($sql);
        $query->execute();
    
        //tasks es un arreglo de tareas
        $tasks = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $tasks;
    }

    function getCanciones($id){
        $db = $this->getConection();

        $query = $db->prepare('SELECT * FROM canciones WHERE id_cancion = ?');
        $query->execute([$id]);

        $tasks = $query->fetch(PDO::FETCH_OBJ);

        return $tasks;
    }


}