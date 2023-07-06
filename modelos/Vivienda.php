<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'Conexion.php';

class Vivienda extends Conexion{
    public $vivienda_id;
    public $vivienda_residente;
    public $vivienda_condominio_id;
    public $vivienda_situacion;


    public function __construct($args = [] )
    {
        $this->vivienda_id = $args['vivienda_id'] ?? null;
        $this->vivienda_residente = $args['vivienda_residente'] ?? '';
        $this->vivienda_condominio_id = $args['vivienda_condominio_id'] ?? '';
        $this->vivienda_situacion = $args['vivienda_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO vivienda(vivienda_residente, vivienda_condominio_id,) values('$this->vivienda_residente','$this->vivienda_condominio_id')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from vivienda where vivienda_situacion = 1 ";

        if($this->vivienda_residente != ''){
            $sql .= " and vivienda_residente like '%$this->vivienda_residente%' ";
        }

        if($this->vivienda_condominio_id != ''){
            $sql .= " and vivienda_condominio_id = $this->vivienda_condominio_id ";
        }

        if($this->vivienda_id != null){
            $sql .= " and vivienda_id = $this->vivienda_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE vivienda SET vivienda_residente = '$this->vivienda_residente', vivienda_condominio_id = $this->vivienda_condominio_id where vivienda_id = $this->vivienda_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE vivienda SET vivienda_situacion = 0 where vivienda_id = $this->vivienda_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}