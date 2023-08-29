<?php

include 'includes/config/database.php';
$db = conectarDB();

// Autentificar el usuario

$errores = []; // variable para comprobarlo en el if 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    $email = mysqli_real_escape_string( $db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL) ); //le asigno los valores de post y con el filtro retorno si es un email valido y lo valido en la base de datos
    // var_dump($email);
    $password = mysqli_real_escape_string( $db, $_POST['password']); //le asigno los valores de post

    if(!$email) {
        $errores[] = "El email es obligatiorio o no es válido";
    }
    if(!$password) {
        $errores[] = "El Password es obligatorio";
    }

    if(empty($errores)) {

        //Revisar si el USUARIO existe.
        $query = "SELECT * FROM usuarios WHERE email = '${email}' ";
        $resultado = mysqli_query($db, $query);
        
        if( $resultado->num_rows) { // Es de tipo object lo cheque gracias al var_dump(util para comprobar una consulta en una base de datos)
            // Revisar si el password es correcto 
            $usuario =mysqli_fetch_assoc($resultado);
            // var_dump($usuario['password']);

            // Verificar si el PASSWORD es correcto o no 
            $auth = password_verify($password, $usuario['password']); //nos retorna true o false
            // var_dump($auth);// Verifico si es tru el pasword
            if($auth){
                //El usuario esta autenticado
                session_start();
                // Llenar el arreglo de la sesión
                $_SESSION['usuario'] = $usuario ['email']; //esto hace que este disponible todo el tiempo hasta que cerremos la session
                // echo '<pre>';
                // var_dump($_SESSION); //I just check if login it's true
                // echo '</pre>';
                $_SESSION['login'] = true; 

                header('Location: /admin');

            }else {
                $errores[] = 'El password es incorrecto';                
            }


        }else {
            $errores[] = "El usuario no existe";
        }

    }

}


//iNCLUYER EL HEADER
require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach($errores as $error) :  //por cada uno de los errores que mostrare en rojo en pantalla ?> 
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach ?>

    <form method="POST" class="formulario" novalidate>
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-mail:</label>
            <input type="email" name="email" placeholder="Tu email" id="email" >

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Tu password" id="password">
        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>