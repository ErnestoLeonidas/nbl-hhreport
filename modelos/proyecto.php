<?php
require_once '../conexion/conexion.php';

class Proyecto{
    private $id;
    private $nombre;
    private $estado;
    private $id_localidad;

    const TABLA="PROYECTO";

    public function __construct(){
    }

    public function setId($id){ $this->id=$id; }
    public function getId(){ return $this->id; }
    
    public function setNombre($nombre){ $this->nombre=$nombre; }
    public function getNombre(){ return $this->nombre; }

    public function setEstado($estado){ $this->estado=$estado; }
    public function getEstado(){ return $this->estado; }

    public function setId_localidad($id_localidad){ $this->id_localidad=$id_localidad; }
    public function getId_localidad(){ return $this->id_localidad; }

    public function buscarTodo(){
        $conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT ID_PROYECTO, lower(NOMBRE_PROYECTO) as NOMBRE_PROYECTO, ESTADO, ID_LOCALIDAD FROM ' . self::TABLA . ' ORDER BY NOMBRE_PROYECTO');
		$consulta->execute();
		$registros = $consulta->fetchAll();
		return $registros;
    }

    public function buscarActivos(){
        $conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT ID_PROYECTO, lower(NOMBRE_PROYECTO) as NOMBRE_PROYECTO, ID_LOCALIDAD FROM ' . self::TABLA . ' WHERE ESTADO = "ACTIVO" ORDER BY NOMBRE_PROYECTO');
        $consulta->execute();
		$registros = $consulta->fetchAll();
		return $registros;
    }

	public function guardar(){
		$conexion = new Conexion();
		if($this->id) { // MODIFICAR EL REGISTRO
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET NOMBRE_PROYECTO = :nombre, ESTADO = :estado, ID_LOCALIDAD = :id_localidad WHERE ID_PROYECTO = :id');
			$consulta->bindParam(':id', $this->id);
			$consulta->bindParam(':nombre', $this->nombre);
			$consulta->bindParam(':estado', $this->estado);
			$consulta->bindParam(':id_localidad', $this->id_localidad);
			$consulta->execute();         
		} else { // AGREGAR EL REGISTRO
			$consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (NOMBRE_PROYECTO, ESTADO, ID_LOCALIDAD) VALUES(:nombre, :estado, :id_localidad)');
			$consulta->bindParam(':nombre', $this->nombre);
			$consulta->bindParam(':estado', $this->estado);
			$consulta->bindParam(':id_localidad', $this->id_localidad);
			$consulta->execute();
			$this->id = $conexion->lastInsertId();      
		}
	  	$conexion = null;
  	}

	public function eliminar(){ 
		$conexion = new Conexion(); 
		$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE ID_PROYECTO = :id'); 
		$consulta->bindParam(':id', $this->id); 
		$consulta->execute(); 
		$conexion = null; 
	}


}

?>