<?php
    //criar uma classe

    class CadClientes{

        public $nome;
        public $idade;
        public $nascimento;
        public $sexo;
        public $cpf;
        public $email;
        public $telefone;
        public $cep;
        public $endereco;
        public $estado;
        public $bairro;
        public $cidade;
        private $conexao;
        private $id;

        #metodos / funcoes#

        public function __construct()//essa funcao eh automatica, nao precisa chamar ela toda vez.
        {

            include_once "../../conexao/conexao.php";
            $this->conexao = $conexao;

        }

        public function cadastrar($nome, $idade,$nascimento,$sexo,$cpf,$email,$telefone,$cep,$endereco,$bairro,$cidade,$estado){
            
            $this->nome = $nome;
            $this->idade = $idade;
            $this->nascimento = $nascimento;
            $this->sexo = $sexo;
            $this->cpf = $cpf;
            $this->email = $email;
            $this->telefone = $telefone;
            $this->cep = $cep;
            $this->endereco = $endereco;
            $this->bairro = $bairro;
            $this->cidade = $cidade;
            $this->estado = $estado;

            //a funcao prepare, prepara algum comando do mysql, ou de outro sgbd.
            $sql = $this->conexao->prepare("INSERT INTO cadastro_clientes(NOME,IDADE,NASCIMENTO,SEXO,CPF,EMAIL,TELEFONE,CEP,ENDERECO,BAIRRO,CIDADE,ESTADO,DATA,HORA)
            
            VALUES('$this->nome','$this->idade','$this->nascimento','$this->sexo','$this->cpf','$this->email','$this->telefone','$this->cep','$this->endereco','$this->bairro','$this->cidade','$this->estado',NOW(),NOW())");

            
            
            $sql->execute();

            if($sql->rowCount() > 0){
                echo "<hr>
                <h3>Cadastro realizado com sucesso</h3>";
            }
            else{
                echo "<hr>
                <h3>Erro: não foi possivel realizar o cadastro</h3>";
            }


        }

        public function Excluir(int $id)
        {
                $this->id = $id;
                
                $sql = $this->conexao->prepare("DELETE FROM cadastro_clientes WHERE ID = $this->id");
                
                $sql->execute();

                if($sql->rowCount() > 0){
                    echo "Cliente deletado com sucesso";
                }
                
                else{
                    echo "Erro: Não foi possivel deletar o cliente";
                }
        }

        public function Alterar(int $id, string $nome, int $idade, string $sexo, string $cpf, string $email, string $telefone, string $endereco){
        $this->id = $id;
        $this->nome = $nome;
        $this->idade = $idade;
        $this->sexo = $sexo;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->endereco = $endereco;

        $sql = $this->conexao->prepare("UPDATE cadastro_clientes SET NOME = '$this->nome', IDADE = '$this->idade',SEXO = '$this->sexo',CPF = '$this->cpf',EMAIL = '$this->email',TELEFONE = '$this->telefone',ENDERECO = '$this->endereco' WHERE ID = '$this->id'");
                                                                   
        $sql->execute();
        }

        public function Lista(){
            $sql = $this->conexao->prepare("SELECT ID,NOME,IDADE,SEXO,CPF,EMAIL,TELEFONE,ENDERECO from cadastro_clientes");//prepara o comando sql.
            $sql->execute();

            $dados = $sql->fetchAll();//busca todas as listas que o select exibe, e exibe em forma de tabela.

            foreach($dados as $item){
                
                echo "
                <tr>
                    <td>$item[NOME]</td>
                    <td>$item[IDADE]</td>
                    <td>$item[SEXO]</td>
                    <td>$item[CPF]</td>
                    <td>$item[EMAIL]</td>
                    <td>$item[TELEFONE]</td>
                    <td>$item[ENDERECO]</td>
                    <td>
                        <i class='bi bi-trash-fill'onclick='Excluir($item[ID]);'></i>
                        <i class='bi bi-pencil-square' data-bs-toggle='modal' data-bs-target='#editarclientes' onclick='Mostrar($item[ID]);'></i>
                    </td>
                        
                </tr>
                
                ";
            }
        }

        public function verificar(){
            
        }
    }
?>