<?php

namespace Clases;

use PDO;
use PDOException;

class Conexion
{
    protected static $conexion;

    public function __construct()
    {
        if (self::$conexion == null) {
            self::crearConexion();
        }
    }


    public static function crearConexion(){
        //Leemos el .config
        $opciones=parse_ini_file('../.config');
        $mibase=$opciones["bbdd"];
        $miusuario=$opciones["usuario"];
        $mipass=$opciones["pass"];
        $mihost=$opciones["host"];
        //Creamos el dns
        $dns="mysql:host=$mihost;dbname=$mibase;charset=utf8mb4";
        //Crear conexion
        try {
            self::$conexion=new PDO($dns, $miusuario, $mipass);
            //Siguientes 3 lineas para depurar errores
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            die("Error al conectar a la base de datos: ".$ex->getMessage());
        }
    }
}
