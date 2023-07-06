<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Vivienda.php';
    try {
        $vivienda = new Vivienda($_GET);

        $vivienda = $vivienda->buscar();
       
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <h1 class="text-center">Modificar Propietarios Viviendas</h1>
        <div class="row justify-content-center">
            <form action="/franco_recuperacion/controladores/vivienda/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="vivienda_id">
                <div class="row mb-3">
                    <div class="col">
                        <label for="vivienda_residente">Nombre del Propietario</label>
                        <input type="text" name="vivienda_residente" id="vivienda_residente" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="condominio_nombre">Condominio</label>
                        <input type="text" name="condominio_nombre" id="condominio_nombre" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-warning w-100">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>