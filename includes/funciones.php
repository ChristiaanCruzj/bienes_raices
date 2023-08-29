<?php 
require 'app.php';

function incluirTemplate( string $nombre, bool $inicio = false ) { //nombre es header o footer
    include TEMPLATES_URL . "/${nombre}.php"; // I give the address to app.php
}

function estaAutenticado() : bool {
    session_start();
    $auth = $_SESSION['login']; // si existe sino redirijo (recargo y abro en otra ventana para checar que funcione)
    if($auth) {
        return true;
    }
    return false;
}