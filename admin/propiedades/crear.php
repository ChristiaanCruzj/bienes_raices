<?php 
// por si te marca error 500 o habilitarlo permanente leer README Me soluciono la comunicación con la base de datos
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

    require '../../includes/funciones.php';
    $auth = estaAutenticado(); //si el usuario esta autenticado

    if(!$auth) {
        header('Location: /');
    }

    //Base de Datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    // Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    // Arreglo con mensajes de errores
    $errores = [];

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedorId = '';

    // Ejecutar el código después  de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') { //SERVER trae informacion de lo que pasa en el servidor
        // echo "<pre>"; 
        // var_dump($_POST);  // POST nostre información de tipo post en nuestro formalario
        // echo "</pre>";

        echo "<pre>"; 
        var_dump($_FILES);  // FILES Nos permite ver el contenido de los archivos  
        echo "</pre>";
        

        $titulo = mysqli_real_escape_string( $db, $_POST['titulo']); //aseguro la applicación con mysqli real escape string
        $precio = mysqli_real_escape_string( $db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string( $db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento']);
        $vendedorId = mysqli_real_escape_string( $db, $_POST['vendedor']);
        $creado = date('Y/m-/d');

        // Asignar files  hacea una vaiable
        $imagen = $_FILES['imagen'];
        

        // Mensaaje de campos obligatorios
        if(!$titulo) { //$titulo == ''; it's equal to empty
            $errores[] ="Debes añadir un titulo";
        }
        if(!$precio) { //$titulo == '';
            $errores[] ="El precio es obligatorio";
        }
        if( strlen($descripcion) < 50) { // must have a minimal description
            $errores[] ="La descripción es obligatoria y debe tener al menos 50 caracteres";
        }
        if(!$habitaciones) { //$titulo == '';
            $errores[] ="El número de habitaciones es obligatorio";
        }
        if(!$precio) { //$titulo == '';
            $errores[] ="El número de baño es obligatorio";
        }
        if(!$estacionamiento) { //$titulo == '';
            $errores[] ="El número de lugares de estacionamiento es obligatorio";
        }
        if(!$vendedorId) { //$titulo == '';
            $errores[] ="Elige un vendedor";
        }

        if(!$imagen['name'] || $imagen['error']) {
            $errores[] = 'La Imagen es Obligatoria';
        }
        // Validar por tamaño (1mb máximo)
        $medida = 1000 * 1000; //convertir bytes a kilobytes 
        if($imagen['size'] > $medida) {
            $errores[] ='La Imagen es muy pesada';
        }
        
        // echo "<pre>"; 
        // var_dump($errores);
        // echo "</pre>";
        

        // Revisar que el arreglo de errores este vacío 
        if(empty($errores)){
            
            /** SUBIDA DE ARCHIVOS **/
            //crear carpeta
            $carpetaImagenes = '../../imagenes/'; //cuando no marca errores crea esta carpeta
            if(!is_dir($carpetaImagenes)){  //sino existe la carpeta imagenes colocala
                mkdir($carpetaImagenes);   //crea carpeta
            }
            // Generar un nombre unico para las imagenes que subiran
            $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg"; //es parecido a encryptar y le puse un unico ID para cuando se guarden las imagenes
            var_dump($nombreImagen);
            //Subir imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen ); //Lo muevo y lo coloxo graciad al tmp_name que aparece when I show _FILES ;)
            

            // Insertar en la Base de datos
            $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId) VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId')";
    
            // echo $query;    
            $resultado = mysqli_query($db, $query);    
            if($resultado) {
                // echo "Insertado Correctamente";
                header('Location: /admin?resultado=1'); // redireccionar al usuario.  (para evitar que esten duplicando entradas(presionar muchas veces)) con mensaje 
            }
        }


    }

    
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            
        <fieldset>
                <legend>Información Gneral</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>" >

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>" >

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <label for=descripcion>Descripción:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>" >

            <label for="wc">Baños:</label>
            <input type="number" id="wc" name="wc" placeholder="Ej:3" min="1" max="9" value="<?php echo $wc; ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor" >
                <option value="">-- Seleccione --</option>
                <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
                    <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : '';  ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>                
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde"> 

        </form>

    </main>

<?php 
    incluirTemplate('footer');
?>