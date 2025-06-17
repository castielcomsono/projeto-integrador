<?php include_once 'class.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <title>Atendimentos</title>
    <style>
        body{
            padding: 8px;
        }
    </style>
</head>
<body>
   <div id="container">
        
        <h2 class="display-4"><i class="bi bi-card-text"></i> Novo Atendimento</h2>

        <form id="cadform" method="post">
            <div class="row  mb-2">
                <div class="col-md-6">
                    <label class="form-label" for="">Protocolo<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="protocolo">
                </div>
            </div>
            <div class="row  mb-2">
                <div class="col-md-6">
                    <label for="" class="form-label">Cliente<span class="text-danger">*</span></label>
                    
                    <select name="cliente" class="form-select">

                        <?php
                            
                            $clientes = new Atendimento();
                            $clientes->mostrarclientes();
                        ?>


                    </select>
                </div>
            </div>
            <div class="row  mb-2">
                <div class="col-md-6">
                    <label for="" class="form-label">Descrição do Atendimento<span class="text-danger">*</span></label>
                    <textarea name="descricao" class="form-control" rows="8"></textarea>
                </div>
            </div>
            <hr>
            <div class="row"> 
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary" name="salvar">Salvar <i class="bi bi-check-lg"></i></button>
                    <button name="cancelar" class="btn btn-danger">Cancelar<i class="bi bi-x-lg"></i></button>
                </div>
        </form>
</body>
</html>

<?php



if(isset($_POST['salvar'])){

   
    $atendimento = new Atendimento();
    $atendimento->cadastrar($_POST['protocolo'],$_POST['cliente'],$_POST['descricao']);
    
}

?>