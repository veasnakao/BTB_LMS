<?php
include("../include/connection.php");
include("../include/function.php");
?>
<?php

//if (isset($_GET['teacherCode'])) {
//    $getTeacherCode = $_GET['teacherCode'];
//}

if (isset($_POST['btnAddStudent'])) {
    $studentId = $_POST['studentId'];
    $studentCode = $_POST['studentCode'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $teacherId = $_POST['teacherId'];
    $photo = 'student.png';

    $sql_insert = "insert into student (studentId,studentCode,firstName,lastName,teacherId,photo) values ('$studentId','$studentCode','$firstname','$lastname','$teacherId','$photo')";
    $q_insert = mysql_query($sql_insert, $connection);
    if (!$q_insert) {
        echo mysql_error();
    } else {
        header("Location: teacher-add-student.php?addStudent");
    }


}
//close add menu


?>
