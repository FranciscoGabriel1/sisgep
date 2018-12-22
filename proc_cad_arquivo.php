<?php
session_start();
require_once 'login/init.php';
require 'login/check.php';
?>
<?php 	function __autoload($class){
    require_once 'domain/'.$class.'.php';
} ?>


<?php
$publicacao = new publicacao();

//cadastro de publicacao

if (isset($_POST['cadastrar'])):
    $postador = $_SESSION['user_id'];
    $publicacao-> setAdministradorIdAdministrador($postador);
    $numeroProcesso= $_POST['processo'];
    $publicacao-> setNumeroProcesso($numeroProcesso);
    $descricao= $_POST['descricao'];
    $publicacao-> setDescricao($descricao);

    if($publicacao->insert()){
        echo '<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>OK!</strong> Incluido com sucesso!!! </div>';
    } else {
        echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>OK!</strong> Erro ao alterar!!! </div>';
    }
endif;
/*
include_once './arqconn.php';

//Verificar se o usuário clicou no botão, clicou no botão acessa o IF e tenta cadastrar, caso contrario acessa o ELSE
$SendCadArq = filter_input(INPUT_POST, 'SendCadArq', FILTER_SANITIZE_STRING);
if ($SendCadArq) {
    //Receber os dados do formulário
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $nome_arquivo= $_FILES['arquivo']['name'];
    //var_dump($_FILES['arquivo']);
    //Inserir no BD
    $result_arq = "INSERT INTO arquivos (nome, arquivo) VALUES (:nome, :arquivo)";
    $insert_msg = $conn->prepare($result_arq);
    $insert_msg->bindParam(':nome', $nome);
    $insert_msg->bindParam(':arquivo', $nome_arquivo);

    //Verificar se os dados foram inseridos com sucesso
    if ($insert_msg->execute()) {
        //Recuperar último ID inserido no banco de dados
        $ultimo_id = $conn->lastInsertId();

        //Diretório onde o arquivo vai ser salvo
        $diretorio = 'arquivos/' . $ultimo_id.'/';

        //Criar a pasta de arquivo
        mkdir($diretorio, 0755);

        if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$nome_arquivo)){
            $_SESSION['msg'] = "<p style='color:green;'>Dados salvo com sucesso e upload do arquivo realizado com sucesso</p>";
            header("Location: ondex.php");
        }else{
            $_SESSION['msg'] = "<p><span style='color:green;'>Dados salvo com sucesso. </span><span style='color:red;'>Erro ao realizar o upload do arquivo</span></p>";
            header("Location: ondex.php");
        }
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados</p>";
        header("Location: ondex.php");
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados</p>";
    header("Location: ondex.php");
}
*/