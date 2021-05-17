<?php  

/**
 * KoneksiDB
 */
class KoneksiDB {
	private $user;
	private $server = "localhost";
	private $password = "";
	private $database = "db_responsi";
	private $connection;

	function __construct($user, $pass) {
		$this->connection = @mysqli_connect($this->server, $user, $pass, $this->database);
	}

	public function getConnection() {
		return $this->connection;
	}
}

?>