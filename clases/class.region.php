<?php
require_once("class.conexion.php");

class Region
{
    public $db;

    public function __construct()
    {
        $this->db = new Conexion();
    }

    public function getRegiones()
    {
        $query  = "SELECT * FROM regiones ORDER BY name ASC";
        $sql    = mysqli_query($this->db->connect(), $query);

        return $sql;
    }
}
