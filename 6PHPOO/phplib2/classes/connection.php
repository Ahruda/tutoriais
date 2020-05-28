<?php

class Connection
{
	private $host = 'localhost';
	private $db   = 'phplib';
	private $user = 'root';
	private $pass = 'root';
	public  $pdo;
	private $port = 3306; // pgsql - 5432, mysql - 3306

	public $regsPerPage = 7; // Registros por página
    public $linksPerPage = 15;
    public $appName = '<a href="./index.php" title="Back to menu">PHP Library</a>';
    public $appNameIndex = '<a href="../index.php" title="Back to menu">PHP Library</a>';

    public function __construct(){

		try {
					$dsn = 'mysql:host='.$this->host.';dbname='.$this->db.';port='.$this->port;
					$this->pdo = new PDO($dsn, $this->user, $this->pass);
					// Boa exibição de erros
					$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
					$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

					$this->pdo->query('SET NAMES utf8');
					return $this->pdo;

				}catch(PDOException $e){
                    // Usar estas linhas no catch apenas em ambiente de testes/desenvolvimento. Em produção apenas o exit()
					echo '<br><br><b>Código</b>: '.$e->getCode().'<hr><br>';
					echo '<b>Mensagem</b>: '. $e->getMessage().'<br>';
					echo '<b>Arquivo</b>: '.$e->getFile().'<br>';
					echo '<b>Linha</b>: '.$e->getLine().'<br>';
					exit();
		}
	}
}

