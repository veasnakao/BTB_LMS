<?php
include("../include/connection.php");
include("../include/function.php");
include("../include/isset_teacherCode.php");
?>
<?php
if (isset($_SESSION['studentId'])) {
    $studentId = $_SESSION['studentId'];
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Dashboard</title>

    <?php
    include("../include/bootstrap_import.php");
    ?>
    <link rel="stylesheet" href="../css/my_style.css" type="text/css">
    <style>
        pre {
            background-color: white;
            border: none;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 16px;
        }
    </style>
</head>

<body>
<!---- header teacher deshboard --->
<?php
include("../include/student_header.php");
?>
<!---- close header teacher deshboard --->

<!--- textarea package --->
<script src="../asset/ckeditor/ckeditor.js"></script>

<br><br><br><br>

<!---- main content ---->
<div class="container-fluid">
    <?php echo $studentId; ?>
    <?php
    $sql_selectStudent = "Select * From teacher_student_class";
    $q_selectStudent = mysql_query($sql_selectStudent, $connection);
    while ($rStudent = mysql_fetch_array($q_selectStudent)) {
        $classId = $rStudent['classId'];
    }
    echo $classId;
    ?>

    <div class="row">

        <!--- teacher deshboard action --->
        <div class="col-md-2 my-position-fix">

            <?php
            include("../include/student_action.php");
            ?>
            <!--- close teacher action --->

        </div>
        <!--- close teacher deshboard action --->


        <!--- teacher deshboard content --->
        <div class="col-md-offset-3 col-md-8 teacher-content">
            <h4>Student Message</h4>
            <hr>

            <!--- breakcrumb --->
            <ol class="breadcrumb">
                <li class="active"><a href="student-message.php">Inbox</a></li>
            </ol>
            <hr>

            <ul class="nav nav-pills">
                <li class="active"><a href="student-message.php"><span class="glyphicon glyphicon-envelope"></span>
                        Inbox</a></li>
                <li><a href="student-send-message.php"><span class="glyphicon glyphicon-envelope"></span> Send
                        Message</a></li>
            </ul>
            <hr>

            <div class="col-md-12">
                <?php
                $sql_message = "select * from message where reciverId = '$classId' order by messageId DESC";
                $q_message = mysql_query($sql_message, $connection);
                while ($r_message = mysql_fetch_array($q_message)) {
                    echo "<div class=\"panel panel-default\">";
                    echo "<div class=\"panel-heading\">From : Teacher</div>";
                    echo "<div class=\"panel-body message\">";
                    echo $r_message[1];
                    echo "</div>";
                    echo "<div class=\"panel-footer\">
                        <div class=\"row\">
                            <div class=\"col-md-3\">
                                <span class=\"glyphicon glyphicon-calendar\">";
                    echo $r_message['dateSender'];
                    echo "</span>";
                    echo "</div>

                            <div class=\"col-md-offset-8 col-md-1\">
                                <form role=\"form\">
                                    <button type=\"submit\" class=\"btn btn-danger\">
                                        <span class=\"glyphicon glyphicon-trash\"></span>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>";
                    echo "</div>";

                }
                ?>
<!--                <div class="panel panel-default">-->
<!--                    <div class="panel-heading">From : Teacher</div>-->
<!--                    <div class="panel-body">Panel Content</div>-->
<!---->
<!--                    <div class="panel-footer">-->
<!--                        <div class="row">-->
<!--                            <div class="col-md-3">-->
<!--                                <span class="glyphicon glyphicon-calendar">19/01/2016</span>-->
<!--                            </div>-->
<!---->
<!--                            <div class="col-md-offset-8 col-md-1">-->
<!--                                <form role="form">-->
<!--                                    <button type="submit" class="btn btn-danger">-->
<!--                                        <span class="glyphicon glyphicon-trash"></span>-->
<!--                                    </button>-->
<!--                                </form>-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>

        </div>
        <!--- close teacher deshboard content --->


    </div>
</div>
<!---- close main content --->


</body>
</html>
