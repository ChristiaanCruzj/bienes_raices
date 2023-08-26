<?php
    // Importar
    require __DIR__ . '/../config/database.php';
    $db = conectarDB();
    // Consultar
    $query = "SELECT * FROM propiedades LIMIT ${limite}"; //limito a solo 3 anuncios y la variable viene desde el index
    // Obtener los resultados
    $resultado = mysqli_query($db, $query);

?>

<div class="contendor-anuncios">
    <?php while($propiedad = mysqli_fetch_assoc($resultado)) : //itero en cada propiedad que exista ?> 
    <div class="anuncio">
        <!-- <picture>
            <source srcset="build/img/anuncio3.webp" type="image/webp">
            <source srcset="build/img/anuncio3.jpg" type="image/jpeg"> -->
            <!-- <img loading="lazy" src="build/img/anuncio3.jpg" alt="anuncio"> -->
        <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio"> <!-- imagenes de los sitios creados -->
        <!-- </picture> -->

        <div class="contenido-anuncio">
            <h3><?php echo $propiedad['titulo']; ?></h3>
            <p><?php echo $propiedad['descripcion']; ?></p>
            <p class="precio"><?php echo $propiedad['precio']; ?></p>
            <!-- <h3>Casa con Alberca</h3>
            <p>Casa en el lago con excelente vista, acabados de lujo a un excelente precio</p>
            <p class="precio">$3,000,000</p> -->
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

            <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">
                Ver Propiedad
            </a>

        </div><!--contenido-anuncio-->
    </div><!--anuncio-->
    <?php endwhile; ?>
</div><!--Contenedor-anuncios-->


<?php 
    // Cerrar la conexión

?>