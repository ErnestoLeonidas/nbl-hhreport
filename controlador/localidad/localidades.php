<?php
    require_once '../../conexion/conexion.php';
    
    class Localidad{
        private $id_localidad;
        private $nombre;
    
        const TABLA="LOCALIDAD";
    
        public function __construct(){
        }
    
        public function setId_localidad($id_localidad){ $this->id_localidad=$id_localidad; }
        public function getId_localidad(){ return $this->id_localidad; }
    
        public function setNombre($nombre){ $this->nombre=$nombre; }
        public function getNombre(){ return $this->nombre; }
    
        //PENDIENTE
        public function buscarTodo(){
            $conexion = new Conexion();
            $conexion->query("SET NAMES 'UTF8'");
            $consulta = $conexion->prepare('SELECT 
                    ID_LOCALIDAD as id, 
                    NOMBRE_LOCALIDAD as localidad 
                FROM 
                    LOCALIDAD 
                ORDER BY NOMBRE_LOCALIDAD');
            $consulta->execute();
            $registros = $consulta->fetchAll();
            return $registros;
        }
    
    }


    $conexion = new Conexion();
    $conexion->query("SET NAMES 'UTF8'");
    $consulta = $conexion->prepare('SELECT 
            ID_LOCALIDAD as id, 
            NOMBRE_LOCALIDAD as localidad 
        FROM 
            LOCALIDAD 
        ORDER BY NOMBRE_LOCALIDAD');
    $consulta->execute();
    $resultado = $consulta->fetchAll();
    $conexion = null;

     $data = array('data' => $resultado );

     echo json_encode($data, true);  

?>