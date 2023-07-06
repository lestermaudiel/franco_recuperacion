<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Visita.php';

if($_POST['visita_nombre'] != '' && $_POST['visita_documento'] != '' && $_POST['visita_fecha'] != '' && $_POST['visita_hora_ingreso'] != '' && $_POST['visita_hora_salida'] != '' && $_POST['visita_vivienda_id'] != ''){
    

$_POST['visita_fecha']= date('d/m/Y', strtotime($_POST['visita_fecha']));


    try {
        $visita = new Visita($_POST);

        $resultado = $visita->guardar();
        $visita = $visita->buscarPorFecha();
        $error = "No se guardó correctamente";
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
}else{
    $error = "Debe llenar todos los datos";
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Guardar visita</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?php if($resultado): ?>
                    <div class="alert alert-success" role="alert">
                        Guardado exitosamente!
                    </div>
                <?php else :?>
                    <div class="alert alert-danger" role="alert">
                        Ocurrió un error: <?= $error ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <a href="/franco_recuperacion/vistas/visita/index.php" class="btn btn-info">Regresar al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>