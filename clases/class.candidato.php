<?php
require_once("class.conexion.php");

class Candidato
{
    public $db;

    public function __construct()
    {
        $this->db = new Conexion();
    }

    public function getCandidatos()
    {
        $query  = "SELECT * FROM candidato ORDER BY name ASC";
        $sql    = mysqli_query($this->db->connect(), $query);

        return $sql;
    }
}
