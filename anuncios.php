<?php
require 'includes/funciones.php';
incluirTemplate('header', $inicio = true);
?>

<main class="contenedor seccion">

    <h2>Casas y Depas en Venta</h2>

    <?php
        $limite = 10; //esta variable se pasa al include y nos vamos a template anuncio
        include 'includes/templates/anuncios.php';
    ?>
</main>


<?php
incluirTemplate('footer');
?>