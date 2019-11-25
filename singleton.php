<? 
// Singleton, class that cannot be instantiated more than once. //

class Database {
	public static $instance;

	private function __construct () {
		//set to private so only methods inside the class can access it.
		
		$this->dsn = 'mysql:dbname=testdb;host=127.0.0.1';
		$this->username = 'default';
		$this->password = 'default';
		
		$this->conn = new PDO($this->dsn, $this->username, $this->password);
	}

	public static function getInstance () {
		Database::$instance = new Database();
		return Database::$instance;
	}

	public function fetchQuery($table){
		return "SELECT * FROM $table";
	}
}

$db = Database::getInstance();

//creates one and only one instance of the database class, 
