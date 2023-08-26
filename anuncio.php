<?php
    // validar el id 
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    // var_dump($id);

    if(!$id) {
        header('Location: /'); //sino exite un id los llevo a la pagina principal
    }


    // Importar
    require 'includes/config/database.php'; //no lo puse con el dir por que estoy en la ruta del archivo
    $db = conectarDB();
    // Consultar
    $query = "SELECT * FROM propiedades WHERE id = ${id}"; //limito a solo 3 anuncios y la variable viene desde el index
    // Obtener los resultados
    $resultado = mysqli_query($db, $query);
    // echo "<pre>"; // solo validamos que exista un registro con el id
    // var_dump($resultado->num_rows);
    // echo "</pre>";
    if(!$resultado->num_rows) {
        header('Location: /');
    }

    $propiedad = mysqli_fetch_assoc($resultado);

    require 'includes/funciones.php';
    incluirTemplate('header', $inicio = true);
?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>
        <!-- <picture>
            <source srcset="build/img/destacada.webp" type="image/webp" >
            <source srcset="build/img/destacada.jpg" type="image/jpeg" > -->
        <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="imagen de la propiedad">
        <!-- </picture> -->
        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad['precio']; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono-anuncio" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img class="icono-anuncio" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
                <li>
                    <img class="icono-anuncio" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>

            <p><?php echo $propiedad['descripcion']; ?></p>
        </div>
    </main>

<?php

    mysqli_close($db); //cierro la conexión

    incluirTemplate('footer');
?>