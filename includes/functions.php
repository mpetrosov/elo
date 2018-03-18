

<?php
include('dbh.php');
 
    function get_Students(){
        global $conn;
        
        $sql = "SELECT * FROM students";

        $students = $conn->query($sql);
              
        return $students;
             
    }
?>