<?php
class Conexion
{

	private $host;
	private $user;
	private $pass;
	private $db;

	public function __construct()
	{
		$this->host 	= "localhost";
		$this->user 	= "root";
		$this->pass 	= "";
		$this->db		= "desis";
	}

	public function connect()
	{
		$conexion = mysqli_connect($this->host, $this->user, $this->pass);
		$conexion->set_charset("utf8");
		mysqli_select_db($conexion, $this->db) or die("Ninguna DB seleccionada");

		return $conexion;
	}
}
