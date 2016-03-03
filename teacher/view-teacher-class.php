<?php
include("../include/connection.php");
include("../include/function.php");
//checkLogin();
?>

<?php
if (isset($_GET['teacherCode'])) {
    $getTeacherCode = $_GET['teacherCode'];
    $sql_selectTeacher = "Select * From teacher where teacherCode=$getTeacherCode";
    $q_selectTeacher = mysql_query($sql_selectTeacher, $connection);
    while ($rTeacher = mysql_fetch_array($q_selectTeacher)) {
        $teacherId = $rTeacher[0];
        $getUsername = $rTeacher[4];
        $getPhoto = $rTeacher[7];
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Teacher Dashboard</title>


    <?php
    include("../include/bootstrap_import.php");
    ?>
    <link rel="stylesheet" href="../css/my_style.css" type="text/css">

    <link rel="stylesheet" href="../css/style7.css" type="text/css">
    <link rel="stylesheet" href="../css/common.css" type="text/css">
</head>

<body>
<!---- header teacher deshboard --->
<?php
include("../include/teacher_header.php");
?>
<!---- close header teacher deshboard --->

<br><br><br><br>

<!---- main content ---->
<div class="container-fluid">
    <div class="row">

        <!--- teacher deshboard action --->
        <div class="col-md-2 my-position-fix">
            <?php
            include("../include/teacher_action.php");
            ?>
            <!--- close teacher action --->
        </div>
        <!--- close teacher deshboard action --->

        <div class="col-md-offset-3 col-md-8 teacher-content">
            <h4>All Classroom</h4>
            <a href="teacher-dashboard.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"
                                                                        style="width: 70px;"></span></a>
            <hr>
            <?php
            $sql_selectClass = "select * from v_teacher_class where teacherId ='$teacherId'";
            $q_selectClass = mysql_query($sql_selectClass, $connection);
            while ($rClass = mysql_fetch_array($q_selectClass)) {
                $classId = $rClass['classId'];
                $className = $rClass['className'];
                echo "<div class=\"col-md-2\">";
//                    echo "<a href='add-teacher.php?get={$teacherId}'><img src=\"../asset/images/subjects.png\" class=\"img-responsive img-thumbnail\"></a>";

                echo "<a href='add-teacher.php?get={$classId}'><img src='../asset/images/classroom.png' class=\"img-responsive img-thumbnail\"></a>";
//                echo "<div class=\"text-center\">" . $rClass['classId'] . "</div>";
                echo "<div class=\"text-center\">" . $rClass['className'] . "</div>";
                echo "</div>";
            }
            ?>
        </div>
</div>
<!---- close main content --->

<script src="../js/modernizr.custom.79639.js"></script>
</body>
</html>