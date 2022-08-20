<?php 
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_DATABASE', 'students');

    

    $CN = mysqli_connect(DB_HOST,DB_USER, DB_PASS);
    $DB = mysqli_select_db($CN, DB_DATABASE);

    $EncodedData =  file_get_contents('php://input');
    $DecodedData = json_decode($EncodedData,true);

    $RollNo = $DecodedData['RollNo'];
    $StudentName = $DecodedData['StudentName'];
    $Course = $DecodedData['Course'];

    $query = "INSERT INTO student_master (RollNo, student_name, course) values ('{$RollNo}', '${StudentName}', '$Course')";


    $R = mysqli_query($CN, $query);

    if($R){
        $message = "Student has been registered";
    }
    else{
        $message = "Server Error, Try Later!";
    }

    $response[] = array("message" => $message);

    echo json_encode($response);

    // run_mysql_query($query);

    function run_mysql_query($query){
        global $connection;
        $result = $connection->query($query);
        return $connection->insert_id;
    }

    
?>