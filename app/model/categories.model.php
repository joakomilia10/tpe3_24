<?php


class categoriesModel{

    function getCategories(){
        $db = new PDO('mysql:host=localhost;dbname=play_music;charset=utf8' , 'root' , '' );
    
        $query = $db->prepare('SELECT * FROM artistas');
        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $categories;
    }  

    function insertArtista($name, $fechaNacimiento, $pais) {
        $db = new PDO('mysql:host=localhost;dbname=play_music;charset=utf8' , 'root' , '' );
    
        $query = $db->prepare('INSERT INTO artistas (nombre_artista, fecha_nacimiento, pais) VALUES (?, ?, ?)');
        $query->execute([$name, $fechaNacimiento, $pais]);
    
        return $db->lastInsertId();
    }

    function deleteCategory($id){
        $db = new PDO('mysql:host=localhost;dbname=play_music;charset=utf8' , 'root' , '' );
    
        $query = $db->prepare("DELETE FROM artistas WHERE id_artista = ?");
        $query->execute([$id]);
    }

    function getCancionesByArtista($id) {
        $db = new PDO('mysql:host=localhost;dbname=play_music;charset=utf8', 'root', '');
        $query = $db->prepare('
            SELECT canciones.*, artistas.nombre_artista 
            FROM canciones 
            JOIN artistas ON canciones.id_artista = artistas.id_artista 
            WHERE canciones.id_artista = ?
        ');
        $query->execute([$id]);
        $canciones = $query->fetchAll(PDO::FETCH_OBJ);
        return $canciones;
    }

    function getCategoryById($id) {
        $db = new PDO('mysql:host=localhost;dbname=play_music;charset=utf8' , 'root' , '' );
        $query = $db->prepare("SELECT id_artista, pais, nombre_artista, fecha_nacimiento FROM artistas WHERE id_artista = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function updateArtista($id, $nombre, $fechaNacimiento, $pais) {
        $db = new PDO('mysql:host=localhost;dbname=play_music;charset=utf8' , 'root' , '' );
        $query = $db->prepare('UPDATE artistas SET nombre_artista = ?, fecha_nacimiento = ?, pais = ? WHERE id_artista = ?');

        $query->execute([$nombre, $fechaNacimiento, $pais, $id]);

        return $query->rowCount();
    }
    

}