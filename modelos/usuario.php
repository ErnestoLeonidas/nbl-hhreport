<?php
require_once '../conexion/conexion.php';

class Usuario{
    private $id;
    private $nombre;
    private $apellido;
    private $usuario;
    private $pass;
    private $factor;
    private $valor;
    private $idarea;
    const TABLA="USUARIO";

    public function __construct(){
    }

    public function setId($id){ $this->id=$id; }
    public function getId(){ return $this->id; }
    
    public function setNombre($nombre){ $this->nombre=$nombre; }
    public function getNombre(){ return $this->nombre; }

    public function setApellido($apellido){ $this->apellido=$apellido; }
    public function getApellido(){ return $this->apellido; }

    public function setUsuario($usuario){ $this->usuario=$usuario; }
    public function getUsuario(){ return $this->usuario; }

    public function setPass($pass){ $this->pass=$pass; }
    public function getPass(){ return $this->pass; }

    public function setFactor($factor){ $this->factor=$factor; }
    public function getFactor(){ return $this->factor; }

    public function setValor($idarea){ $this->idarea=$idarea; }
    public function getValor(){ return $this->idarea; }

    public function setId_area($valor){ $this->valor=$valor; }
    public function getId_area(){ return $this->valor; }

    public function buscarTodos(){
        $conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT ID_USUARIO, NOMBRE_USUARIO, APELLIDO_USUARIO, USUARIO, PASS, FACTOR, VALOR, ID_AREA FROM ' . self::TABLA . ' ORDER BY USUARIO');
		$consulta->execute();
		$registros = $consulta->fetchAll();
		return $registros;
    }

    public function buscarCorreos(){
        $conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT ID_USUARIO, USUARIO, PASS FROM ' . self::TABLA . ' WHERE ID_USUARIO > 1 ORDER BY USUARIO ASC');
		$consulta->execute();
		$registros = $consulta->fetchAll();
		return $registros;
    }

    public function activo(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT ID_USUARIO, CONCAT(NOMBRE_USUARIO, " ", APELLIDO_USUARIO) AS NOMBRE, ID_AREA FROM ' . self::TABLA . ' WHERE ID_USUARIO = :id');
        $consulta->bindParam(':id', $this->id); 
        $consulta->execute(); 
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }

}
?>