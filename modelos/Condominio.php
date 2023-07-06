<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'Conexion.php';

class Condominio extends Conexion{
    public $condominio_id;
    public $condominio_nombre;
    public $condominio_situacion;

    public function __construct($args = [] )
    {
        $this->condominio_id = $args['condominio_id'] ?? null;
        $this->condominio_nombre = $args['condominio_nombre'] ?? '';
        $this->condominio_situacion = $args['condominio_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO condominio (condominio_nombre) values ('$this->condominio_nombre')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from condominio where condominio_situacion = 1 ";

        if($this->condominio_nombre != ''){
            $sql .= " and condominio_nombre like '%$this->condominio_nombre%' ";
        }

        if($this->condominio_id != null){
            $sql .= " and condominio_id = $this->condominio_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE condominio SET condominio_nombre = '$this->condominio_nombre' where condominio_id = $this->condominio_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE condominio SET condominio_situacion = 0 where condominio_id = $this->condominio_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}