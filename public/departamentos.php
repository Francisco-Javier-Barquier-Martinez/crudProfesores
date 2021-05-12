<!DOCTYPE html>
<?php
require '../vendor/autoload.php';
require '../clases/Departamentos.php';

use Clases\Departamentos;

$departamentos = new Departamentos();
$todos = $departamentos->readAll();
$departamentos = null;
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title>Departamentos</title>
</head>

<body style="background-color: bisque;">
    <h3 class="text-center mt-3">Departamentos</h3>

    <div class="container mt-3 mb-4">
        <a href="crearDepartamento.php" class="btn btn-success my-3"><i class="fas fa-plus"></i> Añadir Departamento</a>
        <a href="profesores.php" class="btn btn-success my-3"><i class="fas fa-user-tie"></i> Profesores</a>

        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col" class='text-center'>Departamento</th>
                    <th scope="col" class='text-center'>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = $todos->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr>";
                    echo "<th scope='row'>$fila->id</th>";
                    echo "<td class='text-center'>$fila->nom_dep</td>";
                    echo "<td class='text-center'>";
                    echo <<< CADENA
                    <form name="a" method="POST" action="borrarDepartamento.php" class="inline">
                    <a href="editarDepartamento.php?id={$fila->id}" class="btn btn-warning"><i class="far fa-edit"></i> Editar</a>&nbsp;
                    <input type="hidden" name="id" value="{$fila->id}" />
                    <button type="submit" class="btn btn-danger" onsubmit="return confirm('Borrar Departamento')"><i class="fas fa-trash-alt"></i> Borrar</button>
                    </form>
                    CADENA;
                    echo "</td>";
                    echo "</tr>" . PHP_EOL;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>