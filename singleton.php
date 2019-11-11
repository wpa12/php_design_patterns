<? 
// Singleton, class that cannot be instantiated more than once. //

class Database {
	public static $instance;

	private function __construct () {
		//set to private so only methods inside the class can access it.
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
