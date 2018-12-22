<?php

	 require_once("Crud.php");


	 class Senha extends Crud{

		protected $tabela = 'administrador';
		private $idAdministrador;
		private $setor_idSetor;
		private $nome;
        private $email;
        private $senha;

         /**
          * @return mixed
          */
         public function getAdministradorIdAdministrador()
         {
             return $this->idAdministrador;
         }

         /**
          * @param mixed $idAdministrador
          */
         public function setAdministradorIdAdministrador($idAdministrador)
         {
             $this->idAdministrador = $idAdministrador;
         }
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

         public function findUnit($id) {
		 $sql = "SELECT * FROM $this->tabela WHERE id=:idAdministrador";
		 $stm = DB::prepare($sql);
		 $stm->bindParam(':idAdministrador',$id, PDO::PARAM_INT);
		 $stm->execute();
		 return $stm->fetch();
		}
		public function findAll() {
		 $sql = "SELECT * FROM $this->tabela";
		 $stm = DB::prepare($sql);
		 $stm->execute();
		 return $stm->fetchAll();
		}
		public function insert() {
		 $sql = "INSERT INTO $this->tabela (idAdministrador,setor_idSetor, nome, senha, email) VALUES (:idAdministrador,:setor_idSetor,:nome, :senha, :email)";
		 $stm = DB::prepare($sql);
		 $stm->bindParam(':idAdministrador', $this->idAdministrador);
		 $stm->bindParam(':setor_idSetor', $this->setor_idSetor);
		 $stm->bindParam(':nome', $this->nome);
		 $stm->bindParam(':senha', $this->senha);
         $stm->bindParam(':email', $this->email);
		 return $stm->execute();
		}
		public function update($id) {
		 $sql = "UPDATE $this->tabela SET nome=:nome,senha=:senha,email=:email WHERE idAdministrador=:idAdministrador";
		 $stm = DB::prepare($sql);
		 $stm->bindParam(':idAdministrador',$id, PDO::PARAM_INT);
		 $stm->bindParam(':nome', $this->nome);
		 $stm->bindParam(':senha', $this->senha);
            $stm->bindParam(':email', $this->email);
		 return $stm->execute();
		}
		public function delete($id) {
		 $sql = "DELETE FROM $this->tabela WHERE idAdministrador=:idAdministrador";
		 $stm = DB::prepare($sql);
		 $stm->bindParam(':idAdministrador',$id, PDO::PARAM_INT);
		 return $stm->execute();
		}

	}
