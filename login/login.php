<?php
    // inclui o arquivos de inicialização
    require 'init.php';
    // resgata variáveis do formulário
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    //if (empty($email) || empty($password))
    //{
?>
    <!--    <script>-->
    <!--        alert('Informe email ou senha');-->
    <!--        document.location.href = '../index.php';-->
    <!--    </script>-->
    <!--    -->
<?php
    //    exit;
    //}

    // cria o hash da senha
    //$passwordHash = make_hash($password);

    $PDO = db_connect();
    //$sql = "SELECT idAdministrador,setor_idSetor, nome, senha, email FROM administrador WHERE senha =:senha AND email = :email";
    $sql = "SELECT administrador.idAdministrador, setor.nomeSetor, administrador.nome, administrador.senha, administrador.email
    FROM administrador INNER JOIN setor ON administrador.setor_idSetor = setor.idSetor WHERE administrador.senha =:senha AND administrador.email = :email";


    $stmt = $PDO->prepare($sql);

    $stmt->bindParam(':senha', $password);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($users)==0){
?>
    <!--    <script>
            //echo "Email ou senha incorretos";
            $("#msg-erro-login").modal("show");
            document.location.href = '../index.php';
        </script>
    <script>

        alert('Email ou senha incorretos!');
        document.location.href = '../index.php';
    </script>

        <script>
                $(document).ready(function(){
                    if(echo==1)
                    $('#msg-erro-login').modal('show');
                    document.location.href = '../index.php';
                });
            </script>-->

        <script>
            alert('Email ou senha incorretos!');
            document.location.href = '../index.php';
        </script>




<?php
    exit;
}
    // pega o primeiro usuário
    $user = $users[0];

    session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION['user_id'] = $user['idAdministrador'];
    $_SESSION['user_setor'] = $user['nomeSetor'];
    $_SESSION['user_name'] = $user['nome'];
    header('Location: ../home.php');
?>