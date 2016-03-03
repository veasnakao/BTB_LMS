<?php
include("../include/connection.php");
include("../include/function.php");
?>
<?php
//add menu
if (isset($_POST['btnAddTeacherClass'])) {
    $teacherClassId = $_POST['teacherClassId'];
    $teacherId = $_POST['teacherId'];
    $classId = $_POST['classId'];
    $subjectId = $_POST['subjectId'];

    $sql_insert = "insert into teacher_class (teacherClassId,teacherId,classId,subjectId) values ('$teacherClassId','$teacherId','$classId','$subjectId')";
    $q_insert = mysql_query($sql_insert, $connection);
    if (!$q_insert) {
        echo mysql_error();
    }else{
        header("Location: add-teacher-class.php?addTeacherClass");
    }


}
//close add menu


?>
