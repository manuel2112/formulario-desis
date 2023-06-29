<?php
require_once("../clases/class.voto.php");

/************************************
DESDE PETICIÓN AJAX ENVIAR VOTO A BBDD
*************************************/
try {

    $voto       = new Voto;
    $nombre     = $_POST["nombre"];
    $alias      = $_POST["alias"];
    $rut        = $_POST["rut"];
    $email      = $_POST["email"];
    $comuna     = $_POST["comuna"];
    $candidato  = $_POST["candidato"];
    $como       = serialize($_POST["como"]);
    $time       = fechaNow();

    $voto->insertVoto($nombre, $alias, $rut, $email, $comuna, $candidato, $como, $time);

    echo json_encode(array(
        'success'   => true,
        'msn'       => 'VOTO INGRESADO EXITOSAMENTE'
    ));
} catch (\Throwable $e) {
    echo json_encode(array(
        'success' => false,
        'data'    => $e->getMessage()
    ));
}

function zonaHoraria()
{
    $zona = date_default_timezone_set("Chile/Continental");
    return $zona;
}

function fechaNow()
{
    zonaHoraria();
    $var = date("Y-m-d H:i:s");
    return $var;
}
