<?php

session_start();

$_SESSION = [];

// var_dump($_SESSION); // solo para ver el estado de la conexión
header('Location: /');