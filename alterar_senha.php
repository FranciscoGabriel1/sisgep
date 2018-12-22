<?php function __autoload($class)
{
    require_once 'domain/' . $class . '.php';
}
$admin = new Administrador();

if(isset($_POST['alt_senha'])){
    $admin_id = $_POST['id_admin'];
    $nome = $_POST['nomeAdministrador'];
    $senha = $_POST['senhaAdministrador'];
    $email = $_POST['emailAdministrador'];

    echo $admin_id."-".$nome ."-".$senha."-".$email;

    $admin->setNome($nome);
    $admin->setSenha($senha);
    $admin->setEmail($email);

    if($admin->update($admin_id)){?>
        <script>
            alert('Alteração feita com sucesso!');
            document.location.href = 'senha.php';
        </script>
    <?php }
}