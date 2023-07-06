<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'Conexion.php';

class Cita extends Conexion{
    public $condominio_id;
    public $condominio_nombre;

    public function __construct($args = [] )
    {
        $this->condominio_id = $args['condominio_id'] ?? null;
        $this->condominio_nombre = $args['condominio_nombre'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO condominio(condominio_id, condominio_nombre) values('$this->condominio_id','$this->condominio_nombre')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from condominio where condominio_situacion = 1 ";

        if($this->cita_paciente != ''){
            $sql .= " and cita_paciente like '%$this->cita_paciente%' ";
        }

        if($this->cita_medico != ''){
            $sql .= " and cita_medico = $this->cita_medico ";
        }

        if($this->cita_id != null){
            $sql .= " and cita_id = $this->cita_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscar_todo(){
        $sql = "SELECT  * from citas
        inner join pacientes on cita_paciente= paciente_id
        inner join medicos on cita_medico = medico_id";

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE citas SET cita_paciente = '$this->cita_paciente', cita_medico = $this->cita_medico, cita_fecha = $this->cita_fecha, cita_hora = $this->cita_hora, cita_referencia = $this->cita_referencia where cita_id = $this->cita_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE citas SET cita_situacion = 0 where cita_id = $this->cita_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function busqueda(){
        

        $sql = " SELECT * FROM citas  inner join pacientes on paciente_id = cita_paciente 
        inner join medicos on medico_id = cita_medico inner join clinicas on clinica_id = medico_clinica ";


        $resultado = self::servir($sql);
        return $resultado;
    }
}