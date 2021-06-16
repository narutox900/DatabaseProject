<?php  
/**
 * 
 */
class Model
{
	
	protected $db;

	function __construct()
	{
		$this->db = new Database;
		$this->db->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	}
}
?>