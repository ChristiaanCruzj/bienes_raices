<?php
    require 'includes/funciones.php';
    incluirTemplate('header', $inicio = true);
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoración de tu hogar</h1>
        
        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp" >
            <source srcset="build/img/destacada.jpg" type="image/jpeg" >
            <img loading="lazy" src="build/img/destacada.jpg" alt="imagen de la propiedad">
        </picture>

        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span> </p>

        <div class="resumen-propiedad">
            
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque harum asperiores dolor neque possimus odio consequuntur, sed earum esse, voluptatum quaerat, temporibus assumenda. Et, dignissimos iste perspiciatis labore facilis maiores?Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex commodi magnam aliquam quam quidem cumque blanditiis consectetur provident, eaque sequi repellendus nesciunt architecto doloremque numquam itaque ullam consequatur rerum modi.</p>
        </div>
    </main>

    <?php
    incluirTemplate('footer');
?>