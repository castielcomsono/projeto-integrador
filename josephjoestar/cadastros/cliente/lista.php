<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=div, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
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
        <tbody id="dados">
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

    <!-- Modal -->
    <div class="modal fade" id="editarclientes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Cliente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
        <div class="modal-body">
            <label for="">ID</label class="form-label">
            <input type="text" name="id" id="id" disabled class="form-control">
            <label for="">Nome</label class="form-label">
            <input type="text" name="nome" id="nome" class="form-control">
            <label for="">Idade</label class="form-label">
            <input type="number" name="idade" id="idade" class="form-control">
            <label for="">Sexo</label class="form-label">
            <select name="sexo" id="sexo" class="form-select">
                <option value=""></option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </select>
            <label for="">CPF</label class="form-label">
            <input type="text" name="cpf" id="cpf" class="form-control">
            <label for="">E-mail</label class="form-label">
            <input type="email" name="email" id="email" class="form-control">
            <label for="">Telefone</label class="form-label">
            <input type="tel" name="telefone" id="telefone" class="form-control">
            <label for="">Endereço</label class="form-label">
            <input type="text" name="end" id="end" class="form-control">
        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="alteracao();">Salvar</button>
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
            data:
            {id: id,
            acao: 'Excluir'
            },
            success: function(resposta){
                alert(resposta);
            }
        });
    }

    function Mostrar(id)
    {
        $.ajax({
            url:"enviar.php",
            dataType:'json',
            type:"post",
            data:{
                id : id,
                acao : 'Alterar'
            },
            success: function(resposta){

                $('#id').val(resposta[0].ID);
                $('#nome').val(resposta[0].NOME);
                $('#idade').val(resposta[0].IDADE);
                $('#sexo').val(resposta[0].SEXO);
                $('#cpf').val(resposta[0].CPF);
                $('#email').val(resposta[0].EMAIL);
                $('#telefone').val(resposta[0].TELEFONE);
                $('#end').val(resposta[0].ENDERECO);
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
                idade : $('#idade').val(),
                sexo : $('#sexo').val(),
                cpf : $('#cpf').val(),
                email : $('#email').val(),
                telefone : $('#telefone').val(),
                endereco : $('#end').val(),
                acao : 'confirmar'
            },
            success:function(resposta){
                $('#dados').html(resposta);
            }
        });
    }
</script>