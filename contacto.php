<?php
    require 'includes/funciones.php';
    incluirTemplate('header', $inicio = true);
?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
        </picture>

        <h2>Llene el formulario de contacto</h2>

        <form action="" class="formulario">
            <fieldset>
                <legend>Información Personal</legend>
                    <label for="nombre">Nombre</label>
                    <input type="text" placeholder="nombre" id="nombre">

                    <label for="email">E-mail</label>
                    <input type="email" placeholder="E-mail" id="email">

                    <label for="telefono">Teléfono</label>
                    <input type="number" placeholder="Teléfono" id="telefono">

                    <label for="mensaje">Mesaje</label>
                    <textarea type="text" placeholder="Mensaje" id="Mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre Propiedad</legend>
                <label for="opciones">Vende o compra:</label>
                
                <select name="" id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">compra</option>
                    <option value="Vende">vende</option>
                </select>
                
                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>

                <p>Como Desea Ser Contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">E-mail</label>
                    <input name="contacto" type="radio" value="email" id="contactar-email">
                </div>
                <p>Si eligío Teléfono, elija la fecha y la hora</p>
                <label for="fecha">Fecha:</label>
                <input type="date"  id="fecha">
                <label for="hora">Hora:</label>
                <input type="time"  id="hora" min="09:00" max="18:00">
            </fieldset>
            <input type="submit" value="Enviar" class="boton-verde">
        </form>

    </main>

    <?php
    incluirTemplate('footer');
?>