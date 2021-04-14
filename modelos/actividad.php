<?php
require_once '../conexion/conexion.php';

class Actividad{
    private $id;
    private $descripcion;
    private $fecha;
    private $hh_usadas;
    private $hh_extras;
    private $id_usuario;
    private $id_especialidad;
    private $id_proyecto;
    private $id_solicito;
    private $_mes;
    private $_anio;
    const TABLA="ACTIVIDAD";


    public function __construct(){}

    public function setId($id){ $this->id=$id; }
    public function getId(){ return $this->id; }

    public function setDescripcion($descripcion){ $this->descripcion=$descripcion; }
    public function getDescripcion(){ return $this->descripcion; }

    public function setFecha($fecha){ $this->fecha=$fecha; }
    public function getFecha(){ return $this->fecha; }

    public function setHh_usadas($hh_usadas){ $this->hh_usadas=$hh_usadas; }
    public function getHh_usadas(){ return $this->hh_usadas; }

    public function setHh_extras($hh_extras){ $this->hh_extras=$hh_extras; }
    public function getHh_extras(){ return $this->hh_extras; }

    public function setId_usuario($id_usuario){ $this->id_usuario=$id_usuario; }
    public function getId_usuario(){ return $this->id_usuario; }
    
    public function setId_especialidad($id_especialidad){ $this->id_especialidad=$id_especialidad; }
    public function getId_especialidad(){ return $this->id_especialidad; }

    public function setId_proyecto($id_proyecto){ $this->id_proyecto=$id_proyecto; }
    public function getId_proyecto(){ return $this->id_proyecto; }

    public function setId_solicito($id_solicito){ $this->id_solicito=$id_solicito; }
    public function getId_solicito(){ return $this->id_solicito; }

    public function set_mes($_mes){ $this->_mes=$_mes; }
    public function get_mes(){ return $this->_mes; }

    public function set_anio($_anio){ $this->_anio=$_anio; }
    public function get_anio(){ return $this->_anio; }
    /*  Funcion que guarda y actualiza el registro a la misma vez.
    *   Si se crea el objeto y se añade el ID actualizara el registro.
    *   Si se crea el objeto y no trae el ID creara uno nuevo con los datos ingresados.
    *   
    *   Para todos los casos: Los objetos se crean en el controlador y luego se aplica el método.
    */
public function cargar(){ 
  $conexion = new Conexion();
  
  if($this->id) /*Modifica*/ {
    $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET DESCRIPCION_ACTIVIDAD = utf(:descripcion), FECHA = :fecha, HH_USADAS = :hh_usadas, HH_EXTRAS= :hh_extras, ID_USUARIO = :id_usuario, ID_ESPECIALIDAD = :id_especialidad, ID_PROYECTO = :id_proyecto, ID_SOLICITO = :id_solicito WHERE ID_ACTIVIDADES = :id');
    $consulta->bindParam(':descripcion', $this->descripcion);
    $consulta->bindParam(':fecha', $this->fecha);
    $consulta->bindParam(':hh_usadas', $this->hh_usadas);
    $consulta->bindParam(':hh_extras', $this->hh_extras);
    $consulta->bindParam(':id_usuario', $this->id_usuario);
    $consulta->bindParam(':id_especialidad', $this->id_especialidad);
    $consulta->bindParam(':id_proyecto', $this->id_proyecto);
    $consulta->bindParam(':id_solicito', $this->id_solicito);
    $consulta->bindParam(':id', $this->id);
    $consulta->execute();         
  }else /*Inserta*/ {
    $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (DESCRIPCION_ACTIVIDAD, FECHA, HH_USADAS, HH_EXTRAS, ID_USUARIO, ID_ESPECIALIDAD, ID_PROYECTO, ID_SOLICITO) VALUES(utf(:descripcion), :fecha, :hh_usadas, :hh_extras, :id_usuario, :id_especialidad, :id_proyecto, :id_solicito)');
    $consulta->bindParam(':descripcion', $this->descripcion);
    $consulta->bindParam(':fecha', $this->fecha);
    $consulta->bindParam(':hh_usadas', $this->hh_usadas);
    $consulta->bindParam(':hh_extras', $this->hh_extras);
    $consulta->bindParam(':id_usuario', $this->id_usuario);
    $consulta->bindParam(':id_especialidad', $this->id_especialidad);
    $consulta->bindParam(':id_proyecto', $this->id_proyecto);
    $consulta->bindParam(':id_solicito', $this->id_solicito);
    $consulta->execute();
    $this->id = $conexion->lastInsertId();      
  }
  $conexion = null;
}

public function eliminar(){ 
  $conexion = new Conexion(); 
  $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE id = :id'); 
  $consulta->bindParam(':id', $this->id);
  $consulta->execute(); 
  $conexion = null; 
}

