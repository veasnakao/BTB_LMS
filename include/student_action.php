<?php
//session_start();
if (isset($_SESSION['studentId'])) {
    $studentId = $_SESSION['studentId'];
    $sql_selectStudent = "Select * From student where studentId=$studentId";
    $q_selectStudent = mysql_query($sql_selectStudent, $connection);
    while ($rStudent = mysql_fetch_array($q_selectStudent)) {
        $studentId = $rStudent[0];
        $getUsername = $rStudent[4];
        $getPhoto = $rStudent[7];
    }
}
?>
<div class="list-group">
    <?php
    echo "<img src='../asset/images/student/$getPhoto' class=\"img-responsive img-thumbnail img-user\">";
    ?>
    <br><br>
    <a href="student-dashboard.php" class="list-group-item"><span
            class="glyphicon glyphicon-menu-right"></span> Student Dashboard</a>

    <a href="student-message.php"
       class="list-group-item"><span class="glyphicon glyphicon-envelope"></span>
        Message</a>

    <a href="student-discuss.php" class="list-group-item"><span
            class="glyphicon glyphicon-envelope"></span>
        Discuss</a>


</div>



