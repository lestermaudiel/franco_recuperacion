<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once '../../includes/header.php';
include_once '../../includes/navbar.php';
$resultado = "";
?>
<div class="container">
    <h1 class="text-center">Buscar Visita</h1>
    <div class="row justify-content-center">
        <form action="/franco_recuperacion/controladores/visita/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
            <div class="row mb-3">
                <div class="col">
                    <label for="visita_nombre">Nombre de la Visita</label>
                    <input type="text" name="visita_nombre" id="visita_nombre" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="condominio_nombre">Nombre del Condominio</label>
                    <input type="text" name="condominio_nombre" id="condominio_nombre" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <button type="submit" class="btn btn-info w-100">Buscar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once '../../includes/footer.php'; ?>
