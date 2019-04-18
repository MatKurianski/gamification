<meta charset="utf-8">
<?php
	class Sys {

		private $dbHost = "localhost";
		private $dbUser = "root";
		private $dbPassword = "usbw";
		private $dbName = "db_gamification";

		private $dbConnection;

		public function __construct(){
			$this->dbConnection = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
			$this->dbConnection->set_charset("utf8");
		}

		private function encriptarString($string){
			return hash('sha256', (md5($string)));
		}

		public function mudarStatus($tabela, $registro){
			$select = "SELECT st_$tabela as status from tb_$tabela WHERE cd_$tabela = $registro";
			if($selectQuery = $this->dbConnection->query($select)){
				if($selectQuery->num_rows > 0){
					$update = "UPDATE tb_$tabela set st_$tabela = ";

					$dados = $selectQuery->fetch_assoc;
					if($dados['status'] == '1'){
						$update .= " '0' ";
					}
					else if($dados['status'] == '0'){
						$update .= " '1' ";
					}
					else{
						return false;
					}

					$update .= "WHERE cd_$tabela = $registro ";
					if($updateQuery = $this->dbConnection->query($update)){
						return true;
					}
					else{
						return true;
					}
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		}

		public function cadastrarMembro($nome, $senha, $cargo, $diretoria){
			$senha = $this->encriptarString($senha);
			$insert = "INSERT into tb_membro VALUES (null, '$nome', '$senha', '$cargo', '$diretoria', 1)";
			if($this->dbConnection->query($insert){
				return true;
			}
			else{
				return false;
			}
		}

		public function login($membroCd, $senha){
			$senhaCriptografada = $this->encriptarString($senha);
			$select = "SELECT * FROM tb_membro WHERE cd_membro = '$membroCd' AND tx_senha = '$senhaCriptografada' AND st_membro = '1'";
			if($query = $this->dbConnection->query($select)){

				if($query->num_rows > 0){
					$membro = $query->fetch_assoc;
					$statusAtual = $dados['st_$tabela'];();
					session_start();
					$_SESSION['cd_membro'] = $membro['cd_membro'];
					$_SESSION['nm_membro'] = $membro['nm_membro'];
					$_SESSION['id_cargo'] = $membro['id_cargo'];
					$_SESSION['logado'] = true;

					return 0;
				}
				else{
					return 2;
				}
			}
			else{
				return 1;
			}
		}

		public function logout($pagina){
			session_start();
			session_unset();
			session_destroy();
		}

		public function listarMembros($cd = ''){
			$select = "SELECT * from tb_membro join tb_cargo on id_cargo = cd_cargo ";
			if($cd != ''){
				$select .= "WHERE cd_membro = '$cd' ";
			}
			$select .= "ORDER BY nm_membro";
			
			if($query = $this->dbConnection->query($select)){
				if($query->num_rows > 0){
					return $query;
				}
				else{
					return null;
				}
			}
			else{
				return null;
			}
		}

		public function listarMembrosPorDiretoria($diretoria = ''){
			$select = "SELECT * from tb_membro join tb_cargo on id_cargo = cd_cargo ";
			if($diretoria != ''){
				$select .= "WHERE id_diretoria = '$diretoria' ";
			}
			$select .= " ORDER BY id_diretoria, nm_membro ";
			
			if($query = $this->dbConnection->query($select)){
				if($query->num_rows > 0){
					return $query;
				}
				else{
					return null;
				}
			}
			else{
				return null;
			}
		}

		public function listarDiretorias($cd = ''){
			$select = "SELECT * from tb_diretoria ";
			if($cd != ''){
				$select .= "WHERE cd_diretoria = $cd";
			}

			if($query = $this->dbConnection->query($select)){
				if($query->num_rows > 0){
					return $query;
				}
				else{
					return null;
				}
			}
			else{
				return null;
			}
		}
	}