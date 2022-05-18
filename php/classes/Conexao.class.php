<?php

class Conexao
{
    public $sql;
    public $con;
    public $stmt;

    public function conectar()
    {

        try {
            //code...
            $this->con = new PDO("pgsql:host=localhost;port=5432;dbname=postgres", "postgres", "1234", array());
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function testarconexao(){
        try {
            
            $this->conectar();
            echo "conectado";

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
