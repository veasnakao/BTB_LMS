<?php
session_start();
include("../include/connection.php");
include("../include/function.php");

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

<br><br><br>

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
        <!-- teacher dashboard-->
        <div class="col-md-offset-3 col-md-8 teacher-content">
            <h4> Admin Dashboard</h4>
            <hr>
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <ul class="ch-grid">

                        <li>
                            <div class="ch-item">
                                <div class="ch-info">
                                    <div class="ch-info-front ch-classroom"></div>
                                    <div class="ch-info-back">
                                        <h3><a href="view-teacher-class.php?teacherCode=<?php echo $getTeacherCode; ?>">Classroom</a>
                                        </h3>
                                        <hr>
                                        <?php
                                        $sql_countClass = mysql_query("SELECT count(classId) as countClass FROM v_teacher_class where teacherId = '$teacherId'");
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
                                        <h3>
                                            <a href="view-teacher-subject.php?teacherCode=<?php echo $getTeacherCode; ?>">Subject</a>
                                        </h3>
                                        <hr>
                                        <?php
                                        $sql_countSubject = mysql_query("SELECT count(subjectId) as countSubject FROM v_teacher_class where teacherId = '$teacherId'");
                                        $get_countSubject = mysql_fetch_array($sql_countSubject);
                                        $show_countSubject = $get_countSubject['countSubject'];
                                        echo "<h4 style='color: white;'>Total : " . $show_countSubject . "</h4>";
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!---- close main content --->

<script src="../js/modernizr.custom.79639.js"></script>

</body>
</html>