<?php 

    // echo "<pre>";  //only for to check the info
    // var_dump($_POST);
    // echo"</pre>";

    // Importar la conexión
    require '../includes/config/database.php';
    $db = conectarDB();
    // Esciribiir el Query
    $query = "SELECT * FROM propiedades";
    // Consultar la BD
    $resultadoConsulta = mysqli_query($db, $query);
    

    // Muestra el mensaje condicional 
    $resultado = $_GET['resultado'] ?? null; //busca ese valor y sino existe se pone null (antes de crear el anuncio) ya despues de crearlo vere Anuncio creado correctamente

    if($_SERVER['REQUEST_METHOD'] === 'POST') { //Es de tipo post por el formulario de abajp que tengo en post 
        $id = $_POST['id'];//creo numero entero
        // var_dump($id);//solo compruebo con este var_dump
        $id = filter_var($id, FILTER_VALIDATE_INT); //es un numero entero valido o no 

        if($id) {
            //Eliminar el archivo
            $query = "SELECT imagen FROM propiedades WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);

            unlink('../imagenes/' . $propiedad['imagen']);// elimino la imagen de la base de datos
            // exit; //only for check it is work 

            //Eliminar la propiedad
            $query = "DELETE FROM propiedades WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);
            if($resultado) {
                header('location: /admin?resultado=3');
            }

        }
    }

    // Incluye template
    require '../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bines Raices</h1>
        <?php if( intval($resultado) === 1): ?>
            <p class="alerta exito">Anuncio Creado Correctamente</p>
        <?php elseif( intval($resultado) === 2): ?> 
            <p class="alerta exito">Anuncio Actualizado correctamente</p>
        <?php elseif( intval($resultado) === 3): ?> 
            <p class="alerta exito">Anuncio Eliminado correctamente</p>
        <?php endif ?>    

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
        
        <table class="propiedades">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
    
                <tbody> <!-- Mostrar resultados -->
                    <?php while( $propiedad = mysqli_fetch_assoc($resultadoConsulta)) : ?>
                    <tr>
                        <td><?php echo $propiedad['id']; ?></td>
                        <td><?php echo $propiedad['titulo']; ?></td>
                        <td><img src="/imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla"></td>
                        <td>$ <?php echo $propiedad['precio']; ?></td>
                        <td>
                            <form method="POST" class="w-100">
                                <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>" > <!-- le pongo el nombre del id que deseo eliminar -->
                                <input type="submit" class="boton-rojo-block" value="eliminar">
                            </form>
                            <a href="admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block" >Actualizar</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
        </table>
    </main>


<?php 
// Cerrar la conexión 
mysqli_close($db);
// Incluir template
    incluirTemplate('footer');
?>