<?php
require_once("clases/class.candidato.php");

function getCandidatos()
{
    $candidato  = new Candidato;
    $candidatos = $candidato->getCandidatos();

    return $candidatos;
}
