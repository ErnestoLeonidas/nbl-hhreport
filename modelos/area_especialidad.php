<?php
require_once '../conexion/conexion.php';

class AreaEspecialidad{
    private $id_especialidad;
    private $id_area;

    const TABLA="AREA_ESPECIALIDAD";

    public function __construct(){
    }

    public function setId_especialidad($id_especialidad){ $this->id_especialidad=$id_especialidad; }
    public function getId_especialidad(){ return $this->id_especialidad; }

    public function setId_area($id_area){ $this->id_area=$id_area; }
    public function getId_area(){ return $this->id_area; }

    //LISTO
    public function buscarTodo(){
        $conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT ID_ESPECIALDIAD, ID_AREA FROM ' . self::TABLA . ' ORDER BY ID_AREA');
		$consulta->execute();
		$registros = $consulta->fetchAll();
		return $registros;
    }

    //LISTO
    public function buscarEspecialidades(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT E.ID_ESPECIALIDAD AS ID, lower(E.TIPO_ESPECIALIDAD) AS NOMBRE FROM ESPECIALIDAD E, ' . self::TABLA . ' A WHERE E.ID_ESPECIALIDAD = A.ID_ESPECIALIDAD AND A.ID_AREA = :id_area');
        $consulta->bindParam(':id_area', $this->id_area);
        $consulta->execute();
		$registros = $consulta->fetchAll();
		return $registros;
    }

    //MODIFICAR CONSULTA ASIGNAR SEGUN PROGRAMA HH
	public function guardar(){
		$conexion = new Conexion();
			$consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (ID_ESPECIALIDAD, ID_AREA) VALUES(:id_especialidad, :id_area)');
			$consulta->bindParam(':id_especialidad', $this->id_especialidad);
			$consulta->bindParam(':id_area', $this->id_area);
			$consulta->execute();     
	  	$conexion = null;
    }
    
    //MODIFICAR CONSULTA ELIMINAR SEGUN PROGRAMA HH
	public function eliminar(){ 
		$conexion = new Conexion(); 
		$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE ID_PROYECTO = :id'); 
		$consulta->bindParam(':id', $this->id); 
		$consulta->execute(); 
		$conexion = null; 
	}
}

?>