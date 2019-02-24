<?php

/*
* Classe responsável por todas as ações
* relacionadas ao banco de dados
*/

namespace Portal\DB;

class Sql {

	private $conn;

	/* Método mágico construct */
	public function __construct()
	{
		$this->conn = new \PDO(
			"mysql:dbname=" . MYSQL_DATABASE . ";host=" . DBHOST, MYSQL_USER, MYSQL_PASSWORD
		);
	}

	public function getErrors()
	{
		return $this->conn->errorInfo();
	}

	/* Seta os parâmetros */
	private function setParams($statement, $parameters = array())
	{
		foreach ($parameters as $key => $value) {
			$this->bindParam($statement, $key, $value);
		}
	}

	/* Binda os parâmetros */
	private function bindParam($statement, $key, $value)
	{
		$statement->bindParam($key, $value);
	}

	/* Faz uma query */
	public function query($rawQuery, $params = array())
	{
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
	}

	/* executa uma consulta */
	public function select($rawQuery, $params = array()):array
	{
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

}

?>