<?php
/**
 * Created by PhpStorm.
 * User: Linear
 * Date: 05/10/2018
 * Time: 16:18
 */
require_once("Crud.php");

class Arquivo extends Crud{
    protected $tabela = 'arquivo';
    protected $tabelaTipo = 'tipo';
    protected $tabelaAdm = 'administrador';
    protected $tabelaPub= 'publicacao';
    private $publicacao_idPublicacao;
    private $documento;
    private $tipo_idTipo;
    private $horaPublicacao;


    private $tipoDocumento;
    private $nome;

    /**
     * @return mixed
     */
    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    /**
     * @param mixed $tipoDocumento
     */
    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }



    /**
     * @return mixed
     */
    public function getPublicacaoIdPublicacao()
    {
        return $this->publicacao_idPublicacao;
    }

    /**
     * @param mixed $publicacao_idPublicacao
     */
    public function setPublicacaoIdPublicacao($publicacao_idPublicacao)
    {
        $this->publicacao_idPublicacao = $publicacao_idPublicacao;
    }

    /**
     * @return mixed
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * @param mixed $documento
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }

    /**
     * @return mixed
     */
    public function getTipoIdTipo()
    {
        return $this->tipo_idTipo;
    }

    /**
     * @param mixed $tipo_idTipo
     */
    public function setTipoIdTipo($tipo_idTipo)
    {
        $this->tipo_idTipo = $tipo_idTipo;
    }

    /**
     * @return mixed
     */
    public function getHoraPublicacao()
    {
        return $this->horaPublicacao;
    }

    /**
     * @param mixed $horaPublicacao
     */
    public function setHoraPublicacao($horaPublicacao)
    {
        $this->horaPublicacao = $horaPublicacao;
    }



    public function findUnit($determinadoprocesso) {
        $sql = "SELECT * FROM $this->tabela WHERE publicacao_idPublicacao=$determinadoprocesso";
        $stm = DB::prepare($sql);
        $stm->bindParam(':idArquivo',$id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    }
    public function porPublicacao($determinadoprocesso) {
        $sql = "
SELECT * FROM $this->tabela INNER JOIN $this->tabelaTipo ON $this->tabela.tipo_idTipo = $this->tabelaTipo.idTipo 
INNER JOIN $this->tabelaPub ON $this->tabela.publicacao_idPublicacao = $this->tabelaPub.idPublicacao INNER JOIN $this->tabelaAdm
ON $this->tabelaPub.administrador_idAdministrador = $this->tabelaAdm.idAdministrador 
WHERE publicacao_idPublicacao=$determinadoprocesso";
        $stm = DB::prepare($sql);
        $stm->bindParam(':idArquivo',$id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function ArquivoPorPublicacao($determinadoprocesso,$id) {
        $sql = "
SELECT idArquivo,documento FROM $this->tabela INNER JOIN $this->tabelaTipo ON $this->tabela.tipo_idTipo = $this->tabelaTipo.idTipo 
INNER JOIN $this->tabelaPub ON $this->tabela.publicacao_idPublicacao = $this->tabelaPub.idPublicacao INNER JOIN $this->tabelaAdm
ON $this->tabelaPub.administrador_idAdministrador = $this->tabelaAdm.idAdministrador 
WHERE publicacao_idPublicacao=$determinadoprocesso AND arquivo.idArquivo=$id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':idArquivo',$id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function findAll() {
        $sql = "SELECT * FROM $this->tabela";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
    public function insert() {
        $sql = "INSERT INTO $this->tabela (publicacao_idPublicacao,documento,tipo_idTipo) VALUES(:publicacao_idPublicacao,:documento,:tipo_idTipo)";
        $stm = DB::prepare($sql);
        $stm->bindParam(':publicacao_idPublicacao', $this->publicacao_idPublicacao);
        $stm->bindParam(':documento', $this->documento);
        $stm->bindParam(':tipo_idTipo', $this->tipo_idTipo);
        return $stm->execute();
    }
    public function update($id) {
        $sql = "UPDATE $this->tabela SET publicacao_idPublicacao=:publicacao_idPublicacao,documento=:document,tipo_idTipo=:tipo_idTipo WHERE  idArquivo=:idArquivo";
        $stm = DB::prepare($sql);
        $stm->bindParam(':publicacao_idPublicacao', $this->publicacao_idPublicacao);
        $stm->bindParam(':documento', $this->documento);
        $stm->bindParam(':tipo_idTipo', $this->tipo_idTipo);
        return $stm->execute();
    }
    public function delete($id)
    {
        $sql = "DELETE FROM $this->tabela WHERE idArquivo=:idArquivo";
        $stm = DB::prepare($sql);
        $stm->bindParam(':idArquivo', $id, PDO::PARAM_INT);
        return $stm->execute();
    }


}