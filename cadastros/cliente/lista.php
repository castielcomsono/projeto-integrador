<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=div, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Lista de Clientes</title>
</head>
<body>
    <div class="container">

    <h3>Lista de Clientes Cadastrados</h3>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Idade</th>
                <th>Sexo</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
        <?php
            //Chamar o arquivo class.php
            include_once 'class.php';
            //Criar o objeto
            $itens = new CadClientes();
            //Acessar a função de listagem
            $itens->Lista();
        ?>
        </tbody>
    </table>
    </div>
</body>
</html>

<script>
    function Excluir(id){
        $.ajax({
            url:"enviar.php",
            type:"post",
            data:{id: id},
            success: function(resposta){
                alert(resposta);
            }
        })
    }
</script>