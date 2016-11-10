<?php

require_once __DIR__ . "/../../vendor/autoload.php";
require_once __DIR__ . "./DataBase.php";


class User extends DataBase{
	var $id = null;
	var $access_token = null;
	var $refresh_token = null;

	public function create($id){
		try{
			$dbh = $this->connection();
			$sth = $dbh->prepare('
				INSERT IGNORE INTO
					users (id)
				VALUES
					(:id)
			');
			$sth->beginTransaction();
			try{
				$sth->bindParam(':id', $id);
				$executed = $sth->execute();
				$this->id = $dbh->lastInsertId('id');
				$pdo->commit();
			}catch(Exception $e){
				$dbh->rollBack();
				throw $e;
			}
			//$result = $sth->execute();
			return $this;

		}catch(PDOException $e){
			$dbh->rollBack();
			echo __LINE__ . ' : ';
			echo $e->getMessage() . '<br>';
		}
	}

	public function update_tokens($id, $access_token, $refresh_token){
		try{
			$dbh = $this->connection();
			$sth = $dbh->prepare('
				UPDATE users
					SET
						access_token=:access_token
						refresh_token=:refresh_token
					WHERE
						id=:id
			');
			$sth->beginTransaction();
			try{
				$sth->bindParam(':id', $id);
				$executed = $sth->execute();
				$pdo->commit();
			}catch(Exception $e){
				$dbh->rollBack();
				throw $e;
			}
			//$result = $sth->execute();
			return $this;

		}catch(PDOException $e){
			$dbh->rollBack();
			echo __LINE__ . ' : ';
			echo $e->getMessage() . '<br>';
		}

	}

	public function update_user_login_key($id){
		$login_key = hash('sha256', $email . $_SERVER['REMOTE_ADDR'] . time());
		$time = time();
		try{
			$dbh = $this->connection();
			$sth = $dbh->prepare('
				UPDATE users
					SET
						login_key=:login_key
						last_login=:last_login
					WHERE
						id=:id

			');
			$sth->bindParam(':email', $email);
			$sth->bindParam(':time', $time);
			$result = $sth->execute();
			setcookie('uid', $login_key, $time + 60 * 60 * 24 * 30, '/', 'gcal.mgzl.jp');
		}catch(PDOException $e){
			echo __LINE__ . ' : ';
			echo $e->getMessage() . '<br>';
		}
	}

}