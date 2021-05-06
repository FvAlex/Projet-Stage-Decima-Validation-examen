<?php

ini_set('memory_limit', '-1');

// MySQL Class with PDO
// 2020 Alexis Hennequez
class MySQL {

	// Base variables
	var $lastError;			// Holds the last error
	var $lastQuery;			// Holds the last query
	var $result;			// Holds the MySQL query result
	var $records;			// Holds the total number of records returned
	var $affected;			// Holds the total number of records affected
	var $rawResults;		// Holds raw 'arrayed' results
	var $arrayedResult;		// Holds an array of the result
	
	var $hostname;			// MySQL Hostname
	var $username;			// MySQL Username
	var $password;			// MySQL Password
	var $database;			// MySQL Database
	
	var $databaseLink;		// Database Connection Link

	/* *******************
	 * Class Constructor *
	 * *******************/

	function __construct($database, $username, $password, $hostname='localhost', $port=3306){
		$this->database = $database;
		$this->username = $username;
		$this->password = $password;
		$this->hostname = $hostname.':'.$port;
		
		$this->Connect();
	}



	/* *******************
	 * Private Functions *
	 * *******************/

	// Connects class to database
	// $persistant (boolean) - Use persistant connection?
	private function Connect($persistant = false){
		$this->CloseConnection();
		try {
			if($persistant){
				$this->databaseLink = new PDO('mysql:host='.$this->hostname.';dbname='.$this->database, $this->username, $this->password, array(PDO::ATTR_PERSISTENT => true));
			}else{
				$this->databaseLink = new PDO('mysql:host='.$this->hostname.';dbname='.$this->database, $this->username, $this->password);
			}
		} catch(PDOException $e) {
			$this->lastError = 'Connexion échouée : ' . $e->getMessage();
			return false;
		}
		return true;
	}


	// Performs a 'quote' on the entire array/string
	private function SecureData($data){
		if(is_array($data)){
			foreach($data as $key=>$val){
				if(!is_array($data[$key])){
					$data[$key] = $this->databaseLink->quote($data[$key]);
				}
			}
		}else{
			$data = $this->databaseLink->quote($data);
		}
		return $data;
	}



	/* ******************
	 * Public Functions *
	 * ******************/
	
	// Executes MySQL query
	function ExecuteSQL($query){
		$this->lastQuery = $query;

		if($this->result = $this->databaseLink->query($query)){
			$this->records = $this->result->rowCount();
			$this->affected = $this->result->rowCount();
			if($this->records > 0){
				$this->ArrayResults();
				return $this->arrayedResult;
			}else{
				return true;
			}
		}
		else{
			$this->lastError = $this->databaseLink->errorInfo();
			return false;
		}
	}


	// Adds a record to the database based on the array key names
	function Insert($vars, $table, $exclude = ''){
		
		// Catch Exclusions
		if($exclude == ''){
			$exclude = array();
		}
		
		array_push($exclude, 'MAX_FILE_SIZE'); // Automatically exclude this one
		
		// Prepare Variables
		$vars = $this->SecureData($vars);
		
		$query = "INSERT INTO `{$table}` SET ";
		foreach($vars as $key=>$value){
			if(in_array($key, $exclude)){
				continue;
			}
			//$query .= '`' . $key . '` = "' . $value . '", ';
			$query .= "`{$key}` = '{$value}', ";
		}
		
		$query = substr($query, 0, -2);
		
		return $this->ExecuteSQL($query);
	}


	// Deletes a record from the database
	function Delete($table, $where='', $limit='', $like=false){
		$query = "DELETE FROM `{$table}` WHERE ";
		if(is_array($where) && $where != ''){
			// Prepare Variables
			$where = $this->SecureData($where);
			
			foreach($where as $key=>$value){
				if($like){
					//$query .= '`' . $key . '` LIKE "%' . $value . '%" AND ';
					$query .= "`{$key}` LIKE '%{$value}%' AND ";
				}else{
					//$query .= '`' . $key . '` = "' . $value . '" AND ';
					$query .= "`{$key}` = '{$value}' AND ";
				}
			}
			
			$query = substr($query, 0, -5);
		}
		
		if($limit != ''){
			$query .= ' LIMIT ' . $limit;
		}
		
		return $this->ExecuteSQL($query);
	}


