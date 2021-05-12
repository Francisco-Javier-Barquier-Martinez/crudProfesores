<?php

namespace Clases;

require '../clases/Conexion.php';

use Clases\Conexion;
use PDOException;
use PDO;

class Departamentos extends Conexion
{
    private $id;
    private $nom_dep;

    public function __construct()
    {
        parent::__construct();
    }

    //METODOS
    public function create()
    {
        $id = "insert into departamentos(nom_dep) values(:n)";
        $stmt = parent::$conexion->prepare($id);
        try {
            $stmt->execute([
                ':n' => $this->nom_dep
            ]);
        } catch (PDOException $ex) {
            die("Error al crear nuevo departamento: " . $ex->getMessage());
        }
    }

    public function read()
    {
        $r = "select * from departamentos where id=:i";
        $stmt = parent::$conexion->prepare($r);
        try {
            $stmt->execute([
                ':i' => $this->id
            ]);
        } catch (PDOException $ex) {
            die("Error al leer un departamento: " . $ex->getMessage());
        }
        $fila = $stmt->fetch(PDO::FETCH_OBJ);
        return $fila;
    }

    public function update()
    {
        $u = "update departamentos set nom_dep=:n where id=:i";
        $stmt = parent::$conexion->prepare($u);
        try {
            $stmt->execute([
                ':i' => $this->id,
                ':n' => $this->nom_dep
            ]);
        } catch (PDOException $ex) {
            die("Error al editar departamento: " . $ex->getMessage());
        }
    }

    public function delete()
    {
        $del = "delete from departamentos where id=:id";
        $stmt = parent::$conexion->prepare($del);
        try {
            $stmt->execute([
                ':id' => $this->id
            ]);
        } catch (PDOException $ex) {
            die("Error al borrar el departamento: " . $ex->getMessage());
        }
    }


    public function readAll()
    {
        $i = "select * from departamentos";
        $stmt = parent::$conexion->prepare($i);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al leer departamentos: " . $ex->getMessage());
        }
        return $stmt;
    }


    //-------------- GETTER & SETTER ------------------------------------

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nom_dep
     */ 
    public function getNom_dep()
    {
        return $this->nom_dep;
    }

    /**
     * Set the value of nom_dep
     *
     * @return  self
     */ 
    public function setNom_dep($nom_dep)
    {
        $this->nom_dep = $nom_dep;

        return $this;
    }
}
