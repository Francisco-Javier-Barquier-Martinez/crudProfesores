<?php

require '../vendor/autoload.php';
require '../clases/Profesores.php';

use Clases\Profesores;

$departamentos=new Profesores();
$todos=$departamentos->cogerDepartamentos();
$departamentos=null;

$id = $_GET['id'];
$profesor = new Profesores();
$profesor->setId($id);

$fila = $profesor->read();

if (isset($_POST['editar'])) {
    //Procesamos el formulario
    $n = trim($_POST['nombre']);
    $s = trim($_POST['sueldo']);
    $f = trim($_POST['fecha']);
    $d = trim($_POST['dep']);

    $profesor->setNom_prof(ucwords($n));
    $profesor->setSueldo($s);
    $profesor->setFecha_prof($f);
    $profesor->setDep($d);

    $profesor->update();
    $profesor = null;
    header("Location:profesores.php");
} else {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <title>Profesores | Editar Profesor</title>
    </head>

    <body style="background-color:bisque">
        <h3 class="text-center mt-3">Editar Profesor</h3>
        <div class="container mt-3">
            <form name="nt" action="<?php echo $_SERVER['PHP_SELF'] . "?id=$id"; ?>" method="POST">
                <div class="mt-2">
                    <input type="text" name="nombre" required value="<?php echo $fila->nom_prof; ?>" class="form-control" />
                    <input type="text" name="sueldo" required value="<?php echo $fila->sueldo; ?>" class="form-control mt-2" />
                    <input type="text" name="fecha" required value="<?php echo $fila->fecha_prof; ?>" class="form-control mt-2" />
                    <select name="dep" class="form-control mt-2" required>
                        <option selected>Selecciona el departamento</option>
                        <?php
                        while ($item = $todos->fetch(PDO::FETCH_OBJ)) {
                            echo "<option value='{$item->id}'>{$item->nom_dep}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mt-2">
                    <input type="submit" name="editar" value="Editar" class="btn btn-success mr-2" />
                    <a href="profesores.php" class="btn btn-primary">Volver</a>
                </div>
            </form>
        </div>
    </body>

    </html>

<?php } ?>