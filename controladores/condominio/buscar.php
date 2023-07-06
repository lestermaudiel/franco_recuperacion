<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Condominio.php';
try {
    $condominio = new Condominio($_GET);
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
    <title>Buscar Condominios</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO. </th>
                            <th>CONDOMINIO</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($condominio) > 0):?>
                        <?php foreach($condominio as $key => $condominio) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $condominio['CONDOMINIO_NOMBRE'] ?></td>
                            <td><a class="btn btn-danger w-100" href="/franco_recuperacion/controladores/condominio/eliminar.php?espec_id=<?= $condominio['CONDOMINIO_ID']?>">Eliminar</a></td>
                        </tr>
                        <?php endforeach ?>
                        <?php else :?>
                            <tr>
                                <td colspan="3">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/franco_recuperacion/vistas/condominio/buscar.php" class="btn btn-info w-100">Regresar a la busqueda</a>
            </div>
        </div>
    </div>
</body>
</html>