<?php
    require_once('config.php');

    class MySqlDatabase{

    public $connection;

    public function __construct()
    {
        $this->open_conection();
    }

    public function open_conection()
    {
         if (!isset($this->connection)) {
            $this->connection = new mysqli(DB_SERVER,DB_USER, DB_PASSWORD, DB_NAME);
             
             if (!$this->connection) {
                 echo 'Cannot connect to database server';
                 exit;
             }           
         }    
         
         return $this->connection;
    
    }
    
    public function query($query)
    {
        $result = $this->connection->query($query);

        return $result;
    }


    public function fetch_assoc($result)
    {
        $row = $result->fetch_assoc();

        return $row;
    }

    }

    $database = new MySqlDatabase();

?>