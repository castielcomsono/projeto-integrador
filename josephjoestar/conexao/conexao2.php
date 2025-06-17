<?php


public function criarconexao()
{
    return new PDO('mysql:dbname=estoquee;host=localhost','root');
}

?>