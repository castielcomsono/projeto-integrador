<?php
session_start();
?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

<section class="vh-100" style="background-color: #508bfc;">
  <div id="nsei">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Acesso</h3>
            <form action="" method="post">
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="text" name="usuario" id="typeEmailX-2" class="form-control form-control-lg" placeholder="Email" />
            </div>

            <div data-mdb-input-init class="form-outline mb-4">
              <input type="password" name="senha" id="typePasswordX-2" class="form-control form-control-lg" placeholder="Senha" />
            </div>
            
            <button name="entrar" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" type="submit">Entrar</button>
            <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php

if (isset($_POST['entrar']))
{
  $user = $_POST['usuario'];
  $senha = $_POST['senha'];

  $conexao = new PDO('mysql:dbname=estoquee;host=localhost','root','');

  $sql = $conexao->prepare("select USUARIO FROM cadastro_usuarios WHERE USUARIO = '$user' and SENHA = '$senha' ");
        $sql->execute();

        $dados = $sql->fetch();

        if ($sql->rowCount() > 0){

            $_SESSION['usuario'] = $dados['USUARIO'];
            header('Location:../dashboard/principal.html');

        }
        else{
            echo "<h3> Dados Inválidos! </h3>";
        }
}

?>
</section>


