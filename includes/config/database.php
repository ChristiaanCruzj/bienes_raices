<?php 

function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', 'Regina.123', 'bienesraices_crud');

    // if($db) {
    //     echo 'Se conecto';
    // } else {
    //     echo 'no se conectó';
    // }

    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    }

    return $db;

}

?>