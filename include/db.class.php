<?php
class DB
{
	function DB($host, $user, $password, $database) #Connection & Database.
	{
		$link = mysql_connect($host, $user, $password) or die("\n<h2>Could not connect</h2>");
		mysql_select_db($database) or die("\n<h2>Could not select database." . " Error: " . mysql_error($link)."</h2>");						
	}
	
	function dbConnect() #Connect to Database.
	{
		DB::DB();	
	}
	
	function dbClose() #Close Connection.
	{
		global $link;
		mysql_close($link);
	}
	
	function query($sql) #Performing SQL query.
	{
		$result = mysql_query($sql) or die("Query failed. Error: ".mysql_error());
		return $result;
	}
	
	function select_asc($table, $order) #Performing SQL query.
	{
		$sql = "SELECT * FROM $table ORDER BY $order ASC";
		$result = mysql_query($sql) or die("Query failed. Error: ".mysql_error());
		return $result;
	}
	
	function select_desc($table, $order) #Performing SQL query.
	{
		$sql = "SELECT * FROM $table ORDER BY $order desc";
		$result = mysql_query($sql) or die("Query failed. Error: ".mysql_error());
		return $result;
	}
	
	function where($table, $where) #Performing SQL query.
	{
		$sql = "SELECT * FROM $table WHERE $where";
		$result = mysql_query($sql) or die("Query failed. Error: ".mysql_error());
		return $result;
	}
	
	function where_single($column, $table, $where)
	{
		$sql = "SELECT $column FROM $table WHERE $where";
		$result = mysql_query($sql) or die("Query failed. Error: ".mysql_error());
		$row = mysql_fetch_array($result);
		return $row[0];
	}
	
	function fetch_array($result) #Fetch result in Array.
	{
		return mysql_fetch_array($result);
	}
	
	function fetch_assoc($result) #Fetch result in Assoc.
	{
		return mysql_fetch_assoc($result);
	}
	
	function fetch_object($result) #Fetch result in Object.
	{
		return mysql_fetch_object($result);
	}
	
	function num_rows($query) #Fetch Num Rows with Query.
	{
		$result = mysql_query($query);
		return mysql_num_rows($result);
	}
	
	function num_rows_result($result) #Fetch Num Rows with Result.
	{
		return mysql_num_rows($result);
	}
	
	function insert($table, $column, $values){
		$query = "INSERT INTO $table ( $column ) VALUES ( $values )";
		$result = mysql_query($query);
		return $result;
	}
	
	function update($table, $column, $where){
		$query = "UPDATE $table SET $column WHERE $where";
		$result = mysql_query($query) or die(mysql_error());
		return $result;
	}
	
	function delete($table, $column){
		$query = "DELETE FROM $table WHERE $column";
		$result = mysql_query($query);
		return $result;
	}
	
	function affected_rows() #Return Affected Rows.
	{
		return mysql_affected_rows();
	}
}
if(strpos($_SERVER['PHP_SELF'], '/admin/') !== FALSE){
	require_once('../include/config.php');
}else{
	require_once('include/config.php');
}

$db = new DB(DB_SERVER, DB_USER, DB_PASSWORD,DB_NAME);
?>