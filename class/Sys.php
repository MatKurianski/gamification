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
			$insert = "INSERT into tb_membro VALUES (null, '$nome', '$senha', '$cargo', '$diretoria', '1')";
			if($this->dbConnection->query($insert)){
				return true;
			}
			else{
				return false;
			}
		}

		public function editarMembro($cd, $nome, $senha, $cargo, $diretoria, $status){
			$update = "UPDATE tb_membro set nm_membro = '$nome', tx_senha = '$senha', id_cargo = '$cargo', id_diretoria = $diretoria, st_membro = $status WHERE cd_membro = $cd";
			
			if($this->dbConnection->query($update)){
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

		public function gerarPeriodo($dias, $dataFinal = ''){

			if($dataFinal == ''){
				date_default_timezone_set('America/Sao_Paulo');
				$dataFinal = date("U");
			}

			$dataInicial = strtotime("-$dias days", $dataFinal);

			return [date("Y-m-d", $dataInicial), date("Y-m-d", $dataFinal)];
		}

		public function listarHistorico($membroCd, $periodo = ['', '']){
			$select = "SELECT nm_membro as nome, ds_regra as conquista, qt_pontos as pontos, date_format(dt_pontuacao, '%d/%m/%Y') as data from tb_membro join tb_pontuacao on cd_membro = id_membro join tb_regra on cd_regra = id_regra  where cd_membro = $membroCd ";
			if($periodo != ['', '']){
				sort($periodo);
				$select .= "AND (dt_pontuacao between CAST('$periodo[0]' AS DATETIME) AND CAST('$periodo[1]' AS DATETIME)) ";
			}
			$select .= " ORDER BY dt_pontuacao desc ";

			if($selectQuery = $this->dbConnection->query($select)){
				if($selectQuery->num_rows > 0){
					return $selectQuery;
				}
				else{
					return null;
				}
			}
			else{
				return null;
			}
		}

		public function contarPontos($membroCd, $periodo = ['', '']){
			$select = "SELECT sum(qt_pontos) as pontos from tb_membro join tb_pontuacao on cd_membro = id_membro join tb_regra on cd_regra = id_regra  where cd_membro = $membroCd ";
			if($periodo != ['', '']){
				sort($periodo);
				$select .= "AND (dt_pontuacao between CAST('$periodo[0]' AS DATETIME) AND CAST('$periodo[1]' AS DATETIME))";
			}
			if($selectQuery = $this->dbConnection->query($select)){
				if($selectQuery->num_rows > 0){
					$dados = $selectQuery->fetch_object();

					if(!empty($dados->pontos)){
						return $dados->pontos;
					}
					else{
						return null;
					}
				}
				else{
					return null;
				}
			}
			else{
				return null;
			}
		}

		public function cadastrarDiretoria($nome, $cor = 'lightgrey'){
			$insert = "INSERT into tb_diretoria VALUES (null, '$nome', '$cor', '1')";
			if($this->dbConnection->query($insert)){
				return true;
			}
			else{
				return false;
			}
		}

		public function editarDiretoria($cd, $nome, $cor, $status){
			$update = "UPDATE tb_diretoria set nm_diretoria = '$nome', ds_cor = '$cor', st_diretoria = '$status' WHERE cd_membro = $cd";
			if($this->dbConnection->query($update)){
				return true;
			}
			else{
				return false;
			}
		}

		public function listarDiretorias($cd = ''){
			$select = "SELECT * from tb_diretoria ";
			if($cd != ''){
				$select .= "WHERE cd_diretoria = $cd";
			}
			$select .= " ORDER BY nm_diretoria";

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

		public function cadastrarCargo($nome){
			$insert = "INSERT into tb_cargo VALUES (null, '$nome', '1')";
			if($this->dbConnection->query($insert)){
				return true;
			}
			else{
				return false;
			}
		}

		public function editarCargo($cd, $nome, $status){
			$update = "UPDATE tb_cargo set nm_cargo = '$nome', st_cargo = '$status' WHERE cd_cargo = $cd";
			if($this->dbConnection->query($update)){
				return true;
			}
			else{
				return false;
			}
		}

		public function listarCargos($cd = ''){
			$select = "SELECT * from tb_cargo ";
			if($cd != ''){
				$select .= "WHERE cd_cargo = $cd";
			}
			$select .= " ORDER BY nm_cargo";

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

		public function cadastrarRegra($descricao, $pontos){
			$insert = "INSERT into tb_regra VALUES (null, '$descricao', '$pontos', '1')";
			if($this->dbConnection->query($insert)){
				return true;
			}
			else{
				return false;
			}
		}

		public function editarRegra($cd, $descricao, $pontos, $status){
			$update = "UPDATE tb_regra set ds_regra = '$descricao', qt_pontos = '$pontos', st_regra = '$status' WHERE cd_regra = $cd";
			if($this->dbConnection->query($update)){
				return true;
			}
			else{
				return false;
			}
		}

		public function listarRegra($cd = ''){
			$select = "SELECT * from tb_regra ";
			if($cd != ''){
				$select .= "WHERE cd_regra = $cd ";
			}
			$select .= "ORDER BY qt_pontos, ds_regra ";

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

		public function atribuirPonto($membroCd, $regraCd, $data = ''){
			if($data == ''){
				date_default_timezone_set('America/Sao_Paulo');
				$data = date("Y-m-d");
			}
			$insert = "INSERT into tb_pontuacao VALUES (null, '$data', '$membroCd', '$regraCd')";
			if($this->dbConnection->query($insert)){
				return true;
			}
			else{
				return false;
			}
		}
	}