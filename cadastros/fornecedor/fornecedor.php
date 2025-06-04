<?php
    include_once 'class.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <title>Cadastro de Fornecedor</title>
    <style>
        body{
            padding: 8px;
        }
    </style>
</head>
<body>
   <div id="container">
        
        <h2 class="display-4"><i class="bi bi-tag"></i>Novo Fornecedor</h2>

        <form id="cadform" method="post">
            
            <div class="row  mb-2">
                
                <div class="col-md-4">
                    <label class="form-label" for="">Razão Social<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="razaosocial">
                </div>

                <div class="col-md-4">
                    <label for="" class="form-label">Nome Fantasia<span class="text-danger">*</span></label>
                    <input type="text" name="nomefantasia" class="form-control">
                </div>

                <div class="col-md-4">
                    <label for="" class="form-label">CNPJ<span class="text-danger">*</span></label>
                    <input type="text" name="cnpj" class="form-control">
                </div>
            
            </div>

             <div class="row  mb-2">

                <div class="col-md-4">
                    <label for="" class="form-label">CPF<span class="text-danger">*</span></label>
                    <input type="text" name="cpf" class="form-control">
                </div>
                
                <div class="col-md-4">
                    <label for="" class="form-label">E-mail<span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control">
                </div>
            
                <div class="col-md-4">
                    <label for="" class="form-label">Site<span class="text-danger">*</span></label>
                    <input type="text" name="site" class="form-control">
                </div>
            
            </div>

            <div class="row  mb-2">
                
                <div class="col-md-4">
                    <label for="" class="form-label">Telefone<span class="text-danger">*</span></label>
                    <input type="tel" name="telefone" class="form-control">
                </div>
           
                <div class="col-md-4">
                    <label for="" class="form-label">CEP<span class="text-danger">*</span></label>
                    <input type="number" name="cep" class="form-control">
                </div>
                
                <div class="col-md-4">
                    <label for="" class="form-label">Endereço<span class="text-danger">*</span></label>
                    <input type="text" name="end" class="form-control">
                </div>
        
             <div class="row  mb-2">

                <div class="col-md-4">
                    <label for="" class="form-label">Bairro<span class="text-danger">*</span></label>
                    <input type="text" name="bairro" class="form-control">
                </div>
                
                <div class="col-md-4">
                    <label for="" class="form-label">Cidade<span class="text-danger">*</span></label>
                    <input type="text" name="cidade" class="form-control">
                </div>
            
                <div class="col-md-4">
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
            </div>
            <hr>
            <div class="row"> 
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary" name="salvar">Salvar <i class="bi bi-floppy-fill"></i></button>
                </div>
        </form>
</body>
</html>

<?php

if(isset($_POST['salvar'])){
    $fornecedor = new cadfornecedor();
    $fornecedor->cadastrar($_POST['razaosocial'],$_POST['nomefantasia'],$_POST['cnpj'],$_POST['cpf'],$_POST['email'],$_POST['site'],$_POST['telefone'],$_POST['cep'],$_POST['end'],$_POST['bairro'],$_POST['cidade'],$_POST['estado']);
}

?>