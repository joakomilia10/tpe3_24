# web2_myProyect

# API de Artistas

Esta API permite gestionar y consultar artistas en la base de datos, con endpoints para obtener un artista por su ID, agregar un nuevo artista y filtrar la lista de artistas.

## Endpoints

### 1. Obtener un artista por ID
- **URL**: `/artistas/:id`
- **Método**: `GET`
- **Descripción**: Obtiene la información de un artista específico utilizando su ID.
- **Parámetros de ruta**:
  - `id` (int): ID del artista que se desea obtener.
- **Respuesta**:
  - **Código 200**: Retorna el objeto del artista con el ID solicitado.
  - **Código 404**: Si el artista no existe.

---

### 2. Crear un nuevo artista
- **URL**: `/artistas`
- **Método**: `POST`
- **Descripción**: Agrega un nuevo artista a la base de datos.
- **Body** (JSON): Se requiere un objeto JSON con el siguiente formato:
  ```json
  {
    "name": "sofiiii",
    "fechaNacimiento": "2000/12/02",
    "pais": "Argentina"
  }


### 3. Obtener artistas filtrados

- **URL**: `/artistas`
- **Método**: `GET`
- **Descripción**: Obtiene una lista de artistas que cumplen con los criterios de filtrado establecidos en el body de la solicitud.

### Body (JSON)

El cuerpo debe contener un objeto JSON para los criterios de filtrado, por ejemplo:

```json
{
  "name": "Cris"
}
