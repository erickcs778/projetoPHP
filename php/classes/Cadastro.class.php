<?php

use LDAP\Result;

require_once "Conexao.class.php";

class Cadastro extends Conexao
{

    private $id;
    private $nome;
    private $idade;
    private $email;

    // metodos magicos php 
    public function __get($valor)
    {
        return $this->$valor;
    }

    public function __set($prop, $valor)
    {
        $this->$prop = $valor;
    }


    // cadastrar usuario 
    public function cadastrar($nome, $idade, $email)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->email = $email;

        try {
            $this->sql = "INSERT INTO cadastro (nome, idade, email) VALUES (?,?,?)";
            $this->stmt = $this->conectar()->prepare($this->sql);
            $this->stmt->execute(array($this->nome, $this->idade, $this->email));
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // listar usuarios 

    public function listar()
    {
        $this->sql = "SELECT * FROM cadastro;";
        $this->stmt = $this->conectar()->prepare($this->sql);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $valor) {
            echo "
            <tr>
            <td>
            $valor[nome]
            </td>
            <td>
            $valor[idade]
            </td>
            <td>
            $valor[email]
            </td>
            <td>
            <a href=''>alterar</a>
            </td>
            <td>
            <a href=''>deletar</a>
            </td>
            </tr>          
            ";
        }
    }
}
