<?php
require_once("clases/class.candidato.php");

/************************************
ENVIAR CANDIDATOS A LA VISTA
*************************************/
function getCandidatos()
{
    $candidato  = new Candidato;
    $candidatos = $candidato->getCandidatos();

    return $candidatos;
}
