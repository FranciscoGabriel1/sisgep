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
		
		 <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1" style="color:#43a047;">
            <a style="color:#43a047;" class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw" style="color:white;"></i>
                <!-- Contador de - Alerts -->
                <span class="badge badge-danger badge-counter" style="font-size: 70%;">3+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Notificações do Suporte Técnico
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-cogs text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">14/07/2019</div>
                        Módulo de notificação instalado: as alterações e <br>atualizações no sistema serão notificados por aqui.</br>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-wrench text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">14/07/2019</div>
                        Atualização: correção na tabela de listar arquivos.
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">14/07/2019</div>
                        Em breve mais atualizações.
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Fechar</a> <!-- Mostrar todos os Alertas -->
            </div>
        </li>
		
		<div class="topbar-divider d-none d-sm-block" style="width: 0;
				border-right: 1px solid #e3e6f0;
				height: calc(4.375rem - 2rem);	
				margin: auto 1rem;">
				</div>
		
		
        <div class="nav-item dropdown no-arrow">
            <a style="color:#43a047;" class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<span class="mr-2 d-none d-lg-inline text-white small"><?php echo $_SESSION['user_name'];?></span>
                <img class="img-profile rounded-circle" src="img/avatar.png" style="width:30px; height:30px;">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item">Você está em <?php echo "<b class='text-success'> ".$_SESSION['user_setor']."</b>"; ?></a>
				<!-- atualização de funcionalidades do sistema
				<a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Meu Perfil
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Configurações
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Log de Atividades
                </a>
				-->
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="login/logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Sair do sistema</a>
            </div>
        </div>