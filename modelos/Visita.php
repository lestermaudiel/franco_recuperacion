<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'Conexion.php';
class Visita extends Conexion{
    public $visita_id;
    public $visita_nombre;
    public $visita_documento;
    public $visita_fecha;
    public $visita_hora_ingreso;
    public $visita_hora_salida;
    public $visita_vivienda_id;
    public $visita_situacion;


    public function __construct($args = [] )
    {
        $this->visita_id = $args['visita_id'] ?? null;
        $this->visita_nombre = $args['visita_nombre'] ?? '';
        $this->visita_documento = $args['visita_documento'] ?? '';
        $this->visita_fecha = $args['visita_fecha'] ?? '';
        $this->visita_hora_ingreso = $args['visita_hora_ingreso'] ?? '';
        $this->visita_hora_salida = $args['visita_hora_salida'] ?? '';
        $this->visita_vivienda_id= $args['visita_vivienda_id'] ?? '';
        $this->visita_situacion = $args['visita_situacion'] ?? '';
    }

        public function setVisitaFecha($fecha) {
            $sql = "SELECT * FROM visita where $this->visita_fecha = $fecha";
        }

    public function buscarPorFecha()
        {
            $sql = "SELECT * FROM visita WHERE DATE(visita_fecha) = '$this->visita_fecha' AND visita_situacion = 1";
            $resultado = self::servir($sql);
            return $resultado;
        }    
    public function guardar(){
        $sql = "INSERT INTO visita(visita_nombre, visita_documento, visita_fecha, visita_hora_ingreso, visita_hora_salida, visita_vivienda_id) values('$this->visita_nombre','$this->visita_documento','$this->visita_fecha','$this->visita_hora_ingreso','$this->visita_hora_salida','$this->visita_vivienda_id')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from visita where visita_situacion = 1 ";

        if($this->visita_nombre != ''){
            $sql .= " and visita_nombre like '%$this->visita_nombre%' ";
        }

        if($this->visita_documento != ''){
            $sql .= " and visita_documento = $this->visita_documento ";
        }

        if($this->visita_id$visita_id != null){
            $sql .= " and visita_id$visita_id = $this->visita_id$visita_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscar_todo(){
        $sql = "SELECT  * from visita
        inner join condominio on visita_nombre= condominio_id
        inner join vivienda on visita_documento = vivienda_id";

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE visita SET visita_nombre = '$this->visita_nombre', visita_documento = $this->visita_documento, visita_fecha = $this->visita_fecha, visita_hora_ingreso = $this->visita_hora_ingreso, visita_hora_salida = $this->visita_hora_salida, visita_vivienda_id = $this->visita_vivienda_id where visita_id$visita_id = $this->visita_id$visita_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE visita SET visita_situacion = 0 where visita_id$visita_id = $this->visita_id$visita_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

}