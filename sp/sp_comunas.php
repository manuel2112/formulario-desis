<?php
require_once("../clases/class.comuna.php");

/************************************
DESDE PETICIÓN AJAX ENVIAR COMUNAS SELECCIONADAS POR REGIÓN
*************************************/
try {

    $comuna     = new Comuna;
    $idRegion   = $_POST["id"];
    $data       = "";

    if ($idRegion != "") {

        $comunas = $comuna->getComunas($idRegion);

        $data .= '<option value="">SELECCIONAR COMUNA</option>';
        foreach ($comunas as $comuna) {
            $data .= '<option value="' . $comuna['id'] . '">' . $comuna['name'] . '</option>';
        }
    } else {
        $data .= '<option value="">SELECCIONAR COMUNA</option>';
    }

    echo json_encode(array(
        'success'       => true,
        'data'          => $data
    ));
} catch (\Throwable $e) {
    echo json_encode(array(
        'success' => false,
        'data'    => $e->getMessage()
    ));
}
