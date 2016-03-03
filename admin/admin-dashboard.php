<?php
include("../include/connection.php");
include("../include/function.php");
?>

<?php
if (isset($_POST['btnAddDepartment'])) {
    $departmentId = $_POST['txtDepartmentId'];
    $departmentCode = $_POST['txtDepartmentCode'];
    $departmentName = $_POST['txtDepartmentName'];
    $formData = array($departmentId, $departmentCode, $departmentName);
    $tableName = 'department';
    insertRecord($tableName, $formData);
}


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
    <link rel="stylesheet" href="../css/style7.css" type="text/css">
    <link rel="stylesheet" href="../css/common.css" type="text/css">
</head>

<body>
<!---- header teacher deshboard --->
<?php
include("../include/admin_header.php");
?>
<!---- close header teacher deshboard --->

<br><br><br><br>

<!---- main content ---->
<div class="container-fluid">
    <div class="row">
        <!--- teacher deshboard action --->
        <div class="col-md-2">
            <img src="../asset/administrator.png" class="img-responsive img-thumbnail img-user"><br><br>
            <!--- teacher action --->
            <div class="list-group">
                <a href="admin-dashboard.php" class="list-group-item active"><span
                        class="glyphicon glyphicon-menu-right"></span> Dashboard</a>
                <a href="add-department.php" class="list-group-item"><span
                        class="glyphicon glyphicon-menu-right"></span> Add Department</a>
                <a href="add-class.php" class="list-group-item"><span
                        class="glyphicon glyphicon-envelope"></span> Add Class</a>
                <a href="add-subject.php" class="list-group-item"><span class="glyphicon glyphicon-upload"></span> Add
                    Subject</a>
                <a href="add-teacher.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt"></span> Add
                    Teacher</a>
                <a href="add-teacher-class.php" class="list-group-item"><span
                        class="glyphicon glyphicon-list-alt"></span> Add Teacher Class</a>
            </div>
            <!--- close teacher action --->
        </div>
        <!--- close teacher deshboard action --->


        <!--- teacher deshboard content --->
        <div class="col-md-offset-1 col-md-8 teacher-content">
            <h4> Admin Dashboard</h4>
            <hr>
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <ul class="ch-grid">
                        <li>
                            <div class="ch-item">
                                <div class="ch-info">
                                    <div class="ch-info-front ch-department"></div>
                                    <div class="ch-info-back">
                                        <h3><a href="view-department.php">Department</a></h3>
                                        <hr>
                                        <?php
                                        $sql_countDepartment = mysql_query("SELECT count(departmentId) as countDepartment FROM department");
                                        $get_countDepartment = mysql_fetch_array($sql_countDepartment);
                                        $show_countDepartment = $get_countDepartment['countDepartment'];
                                        echo "<h4 style='color: white;'>Total : " . $show_countDepartment . "</h4>";
                                        ?>


                                        <!--                                        <p>by Alexander Shumihin <a href="http://drbl.in/eAoj">View on Dribbble</a></p>-->
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="ch-item">
                                <div class="ch-info">
                                    <div class="ch-info-front ch-classroom"></div>
                                    <div class="ch-info-back">
                                        <h3><a href="view-class.php">Classroom</a></h3>
                                        <hr>
                                        <?php
                                        $sql_countClass = mysql_query("SELECT count(classId) as countClass FROM class");
                                        $get_countClass = mysql_fetch_array($sql_countClass);
                                        $show_countClass = $get_countClass['countClass'];
                                        echo "<h4 style='color: white;'>Total : " . $show_countClass . "</h4>";
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="ch-item">
                                <div class="ch-info">
                                    <div class="ch-info-front ch-subject"></div>
                                    <div class="ch-info-back">
                                        <h3><a href="view-subject.php">Subject</a></h3>
                                        <hr>
                                        <?php
                                        $sql_countSubject = mysql_query("SELECT count(subjectId) as countSubject FROM subject");
                                        $get_countSubject = mysql_fetch_array($sql_countSubject);
                                        $show_countSubject = $get_countSubject['countSubject'];
                                        echo "<h4 style='color: white;'>Total : " . $show_countSubject . "</h4>";
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="ch-item">
                                <div class="ch-info">
                                    <div class="ch-info-front ch-teacher"></div>
                                    <div class="ch-info-back">
                                        <h3><a href="view-teacher.php">Teacher</a></h3>
                                        <hr>
                                        <?php
                                        $sql_countTeacher = mysql_query("SELECT count(teacherId) as countTeacher FROM teacher");
                                        $get_countTeacher = mysql_fetch_array($sql_countTeacher);
                                        $show_countTeacher = $get_countTeacher['countTeacher'];
                                        echo "<h4 style='color: white;'>Total : " . $show_countTeacher . "</h4>";
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="ch-item">
                                <div class="ch-info">
                                    <div class="ch-info-front ch-student"></div>
                                    <div class="ch-info-back">
                                        <h3><a href="view-student.php">Student</a></h3>
                                        <hr>
                                        <?php
                                        $sql_countStudent = mysql_query("SELECT count(studentId) as countStudent FROM student");
                                        $get_countStudent = mysql_fetch_array($sql_countStudent);
                                        $show_countStudent = $get_countStudent['countStudent'];
                                        echo "<h4 style='color: white;'>Total : " . $show_countStudent . "</h4>";
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--- close teacher dashboard content --->


    </div>
</div>
<!---- close main content --->

<?php
$maxDepartmentId = mysql_query("SELECT max(departmentId) as maxDepartmentId FROM department");
$get_maxDepartmentId = mysql_fetch_array($maxDepartmentId);
$show_maxDepartmentId = $get_maxDepartmentId['maxDepartmentId'];
echo "<script>

                function increaseDepartmentId(){
                    document.getElementById('departmentId').value=$show_maxDepartmentId+1;
                }
            </script>";
?>
<script src="../js/modernizr.custom.79639.js"></script>
</body>
</html>