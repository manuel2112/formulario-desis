<?php
require_once("clases/class.region.php");

function getRegiones()
{
    $region     = new Region;
    $regiones   = $region->getRegiones();

    return $regiones;
}
