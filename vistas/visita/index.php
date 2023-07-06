<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../modelos/Vivienda.php';
require_once '../../modelos/Condominio.php';
    try {
        $vivienda = new Vivienda();
        $condominio = new Condominio();
        $vivienda = $vivienda->buscar();
        $condominio = $condominio->buscar();

    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">Formulario para Ingresar Visitas</h1>
        <div class="row justify-content-center">
            <form action="/franco_recuperacion/controladores/visita/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <div class="row mb-3">
                <div class="col">
                    <label for="visita_nombre">Nombre del Visitante</label>
                    <input type="text" name="visita_nombre" id="visita_nombre" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                    <div class="col">
                        <label for="visita_documento">DPI</label>
                        <input type="number" name="visita_documento" id="visita_documento" class="form-control">
                    </div>
            </div>   
            <div class="row mb-3">
                    <div class="col">
                        <label for="vivienda_condominio_id">Condominio</label>
                        <select name="vivienda_condominio_id" id="vivienda_condominio_id" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($condominio as $key => $condominio) : ?>
                                <option value="<?= $condominio['CONDOMINIO_ID'] ?>"><?= $condominio['CONDOMINIO_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="visita_vivienda_id">Propietario de la vivienda</label>
                        <select name="visita_vivienda_id" id="visita_vivienda_id" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($vivienda as $key => $vivienda) : ?>
                                <option value="<?= $vivienda['VIVIENDA_ID'] ?>"><?= $vivienda['VIVIENDA_RESIDENTE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="visita_fecha">Fecha de la Visita</label>
                        <input type="date" value="<?= date('Y-m-d') ?>" name="visita_fecha" id="visita_fecha" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="visita_hora_ingreso">Hora de Ingreso</label>
                        <input type="time" value="<?= date('H:i') ?>" name="visita_hora_ingreso" id="visita_hora_ingreso" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="visita_hora_salida">Hora de Salida</label>
                        <input type="time" value="<?= date('H:i') ?>" name="visita_hora_salida" id="visita_hora_salida" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>

