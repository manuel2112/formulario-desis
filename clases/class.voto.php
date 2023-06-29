<?php
require_once("class.conexion.php");

class Voto
{
    public $db;

    public function __construct()
    {
        $this->db = new Conexion();
    }

    public function insertVoto($nombre, $alias, $rut, $email, $comuna, $candidato, $como, $time)
    {
        $query  = "INSERT INTO votos ( nombre, alias, rut, email, comuna_id, candidato_id, enterar, created_at, updated_at ) VALUES ( '$nombre', '$alias', '$rut', '$email', '$comuna', '$candidato', '$como', '$time', '$time')";
        mysqli_query($this->db->connect(), $query);
    }

    public function getVotoRut($rut)
    {
        $query  = "SELECT * FROM votos WHERE rut = '".$rut."' ";
        $sql    = mysqli_query($this->db->connect(), $query);
        $count  = mysqli_num_rows($sql);

        return $count;
    }
}
