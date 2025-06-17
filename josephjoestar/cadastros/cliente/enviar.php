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
    $sql = $connexao->prepare("SELECT ID,NOME,IDADE,SEXO,CPF,EMAIL,TELEFONE,ENDERECO FROM cadastro_clientes WHERE ID = '$id' ");
    $sql->execute();
    $dados = $sql->fetchAll();
    
    echo json_encode($dados);

}

elseif($_POST['acao'] == 'confirmar')
{
    include_once 'class.php';
    // criar um objeto
    $item = new CadClientes();
    //acessando o metodo e passando os valores
    $item->Alterar($_POST['id'], $_POST['nome'], $_POST['idade'],$_POST['sexo'], $_POST['cpf'], $_POST['email'], $_POST['telefone'], $_POST['endereco'] );

    $item->Lista();


    
}

?>