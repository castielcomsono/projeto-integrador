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

     public function __construct()//essa funcao eh automatica, nao precisa chamar ela toda vez.
        {

            $connexao = new PDO('mysql:dbname=estoquee;host=localhost','root','');
            $this->conexao = $connexao;

        }

    public function cadastrar($protocolo, $cliente, $descricao)
    {
       
        $this->protocolo = $protocolo;
        $this->cliente = $cliente;
        $this->descricao = $descricao;

       $sql = $this->conexao->prepare("INSERT INTO atendimento(PROTOCOLO,CLIENTE,DESCRICAO) 
       
       VALUES 
       
       ('$this->protocolo','$this->cliente','$this->descricao')");
        
        $sql->execute();

        if($sql->rowCount() > 0){
                echo "<br>
                <h3>Atendimento realizado com sucesso</h3>";
            }
            else{
                echo "<br>
                <h3>Erro: não foi possivel realizar o atendimento</h3>";
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

    public function Excluir(int $id)
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
                        <i class='bi bi-pencil-square' data-bs-toggle='modal' data-bs-target='#editaratendimento' onclick='Mostrar($item[ID]);'></i>
                    </td>
                        
                </tr>
                
                ";
            }
    }

    public function Alterar(int $id, string $protocolo, string $cliente, string $descricao)
    {
        $this->id = $id;
        $this->protocolo = $protocolo;
        $this->cliente = $cliente;
        $this->descricao = $descricao;

        $sql = $this->conexao->prepare("UPDATE atendimento SET PROTOCOLO = '$this->protocolo',
                                                                   CLIENTE = '$this->cliente',
                                                                   DESCRICAO = '$this->descricao'
                                                                   WHERE
                                                                   ID = '$this->id'");
                                                                   
        $sql->execute();
    }





}


?>