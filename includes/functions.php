

<?php
    include('dbh.php');
 
    function get_Students(){
        global $conn;
        
        $sql = "SELECT * FROM `students`  WHERE `st_id` = '".$_SESSION['u_id']."'";

        $result = mysqli_query($conn, $sql); //$conn->query($sql);
        $students = mysqli_fetch_all($result, MYSQLI_ASSOC);



        
        
        
        return $students;
             
    }
?>