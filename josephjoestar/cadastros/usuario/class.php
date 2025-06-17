

<?php

session_start();

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
        $connexao = new PDO('mysql:dbname=estoquee;host=localhost','root','');
        $this->conexao = $connexao;
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
                    <i class='bi bi-pencil-square' data-bs-toggle='modal' data-bs-target='#editarusuario' onclick='Mostrar($item[ID]);'></i>
                    </td>
                    
                </tr>
            
            ";
        }
    }

    // public function Logar(string $nome, $senha)
    // {
    //     $this->nome = $nome;
    //     $this->senha = $senha;

    //     $sql = $this->conexao->prepare("select USUARIO FROM cadastro_usuarios WHERE USUARIO = '$this->nome' and SENHA = '$this->senha' ");
    //     $sql->execute();

    //     $dados = $sql->fetch();

    //     if ($sql->rowCount() > 0){

    //         $_SESSION['usuario'] = $dados['USUARIO'];

    //     }
    //     else{
    //         echo "<h3> Dados Inválidos! </h3>";
    //     }
    // }

}



?>