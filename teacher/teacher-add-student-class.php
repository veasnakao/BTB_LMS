<?php
session_start();
include("../include/connection.php");
include("../include/function.php");
?>

<?php
if (isset($_SESSION['teacherId'])) {
    $teacherId = $_SESSION['teacherId'];
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
    <link rel="stylesheet" href="../css/alertify.default.css" type="text/css">
    <link rel="stylesheet" href="../css/alertify.css" type="text/css">
    <link rel="stylesheet" href="../css/alertify.core.css" type="text/css">
    <link rel="stylesheet" href="../css/alertify.bootstrap.css" type="text/css">

</head>

<body>
<!---- header teacher deshboard --->
<?php
include("../include/teacher_header.php");
//?>
<!---- close header teacher dashboard --->

<br><br><br><br>

<!---- main content ---->
<div class="container-fluid">
    <div class="row">

        <!--- teacher deshboard action --->
        <div class="col-md-2 my-position-fix">
            <?php
            include("../include/teacher_action.php");
            ?>
        </div>
        <!--- close teacher deshboard action --->

        <div class="col-md-offset-3 col-md-9">
            <!--- teacher deshboard content --->
            <div class="row">
                <div class="col-md-10 teacher-content">
                    <h4><span class="glyphicon glyphicon glyphicon-plus"></span> Add Teacher Class</h4>
                    <hr>
                    <form class="form" action="add_edit_delete_student-class.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <!--                    <label for="exampleInputName2">Subject ID</label>-->
                                    <input type="hidden" class="form-control" name="teacherStudentClassId"
                                           id="teacherStudentClassId" required>
                                    <input type="hidden" class="form-control" name="teacherId" required value="<?php echo $teacherId; ?>">
                                </div>
                                <!--Select Department -->
                                <div class="form-group">
                                    <label for="sel1" class="text-info">Select Teacher Class and Subject</label>
                                    <select class="form-control" id="teacherClassID" name="classId" required>
                                        <option>(Select one)</option>
                                        <?php
                                        $sql_selectTeacherClass = "select * from v_teacher_class ORDER by teacherClassId ASC";
                                        $q_selectTeacherClass = mysql_query($sql_selectTeacherClass, $connection);
                                        while ($rTeacherClass = mysql_fetch_array($q_selectTeacherClass)) {
                                            echo "<option value=\"" . $rTeacherClass['classId'] . "\">" . $rTeacherClass['className'] . " | " . $rTeacherClass['subjectName'] . "</option>";
                                            $subjectId = $rTeacherClass['subjectId'];
                                        }
                                        ?>
                                    </select>

                                </div>
                                <!--Select Class -->
                                <div class="form-group">
                                    <label for="sel1" class="text-info">Select Student</label>
                                    <select class="form-control" id="class" name="studentId" required>
                                        <option>(Select one)</option>
                                        <?php
                                        $sql_selectStudent = "select * from student where teacherId='$teacherId'";
                                        $q_selectStudent = mysql_query($sql_selectStudent, $connection);
                                        while ($rStudent = mysql_fetch_array($q_selectStudent)) {
                                            echo "<option value=\"" . $rStudent['studentId'] . "\">" . $rStudent['lastName'] . " " . $rStudent['firstName'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>


                            </div>
                            <br><br>

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary" name="btnAddTeacherStudentClass"
                                        onclick="increaseTeacherStudentClassId()">
                                    <span class="glyphicon glyphicon glyphicon-plus"></span> Add Student Class
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
                if (isset($_GET['addTeacherStudentClass'])) {
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
<!--                        <th>Student Class ID</th>-->
                        <th>Student Name</th>
                        <th>Class</th>
                        <th>Subject</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql_selectTeacherClass = "select * from v_teacher_student_class ORDER by teacherStudentClassId ASC";
                    $q_selectTeacherClass = mysql_query($sql_selectTeacherClass, $connection);
                    while ($rTeacherClass = mysql_fetch_array($q_selectTeacherClass)) {
//                        $teacherClassId = $rTeacherClass['teacherClassId'];
//                       $photo = $rTeacher['photo'];
                        echo "<tr>";
//                        echo "<td>" . $rTeacherClass['teacherStudentClassId'] . "</td>";
                        echo "<td>" . $rTeacherClass['lastName'] . " ". $rTeacherClass['firstName']."</td>";
                        echo "<td>" . $rTeacherClass['className'] . "</td>";
                        echo "<td>" . $rTeacherClass['subjectName'] . "</td>";
                        echo "</tr>";
                    }
                    ?>

                    </tbody>
               </table>
<!---->
<!--                <!--                --><?php
                //                $sql_selectTeacher = "select * from teacher ORDER by teacherId ASC";
//                //                $q_selectTeacher = mysql_query($sql_selectTeacher, $connection);
//                //                while ($rTeacher = mysql_fetch_array($q_selectTeacher)) {
//                //                    $teacherId = $rTeacher['teacherId'];
//                //                    $photo = $rTeacher['photo'];
//                //                    echo "<div class=\"col-md-2\">";
//                ////                    echo "<a href='add-teacher.php?get={$teacherId}'><img src=\"../asset/images/subjects.png\" class=\"img-responsive img-thumbnail\"></a>";
//                //
//                //                    echo "<a href='add-teacher.php?get={$teacherId}'><img src='../asset/images/teacher/$photo' class=\"img-responsive img-thumbnail\"></a>";
//                //                    echo "<div class=\"text-center\">" . $rTeacher['teacherCode'] . "</div>";
//                //                    echo "<div class=\"text-center\">" . $rTeacher['lastName'] . " " . $rTeacher['firstName'] . "</div>";
//                //                    echo "</div>";
//                //                }
//                //                ?>
<!---->
<!---->
<!--            </div>-->
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
$maxTeacherStudentClassId = mysql_query("SELECT max(teacherStudentClassId) as maxTeacherStudentClassId FROM teacher_student_class");
$get_maxTeacherStudentClassId = mysql_fetch_array($maxTeacherStudentClassId);
$show_maxTeacherStudentClassId = $get_maxTeacherStudentClassId['maxTeacherStudentClassId'];
echo "<script>
                function increaseTeacherStudentClassId(){
                    document.getElementById('teacherStudentClassId').value=$show_maxTeacherStudentClassId + 1;
                }
            </script>";
?>
<script src="../js/alertify.min.js"></script>

</body>
</html>