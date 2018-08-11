<?php
require_once 'mysql.config.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');
class MySQL
{
    private $query;
    private $result;
    public function __construct(
        $host = MYSQL_HOST,
        $user = MYSQL_USER,
        $password = MYSQL_PASSWORD,
        $database = MYSQL_DATABASE
    ) {
        if (!$con = mysqli_connect($host, $user, $password, $database)) {
            throw new Exception('Error connecting to the server');
        }
        $this->con = $con;
    }
    public function query($query)
    {
        $this->query = $query;
        $this->result = mysqli_query($this->con, $query);
        if (!$this->result) {
            throw new Exception('Error performing query ' . $query);
        }
        return $this->result;
    }
    public function numRows()
    {
        if ($this->result) {
            return mysqli_num_rows($this->result);
        }
        return false;
    }
    public function fetchArray() {
        if ($this->result && $this->numRows() != 0) {
            return mysqli_fetch_array($this->result, MYSQLI_ASSOC);
        }
        return array();
    }
    public function realEscapeString($str)
    {
        return mysqli_real_escape_string($this->con, $str);
    }
}
?>
