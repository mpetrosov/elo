
<?php
    include('dbh.php');

    function get_Students(){
        global $conn;

        $sql = "SELECT * FROM `students`  WHERE `st_id` = '".$_SESSION['u_id']."'";

        $result = mysqli_query($conn, $sql); //$conn->query($sql);

        $students = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $students[] = $row;
        }

        return $students;

    }

    function get_StudentsGroup(){
        global $conn;
        if(!isset($_GET['group'])){
            die();
        }
        $group = $_GET['group'];

        //student.php?id=1
        $sql = "SELECT lastname, firstname FROM `students`  WHERE `class_id` = $group ORDER BY lastname ASC";


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
?>
