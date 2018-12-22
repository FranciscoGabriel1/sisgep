<?php
session_start();
include_once './conexao_pdo.php';
require_once 'login/init.php';
require 'login/check.php';

//Verificar se o usuário clicou no botão, clicou no botão acessa o IF e tenta cadastrar, caso contrario acessa o ELSE
$SendCadArq = filter_input(INPUT_POST, 'SendCadArq', FILTER_SANITIZE_STRING);

if ($SendCadArq) {

    //Receber os dados do formulário
    $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
    $nome_temporario=$_FILES['arquivo']['tmp_name']; // modifiquei aqui
    $nome_arquivo = $_FILES['arquivo']['name'];
    $publicacao = filter_input(INPUT_POST, 'publicacao', FILTER_SANITIZE_STRING);

    //var_dump($_FILES['arquivo']);
    //Inserir no BD
    $result_arq = "INSERT INTO arquivo(publicacao_idPublicacao, documento, tipo_idTipo) VALUES (:publicacao_idPublicacao, :documento, :tipo_idTipo)";
    $insert_msg = $conn->prepare($result_arq);
    $insert_msg->bindParam(':publicacao_idPublicacao', $publicacao);
    $insert_msg->bindParam(':documento', $nome_arquivo);
    $insert_msg->bindParam(':tipo_idTipo', $tipo);

    $postador = $_SESSION['user_id'];

    //Verificar se os dados foram inseridos com sucesso
    if ($insert_msg->execute()){
        //Recuperar último ID inserido no banco de dados
        $ultimo_id = $conn->lastInsertId();
        //Diretório onde o arquivo vai ser salvo
        $diretorio = 'arquivos/' . $ultimo_id . '/';
        //Criar a pasta de arquivo
        mkdir($diretorio, 0755);

        if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $nome_arquivo)) {
            $_SESSION['msg'] = "<p style='color:green;'>Dados salvo com sucesso e upload do arquivo realizado com sucesso!</p>";
            header("Location: page-publicacao.php?id_publicacao=$publicacao&postador=$postador");
        }else{
            $_SESSION['msg'] = "<p><span style='color:green;'>Dados salvo com sucesso! </span><span style='color:red;'>Erro ao realizar o upload do arquivo!</span></p>";
            header("Location: page-publicacao.php?id_publicacao=$publicacao&postador=$postador");
        }
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados!</p>";
        header("Location: page-publicacao.php?id_publicacao=$publicacao&postador=$postador");
    }
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados!</p>";
    header("Location: page-publicacao.php?id_publicacao=$publicacao&postador=$postador");
}
?>