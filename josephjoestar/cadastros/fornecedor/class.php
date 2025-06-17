<?php
    //criar uma classe

    class cadfornecedor{

        public $razaosocial;
        public $nomefantasia;
        public $cnpj;
        public $cpf;
        public $email;
        public $site;
        public $telefone;
        public $cep;
        public $end;
        public $bairro;
        public $cidade;
        public $estado;
        private $conexao;
        private $id;

        #metodos / funcoes#

        public function __construct()//essa funcao eh automatica, nao precisa chamar ela toda vez.
        {

            include_once "../../conexao/conexao.php";
            $this->conexao = $conexao;

        }

        public function cadastrar($razaosocial, $nomefantasia, $cnpj, $cpf, $email, $site, $telefone, $cep, $end, $bairro, $cidade, $estado){
            
            $this->razaosocial = $razaosocial;
            $this->nomefantasia = $nomefantasia;
            $this->cnpj = $cnpj;
            $this->cpf = $cpf;
            $this->email = $email;
            $this->site = $site;
            $this->telefone = $telefone;
            $this->cep = $cep;
            $this->end = $end;
            $this->bairro = $bairro;
            $this->cidade = $cidade;
            $this->estado = $estado;

            //a funcao prepare, prepara algum comando do mysql, ou de outro sgbd.
            $sql = $this->conexao->prepare("INSERT INTO cadastro_fornecedor(RAZAO_SOCIAL,NOME_FANTASIA,CNPJ,CPF,EMAIL,SITE,TELEFONE,CEP,ENDERECO,BAIRRO,CIDADE,ESTADO,DATA,HORA)
            
            VALUES('$this->razaosocial','$this->nomefantasia','$this->cnpj','$this->cpf','$this->email','$this->site','$this->telefone','$this->cep','$this->end','$this->bairro','$this->cidade','$this->estado',NOW(),NOW())");

            
            
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
                
                $sql = $this->conexao->prepare("DELETE FROM cadastro_fornecedor WHERE ID = $this->id");
                
                $sql->execute();

                if($sql->rowCount() > 0){
                    echo "Fornecedor deletado com sucesso";
                }
                
                else{
                    echo "Erro: Não foi possivel deletar o fornecedor";
                }
        }

        public function alterar(){
        
        }

        public function Lista(){
            $sql = $this->conexao->prepare("SELECT ID,RAZAO_SOCIAL,NOME_FANTASIA,CNPJ,EMAIL,TELEFONE,ENDERECO from cadastro_fornecedor");//prepara o comando sql.
            $sql->execute();

            $dados = $sql->fetchAll();//busca todas as listas que o select exibe, e exibe em forma de tabela.

            foreach($dados as $item){
                
                echo "
                <tr>
                    <td>$item[RAZAO_SOCIAL]</td>
                    <td>$item[NOME_FANTASIA]</td>
                    <td>$item[CNPJ]</td>
                    <td>$item[EMAIL]</td>
                    <td>$item[TELEFONE]</td>
                    <td>$item[ENDERECO]</td>
                    <td>
                        <i class='bi bi-trash-fill'onclick='Excluir($item[ID]);'></i>
                        <i class='bi bi-pencil-square'></i>
                    </td>
                        
                </tr>
                
                ";
            }
        }

        public function verificar(){
            
        }
    }
?>