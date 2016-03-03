<?php
include("../include/connection.php");
include("../include/function.php");
?>
<?php
//add class
if (isset($_POST['btnAddClass'])) {
    $classId = $_POST['txtClassId'];
    $classCode = $_POST['txtClassCode'];
    $className = $_POST['txtClassName'];
    $sql_insert = "insert into class values ('$classId','$classCode','$className')";
    $q_insert = mysql_query($sql_insert, $connection);
    if (!$q_insert) {
        echo mysql_error();
    }else{
        header("Location: add-class.php?addClass=added");
    }
}

//if (isset($_POST['btnAddTeacher'])) {
//    $teacherId = $_POST['teacherId'];
//    $teacherCode = $_POST['teacherCode'];
//    $firstname = $_POST['firstname'];
//    $lastname = $_POST['lastname'];
//    $departmentId = $_POST['departmentId'];
//    $photo = 'user.png';
//    $classId = $_POST['classId'];
//    $subjectId = $_POST['subjectId'];
//
//    $sql_insert = "insert into teacher (teacherId,teacherCode,firstName,lastName,departmentId,photo,classId,subjectId) values ('$teacherId','$teacherCode','$firstname','$lastname','$departmentId','$photo','$classId','$subjectId')";
//    $q_insert = mysql_query($sql_insert, $connection);
//    if (!$q_insert) {
//        echo mysql_error();
//    }else{
//        header("Location: add-teacher.php?addTeacher=added");
//    }
//}
//close add menu


?>
