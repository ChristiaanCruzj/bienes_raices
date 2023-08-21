<?php 
// Importar la conexión
require '../includes/config/databade.php';
$db = conectarDB();
// Esciribiir el Query
$query = "SELECT * FROM propiedades";
// Consultar la BD
$resultadoConsulta = mysqli_query($db, $query);
    

    // Muestra el mensaje condicional 
    $resultado = $_GET['resultado'] ?? null; //busca ese valor y sino existe se pone null (antes de crear el anuncio) ya despues de crearlo vere Anuncio creado correctamente
    // Incluye template
    require '../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bines Raices</h1>
        <?php if( intval($resultado) === 1): ?>
            <p class="alerta exito">Anuncio creado correctamente</p>
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
                            <a href="#" class="boton-rojo-block" >Eliminar</a>
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