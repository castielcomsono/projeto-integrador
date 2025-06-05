<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=div, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Lista de Usuários</title>
</head>
<body>
    <div class="container">

    <h3>Lista de Usuários Cadastrados</h3>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Usuário</th>
                <th>E-mail</th>
                <th>Nível</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody id="dados">
        <?php
            //Chamar o arquivo class.php
            include_once 'class.php';
            //Criar o objeto
            $itens = new Cadusuario();
            //Acessar a função de listagem
            $itens->Lista();
        ?>
        </tbody>
    </table>
    </div>


        <!-- Modal -->
    <div class="modal fade" id="editarusuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Usuário</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <label for="">ID</label class="form-label">
            <input type="text" name="id" id="id" disabled class="form-control">
            <label for="">Usuário</label class="form-label">
            <input type="text" name="nome" id="nome" class="form-control">
            <label for="">E-mail</label class="form-label">
            <input type="email" name="email" id="email" class="form-control">
            <label for="">Nível</label class="form-label">
            <select name="nivel" id="nivel">
                <option value=""></option>
                <option value="Operador">Operador</option>
                <option value="Administrador">Administrador</option>
            </select>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary" onclick="alteracao();" data-bs-dismiss="modal">Salvar</button>
        </div>
        </div>
    </div>
    </div>

</body>
</html>

<script>
    function Excluir(id){
        $.ajax({
            url:"enviar.php",
            type:"post",
            data:{id : id,
                acao : 'Excluir'
            },
            success: function(resposta){
                alert(resposta);
            }
        })
    }

    function Mostrar(id)
    {
        $.ajax({
            url:"enviar.php",
            dataType:'json',
            type:"post",
            data:{
                id : id,
                acao : 'mostrar'
            },
            success: function(resposta){

                $('#id').val(resposta[0].ID);
                $('#nome').val(resposta[0].USUARIO);
                $('#email').val(resposta[0].EMAIL);
                $('#nivel').val(resposta[0].NIVEL);
            }
        });
    }
</script>

<script>

function alteracao(){

        $.ajax({
            url:'enviar.php',
            type:'post',
            data:{
                id : $('#id').val(),
                nome : $('#nome').val(),
                email : $('#email').val(),
                nivel : $('#nivel').val(),
                acao : 'confirmar'
            },
            success:function(resposta){
                $('#dados').html(resposta);
            }
        });
    }

</script>