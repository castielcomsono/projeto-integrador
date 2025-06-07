<?php

$id = $_POST['id'];

include_once 'class.php';

$itens = new Atendimento();

$itens->Excluir($id);

?>