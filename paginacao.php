<?php include_once("conexao_mysqli.php");
//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
//QUERYS do meu sistema
$var = $_SESSION['user_id'];
    $result_publicacao = "SELECT * FROM publicacao WHERE administrador_idAdministrador=$var";

 $result_arquivo = "SELECT administrador.nome,publicacao.idPublicacao, publicacao.numeroProcesso,
publicacao.descricao,arquivo.idArquivo,arquivo.documento,tipo.tipoDocumento,arquivo.horaPublicacao
FROM administrador INNER JOIN publicacao ON administrador.idAdministrador = publicacao.administrador_idAdministrador
 INNER JOIN arquivo ON publicacao.idPublicacao = arquivo.publicacao_idPublicacao INNER JOIN tipo ON arquivo.tipo_idTipo = tipo.idTipo WHERE administrador_idAdministrador=$var";


    $resultado_publicacao = mysqli_query($conn, $result_publicacao);
    $resultado_arquivo = mysqli_query($conn, $result_arquivo);


//Contar o total de PUBLICACOES
    $total_publicacoes= mysqli_num_rows($resultado_publicacao);
//$total_arquivo = mysqli_num_rows($resultado_arquivo);

//Seta a quantidade de PUBLICACOES por pagina
    $quantidade_pg = 12;
//calcular o número de pagina necessárias para apresentar as publicacoes
    $num_pagina = ceil($total_publicacoes / $quantidade_pg);
//Calcular o inicio da visualizacao
    $incio = ($quantidade_pg * $pagina) - $quantidade_pg;
//Selecionar as publicacoes a serem apresentado na página


    $result_publicacao = "SELECT * FROM publicacao WHERE administrador_idAdministrador=$var limit $incio, $quantidade_pg";
    $result_arquivo= "SELECT administrador.nome,publicacao.idPublicacao, publicacao.numeroProcesso,
publicacao.descricao,arquivo.idArquivo,arquivo.documento,tipo.tipoDocumento,arquivo.horaPublicacao
FROM administrador INNER JOIN publicacao ON administrador.idAdministrador = publicacao.administrador_idAdministrador
 INNER JOIN arquivo ON publicacao.idPublicacao = arquivo.publicacao_idPublicacao INNER JOIN tipo ON arquivo.tipo_idTipo = tipo.idTipo WHERE administrador_idAdministrador=$var limit $incio, $quantidade_pg";


    $resultado_publicacoes = mysqli_query($conn, $result_publicacao);
    $resultado_arquivo = mysqli_query($conn, $result_arquivo);

    $total_publicacoes = mysqli_num_rows($resultado_publicacoes);
    //$total_arquivo = mysqli_num_rows($resultado_arquivo);



//Verificar a pagina anterior e posterior
$pagina_anterior = $pagina - 1;
$pagina_posterior = $pagina + 1;
?>


<div class="text-center">
</div>
<nav class="text-center">
    <ul class="pagination badge-pill badge">

        <li>
            <?php
            if($pagina_anterior != 0){ ?>
                <a href="home.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
                    <span aria-hidden="true"><img src="dist/img/svg/esquerda-arrow.svg" style=" width: 30px; height: 30px;"></span>
                </a>
            <?php }else{ ?>
                <span aria-hidden="true"><img src="dist/img/svg/esquerda-arrow.svg" style=" width: 30px; height: 30px;"></span></span>
            <?php }  ?>
        </li>
        <?php
        //Apresentar a paginacao
        for($i = 1; $i < $num_pagina + 1; $i++){ ?>
            <li>
                <a  href="home.php?pagina=<?php echo $i ; ?>">

                <span aria-hidden="true"> <?php echo $i; ?> </span>
                </a>
            </li>
        <?php } ?>
        <li>
            <?php
            if($pagina_posterior <= $num_pagina){ ?>
                <a href="home.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
                    <span aria-hidden="true"> <img src="dist/img/svg/right-arrow%20(1).svg"  style="width: 30px; height: 30px;"></span>
                </a>
            <?php }else{ ?>
                <span aria-hidden="true" ><img src="dist/img/svg/right-arrow%20(1).svg" style="width: 30px; height: 30px;"> </span>
            <?php }  ?>
        </li>
    </ul>
</nav>


<div class="container theme-showcase" role="main">
    <div class="row">
        <?php

        $proc = new Publicacao();
        $arquivo = new Arquivo();


        if (isset($_POST['excluirprocesso'])) {
            $id = $_POST['id_excluirprocesso'];
            $proc->delete($id);
        }

        $cont = 0;
        while ($rows_publicacoes = mysqli_fetch_assoc($resultado_publicacoes)) {
            $cont++;//&& $rows_arquivo = mysqli_fetch_assoc($resultado_arquivo)
            ?>


            <div class="col-lg-4 col-md-12 py-2">
                <div class="card-deck">
                    <div class="card">
                        <div class="card-body  py-3 text-justify">

                            <h4 class=" card-title  text-center dark-grey-text font-weight-bold py-2">Processo</h4>
                            <?php $conta = 0;
                            foreach ($arquivo->porPublicacao($rows_publicacoes['idPublicacao']) as $key => $value) {
                                $conta++;
                            }
                            ?>
                            <div class="text-center py-2 card-text">
                                <a class="container-fluid" title="Clique para acessar"
                                   href="page-publicacao.php?id_publicacao=<?php echo $rows_publicacoes['idPublicacao']; ?>&descricao=<?php echo $rows_publicacoes['descricao']; ?>&postador=<?php echo $_SESSION['user_id'] ?>"><?php echo $rows_publicacoes['numeroProcesso']; ?></a>
                                <span title="Quantidade de documentos disponível neste processo." class="badge badge-primary badge-pill"><?php echo $conta; ?></span>
                            </div>
                            <div id="box-toggle py-2">
                                <div>
                                    <?php echo " <p class=\" text-muted py-2 card-text\"> " . $rows_publicacoes['descricao']. "</p>"; ?>

                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <form method="post" class="form_excluir text-center">
                                <input name="id_excluirprocesso" type="hidden" value="<?php echo $rows_publicacoes['idPublicacao']; ?>"/>
                                <button type="submit" title="Excluirá o processo incluindo todos os documentos anexados." name="excluirprocesso" onclick="fn_excluir();" class="btn btn-danger">Excluir </button>
                            </form>
                            <?php //}
                            ?>
                        </div>


                    </div>
                </div>
            </div>

        <?php }
        if ($cont == 0) {
            echo "<p style='font-weight: bold; color: #4cae4c; margin-left: 40%;'>Você não tem nenhuma publicação</p>";
        }
        ?>
    </div>
</div>