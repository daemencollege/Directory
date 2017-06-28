<?php
class Database {
    // The database connection
    protected static $connection;

    /**
     * Connect to the database
     * 
     * @return bool false on failure / mysqli MySQLi object instance on success
     */
    public function connect() {    
        // Try and connect to the database
        if(!isset(self::$connection)) {
            // Load configuration as an array. Use the actual location of your configuration file
            $config = array('username'=>'root', 'password'=>'root', 'database'=>'directory');
            self::$connection = new mysqli('localhost',$config['username'],$config['password'],$config['database']);
        }

        // If connection was not successful, handle the error
        if(self::$connection === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
            return false;
        }
        return self::$connection;
    }

    /**
     * Query the database
     *
     * @param $query The query string
     * @return mixed The result of the mysqli::query() function
     */
    public function query($query) {
        // Connect to the database
        $connection = $this->connect();

        // Query the database
        $result = $connection->query($query);

        return $result;
    }

    /**
     * Fetch rows from the database (SELECT query)
     *
     * @param $query The query string
     * @return bool False on failure / array Database rows on success
     */
    public function select($query) {
        $res = $this->query($query);
        if($result === false) {
            return false;
        }
        while ($row = $res->fetch_assoc()) {
            $result = new QueryResult();
            foreach ($row as $k => $v) {
                $result->$k = $v;
            }
            $results[] = $result;
        }
        return $results;
    }

    /**
     * Fetch the last error from the database
     * 
     * @return string Database error message
     */
    public function error() {
        $connection = $this->connect();
        return $connection->error;
    }

    /**
     * Quote and escape value for use in a database query
     *
     * @param string $value The value to be quoted and escaped
     * @return string The quoted and escaped string
     */
    public function quote($value) {
        $connection = $this->connect();
        return "'" . $connection->real_escape_string($value) . "'";
    }

}

class QueryResult {
    
    private $results = array();
    
    public function __construct () 
    {
    }
    
    public function __set ($var, $val)
    {
        $this->results[$var] = $val;
    }
    
    public function __get($var)
    {
        if (isset($this->results[$var]) {
            return $this->results[$var];
        } else {
            return null;
        }
    }
}


class Person {
    
    protected $id;
    protected $first_name;
    protected $last_name;
    //protected $email;
    
    function __construct($id, $first_name, $last_name)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        //$this->email = $email;
    }
    
    protected function get_id()
    {
        return $this->id;
    }
    
    protected function get_first_name()
    {
        return $this->first_name;    
    }
    
    protected function get_last_name()
    {
        return $this->last_name;
    }
    
    protected function get_full_name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    
    /*protected function get_email()
    {
        return $this->email;
    }*/

} //End of class Person

class Employee extends Person {
    
    protected $email;
    protected $phone;
    protected $building;
    protected $room;
    
    function __construct($id, $first_name, $last_name, $email, $phone, $building, $room)
    {
        parent::__construct($id, $first_name, $last_name);
        $this->email = $email;
        $this->phone = $phone;
        $this->building = $building;
        $this->room = $room;
    }
    
    protected function get_email()
    {
        return $this->email;
    }
    
    protected function get_phone()
    {
        return $this->phone;
    }
    
    protected function get_building()
    {
        return $this->building;
    }
    
    protected function get_room()
    {
        return $this->room;
    }
    
    protected function get_departments()
    {
        $db = new Database();
		$query = "SELECT name FROM departments JOIN in_department ON id = department_id WHERE person_id = {$this->id} ORDER BY name";
		$rows = $db->select($query);
		return $rows;
    }
} //End of class Employee
?>