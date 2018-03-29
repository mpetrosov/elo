

<?php
    include ('connect.php');
    function get_Lesson(){
        global $conn;

        $sql = "SELECT * FROM lesson WHERE id = " . $_SESSION['lessonid'];

        $result = mysqli_query($conn, $sql); //$conn->query($sql);

        $lessons = [];

        while ($row = mysqli_fetch_assoc($result)) {
           $lessons[] = $row;
        }
        return $lessons;
    }


?>
