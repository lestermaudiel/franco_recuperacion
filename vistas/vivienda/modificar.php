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
    
require_once '../../modelos/Condominio.php';
    try {
        $condominio = new Condominio();
        $condominio = $condominio->buscar();

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
                        <label for="vivienda_residente">Nombre del Residente</label>
                        <input type="text" name="vivienda_residente" id="vivienda_residente" class="form-control" required>
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
                        <button type="submit" class="btn btn-warning w-100">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>