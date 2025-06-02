<?php
    include_once 'class.php'
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Cadastro de Clientes</title>
</head>
<style>
    body{
    padding: 8px;
    }
</style>
<body>
    
    <div id="container">
     
        
    <h2 class="display-4"> <i class="bi bi-person-fill"></i> Novo Cliente</h2>
    <!-- titulo principal de novo cliente -->

        <form action="" method="post">
        <!-- formulario de cadastro de clientes -->
            <div class="row">
            <!-- a classe row no bootstrap coloca/ocupa 12 colunas, que é 100% da tela -->
                
                <div class="col-md-6">
            <!-- 6 das 12 colunas serão usadas -->
                    <label class="form-label" for="">Cliente</label>
                    <input type="text" name="nome_cliente" class="form-control">
                </div>

                <div class="col-md-3">
            <!-- 3 das 12 colunas serão usadas -->
                    <label class="form-label" for="">Idade</label>
                    <input type="number" name="idade" class="form-control">
                </div>

                <div class="col-md-3">
            <!-- 3 das 12 colunas serão usadas (6+3+3=12) -->
                    <label class="form-label" for="">Nascimento</label>
                    <input type="date" name="nascimento" class="form-control">
                </div>
            
            </div>

            <div class="row">
                
                <div class="col-md-3">
                    <label class="form-label">Sexo</label>
                    <select name="sexo" class="form-select"> 
                        <option value=""></option>
                        <option value="m">Masculino</option>
                        <option value="f">Feminino</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label" for="">CPF</label>
                    <input type="text" name="cpf" class="form-control">
                </div>

                <div class="col-md-5">
                    <label class="form-label" for="">E-mail</label>
                    <input type="email" name="email_cliente" class="form-control">
                </div>

            </div>

            
            <div class="row">
                <div class="col-md-3"> 
                    <label class="form-label" for="">Telefone</label>
                    <input type="tel" name="telefone" class="form-control">
                </div>

                <div class="col-md-4"> 
                    <label class="form-label" for="">CEP</label>
                    <input type="number" name="cep" class="form-control">
                </div>

                <div class="col-md-5">
                    <label class="form-label" for="">Endereço</label>
                    <input type="text" name="end" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label class="form-label" for="">Estado</label>
                    <select name="estado" class="form-select">
                        
                        <option value="">Selecione o Estado</option>
                
                        <optgroup label="Região Nordeste"></optgroup>
                        <option value="PB">Paraíba</option>
                        <option value="PE">Pernambuco</option>
                        <option value="AL">Alagoas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="MA">Maranhão</option>
                        <option value="PI">Piauí</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="SE">Sergipe</option>
                    
                        <optgroup label="Região Norte"></optgroup>
                        <option value="AC">Acre</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="PA">Pará</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraíma</option>
                        <option value="TO">Tocantins</option>
                    
                        <optgroup label="Região Sul"></optgroup>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="PR">Paraná</option>
                    
                        <optgroup label="Região Sudeste"></optgroup>
                        <option value="SP">São Paulo</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="ES">Espirito Santo</option>
                    
                        <optgroup label="Região Centro-Oeste"></optgroup>
                        <option value="GO">Goiás</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="MT">Mato Grosso</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label" >Bairro</label>
                    <input type="text" name="bairro" class="form-control">
                </div>

                <div class="col-md-5"> 
                    <label class="form-label" >Cidade</label>
                    <input type="text" name="cidade" class="form-control" >
                </div>
            
            </div>
            
            <hr>
            <div class="row"> 
                <div class="col-md-12">
                    <button type="submit" name="salvar" class="btn btn-primary">Salvar <i class="bi bi-floppy-fill"></i></button>
                </div>
            </div>
        
        </form>


    </div>

</body>
</html>

<?php
    if(isset($_POST['salvar'])){
        $marca = new CadClientes();

        $marca->cadastrar($_POST['nome_cliente'],$_POST['idade'],$_POST['nascimento'],$_POST['sexo'],$_POST['cpf'],$_POST['email_cliente'],$_POST['telefone'],$_POST['cep'],$_POST['end'],$_POST['bairro'],$_POST['cidade'],$_POST['estado']);

    }

?>