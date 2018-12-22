<?php
/**
 * Created by PhpStorm.
 * User: Linear
 * Date: 22/12/2018
 * Time: 16:17
 */

class Administrador extends Crud
{
   protected $tabela = 'administrador';
   private $setor_idSetor;
   private $nome;
   private $senha;
   private $email;

    /**
     * @return mixed
     */
    public function getSetorIdSetor()
    {
        return $this->setor_idSetor;
    }

    /**
     * @param mixed $setor_idSetor
     */
    public function setSetorIdSetor($setor_idSetor)
    {
        $this->setor_idSetor = $setor_idSetor;
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
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function insert()
    {
        // TODO: Implement insert() method.
    }
    public function update($id)
    {
        $sql = "UPDATE $this->tabela SET nome=:nome,senha=:senha,email=:email WHERE idAdministrador=:idAdministrador";
        $stm = DB::prepare($sql);
        $stm->bindParam(':idAdministrador',$id, PDO::PARAM_INT);
        $stm->bindParam(':nome', $this->nome);
        $stm->bindParam(':senha', $this->senha);
        $stm->bindParam(':email', $this->email);
        return $stm->execute();
    }

}