<?php
include("Database.php");
class MySQL extends Database {
    public $db;  // make db property public
    private $host;
    private $user;
    private $password;
    private $database;
    private $query;
    private $result;
    private $row;
    private $num_rows;

    function __construct() {
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->database = "digilib";
    }

    public function connect() {
        $this->db = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    function execute($query) {
        $this->query = $query;
        $this->result = $this->db->query($this->query);
    }

    function get_array() {
        if($this->row = $this->result->fetch_array(MYSQLI_ASSOC))
            return $this->row;
        else
            return false;
    }

    function get_row() {
        if($this->row = $this->result->fetch_array(MYSQLI_NUM))
            return $this->row;
        else
            return false;
    }

    function get_object() {
        if($this->row = $this->result->fetch_object())    
            return $this->row;
        else
            return false;
    }

    function get_dataset() {
        $dataset = array();
        $i = 0;
        while($r = $this->result->fetch_row()) {
            $field = 0;
            for($field = 0; $field < $this->result->field_count; $field++) {
                $dataset[$i][$field] = $r[$field];
            }
            $i++;
        }
        return $dataset;
    }

    function get_num_rows() {
        $this->num_rows = $this->result->num_rows;
        return $this->num_rows;
    }

	public function getDb() {
        return $this->db;
    }

    function close_connection() {
        $this->db->close();    
    }
}
?>
