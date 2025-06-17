<?php
if($_POST['acao'] == 'Excluir')
{
include_once 'class.php';

$id = $_POST['id'];

$itens = new Cadmarcas();

$itens->Excluir($id);
}


elseif($_POST['acao'] == 'mostrar')
{
   
    include_once '../../conexao/conexao.php';
   
    $id = $_POST['id'];
    $sql = $connexao->prepare("SELECT ID,NOME,FABRICANTE FROM cadastro_marcas WHERE ID = '$id' ");
    $sql->execute();
    $dados = $sql->fetchAll();
    
    echo json_encode($dados);


  
}

elseif($_POST['acao'] == 'confirmar')
{
    include_once 'class.php';
    // criar um objeto
    $item = new Cadmarcas();
    //acessando o metodo e passando os valores
    $item->Alterar($_POST['id'], $_POST['marca'], $_POST['fabricante'] );

    $item->Lista();


    
}
?>