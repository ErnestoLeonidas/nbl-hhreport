<?php
require_once '../conexion/conexion.php';

class Solicito{
    private $id_solicito;
    private $nombre;
    private $nombre_completo;
    const TABLA="SOLICITO";

    public function __construct(){
    }

    public function setid_solicito($id_solicito){ $this->id_solicito=$id_solicito; }
    public function getid_solicito(){ return $this->id_solicito; }

    public function setNombre($nombre){ $this->nombre=$nombre; }
    public function getNombre(){ return $this->nombre; }

    public function setnombre_completo($nombre_completo){ $this->nombre_completo=$nombre_completo; }
    public function getnombre_completo(){ return $this->nombre_completo; }


    public function buscarTodos(){
        $conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT ID_SOLICITO AS id, NOMBRE AS Solicito, NOMBRE_COMPLETO as nombre FROM SOLICITO ORDER BY NOMBRE_COMPLETO');
		$consulta->execute();
		$registros = $consulta->fetchAll();
		return $registros;
    }

    public function buscarCorreos(){
        $conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT ID_nombre_completo, nombre_completo, PASS FROM ' . self::TABLA . ' WHERE ID_nombre_completo > 1 ORDER BY nombre_completo ASC');
		$consulta->execute();
		$registros = $consulta->fetchAll();
		return $registros;
    }

    public function activo(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT ID_nombre_completo, CONCAT(NOMBRE_nombre_completo, " ", id_solicito_nombre_completo) AS NOMBRE, ID_AREA FROM ' . self::TABLA . ' WHERE ID_nombre_completo = :id');
        $consulta->bindParam(':id', $this->id); 
        $consulta->execute(); 
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }

}
?>