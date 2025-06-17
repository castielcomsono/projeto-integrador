<?php

if($_POST['acao'] == 'Excluir')
{
include_once 'class.php';

$id = $_POST['id'];

$itens = new Cadusuario();

$itens->Excluir($id);
}

elseif($_POST['acao'] == 'mostrar')
{
   
    include_once '../../conexao/conexao.php';
   
    $id = $_POST['id'];
    $sql = $connexao->prepare("SELECT ID,USUARIO,EMAIL,NIVEL FROM cadastro_usuarios WHERE ID = '$id' ");
    $sql->execute();
    $dados = $sql->fetchAll();
    
    echo json_encode($dados);

}

elseif($_POST['acao'] == 'confirmar')
{
    include_once 'class.php';
    // criar um objeto
    $item = new Cadusuario();
    //acessando o metodo e passando os valores
    $item->Alterar($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['nivel']);

    $item->Lista();


    
}
?>