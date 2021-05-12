<?php

require '../vendor/autoload.php';
require '../clases/Departamentos.php';

use Clases\Departamentos;

$departamentos = new Departamentos();
$departamentos->setId($_POST['id']);
$departamentos->delete();
$departamentos=null;
header("Location:departamentos.php");
