<?php

include_once "$_SERVER[DOCUMENT_ROOT]/projeto/env.php";

class Conexao
{
    public $sql;
    public $con;
    public $stmt;

    public function conectar()
    {

        try {
            //code...
            $this->con = new PDO(
                "pgsql:host=" . getenv("DBHOST") . ";port=" . getenv("DBPORT") . ";dbname=" . getenv("DBNAME"),
                getenv("DBUSER"),
                getenv("DBPASS"),
                array()
            );
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->con;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function testarconexao()
    {
        try {

            $this->conectar();
            echo "conectado";
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
