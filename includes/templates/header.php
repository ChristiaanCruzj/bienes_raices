<?php 

    if(!isset($_SESSION)) {//si ya esta iniciada la session no muestra que inicio otra session
        session_start(); // es la sesion de usuario autenticado
    }

    $auth = $_SESSION['login'] ?? false;
    var_dump($auth);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/build/css/app.css">
    <title>Bienes Raices</title>
</head>
<body>
    
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>"> 
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/index.php">                    
                    <img src="/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="/build/imgbarras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="dark mode">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        <?php if($auth) : ?>
                            <a href="cerrar-session.php">Cerrar Sessión</a>
                        <?php endif; ?>
                    </nav>
                    
                </div>
            </div><!--.barra-->

            <?php if($inicio) {  //o como ternario echo $inicio ? "<h1>Venta de Casas y Departamentos Exclisivos de Lujo</h1>" : '';  ?> 
                <h1>Venta de Casas y Departamentos Exclisivos de Lujo</h1>
            <?php } ?>
        </div>
    </header>