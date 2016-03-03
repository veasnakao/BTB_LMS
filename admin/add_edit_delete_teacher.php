<?php
include("../include/connection.php");
include("../include/function.php");
?>
<?php
//add menu
if (isset($_POST['btnAddTeacher'])) {
    $teacherId = $_POST['teacherId'];
    $teacherCode = $_POST['teacherCode'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $departmentId = $_POST['departmentId'];
    $photo = 'user.png';

    $sql_insert = "insert into teacher (teacherId,teacherCode,firstName,lastName,departmentId,photo) values ('$teacherId','$teacherCode','$firstname','$lastname','$departmentId','$photo')";
    $q_insert = mysql_query($sql_insert, $connection);
    if (!$q_insert) {
        echo mysql_error();
    }else{
        header("Location: add-teacher.php?addTeacher=added");
    }
}
//close add menu


?>
