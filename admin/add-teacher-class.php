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
                        class="glyphicon glyphicon-menu-right"></span> Dashboard</a>
                <a href="add-department.php" class="list-group-item"><span
                        class="glyphicon glyphicon-menu-right"></span> Add Department</a>

                <a href="add-class.php" class="list-group-item"><span
                        class="glyphicon glyphicon-envelope"></span> Add Class</a>
                <a href="add-subject.php" class="list-group-item"><span class="glyphicon glyphicon-upload"></span> Add
                    Subject</a>
                <a href="add-teacher.php" class="list-group-item"><span
                        class="glyphicon glyphicon-list-alt"></span> Add Teacher</a>
                <a href="add-teacher-class.php" class="list-group-item active"><span
                        class="glyphicon glyphicon-list-alt"></span> Add Teacher Class</a>
            </div>
            <!--- close teacher action --->
        </div>
        <!--- close teacher deshboard action --->

        <div class="col-md-offset-1 col-md-9">
            <!--- teacher deshboard content --->
            <div class="row">
                <div class="col-md-10 teacher-content">
                    <h4><span class="glyphicon glyphicon glyphicon-plus"></span> Add Teacher Class</h4>
                    <hr>
                    <form class="form" action="add_edit_delete_teacher-class.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <!--                    <label for="exampleInputName2">Subject ID</label>-->
                                    <input type="hidden" class="form-control" name="teacherClassId" id="teacherClassId" required>
                                </div>
                                <!--Select Department -->
                                <div class="form-group">
                                    <label for="sel1" class="text-info">Select Teacher</label>
                                    <select class="form-control" id="teacher" name="teacherId" required>
                                        <option>(Select one)</option>
                                        <?php
                                        $sql_selectTeacher = "select * from teacher ORDER by teacherId ASC";
                                        $q_selectTeacher = mysql_query($sql_selectTeacher, $connection);
                                        while ($rTeacher = mysql_fetch_array($q_selectTeacher)) {
                                            echo "<option value=\"" . $rTeacher['teacherId'] . "\">" . $rTeacher['lastName'] ." ".$rTeacher['firstName']. "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!--Select Class -->
                                <div class="form-group">
                                    <label for="sel1" class="text-info">Select Class</label>
                                    <select class="form-control" id="class" name="classId" required>
                                        <option>(Select one)</option>
                                        <?php
                                        $sql_selectClass = "select * from class ORDER by classId ASC";
                                        $q_selectClass = mysql_query($sql_selectClass, $connection);
                                        while ($rClass = mysql_fetch_array($q_selectClass)) {
                                            echo "<option value=\"" . $rClass['classId'] . "\">" . $rClass['className'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!--Select Subject -->
                                <div class="form-group">
                                    <label for="sel1" class="text-info">Select Subject</label>
                                    <select class="form-control" id="subject" name="subjectId" required>
                                        <option>(Select one)</option>
                                        <?php
                                        $sql_selectSubject = "select * from subject ORDER by subjectId ASC";
                                        $q_selectSubject = mysql_query($sql_selectSubject, $connection);
                                        while ($rSubject = mysql_fetch_array($q_selectSubject)) {
                                            echo "<option value=\"" . $rSubject['subjectId'] . "\">" . $rSubject['subjectName'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <br><br>

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary" name="btnAddTeacherClass"
                                        onclick="increaseTeacherClassId()">
                                    <span class="glyphicon glyphicon glyphicon-plus"></span> Add Teacher Class
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--- close teacher deshboard content --->
            </div>

            <!--alert message   -->
            <div class="col-md-10">
                <?php
                if (isset($_GET['addTeacherClass'])) {
                    echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\" id=\"success-alert\">";
                    echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
                    echo "<strong>Success</strong> Classroom and Subject has been added to teacher.";
                    echo "
                    <script>
                        $(document).ready(function(){
                            $(\"#success-alert\").fadeTo(2000, 500).slideUp(500, function(){
                                $(\"#success-alert\").alert('close');
                            });
                        });
                    </script>
                ";
                }
                ?>
            </div>


            <div class="col-md-10 teacher-content">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Teacher Class ID</th>
                        <th>Teacher Name</th>
                        <th>Class Name</th>
                        <th>Subject Name</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_selectTeacherClass = "select * from v_teacher_class ORDER by teacherClassId ASC";
                        $q_selectTeacherClass = mysql_query($sql_selectTeacherClass, $connection);
                        while ($rTeacherClass = mysql_fetch_array($q_selectTeacherClass)) {
                            $teacherClassId = $rTeacherClass['teacherClassId'];
                            $photo = $rTeacher['photo'];
                            echo "<tr>";
                                echo "<td>".$rTeacherClass['teacherClassId']."</td>";
                                echo "<td>".$rTeacherClass['lastName']." ". $rTeacherClass['firstName']."</td>";
                                echo "<td>".$rTeacherClass['className']."</td>";
                                echo "<td>".$rTeacherClass['subjectName']."</td>";
                            echo "</tr>";
                        }
                        ?>

                    </tbody>
                </table>

<!--                --><?php
//                $sql_selectTeacher = "select * from teacher ORDER by teacherId ASC";
//                $q_selectTeacher = mysql_query($sql_selectTeacher, $connection);
//                while ($rTeacher = mysql_fetch_array($q_selectTeacher)) {
//                    $teacherId = $rTeacher['teacherId'];
//                    $photo = $rTeacher['photo'];
//                    echo "<div class=\"col-md-2\">";
////                    echo "<a href='add-teacher.php?get={$teacherId}'><img src=\"../asset/images/subjects.png\" class=\"img-responsive img-thumbnail\"></a>";
//
//                    echo "<a href='add-teacher.php?get={$teacherId}'><img src='../asset/images/teacher/$photo' class=\"img-responsive img-thumbnail\"></a>";
//                    echo "<div class=\"text-center\">" . $rTeacher['teacherCode'] . "</div>";
//                    echo "<div class=\"text-center\">" . $rTeacher['lastName'] . " " . $rTeacher['firstName'] . "</div>";
//                    echo "</div>";
//                }
//                ?>


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
$maxTeacherClassId = mysql_query("SELECT max(teacherClassId) as maxTeacherClassId FROM teacher_class");
$get_maxTeacherClassId = mysql_fetch_array($maxTeacherClassId);
$show_maxTeacherClassId = $get_maxTeacherClassId['maxTeacherClassId'];
echo "<script>
                function increaseTeacherClassId(){
                    document.getElementById('teacherClassId').value=$show_maxTeacherClassId+1;
                }
            </script>";
?>
<script src="../js/alertify.min.js"></script>
</body>
</html>