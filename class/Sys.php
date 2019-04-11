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

		public function encriptarString($string){
			return hash('sha256', (md5($string)));
		}

		public function login($membroCd, $senha){
			$senhaCriptografada = $this->encriptarString($senha);
			$select = "SELECT * FROM tb_membro WHERE cd_membro = '$membroCd' AND tx_senha = '$senhaCriptografada' AND st_membro = '1'";
			if($query = $this->dbConnection->query($select)){

				if($query->num_rows > 0){
					$data = $query->fetch_assoc();
					session_start();
					$_SESSION['cd_membro'] = $data['cd_membro'];
					$_SESSION['nm_membro'] = $data['nm_membro'];
					$_SESSION['id_cargo'] = $data['id_cargo'];
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