	// Gets a single row from $from where $where is true
	function Select($from, $where='', $orderBy='', $limit='', $like=false, $operand='AND',$cols='*'){
		// Catch Exceptions
		if(trim($from) == ''){
			return false;
		}
		
		$query = "SELECT {$cols} FROM `{$from}` WHERE ";
		
		if(is_array($where) && $where != ''){
			// Prepare Variables
			$where = $this->SecureData($where);
			
			foreach($where as $key=>$value){
				if($like){
					//$query .= '`' . $key . '` LIKE "%' . $value . '%" ' . $operand . ' ';
					$query .= "`{$key}` LIKE '%{$value}%' {$operand} ";
				}else{
					//$query .= '`' . $key . '` = "' . $value . '" ' . $operand . ' ';
					$query .= "`{$key}` = '{$value}' {$operand} ";
				}
			}
			
			$query = substr($query, 0, -(strlen($operand)+2));

		}else{
			$query = substr($query, 0, -6);
		}
		
		if($orderBy != ''){
			$query .= ' ORDER BY ' . $orderBy;
		}
		
		if($limit != ''){
			$query .= ' LIMIT ' . $limit;
		}
		
		return $this->ExecuteSQL($query);
		
	}


	// Updates a record in the database based on WHERE
	function Update($table, $set, $where, $exclude = ''){
		// Catch Exceptions
		if(trim($table) == '' || !is_array($set) || !is_array($where)){
			return false;
		}
		if($exclude == ''){
			$exclude = array();
		}
		
		array_push($exclude, 'MAX_FILE_SIZE'); // Automatically exclude this one
		
		$set = $this->SecureData($set);
		$where = $this->SecureData($where);
		
		// SET
		
		$query = "UPDATE `{$table}` SET ";
		
		foreach($set as $key=>$value){
			if(in_array($key, $exclude)){
				continue;
			}
			$query .= "`{$key}` = '{$value}', ";
		}
		
		$query = substr($query, 0, -2);
		
		// WHERE
		
		$query .= ' WHERE ';
		
		foreach($where as $key=>$value){
			$query .= "`{$key}` = '{$value}' AND ";
		}
		
		$query = substr($query, 0, -5);
		
		return $this->ExecuteSQL($query);
	}


	// 'Arrays' a single result
	function ArrayResult(){
		$this->arrayedResult = $this->result->fetch(PDO::FETCH_ASSOC) or die ($this->databaseLink->errorInfo());
		return $this->arrayedResult;
	}


	// 'Arrays' multiple result
	function ArrayResults(){
		/*if($this->records == 1){
			return $this->ArrayResult();
		}*/
		
		$this->arrayedResult = array();
		while ($data = $this->result->fetch(PDO::FETCH_ASSOC)){
			$this->arrayedResult[] = $data;
		}
		return $this->arrayedResult;
	}


	// 'Arrays' multiple results with a key
	function ArrayResultsWithKey($key='id'){
		if(isset($this->arrayedResult)){
			unset($this->arrayedResult);
		}
		$this->arrayedResult = array();
		while($row = $this->result->fetch(PDO::FETCH_ASSOC)){
			foreach($row as $theKey => $theValue){
				$this->arrayedResult[$row[$key]][$theKey] = $theValue;
			}
		}
		return $this->arrayedResult;
	}


	// Returns last insert ID
	function LastInsertID(){
		return $this->databaseLink->lastInsertId();
	}


	// Return number of rows
	function CountRows($from, $where=''){
		$result = $this->Select($from, $where, '', '', false, 'AND','count(*)');
		return $result["count(*)"];
	}


	// Closes the connections
	function CloseConnection(){
		if($this->databaseLink){
			$this->databaseLink = null;
		}
	}
}
?>