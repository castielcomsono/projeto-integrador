<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=div, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>Lista de Marcas</title>
</head>
<body>
    <div class="container">

    <h3>Lista de Marcas Cadastradas</h3>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Marca</th>
                <th>Fabricante</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody id="dados">
        <?php
            //Chamar o arquivo class.php
            include_once 'class.php';
            //Criar o objeto
            $itens = new Cadmarcas();
            //Acessar a função de listagem
            $itens->Lista();
        ?>
        </tbody>
    </table>
    </div>

<!-- Modal -->
<div class="modal fade" id="editarmarcas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Marcas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label for="">ID</label class="form-label">
        <input type="text" name="id" id="id" disabled class="form-control">
        <label for="">Marca</label class="form-label">
        <input type="text" name="marca" id="marca" class="form-control">
        <label for="">Fabricante</label class="form-label">
        <input type="text" name="fabricante" id="fabricante" class="form-control">






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
            data:
            {id: id,
            acao: 'Excluir'
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
                $('#marca').val(resposta[0].NOME);
                $('#fabricante').val(resposta[0].FABRICANTE);

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
                marca : $('#marca').val(),
                fabricante : $('#fabricante').val(),
                acao : 'confirmar'
            },
            success:function(resposta){
                $('#dados').html(resposta);
            }
        });
    }
</script>