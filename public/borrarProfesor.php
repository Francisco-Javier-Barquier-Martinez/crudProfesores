<?php

require '../vendor/autoload.php';
require '../clases/Profesores.php';

use Clases\Profesores;

$profesores = new Profesores();
$profesores->setId($_POST['id']);
$profesores->delete();
$profesores=null;
header("Location:profesores.php");
