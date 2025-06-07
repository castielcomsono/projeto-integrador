<?php

class Atendimento
{
    //atributos
    private $protocolo;
    private $cliente;
    private $descricao;
    private $conexao;
    private $id;
    private $usuario;
    //funções

    public function __construct()
    {
        include_once '../../conexao/conexao.php';
        $this->conexao = $conexao;
    }

    public function cadastrar(string $protocolo, string $cliente, string $descricao, int $id, string $usuario)
    {
        $this->protocolo = $protocolo;
        $this->cliente = $cliente;
        $this->descricao = $descricao;
        $this->id = $id;
        $this->usuario = $usuario;
        $this->conexao = $conexao;

        $sql = $this->conexao->prepare("INSERT INTO atendimento(PROTOCOLO,CLIENTE,DESCRICAO,DATA,HORA,USUARIO)
                                        VALUES ('$this->protocolo','$this->cliente','$this->descricao',NOW(),NOW(),'$this->usuario')");
        
        $sql->execute();

        if($sql->rowCount() > 0){
            echo "Atendimento realizado com sucesso!";
        }
        else{
            echo "Erro: Não foi possivel concluir seu atendimento.";
        }
    }

    public function mostrarclientes()
    {
        $sql = $this->conexao->prepare("SELECT ID,NOME from cadastro_clientes");
        $sql->execute();

        $dados = $sql->fetchAll();

        foreach ($dados as $linha){
            echo "
                    <option value='$linha[ID]'>$linha[NOME]</option>
            ";
        }
    }

    public function excluir()
    {
        $this->id = $id;
        $sql = $this->conexao->prepare("DELETE FROM atendimento WHERE ID = $this->id");
        $sql->execute();

        if($sql->rowCount() > 0){
            echo "Atendimento deletado com sucesso";
        }
        else{
            echo "Erro: Não foi possivel deletar o atendimento";
        }
    }

    public function lista()
    {
        $sql = $this->conexao->prepare("SELECT ID,PROTOCOLO,CLIENTE,DESCRICAO from atendimento");//prepara o comando sql.
            $sql->execute();

            $dados = $sql->fetchAll();//busca todas as listas que o select exibe, e exibe em forma de tabela.

            foreach($dados as $item){
                
                echo "
                <tr>
                    <td>$item[PROTOCOLO]</td>
                    <td>$item[CLIENTE]</td>
                    <td>$item[DESCRICAO]</td>
                    <td>
                        <i class='bi bi-trash-fill'onclick='Excluir($item[ID]);'></i>
                        <i class='bi bi-pencil-square'></i>
                    </td>
                        
                </tr>
                
                ";
            }
    }

    public function alterar()
    {

    }





}


?>