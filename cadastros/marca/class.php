

<?php

class Cadmarcas
{
    //atributos
    public $nome;
    public $fabricante;
    private $conexao;
    private $id;

    public function __construct()
    {
        $connexao = new PDO('mysql:dbname=estoquee;host=localhost','root','');
        $this->conexao = $connexao;
    }

    //Métodos
    public function Cadastrar(string $nome, string $fabricante)
    {
        $this->nome = $nome;
        $this->fabricante = $fabricante;

        $sql = $this->conexao->prepare("INSERT INTO
        cadastro_marcas(NOME,FABRICANTE,DATA,HORA)
        VALUES ('$this->nome','$this->fabricante',NOW(),NOW())");
        
        $sql->execute();

        if($sql->rowCount() > 0){
            echo "Cadastro realizado com sucesso";
        }
        else{
            echo "Erro: Não foi possivel cadastrar a marca";
        }
        
    }

    public function Excluir(int $id)
    {
        $this->id = $id;
        $sql = $this->conexao->prepare("DELETE FROM cadastro_marcas WHERE ID = $this->id");
        $sql->execute();

        if($sql->rowCount() > 0){
            echo "Marca deletada com sucesso";
        }
        else{
            echo "Erro: Não foi possivel deletar a marca";
        }
    }

    public function Alterar(int $id, string $marca, string $fabricante)
    {
        $this->id = $id;
        $this->nome = $marca;
        $this->fabricante = $fabricante;

        $sql = $this->conexao->prepare("UPDATE cadastro_marcas SET NOME = '$this->nome',
                                                                   FABRICANTE = '$this->fabricante'
                                                                   WHERE
                                                                   ID = '$this->id'");
                                                                   
        $sql->execute();
    }

    public function Lista()
    {
        $sql = $this->conexao->prepare("SELECT ID,NOME,FABRICANTE FROM cadastro_marcas");
        $sql->execute();
        $dados = $sql->fetchAll();
        //Percorrer o array
        foreach($dados as $item)
        {
            echo "
            
                <tr>
                    <td>$item[NOME]</td>
                    <td>$item[FABRICANTE]</td>
                    <td>
                    <i class='bi bi-trash-fill'onclick='Excluir($item[ID]);'></i>
                    <i class='bi bi-pencil-square' data-bs-toggle='modal' data-bs-target='#editarmarcas' onclick='Mostrar($item[ID]);'></i>
                    </td>
                    
                </tr>
            
            ";
        }
    }

}



?>