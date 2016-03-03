<?php
include("../include/connection.php");
include("../include/function.php");
include("../include/isset_teacherCode.php");

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
            </ol>
            <hr>

            <ul class="nav nav-pills">
                <li class="active"><a href="teacher-message.php"><span class="glyphicon glyphicon-envelope"></span>
                        Inbox</a></li>
                <li><a href="teacher-send-message.php"><span class="glyphicon glyphicon-envelope"></span> Send
                        Message</a></li>
            </ul>
            <hr>

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">From : Teacher</div>
                    <div class="panel-body">Panel Content</div>

                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-3">
                                <span class="glyphicon glyphicon-calendar">19/01/2016</span>
                            </div>

                            <div class="col-md-offset-8 col-md-1">
                                <form role="form">
                                    <button type="submit" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--- close teacher deshboard content --->


    </div>
</div>
<!---- close main content --->


</body>
</html>
