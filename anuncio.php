<?php
    require 'includes/funciones.php';
    incluirTemplate('header', $inicio = true);
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta Frente al Bosque</h1>
        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp" >
            <source srcset="build/img/destacada.jpg" type="image/jpeg" >
            <img loading="lazy" src="build/img/destacada.jpg" alt="imagen de la propiedad">
        </picture>
        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono-anuncio" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono-anuncio" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono-anuncio" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p>4</p>
                </li>
            </ul>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque harum asperiores dolor neque possimus odio consequuntur, sed earum esse, voluptatum quaerat, temporibus assumenda. Et, dignissimos iste perspiciatis labore facilis maiores?Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex commodi magnam aliquam quam quidem cumque blanditiis consectetur provident, eaque sequi repellendus nesciunt architecto doloremque numquam itaque ullam consequatur rerum modi.</p>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>