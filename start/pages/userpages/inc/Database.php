<?php


class Database
{
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $tablename;
        public $con;


        // class constructor
    public function __construct(
        $dbname = "my_db2",
        $tablename = "products",
        $servername = "localhost",
        $username = "root",
        $password = ""
    )
    {
      $this->dbname = $dbname;
      $this->tablename = $tablename;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;

      // create connection
        $this->conn = new mysqli($servername, $username, $password);

        // Check connection
        if (!$this->conn){
            die("Connection failed : " . $this->conn->error);
        }

        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // execute query
        if($this->conn->query($sql)){

            $this->conn = new mysqli($servername, $username, $password, $dbname);

            // sql to create new table
            $sql = " CREATE TABLE IF NOT EXISTS `products` (
                `id` int(30) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `code` varchar(50) NOT NULL,
                `name` text NOT NULL,
                `description` text NOT NULL,
                `prev_price` float(12,2) NOT NULL DEFAULT 0.00,
                `current_price` float(12,2) NOT NULL DEFAULT 0.00,
                `img_path` text NOT NULL,
                `date_created` datetime NOT NULL DEFAULT current_timestamp(),
                `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
              );";

            $this->conn->query($sql);
            if ($this->conn->error){
                echo "Error creating table : " . $this->conn->error;
            }
        }else{
            return false;
        }
    }

    // get product from the database
    public function getData($pids = []){
        $where = "";
        if(count($pids)) {
            $pids = implode(",", $pids);
            $where = " where id in ({$pids})";
        }
        $sql = "SELECT * FROM {$this->tablename} $where";

        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            return $result;
        }
    }
}






