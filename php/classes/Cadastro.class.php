<?php

require "$_SERVER[DOCUMENT_ROOT]/projeto/vendor/autoload.php";
require_once "Conexao.class.php";


use PHPMailer\PHPMailer\PHPMailer;

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
        $this->sql = "SELECT * FROM cadastro ORDER BY nome ASC";
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
            <a href='/projeto/pages/alterar.php?nome=$valor[nome]&idade=$valor[idade]&email=$valor[email]&id=$valor[id]'>alterar</a>
            </td>
            <td>
            <a href='/projeto/php/action/excluiraction.php?id=$valor[id]'>deletar</a>
            </td>
            </tr>          
            ";
        }
    }


    public function alterar($nome, $idade, $email, $id)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->email = $email;
        $this->id = $id;
        try {
            $this->sql = "UPDATE cadastro SET nome=?, idade=?, email=? WHERE id=?";
            $this->stmt = $this->conectar()->prepare($this->sql);
            $this->stmt->execute(array($this->nome, $this->idade, $this->email, $this->id));
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    public function excluir($id)
    {
        $this->id = $id;
        try {
            $this->sql = "DELETE FROM cadastro WHERE id=?";
            $this->stmt = $this->conectar()->prepare($this->sql);
            $this->stmt->execute(array($this->id));
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function testeEmail($email, $subject, $msg)
    {

        try {
            // Conexão do email
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Username = getenv("MAILUSER");
            $mail->Password = getenv("MAILPASS");
            $mail->Port = 587;

            //Envio do email
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $msg;
            if(!$mail->send()){
                return $mail->ErrorInfo;
                
            } else{
                return true;
            }

            

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
