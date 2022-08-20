<?php 
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_DATABASE', 'blog');

    $connection = new mysqli(DB_HOST,DB_USER, DB_PASS,DB_DATABASE);
    
    if($connection->connect_errno){
        die("Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error);
    }

    function fetch_all($query){
        $data = array();
        global $connection;
        $result = $connection->query($query);
        while($row = mysqli_fetch_assoc($result)) 
        {
            $data[] = $row;
        }
        return $data;
    }

    //SELECT - used when expecting a single result
    //returns an associative array
    function fetch_record($query){
        global $connection;
        $result = $connection->query($query);
        return mysqli_fetch_assoc($result);
    }

    //used to run INSERT/DELETE/UPDATE, queries that don't return a value
    //returns a value, the id of the most recently inserted record in your database
    function run_mysql_query($query){
        global $connection;
        $result = $connection->query($query);
        return $connection->insert_id;
    }
    
    //returns an escaped string. EG, the string "That's crazy!" will be returned as "That\'s crazy!"
    //also helps secure your database against SQL injection
    function escape_this_string($string){
        global $connection;
        return $connection->real_escape_string($string);
    }

?>