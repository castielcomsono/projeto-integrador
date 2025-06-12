<?php
if($_POST['acao'] == 'Excluir')
{
$id = $_POST['id'];

include_once 'class.php';

$itens = new Atendimento();

$itens->Excluir($id);
}

elseif($_POST['acao'] == 'Alterar')
{

    include_once '../../conexao/conexao.php';
    
    $id = $_POST['id'];
    $sql = $connexao->prepare("SELECT ID,PROTOCOLO,CLIENTE,DESCRICAO FROM atendimento WHERE ID = '$id' ");
    $sql->execute();
    $dados = $sql->fetchAll();
    
    echo json_encode($dados);

}

elseif($_POST['acao'] == 'confirmar')
{
    include_once 'class.php';
    // criar um objeto
    $item = new Atendimento();
    //acessando o metodo e passando os valores
    $item->Alterar($_POST['id'], $_POST['protocolo'], $_POST['cliente'],$_POST['descricao'] );

    $item->Lista();


    
}
?>