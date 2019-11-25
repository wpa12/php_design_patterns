<? 
// Singleton, class that cannot be instantiated more than once. //

class Database {
	public static $instance;

	private function __construct () {
		//set to private so only methods inside the class can access it.
		
		$this->dsn = 'mysql:dbname=testdb;host=127.0.0.1';
		$this->username = 'default';
		$this->password = 'default';
		
		try{
			$this->conn = new PDO($this->dsn, $this->username, $this->password);
		}catch(PDOException $e) {
			return "error $e";
		}
	}

	public static function getInstance () {
		Database::$instance = new Database();
		return Database::$instance;
	}

	public function fetchQuery($sqlQuery){
		$statement = $this->conn()->prepare($sqlQuery);
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_OBJ);
		
		return $result;
	}
}

$db = Database::getInstance();

//creates one and only one instance of the database class, 
