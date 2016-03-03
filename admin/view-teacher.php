<?php
include("../include/connection.php");
include("../include/function.php");
?>

<?php


?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>


    <?php
    include("../include/bootstrap_import.php");
    ?>
    <link rel="stylesheet" href="../css/my_style.css" type="text/css">
    <link rel="stylesheet" href="../css/alertify.default.css" type="text/css">
    <link rel="stylesheet" href="../css/alertify.css" type="text/css">
    <link rel="stylesheet" href="../css/alertify.core.css" type="text/css">
    <link rel="stylesheet" href="../css/alertify.bootstrap.css" type="text/css">

</head>

<body>
<!---- header teacher deshboard --->
<?php
include("../include/admin_header.php");
//?>
<!---- close header teacher dashboard --->

<br><br><br><br>

<!---- main content ---->
<div class="container-fluid">
    <div class="row">

        <!--- teacher deshboard action --->
        <div class="col-md-2">

            <img src="../asset/administrator.png" class="img-responsive img-thumbnail img-user"><br><br>

            <!--- teacher action --->
            <div class="list-group">
                <a href="admin-dashboard.php" class="list-group-item"><span
                        class="glyphicon glyphicon-menu-right active"></span> Dashboard</a>
                <a href="add-department.php" class="list-group-item"><span
                        class="glyphicon glyphicon-menu-right"></span> Add Department</a>

                <a href="add-class.php" class="list-group-item"><span
                        class="glyphicon glyphicon-envelope"></span> Add Class</a>
                <a href="add-subject.php" class="list-group-item"><span class="glyphicon glyphicon-upload"></span> Add
                    Subject</a>
                <a href="add-teacher.php" class="list-group-item"><span
                        class="glyphicon glyphicon-list-alt"></span> Add Teacher</a>
            </div>
            <!--- close teacher action --->
        </div>
        <!--- close teacher deshboard action --->

        <div class="col-md-offset-1 col-md-9">
            <!--- teacher deshboard content --->
            <div class="row">
                <div class="col-md-10 teacher-content">
                    <h4>All Teacher</h4>
                    <a href="admin-dashboard.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"
                                                                                style="width: 70px;"></span></a>
                    <hr>
                    <?php
                    $sql_selectTeacher = "select * from teacher ORDER by teacherId ASC";
                    $q_selectTeacher = mysql_query($sql_selectTeacher, $connection);
                    while ($rTeacher = mysql_fetch_array($q_selectTeacher)) {
                        $teacherId = $rTeacher['teacherId'];
                        $photo = $rTeacher['photo'];
                        echo "<div class=\"col-md-2\">";
//                    echo "<a href='add-teacher.php?get={$teacherId}'><img src=\"../asset/images/subjects.png\" class=\"img-responsive img-thumbnail\"></a>";

                        echo "<a href='add-teacher.php?get={$teacherId}'><img src='../asset/images/teacher/$photo' class=\"img-responsive img-thumbnail\"></a>";
                        echo "<div class=\"text-center\">" . $rTeacher['teacherCode'] . "</div>";
                        echo "<div class=\"text-center\">" . $rTeacher['lastName'] . " " . $rTeacher['firstName'] . "</div>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>


    </div>

</div>
<!---- close main content --->

<script>
    //    $(document).ready(function(){
    //        $("img").click(function(){
    //            var a =$(this).attr('id');
    //            alert(a);
    //        });
    //    });

</script>


<?php
$maxTeacherId = mysql_query("SELECT max(teacherId) as maxTeacherId FROM teacher");
$get_maxTeacherId = mysql_fetch_array($maxTeacherId);
$show_maxTeacherId = $get_maxTeacherId['maxTeacherId'];
echo "<script>
                function increaseTeacherId(){
                    document.getElementById('teacherId').value=$show_maxTeacherId+1;
                }
            </script>";
?>
<script src="../js/alertify.min.js"></script>
</body>
</html>