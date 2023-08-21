<?php
    require 'includes/funciones.php';
    incluirTemplate('header', $inicio = true);
?>

    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp" >
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg" >
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nostros">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque, aliquam et repellat quaerat quis porro ducimus dignissimos quisquam molestias? Porro veniam aliquam nam ex, numquam saepe expedita amet. Nihil, quia!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus vel suscipit laboriosam et excepturi deserunt ducimus quis ex repellat itaque dignissimos soluta, quam quia, impedit labore libero veritatis vitae nobis!</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Mas Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi veritatis rem illo repudiandae saepe. Qui quis eum laborum consequatur quia, suscipit numquam, esse velit reprehenderit non voluptatibus voluptates ipsum illum.</p>
            </div><!--icono-->
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi veritatis rem illo repudiandae saepe. Qui quis eum laborum consequatur quia, suscipit numquam, esse velit reprehenderit non voluptatibus voluptates ipsum illum.</p>
            </div><!--icono-->
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi veritatis rem illo repudiandae saepe. Qui quis eum laborum consequatur quia, suscipit numquam, esse velit reprehenderit non voluptatibus voluptates ipsum illum.</p>
            </div><!--icono-->
        </div>
    </section>

    <?php
    incluirTemplate('footer');
?>