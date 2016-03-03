<?php

include("../include/connection.php");
include("../include/function.php");
include("../include/isset_teacherCode.php");
?>
<?php
if (isset($_SESSION['teacherId'])) {
    $teacherId = $_SESSION['teacherId'];
}
if (isset($_POST['btnSendMessage'])) {
    $classId = $_POST['classId']; //reciver
    $sender = $_POST['teacherId'];//sender
    $messageContent = $_POST['messageContent'];
    $dateSender = date('Y/m/d H:i:s');

    $sql_insert = "insert into message (messageContent,senderId,reciverId,dateSender) values ('$messageContent','$sender','$classId','$dateSender')";
    $q_insert = mysql_query($sql_insert, $connection);
    if (!$q_insert) {
        echo mysql_error();
    } else {
        header("Location: teacher-send-message.php?sendMessage");
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
    <link rel="stylesheet" href="../css/alertify.default.css" type="text/css">
    <link rel="stylesheet" href="../css/alertify.css" type="text/css">
    <link rel="stylesheet" href="../css/alertify.core.css" type="text/css">
    <link rel="stylesheet" href="../css/alertify.bootstrap.css" type="text/css">
</head>

<body>
<!---- header teacher deshboard --->
<?php
include("../include/teacher_header.php");
?>
<!---- close header teacher deshboard --->

<!--- textarea package --->
<script src="../asset/ckeditor/ckeditor.js"></script>

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


        <!--- teacher deshboard content --->
        <div class="col-md-offset-3 col-md-8 teacher-content">
            <h4>Teacher Message</h4>
            <hr>

            <!--- breakcrumb --->
            <ol class="breadcrumb">
                <li class="active"><a href="teacher-message.php">Inbox</a></li>
                <li class="active"><a href="teacher-send-message.php">Send Message</a></li>
            </ol>
            <hr>

            <form class="form-horizontal" role="form" action="" method="post">
                <div class="form-group">
                    <div class="col-md-5">
                        <input type="hidden" value="<?php echo $teacherId; ?>" required name="teacherId">
                        <label class="control-label col-md-1" for="email">To </label>

                        <div class="col-sm-10">
                            <select class="form-control" name="classId" required>
                                <option>(Select one)</option>
                                <?php
                                $sql_selectTeacherClass = "select * from v_teacher_class";
                                $q_selectTeacherClass = mysql_query($sql_selectTeacherClass, $connection);
                                while ($rTeacherClass = mysql_fetch_array($q_selectTeacherClass)) {
                                    echo "<option value=\"" . $rTeacherClass['classId'] . "\">" . $rTeacherClass['className'] ."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary" name="btnSendMessage">Send Message</button>
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <textarea class="form-control ckeditor" id="artDetail" name="messageContent" required></textarea>
                    </div>
                    <!-- config ckeditor -->
                    <script>
                        CKEDITOR.replace('artDetail');
                    </script>
                </div>
            </form>

            <div class="col-md-10">
                <?php
                if (isset($_GET['sendMessage'])) {
                    echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\" id=\"success-alert\">";
                    echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
                    echo "<strong>Success</strong> Message has been send.";
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

        </div>
        <!--- close teacher deshboard content --->

    </div>
</div>
<!---- close main content --->
<script src="../js/alertify.min.js"></script>

</body>
</html>
