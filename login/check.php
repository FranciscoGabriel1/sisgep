<?php

require_once 'init.php';

if (!isLoggedIn())
{
 ?> <script>
           alert('Acesso negado! Você precisa realizar login.');
           document.location.href = 'index.php';
   </script>

<?php
    //header('Location: page-publicacao.php');
}
?>