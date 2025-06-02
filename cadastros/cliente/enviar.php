<?php

$id = $_POST['id'];

include_once 'class.php';

$itens = new CadClientes();

$itens->Excluir($id);



?>