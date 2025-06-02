<?php

$id = $_POST['id'];

include_once 'class.php';

$itens = new Cadmarcas();

$itens->Excluir($id);



?>