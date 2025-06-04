<?php
if($_POST['acao'] == 'Excluir')
{
include_once 'class.php';

$id = $_POST['id'];

$itens = new Cadmarcas();

$itens->Excluir($id);
}


elseif($_POST['acao'] == 'Alterar')
{
   
    include_once '../../conexao/conexao.php';
   
    $id = $_POST['id'];
    $sql = $conexao->prepare("SELECT ID,NOME,FABRICANTE FROM cadastro_marcas WHERE ID = '$id' ");
    $sql->execute();
    $dados = $sql->fetchAll();
    
    echo json_encode($dados);


  
}
?>