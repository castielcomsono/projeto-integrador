<?php

$id = $_POST['id'];

include_once 'class.php';

$itens = new cadfornecedor();

$itens->Excluir($id);

?>