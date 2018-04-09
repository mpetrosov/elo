
<?php
    include('dbh.php');

    function getStudents(){
        global $conn;

        $sql = "SELECT * FROM `students`  WHERE `st_id` = '".$_SESSION['u_id']."'";

        $result = mysqli_query($conn, $sql); //$conn->query($sql);

        $students = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $students[] = $row;
        }

        return $students;

    }

    function getStudentsGroup(){
        global $conn;
        if(!isset($_GET['group'])){
            die();
        }
        $group = $_GET['group'];

        //student.php?id=1
        $sql = "SELECT st_id, lastname, firstname FROM `students`  WHERE `class_id` = $group ORDER BY lastname ASC";


        $result = mysqli_query($conn, $sql); //$conn->query($sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $students[] = $row;

        }
        return $students;

    }

    function getStudentsById(){
        global $conn;
        if(!isset($_GET['id'])){

           die();
        }
        $id = $_GET['id'];

        //student.php?id=1
        $sql = "SELECT * FROM `students`  WHERE `st_id` = $id";
    //    var_dump($sql);

        $result = mysqli_query($conn, $sql); //$conn->query($sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $students[] = $row;

        }
        return $students;


    }

    function rewardBtn(){
        global $conn;
        $id = $_GET['id'];
        
        $sql = "UPDATE students SET bonus = bonus + 1 WHERE st_id = $id";
   
       
        $result = mysqli_query($conn, $sql); 
       
        $sql = "SELECT bonus from students WHERE st_id = $id";
        $result = mysqli_query($conn, $sql);
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }
       
    function getTeachersName(){
        global $conn;

        

        $sql = "SELECT teach_first, teach_last FROM `teachers`  WHERE `teach_id` = '".$_SESSION['t_id']."'";

        $result = mysqli_query($conn, $sql); //$conn->query($sql);

        $teachers = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $teachers[] = $row;
        }

        return $teachers;

    }