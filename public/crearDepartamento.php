<?php
require '../vendor/autoload.php';
require '../clases/Departamentos.php';

use Clases\Departamentos;

if (isset($_POST['crear'])) {
    //procesamos el formulario
    $n = trim($_POST['nombre']);


    $departamento = new Departamentos();
    $departamento->setNom_dep($n);

    $departamento->create();
    $departamento = null;
    header("Location:departamentos.php");
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
        <title>Departamentos | Añadir Departamento</title>
    </head>

    <body style="background-color:bisque">
        <h3 class="text-center mt-3">Añadir Departamento</h3>
        <div class="container mt-3">
            <form name="formCrear" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="col-3 mt-2">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre Del Nuevo Departamento" required />
                </div>
                <div class="mt-2">
                    <input type="submit" name="crear" placeholder="Crear" class="btn btn-success mr-2" />
                    <input type="reset" value="Limpiar" class="btn btn-warning mr-2">
                    <a href="departamentos.php" class="btn btn-primary">Volver</a>
                </div>
            </form>
        </div>
    </body>

    </html>

<?php } ?>