

<?php

class Cadusuario
{
    //atributos
    public $nome;
    public $email;
    public $nivel;
    public $senha;
    private $conexao;
    private $id;

    public function __construct()
    {
        include_once '../../conexao/conexao.php';
        $this->conexao = $conexao;
    }

    //Métodos
    public function Cadastrar(string $nome, string $email, string $nivel, string $senha)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->nivel = $nivel;
        $this->senha = $senha;

        $sql = $this->conexao->prepare("INSERT INTO
        cadastro_usuarios(USUARIO,EMAIL,NIVEL,SENHA,DATA,HORA)
        VALUES ('$this->nome','$this->email','$this->nivel','$this->senha',NOW(),NOW())");
        
        $sql->execute();

        if($sql->rowCount() > 0){
            echo "<h3>Cadastro realizado com sucesso</h3>";
        }
        else{
            echo "<h3>Erro: Não foi possivel cadastrar o usuário</h3>";
        }
        
    }

    public function Excluir(int $id)
    {
        $this->id = $id;
        $sql = $this->conexao->prepare("DELETE FROM cadastro_usuarios WHERE ID = $this->id");
        $sql->execute();

        if($sql->rowCount() > 0){
            echo "Usuário deletado com sucesso";
        }
        else{
            echo "Erro: Não foi possivel deletar o usuário";
        }
    }

   public function Alterar(int $id, string $nome, string $email, string $nivel)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->nivel = $nivel;

        $sql = $this->conexao->prepare("UPDATE cadastro_usuarios SET USUARIO = '$this->nome',
                                                                   EMAIL = '$this->email',
                                                                   NIVEL = '$this->nivel',
                                                                   WHERE
                                                                   ID = '$this->id'");
                                                                   
        $sql->execute();
    }

    public function Lista()
    {
        $sql = $this->conexao->prepare("SELECT ID,USUARIO,EMAIL,NIVEL FROM cadastro_usuarios");
        $sql->execute();
        $dados = $sql->fetchAll();
        //Percorrer o array
        foreach($dados as $item)
        {
            echo "
            
                <tr>
                    <td>$item[USUARIO]</td>
                    <td>$item[EMAIL]</td>
                    <td>$item[NIVEL]</td>
                    <td>
                    <i class='bi bi-trash-fill'onclick='Excluir($item[ID]);'></i>
                    <i class='bi bi-pencil-square' data-bs-toggle='modal' data-bs-target='#editarmarcas' onclick='Mostrar($item[ID]);'></i>
                    </td>
                    
                </tr>
            
            ";
        }
    }

    public function Procurar(int $id)
    {
        
    }

}



?>