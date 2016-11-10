<?php
require_once (__DIR__ . '/../DataBaseDefinition.php');
date_default_timezone_set('Asia/Tokyo');
Class DataBase{
	private $config;

	/**
	 * コンストラクタ
	 */
	function __construct(){
		$this->config = parse_ini_file(__DIR__ . '/../../config.ini');
		try{
			$dbh = $this->connection();
			$rs = $dbh->query('SHOW TABLES');
			$tables = $rs->fetchAll(PDO::FETCH_COLUMN);

			foreach (DATA_BASE_DEFINITION as $table_name => $sql) {
				if(!in_array($table_name, $tables)){
					$sth = $dbh->prepare($sql);
					$sth->execute();
				}
			}
		}catch(PDOException $e){
			die($e->getMessage());
		}

	}

	/**
	 * DBとのコネクションを貼る
	 * @param  string $dbname 対象のDB名
	 * @return dbh object
	 */
	public function connection($dbname = null){
		if(is_null($dbname)){
			$dbname = $this->config['name'];
		}
		$dsn = 'mysql:host=' . $this->config['host'] . ';dbname=' . $dbname . ';charset=utf8mb4';
		try{
			$dbh = new PDO($dsn, $this->config['user'], $this->config['password']);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}catch (PDOException $e){
			die($e->getMessage());
		}
		return $dbh;
	}
}