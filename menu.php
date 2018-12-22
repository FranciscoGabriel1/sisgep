        <ul class="nav  collapse navbar-collapse" id="navbarNav">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" title="Adicionar processo" data-target="#adicionar" href="#" style="color: white; font-family: "Roboto Ligh", sans-serif" >Adicionar<span
                        class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" title="Pesquisar processo por nº, descrição ou tipo" data-target="#pesquisar" href="#" style="color: white;">Pesquisar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" title="Filtrar processo por departamento" data-target="#setores" href="#"
                   style="color: white;">Departamentos</a>
            </li>
            <!-- Permitir apenas que o usuário Administrador Master tenha acesso a funcionalidade de gerenciar senhas -->
            <?php
            if ($_SESSION['user_id']== 3){
            ?>
            <li class="nav-item">
                <a class="nav-link active" title="Gerenciar senhas" href="senha.php"  style="color: white;">Senha</a>
            </li>
                <?php
            }
            ?>
            <li class="nav-item">
                <a class="nav-link " data-toggle="modal" title="Ajuda" data-target="#ajuda" href="#" style="color: white;">Ajuda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-toggle="modal" title="Sobre o SISGEP" data-target="#sobre" href="#" style="color: white;">Sobre</a>
            </li>
        </ul>
        <div class="nav-item justify-content-end">
            <a class="nav-link   waves-effect mr-2" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <img src="dist/img/svg/male-user-shadow.svg" width="25" height="25" class=" z-depth-0" alt="avatar image">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink-5">
                <a class="dropdown-item waves-effect waves-light" href="#"><p><?php echo $_SESSION['user_name']; ?><?php echo " • <b class='text-success'> ".$_SESSION['user_setor']."</b>"; ?></p></a>
                <a class="dropdown-item waves-effect waves-light nav-link" href="login/logout.php">Sair</a>
            </div>
        </div>