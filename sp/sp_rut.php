<?php
require_once("../clases/class.voto.php");

/************************************
DESDE PETICIÓN AJAX COMPROBAR RUT EXISTENTE 
*************************************/
try {

    $voto   = new Voto;
    $rut    = $_POST["rut"];

    $counter = $voto->getVotoRut($rut);

    $existe = $counter > 0 ? TRUE : FALSE;

    echo json_encode(array(
        'success'   => true,
        'existe'    => $existe
    ));
} catch (\Throwable $e) {
    echo json_encode(array(
        'success' => false,
        'data'    => $e->getMessage()
    ));
}
