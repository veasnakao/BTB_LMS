<?php
session_start();
include("../include/connection.php");
include("../include/function.php");
?>

<?php
//if (isset($_GET['teacherCode'])) {
//    $getTeacherCode = $_GET['teacherCode'];
//    $sql_selectTeacher = "Select * From teacher where teacherCode=$getTeacherCode";
//    $q_selectTeacher = mysql_query($sql_selectTeacher, $connection);
//    while ($rTeacher = mysql_fetch_array($q_selectTeacher)) {
//        $teacherId = $rTeacher[0];
//        $getUsername = $rTeacher[4];
//        $getPhoto = $rTeacher[7];
//    }
//}
if(isset($_SESSION['teacherId'])){
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

    <style>
        .user-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }
        .test{
            border: solid thick blueviolet;
        }
    </style>

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
                    <h4><span class="glyphicon glyphicon glyphicon-plus"></span> Add Student</h4>
                    <hr>
                    <form class="form" action="add_edit_delete_student.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <!--                    <label for="exampleInputName2">Subject ID</label>-->
                                    <input type="hidden" class="form-control" name="studentId" id="studentId" required>

                                </div>
<!--                                <div class="form-group">-->
<!--                                    <label for="sel1" class="text-info">Select Class</label>-->
<!--                                    <select class="form-control" id="class" name="classId" required>-->
<!--                                        <option>(Select one)</option>-->
<!--                                        --><?php
//                                        $sql_selectClass = "select * from v_teacher_class where teacherId='$teacherId' ORDER by classId ASC";
//                                        $q_selectClass = mysql_query($sql_selectClass, $connection);
//                                        while ($rClass = mysql_fetch_array($q_selectClass)) {
//                                            echo "<option value=\"" . $rClass['classId'] . "\">" . $rClass['className'] . "</option>";
//                                        }
//                                        ?>
<!--                                    </select>-->
<!--                                </div>-->

                                <div class="form-group">
                                    <label for="exampleInputName2">Student Code</label>
                                    <input type="text" class="form-control" name="studentCode" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName2">Firstname</label>
                                    <input type="text" class="form-control" name="firstname" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName2">Lastname</label>
                                    <input type="text" class="form-control" name="lastname" required>
                                </div>
                                <input type="hidden" class="form-control" name="teacherId" required value="<?php echo $teacherId; ?>">
                            </div>
                            <br><br>

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary jaAddTeacher" name="btnAddStudent"
                                        onclick="increaseStudentId()">
                                    <span class="glyphicon glyphicon glyphicon-plus"></span> Add Student
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--- close add student --->
                <!--alert message   -->
                <div class="col-md-10">
                    <?php
                    if (isset($_GET['addStudent'])) {
                        echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\" id=\"success-alert\">";
                        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
                        echo "<strong>Success</strong> Student has been added.";
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
                    <?php
                    $sql_selectStudent = "select * from student ORDER by studentId DESC";
                    $q_selectStudent = mysql_query($sql_selectStudent, $connection);
                    while ($rStudent = mysql_fetch_array($q_selectStudent)) {
                        $studentId = $rStudent['studentId'];
                        $photo = $rStudent['photo'];
                        echo "<div class=\"col-md-2\">";
//                    echo "<a href='add-teacher.php?get={$teacherId}'><img src=\"../asset/images/subjects.png\" class=\"img-responsive img-thumbnail\"></a>";

                        echo "<a href='teacher-add-student.php?get={$studentId}'><img src='../asset/images/student/$photo' class=\"user-photo img-responsive\"></a>";
                        echo "<hr>";
                        echo "<div class=\"text-center\">" . $rStudent['studentCode'] . "</div>";
                        echo "<div class=\"text-center\">" . $rStudent['lastName'] . " " . $rStudent['firstName'] . "</div>";
                        echo "</div>";
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>

</div>
<!---- close main content --->

<?php
$maxStudentId = mysql_query("SELECT max(studentId) as maxStudentId FROM student");
$get_maxStudentId = mysql_fetch_array($maxStudentId);
$show_maxStudentId = $get_maxStudentId['maxStudentId'];
echo "<script>
                function increaseStudentId(){
                    document.getElementById('studentId').value=$show_maxStudentId+1;
                }
            </script>";
?>
<script src="../js/alertify.min.js"></script>


</body>
</html>
