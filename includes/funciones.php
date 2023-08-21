<?php 
require 'app.php';

function incluirTemplate( string $nombre, bool $inicio = false ) { //nombre es header o footer
    include TEMPLATES_URL . "/${nombre}.php"; // I give the address to app.php
}