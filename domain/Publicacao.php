<?php

	 require_once("Crud.php");


	 class Publicacao extends Crud{

		protected $tabela = 'publicacao';
		private $administrador_idAdministrador;
		private $numeroProcesso;
		private $descricao;

         /**
          * @return mixed
          */
         public function getAdministradorIdAdministrador()
         {
             return $this->administrador_idAdministrador;
         }

         /**
          * @param mixed $administrador_idAdministrador
          */
         public function setAdministradorIdAdministrador($administrador_idAdministrador)
         {
             $this->administrador_idAdministrador = $administrador_idAdministrador;
         }



         /**
          * @return mixed
          */
         public function getNumeroProcesso()
         {
             return $this->numeroProcesso;
         }

         /**
          * @param mixed $numeroProcesso
          */
         public function setNumeroProcesso($numeroProcesso)
         {
             $this->numeroProcesso = $numeroProcesso;
         }

         /**
          * @return mixed
          */
         public function getDescricao()
         {
             return $this->descricao;
         }

         /**
          * @param mixed $descricao
          */
         public function setDescricao($descricao)
         {
             $this->descricao = $descricao;
         }



		public function findUnit($id) {
		 $sql = "SELECT * FROM $this->tabela WHERE id=:idPublicacao";
		 $stm = DB::prepare($sql);
		 $stm->bindParam(':idPublicacao',$id, PDO::PARAM_INT);
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
		 $sql = "INSERT INTO $this->tabela (administrador_idAdministrador,numeroProcesso,descricao) VALUES(:administrador_idAdministrador,:numeroProcesso,:descricao)";
		 $stm = DB::prepare($sql);
		 $stm->bindParam(':administrador_idAdministrador', $this->administrador_idAdministrador);
		 $stm->bindParam(':numeroProcesso', $this->numeroProcesso);
		 $stm->bindParam(':descricao', $this->descricao);
		 return $stm->execute();
		}
		public function update($id) {
		 $sql = "UPDATE $this->tabela SET numeroProcesso=:numeroProcesso,descricao=:descricao WHERE  idPublicacao=:idPublicacao";
		 $stm = DB::prepare($sql);
		 $stm->bindParam(':idPublicacao',$id, PDO::PARAM_INT);
		 $stm->bindParam(':numeroProcesso', $this->numeroProcesso);
		 $stm->bindParam(':descricao', $this->descricao);
		 return $stm->execute();
		}
		public function delete($id) {
		 $sql = "DELETE FROM $this->tabela WHERE idPublicacao=:idPublicacao";
		 $stm = DB::prepare($sql);
		 $stm->bindParam(':idPublicacao',$id, PDO::PARAM_INT);
		 return $stm->execute();
		}

	}