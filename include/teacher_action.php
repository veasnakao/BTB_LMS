<?php
//session_start();
if (isset($_SESSION['teacherId'])) {
    $teacherId = $_SESSION['teacherId'];
    $sql_selectTeacher = "Select * From teacher where teacherId=$teacherId";
    $q_selectTeacher = mysql_query($sql_selectTeacher, $connection);
    while ($rTeacher = mysql_fetch_array($q_selectTeacher)) {
        $teacherId = $rTeacher[0];
        $getUsername = $rTeacher[4];
        $getPhoto = $rTeacher[7];
    }
}
?>
<div class="list-group">
    <?php
    echo "<img src='../asset/images/teacher/$getPhoto' class=\"img-responsive img-thumbnail img-user\">";
    ?>
    <br><br>
    <a href="teacher-dashboard.php" class="list-group-item"><span
            class="glyphicon glyphicon-menu-right"></span> Teacher Dashboard</a>

    <a href="teacher-add-student.php"
       class="list-group-item"><span class="glyphicon glyphicon-envelope"></span>
        Add Student</a>

    <a href="teacher-add-student-class.php"
       class="list-group-item"><span class="glyphicon glyphicon-envelope"></span>
        Add Student Class</a>

    <a href="teacher-message.php" class="list-group-item"><span
            class="glyphicon glyphicon-envelope"></span>
        Message</a>

    <a href="teacher-upload-lesson.php"
       class="list-group-item"><span
            class="glyphicon glyphicon-upload"></span> Upload Lesson</a>

    <a href="teacher-assignment.php"
       class="list-group-item"><span
            class="glyphicon glyphicon-list-alt"></span> Add Assignment</a>

    <a href="#"
       class="list-group-item"><span
            class="glyphicon glyphicon-list-alt"></span> Quizz</a>
</div>



