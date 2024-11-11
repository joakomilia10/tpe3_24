<?php

class AdminModel {

    private function getConection() {
        return new PDO('mysql:host=localhost;dbname=play_music;charset=utf8', 'root' , '');
    }
    
    //trae artistas para mostrar en el form
    function getAll_artistas() {
        $db = $this->getConection();

        $query = $db->prepare('SELECT id_artista, nombre_artista FROM artistas');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
        

    //mostrar canciones
    function getAll_canciones() {
        $db = $this->getConection();
        
        $query = $db->prepare('SELECT * FROM canciones');
        $query->execute();
    
        //tasks es un arreglo de tareas
        $tasks = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $tasks;
    }

    //agregar cancion
    function insert_Cancion($autor, $name, $top, $duracion, $genero) {
        $db = $this->getConection();

        $query = $db->prepare('INSERT INTO canciones (id_artista, nombre_cancion, top_cancion, duracion, genero) VALUES(?,?,?,?,?)');
        $query->execute([$autor, $name, $top, $duracion, $genero]);

        return $db->lastInsertId();
    }

    //eliminar cancion
    function delete_Cancion($id) {
        $db = $this->getConection();

        $query = $db->prepare('DELETE FROM canciones WHERE id_cancion = ?');
        $query->execute([$id]);
    }

    // update cancion
    function getCancionById($id) {
        $db = $this->getConection();
        $query = $db->prepare('SELECT * FROM canciones WHERE id_cancion = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    // Actualizar una canción
    function updateCancion($id, $autor, $name, $top, $duracion, $genero) {
        $db = $this->getConection();

        $query = $db->prepare('UPDATE canciones SET id_artista = ?, nombre_cancion = ?, top_cancion = ?, duracion = ?, genero = ? WHERE id_cancion = ?');
        return $query->execute([$autor, $name, $top, $duracion, $genero, $id]);
    }


}