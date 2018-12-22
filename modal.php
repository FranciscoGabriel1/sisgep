<!-- *************************************************************** MODAL ADICIONAR PROCESSO ***************************************************************************-->
<div class="modal fade" id="adicionar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form method="post" action="cadastrar-processo.php" enctype="multipart/form-data">
        <div class="modal-dialog modal-notify modal-success modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title text-white heading lead">Adicionar Processo</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Processo</span>
                        </div>
                        <input type="text" name="processo" class="form-control " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Ex: 001/2019">
                    </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Descrição</span>
                    </div>
                        <input type="text" name="descricao" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Breve descrição do processo.">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                    <button name="cadastrar" type="submit" class="btn btn-success" value="Cadastrar Processo">Cadastrar processo</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- *************************************************************** MODAL PESQUISAR PROCESSO ***************************************************************************-->
<div class="modal fade" id="pesquisar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-success modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title text-white">Informe o nº, descrição ou tipo do processo</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-inline" method="GET" action="busca.php">
                    <label class="input-group">
                    <input class="form-control" type="search" name="busca" placeholder="O quê você procura?" aria-label="Search" style="width: 18rem;" required>
                    <button type="submit" class="btn btn-success">Pesquisar</button>
                    </label>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- *************************************************************** MODAL SOBRE SISGEP ***************************************************************************-->
<div class="modal fade" id="sobre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-notify modal-success modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title  text-white"> Sobre</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="container theme-showcase" role="main">
                <div class="row">
                    <div class="col-lg-4 col-md-12 py-2">
                        <div class="card-body">
                            <h4 class="modal-title text-center w-100 font-weight-bold text-success py-2">Visão Geral</h4>
                                <p class="text-justify text-dark">
                                    O SisGeP é um sistema de apoio ao compartilhamento de informações entre os departamento da Secretaria Municipal do Meio Ambiente de
                                    Itacoatiara. O objetivo é reduzir tempo na procura de um processo e maximizar o trabalho entre as equipes.
                                </p>
                        </div>
                    </div>
                        <div class="col-lg-4 col-md-6 py-2">
                            <div class="card-body">
                            <h4 class="modal-title text-center w-100 font-weight-bold text-success py-2">Desenvolvedores</h4>
                            <class="text-justify text-dark">
                                Franscico G. T. Marinho
                                ------------------------------------------
                                Maik Sampaio Elamide
                                ------------------------------------------
                                Rubber Rodriguez Barbosa
                                ------------------------------------------
                                Victor Lucio Froes Pinto

                                </p>
                            </div>
                        </div>
                    <!--Footer-->
                    <div class="col-lg-4 col-md-6 py-2">
                        <div class="card-body">
                            <h4 class="modal-title text-center w-100 font-weight-bold text-success py-2">Contato</h4>
                            <p class="text-justify text-dark">
                                franciscogabriel.am@gmail.com (92) 99312-7042<br>
                                ------------------------------------------
                                maikelamide@gmail.com (92) 99418-0453<br>
                                ------------------------------------------
                                rodriguezrubber@gmail.com (92) 99305-0610<br>
                                ------------------------------------------
                                victhorlucfr@gmail.com (92) 99222-6469<br>
                            </p>
                        </div>
                    </div>
                <div class="card-body text-center">
                    <img src="dist/img/svg/logo_icet.png" width="500" height="50" class="d-inline-block" alt="" >
                </div>
            </div>
        </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-success text-center" data-dismiss="modal">
                    OK! </i></button>
            </div>
            <!--/.Content-->
        </div>
    </div>
</div>
<!-- *************************************************************** MODAL DEPARTAMENTO ***************************************************************************-->
<div class="modal fade" id="setores" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-success modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white ">Selecione o Departamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <form method="GET" action="filtragem.php">
            <div class="modal-body">
                <div class="custom-radio custom-control">
                    <input type="radio" id="customRadio1" name="filtrar" class="custom-control-input" value="5">
                    <label class="custom-control-label" for="customRadio1">Registro, Monitoramento e Licenciamento</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio2" name="filtrar" class="custom-control-input" value="2">
                    <label class="custom-control-label" for="customRadio2">Zoneamento Ambiental</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio3" name="filtrar" class="custom-control-input" value="4">
                    <label class="custom-control-label" for="customRadio3">Educação Ambiental</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio4" name="filtrar" class="custom-control-input" value="1">
                    <label class="custom-control-label" for="customRadio4" >Fiscalização Ambiental</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio5" name="filtrar" class="custom-control-input" value="3">
                    <label class="custom-control-label" for="customRadio5" >Administrador Master</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio6" name="filtrar" class="custom-control-input" value="6">
                    <label class="custom-control-label" for="customRadio6" >Setor Piscicultura</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio7" name="filtrar" class="custom-control-input" value="7">
                    <label class="custom-control-label" for="customRadio7" >Setor Jurídico</label>
                    <hr>
                </div>
                <div class=" center-block text-center">
                    <button class="btn btn-success " type="submit">Buscar</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- *************************************************************** MODAL AJUDA SOBRE SISTEMA ********************************************************************-->
