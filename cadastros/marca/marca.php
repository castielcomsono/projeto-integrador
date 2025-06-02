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
    <title>Cadastro de Marcas</title>
    <style>
        body{
            padding: 8px;
        }
    </style>
</head>
<body>
   <div id="container">
        
        <h2 class="display-4"><i class="bi bi-tag"></i>Nova Marca</h2>

        <form id="cadform" method="post">
            <div class="row  mb-2">
                <div class="col-md-6">
                    <label class="form-label" for="">Nome da Marca<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nome">
                </div>
            </div>
            <div class="row  mb-2">
                <div class="col-md-6">
                    <label for="" class="form-label">Fabricante<span class="text-danger">*</span></label>
                    <input type="text" name="fabricante" class="form-control">
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
    $marca = new Cadmarcas();
    $marca->cadastrar($_POST['nome'],$_POST['fabricante']);
}

?>