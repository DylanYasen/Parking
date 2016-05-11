<?php 

class DatabaseConnection
{	
	var $connection;
	var $debug;

	var $dbName = "yadikae1";
	var $server = "studentdb-maria.gl.umbc.edu";
	var $username = "yadikae1";
	var $password = "yadi0306";
	
	function DatabaseConnection($debug)
	{
		$this->debug = $debug; 
		$this->connection = $this->connect($this->dbName);
	}

// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
	
	function connect($db)// connect to MySQL
	{
		$conn = @mysql_connect($this->server, $this->username, $this->password) or die("Could not connect to MySQL: ". mysql_error());

		$tableSelected = @mysql_select_db($db, $conn) or die("Could not select '$db' database". mysql_error());

		if($this->debug == true) 
			echo "connection established<br>\n";

		return $conn; 
	}

// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
	
	function executeQuery($sql) // execute query
	{
		if($this->debug == true) 
			{ echo("executing query : $sql <br>\n"); }

		$result = mysql_query($sql, $this->connection) or die("Could not execute query '$sql' :" . mysql_error()."<br>\n");

		if($this->debug == true) 
			{ echo("successfully executed query : $sql <br>\n"); } 
		
		return $result;
	}			

} // ends class, NEEDED!!

?>