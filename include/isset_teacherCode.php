<?php
if (isset($_GET['teacherCode'])) {
    $getTeacherCode = $_GET['teacherCode'];
    $sql_selectTeacher = "Select * From teacher where teacherCode=$getTeacherCode";
    $q_selectTeacher = mysql_query($sql_selectTeacher, $connection);
    while ($rTeacher = mysql_fetch_array($q_selectTeacher)) {
        $getTeacherCode = $rTeacher[1];
        $getPhoto = $rTeacher[7];
    }
}
?>