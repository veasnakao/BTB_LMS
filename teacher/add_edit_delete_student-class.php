<?php
include("../include/connection.php");
include("../include/function.php");
?>
<?php
//if(isset($_SESSION['teacherId'])){
//    $teacherId = $_SESSION['teacherId'];
//    $selectSubject = "select * from teacher_class where teacherId= '$teacherId'";
//    $q_selectSubject = mysql_query($selectSubject,$connection);
//    while($rSubject = mysql_fetch_array($q_selectSubject)){
//        $subjectId = $rSubject['subjectId'];
//    }
//}
if (isset($_POST['btnAddTeacherStudentClass'])) {
    $teacherStudentClassId = $_POST['teacherStudentClassId'];
    $classId = $_POST['classId'];
    $studentId = $_POST['studentId'];
    $teacherId = $_POST['teacherId'];

    $selectSubject = "select * from teacher_class where classId= '$classId'";
    $q_selectSubject = mysql_query($selectSubject,$connection);
    while($rSubject = mysql_fetch_array($q_selectSubject)){
        $subjectId = $rSubject['subjectId'];
    }

    $sql_insert = "insert into teacher_student_class (teacherStudentClassId,classId,subjectId,studentId,teacherId) values ('$teacherStudentClassId','$classId','$subjectId','$studentId','$teacherId')";
    $q_insert = mysql_query($sql_insert, $connection);
    if (!$q_insert) {
        echo mysql_error();
    }else{
        header("Location: teacher-add-student-class.php?addTeacherStudentClass");
    }
}
//close add menu


?>
