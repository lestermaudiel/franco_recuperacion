<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Vivienda.php';
require_once '../../modelos/Condominio.php';
try {
    $vivienda = new Vivienda($_GET);
    $condominio = new Condominio();
    $vivienda = $vivienda->buscar();
    $condominio = $condominio->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultados de búsqueda</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO.</th>
                            <th>RESIDENTE</th>
                            <th>CONDOMINIO</th>
                            <th>MODIFICAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($vivienda) > 0):?>
                        <?php foreach($vivienda as $key => $vivienda) : ?>

                            <?php
                            // Verificar si el índice existe en $condominio
                            $condominio_actual = isset($condominio[$key]) ? $condominio[$key] : array();
                            ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $vivienda['VIVIENDA_RESIDENTE'] ?></td>
                                <td><?= isset($condominio_actual['CONDOMINIO_NOMBRE']) ? $condominio_actual['CONDOMINIO_NOMBRE'] : '' ?></td>
                                <td><a class="btn btn-warning w-100" href="/franco_recuperacion/vistas/vivienda/modificar.php?vivienda_id=<?= $vivienda['VIVIENDA_ID']?>">Modificar</a></td>
                                <td><a class="btn btn-danger w-100" href="/franco_recuperacion/controladores/vivienda/eliminar.php?vivienda_id=<?= $vivienda['VIVIENDA_ID']?>">Eliminar</a></td>
                            </tr>
                        <?php endforeach ?>
                        <?php else :?>
                            <tr>
                                <td colspan="6">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/franco_recuperacion/vistas/vivienda/buscar.php" class="btn btn-info w-100">Regresar a la búsqueda</a>
            </div>
        </div>
    </div>
</body>
</html>