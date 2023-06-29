<?php
require_once("class.conexion.php");

class Comuna
{
    public $db;

    public function __construct()
    {
        $this->db = new Conexion();
    }
    
    /************************************
    SELECCIONAR COMUNAS SEGÚN REGIÓN DESDE BBDD
    *************************************/
    public function getComunas($id)
    {
        $query  = "SELECT * FROM comunas WHERE region_id = ".$id." ORDER BY name ASC";
        $sql    = mysqli_query($this->db->connect(), $query);

        return $sql;
    }
}
