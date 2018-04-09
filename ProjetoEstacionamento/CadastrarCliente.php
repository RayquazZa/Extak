<?php
require_once 'classes/Funcionario.class.php';
require_once 'classes/Funcoes.class.php';

$objFcn = new Funcionario();
$objFcs = new Funcoes();

if(isset($_POST['btCadastrar'])){
    if($objFcn->queryInsert($_POST) == 'ok'){
        header('location: /formulario');
    }else{
        echo '<script type="text/javascript">alert("Erro em cadastrar");</script>';
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastrar Cliente</title>

    <meta charset="utf-8">

    <link rel="shortcut icon" href="imagens\fa.jpg" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="estilo	/estilo.css">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#endereco").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");

            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.

                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#endereco").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#endereco").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);

                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
</head>
<body>
<div class="container">
    <div class="mb-3">
        <nav class="navbar navbar-expand-sm ">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><b> Cadastro </b></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="PreCadastro.html"><b> Pré-Cadastro </b></a>
                        <a class="dropdown-item" href="CadastrarCliente.html"><b> Cadastrar Cliente </b></a>
                        <a class="dropdown-item" href="ManterUsuario.html"> <b> Manter Usúario </b> </a>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link   " href="GerarRelatorios.html"><b> Relatório </b> </a>
                </li>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><b> Pagamento </b></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="AlterarValorHora.html"><b> Alterar valor hora </b></a>
                            <a class="dropdown-item" href="Pagamento.html"><b> Pagamento </b></a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Cadastrarvagas.html"> <b> Vagas </b> </a>
                    </li>
                </ul>
        </nav>
        <div class="topo">
        </div>
    </div>
    <div id="formulario">
    <form method="post" action="" name="formulario">
        <div class="form-row ">
            <div class="col-md-4 mb-3 ">
                <label >Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome"  required>
            </div>
            <div class="col-md-4  offset-md-4">
                <label >CPF/CNPJ</label>
                <input type="text" class="form-control " name="cpf" placeholder="CPF/CNPJ" required>
            </div>

            <div class="col-md-4">
                <label >Email</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >@</span>
                    </div>
                    <input type="e-mail" class="form-control " name="email"  placeholder="iradomar@hotgmail.com" required>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label >Telefone</label>
                <input type="text" class="form-control " name="telefone"  placeholder="(XX) xxxxx-xxxx" required>
            </div>
        </div>
        <hr>
        <div class="form-row ">
            <div class="col-md-7 mb-3">
                <label >Endereço</label>
                <input type="text" class="form-control " id="endereco" name="endereco"  placeholder="Endereço" required>
            </div>
            <div class="col-md-3  offset-md-2">
                <label >Cep</label>
                <input type="text" class="form-control " id="cep" name="cep" placeholder="Cep" required  >
                <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/ "  target="_blanck" >Buscar CEP</a>
            </div>
            <div class="col-md-7 mb-3">
                <label >Bairro</label>
                <input type="text" class="form-control " id="bairro" name="bairro"  placeholder="Bairro" required>
            </div>

            <div class="col-md-7 mb-3 ">
                <label >Cidade</label>
                <input type="text" class="form-control " id="cidade" name="cidade" placeholder="Cidade" required>
            </div>
            <div class="col-md-3  offset-md-2">
                <label >Complemento</label>
                <input type="text" class="form-control "  name="complemento" placeholder="Complemento" required  >
            </div>
            <div class="col-md-7 mb-3 ">
                <label >Estado</label>
                <input type="text" class="form-control" size="2" id="uf" name="uf" placeholder="Estado" required>
            </div>
            <div class="col-md-7 mb-3 ">
                <label >Número</label>
                <input type="text" class="form-control" size="2"  name="numero" placeholder="Número" required>
            </div>
        </div>
        <hr>
        <div class="form-row">
            <div class="col-md-6 mb-3 ">
                <label >Veiculo</label>
                <input type="text" class="form-control " name="veiculo" placeholder="Veiculo" required>
            </div>
            <div class="col-md-3 mb-2 ">
                <label >Placa do Carro</label>
                <input type="text" class="form-control " name="placa" placeholder="XXX-0000" required>
            </div>
            <div class="col-md-3 mb-2 ">
                <label >Cor</label>
                <input type="text" class="form-control " name="cor" placeholder="Cor" required>
            </div>
        </div>

        <div class="mb-3">
            <div class="  offset-md-4">
                <button  id="can2" name="btCadastrar" class="btn btn-outline-primary btn-responsive ">Cadastrar</button>
            </div>
        </div>
    </form>
    </div>
</div>
</body>
</html>






