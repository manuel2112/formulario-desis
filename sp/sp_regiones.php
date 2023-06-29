<?php
require_once("clases/class.region.php");

/************************************
ENVIAR REGIONES A LA VISTA
*************************************/
function getRegiones()
{
    $region     = new Region;
    $regiones   = $region->getRegiones();

    return $regiones;
}