  public function mostrar(){
    $conexion = new Conexion();
    $mes = date("m");
    $anio = date("Y");

    $consulta = $conexion->prepare('SELECT
    ACTIVIDAD.ID_ACTIVIDADES, 
    ACTIVIDAD.FECHA,
    lower(PROYECTO.NOMBRE_PROYECTO) as NOMBRE_PROYECTO,
    lower(ESPECIALIDAD.TIPO_ESPECIALIDAD) as TIPO_ESPECIALIDAD, 
    lower(ACTIVIDAD.DESCRIPCION_ACTIVIDAD) as DESCRIPCION_ACTIVIDAD, 
    ACTIVIDAD.HH_USADAS, 
    ACTIVIDAD.HH_EXTRAS,
    SOLICITO.NOMBRE as SOLICITO,
    PROYECTO.ID_PROYECTO as ID_PROYECTO
    FROM 
    PROYECTO, SOLICITO, ESPECIALIDAD, ACTIVIDAD 
    WHERE 
    ACTIVIDAD.ID_PROYECTO = PROYECTO.ID_PROYECTO AND 
    ACTIVIDAD.ID_SOLICITO = SOLICITO.ID_SOLICITO AND 
    ACTIVIDAD.ID_ESPECIALIDAD = ESPECIALIDAD.ID_ESPECIALIDAD AND 
    ACTIVIDAD.ID_USUARIO = :id_usuario AND 
    MONTH(ACTIVIDAD.FECHA) = :mes AND 
    YEAR(ACTIVIDAD.FECHA) = :anio 
    ORDER BY ACTIVIDAD.FECHA DESC');

    //$consulta = $conexion->prepare('SELECT ID_ACTIVIDADES, DESCRIPCION_ACTIVIDAD, FECHA, HH_USADAS, HH_EXTRAS, ID_USUARIO, ID_ESPECIALIDAD, ID_PROYECTO, ID_SOLICITO FROM ' . self::TABLA . ' WHERE ID_USUARIO = :id_usuario AND MONTH(FECHA) = :mes AND YEAR(FECHA) = :anio');
    $consulta->bindParam(':id_usuario', $this->id_usuario);
    $consulta->bindParam(':mes', $mes, PDO::PARAM_INT);
    $consulta->bindParam(':anio', $anio, PDO::PARAM_INT);
    $consulta->execute();
    $registros = $consulta->fetchAll();

    return $registros;
  }

    public function hh_proyectos_usuario(){
    $conexion = new Conexion();
      $consulta = $conexion->prepare('SELECT
          lower(P.NOMBRE_PROYECTO) AS PROYECTO,
          U.NOMBRE_USUARIO AS USUARIO,
          SUM(A.HH_USADAS) AS HH
        FROM
          PROYECTO P,
          USUARIO U,
          ACTIVIDAD A
        where
          P.ID_PROYECTO = A.ID_PROYECTO AND
          A.ID_USUARIO = U.ID_USUARIO AND
          A.ID_USUARIO = :id_usuario AND
          MONTH(A.FECHA) = :mes AND
          YEAR(A.FECHA) = :anio
        GROUP BY
          P.NOMBRE_PROYECTO,
          U.NOMBRE_USUARIO');
      $consulta->bindParam(':id_usuario', $this->id_usuario);
      $consulta->bindParam(':mes', $this->_mes);
      $consulta->bindParam(':anio', $this->_anio);
      $consulta->execute();
		$registros = $consulta->fetchAll();
		return $registros;
    }

    public static function bucarhh_usadas($email){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE hh_usadas = :email');
        $consulta->bindParam(':email', $email, PDO::PARAM_STR); 
		$consulta->execute();
		$registros = $consulta->fetchAll();
		return $registros;
    }
}

?>