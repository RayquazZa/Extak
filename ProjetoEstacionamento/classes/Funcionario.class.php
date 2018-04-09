<?php

include_once "Conexao.class.php";
include_once "Funcoes.class.php";

class Funcionario
{

    private $con;
    private $objfc;
    private $idFuncionario;
    private $nome;

    private $cpf;
    private $email;
    private $telefone;
    private $endereco;
    private $cep;
    private $bairro;
    private $numero;
    private $uf;
    private $complemento;
    private $cidade;
    private $veiculo;
    private $placa;
    private $cor;

    public function __construct()
    {
        $this->con = new Conexao();
        $this->objfc = new Funcoes();
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function querySeleciona($dado)
    {
        try {
            $this->idFuncionario = $this->objfc->base64($dado, 2);
            $cst = $this->con->conectar()->prepare("SELECT idFuncionario, nome, email, data_cadastro FROM `funcionario` WHERE `idFuncionario` = :idFunc;");
            $cst->bindParam(":idFunc", $this->idFuncionario, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fetch();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function querySelect()
    {
        try {
            $cst = $this->con->conectar()->prepare("SELECT `idFuncionario`, `nome`, `email`, `data_cadastro` FROM `funcionario`;");
            $cst->execute();
            return $cst->fetchAll();
        } catch (PDOException $ex) {
            return 'erro ' . $ex->getMessage();
        }
    }

    public function queryInsert($dados){
        try {

            $this->nome = $this->objfc->tratarCaracter($dados['nome'], 1);
            $this->email = $dados['email'];
            $this->cpf = $dados['cpf'];

            $cst = $this->con->conectar()->prepare("INSERT INTO `funcionario` (nome, cpf , email,telefone ,endereco,cep,bairro,uf,complemento,numero,cidade,veiculo,placa,cor ) VALUES ( :nome, :cpf, :email ,:telefone ,:endereco,:cep,:bairro,:uf ,:complemento,:numero,:cidade,:veiculo,:placa, :cor);");
            $cst->bindParam(":nome", $_POST['nome'], PDO::PARAM_STR);
            $cst->bindParam(":cpf", $_POST['cpf'], PDO::PARAM_STR);
            $cst->bindParam(":email", $_POST['email'], PDO::PARAM_STR);
            $cst->bindParam(":telefone", $_POST['telefone'], PDO::PARAM_STR);
            $cst->bindParam(":endereco", $_POST['endereco'], PDO::PARAM_STR);
            $cst->bindParam(":cep", $_POST['cep'], PDO::PARAM_STR);
            $cst->bindParam(":bairro", $_POST['bairro'], PDO::PARAM_STR);
            $cst->bindParam(":uf", $_POST['uf'], PDO::PARAM_STR);
            $cst->bindParam(":numero", $_POST['numero'], PDO::PARAM_STR);
            $cst->bindParam(":cidade", $_POST['cidade'], PDO::PARAM_STR);
            $cst->bindParam(":complemento", $_POST['complemento'], PDO::PARAM_STR);
            $cst->bindParam(":veiculo", $_POST['veiculo'], PDO::PARAM_STR);
            $cst->bindParam(":placa", $_POST['placa'], PDO::PARAM_STR);
            $cst->bindParam(":cor", $_POST['cor'], PDO::PARAM_STR);
            if($cst->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }




    public function queryUpdate($dados){
        try{
            $this->idFuncionario = $this->objfc->base64($dados['func'], 2);
            $this->nome = $this->objfc->tratarCaracter($dados['nome'], 1);
            $this->email = $dados['email'];
            $cst = $this->con->conectar()->prepare("UPDATE `funcionario` SET  `nome` = :nome, `email` = :email WHERE `idFuncionario` = :idFunc;");
            $cst->bindParam(":idFunc", $this->idFuncionario, PDO::PARAM_INT);
            $cst->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
            if($cst->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }

    public function queryDelete($dado){
        try{
            $this->idFuncionario = $this->objfc->base64($dado, 2);
            $cst = $this->con->conectar()->prepare("DELETE FROM `funcionario` WHERE `idFuncionario` = :idFunc;");
            $cst->bindParam(":idFunc", $this->idFuncionario, PDO::PARAM_INT);
            if($cst->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error'.$ex->getMessage();
        }
    }

}

?>
