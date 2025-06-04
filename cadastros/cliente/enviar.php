<?php
if($_POST['acao'] == 'Excluir')
{
$id = $_POST['id'];

include_once 'class.php';

$itens = new CadClientes();

$itens->Excluir($id);
}

elseif($_POST['acao'] == 'Alterar')
{
    include_once '../../conexao/conexao.php';
   
    $id = $_POST['id'];
    $sql = $conexao->prepare("SELECT ID,NOME,IDADE,SEXO,CPF,EMAIL,TELEFONE,ENDERECO FROM cadastro_clientes WHERE ID = '$id' ");
    $sql->execute();
    $dados = $sql->fetchAll();
    
    echo json_encode($dados);

}

?>