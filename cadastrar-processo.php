<?php
    session_start();
    require_once 'login/init.php';
    require 'login/check.php';
?>
<?php function __autoload($class)
{
    require_once 'domain/' . $class . '.php';
} ?>
<?php
$publicacao = new publicacao();
//cadastro de publicacao

if (isset($_POST['cadastrar'])):
    $postador = $_SESSION['user_id'];
    $publicacao->setAdministradorIdAdministrador($postador);
    $numeroProcesso = $_POST['processo'];
    $publicacao->setNumeroProcesso($numeroProcesso);
    $descricao = $_POST['descricao'];
    $publicacao->setDescricao($descricao);

    if ($publicacao->insert()) {
        echo '<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>OK!</strong> Cadastrado com sucesso! </div>';

        header("Location: home.php");
    } else {
        echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>OK!</strong> Erro ao alterar!!! </div>';
    }
endif;