<!--Carousel Wrapper-->
<div class="modal fade" id="ajuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-success modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead text-center w-100 text-white"> Como pesquisar um processo de outro departamento? </p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-2" data-slide-to="1"></li>
                    <li data-target="#carousel-example-2" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="container">
                            <p class="py-1 text-justify"> Clique na barra de menu na opção "pesquisar" ou no ícone atalho de "pesquisar" na parte inferior.
                            </p>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <img src="dist/img/svg/ajuda_3.png" width="350" height="300" class="d-inline-block" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <!--Mask color-->
                        <div class="container">
                            <p class="py-1 text-justify"> No campo de pesquisa, você informará o "número" ou "descrição" ou "tipo" de processo (Ex: 001/2019, Fiscalização zona sul, memorando, ofício).
                            </p>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <img src="dist/img/svg/ajuda_4.png" width="350" height="300" class="d-inline-block" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <!--Mask color-->
                        <div class="container text-justify">
                            <p class="py-1"> O Sistema informará a quantidade de resultados encontrados. Viu, como é fácil realizar a pesquisa de um processo. <br>
                            </p>
                        </div>
                        <div class="modal-body ">
                            <div class="text-center ">
                                <img src="dist/img/svg/ajuda_5.png" width="350" height="300" class="d-inline-block" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
            </div>
            <!--/.Carousel Wrapper-->
        </div>
    </div>
</div>
<!-- *************************************************************** MODAL VISUALIZAR PDF ***************************************************************************-->
<!--<div class="modal fade" id="visualizar-pdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog modal-lg modal-notify modal-success modal-dialog-centered">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h4 class="modal-title text-white" id="myModalLabel">Visualizar Documento</h4>-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true" class="white-text">&times;</span>-->
<!--                </button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <div style="text-align: center;">-->
<!--                    <iframe-->
<!--                            src="web/viewer.html?file=../arquivos/0/Artigo do Classificador.pdf" style="width:750px; height:700px;" frameborder="1">-->
<!--                    </iframe>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-success text-center" data-dismiss="modal"> Fechar </i></button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!-- *************************************************************** MODAL MSG ERRO LOGIN ***************************************************************************-->
<div class="modal fade" id="msg-erro-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-notify modal-success modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white" id="myModalLabel">Ops, algo deu errado ;(</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="text-align: center;">
                    <div class="modal-body">
                        <p> E-mail ou senha incorretas! Tente novamente.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success text-center" data-dismiss="modal"> Fechar </i></button>
            </div>
        </div>
    </div>
</div>
<!-- *************************************************************** MODAL ALTERAR SENHA ***************************************************************************-->

<div class="modal fade" id="msg-alterar-senha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-notify modal-success modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white" id="myModalLabel">Alteração de Dados</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="alterar_senha.php">
                    <div class="input-group mb-3">
                        <input type="hidden" name="idAdministrador" class="form-control " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                               value="" >
                    </div>


                    <div class="input-group mb-3">
                        <input type="hidden" name="idSetor" class="form-control " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                               value="" >
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Nome</span>
                        </div>
                        <input type="text" name="nomeAdministrador" id="text_nome" class="form-control " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" title="Digite nome do novo administrador"
                               value="" >
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Senha</span>
                        </div>
                        <input type="text" name="senhaAdministrador"  id="text_senha" class="form-control " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" title="Digite nova senha"
                               value="" >
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">E-mail</span>
                        </div>
                        <input type="text" name="emailAdministrador" id="text_email" class="form-control " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" title="Digite novo e-mail">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                        <input id="id_admin" name="id_admin" type="hidden" value=""/>
                        <button type="submit" name="alt_senha" class="btn btn-success text-center"> Salvar </i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
