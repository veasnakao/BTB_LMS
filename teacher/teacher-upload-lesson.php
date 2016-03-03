<?php
include("../include/connection.php");
include("../include/function.php");
include("../include/isset_teacherCode.php");
?>
<?php
if(isset($_SESSION['teacherId'])){
    $teacherId = $_SESSION['teacherId'];
}
if (isset($_POST['btnUploadLesson'])) {
//    $lessonTitle = $_POST['lessonTitle'];
//    $description = $_POST['description'];
//
//    if (isset($_FILES["lessonFile"])) {
//        $target_dir = "../asset/lessons/";
//        $target_file = $target_dir . basename($_FILES["lessonFile"]["name"]);
//        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
//
//        if (move_uploaded_file($_FILES["lessonFile"]["tmp_name"], $target_file)) {
//            $lessonFile = basename($_FILES["lessonFile"]["name"]);
//            $sql_upload_lesson = "INSERT INTO teacher_lesson (lessonTitle,description,teahcerId,lessonFile) values ('$lessonTitle','$description','$teacherId','$lessonFile')";
//            $q_upload_lesson = mysql_query($sql_upload_lesson, $connection);
//            if (!$q_upload_lesson) {
//                echo die(mysql_error());
//            }else{
//                header("Location: teacher-upload-lesson.php?uploaded");
////                header("Location: teacher_upload_photo.php");
//            }
//        }
//
//    }


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
    <link rel="stylesheet" href="../css/file.css" type="text/css">
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
            <h4>Teacher Upload Lesson</h4>
            <hr>

            <form class="form-horizontal" role="form" method="post" action="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">

                            <div class="col-md-6">
                                <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                Browse&hellip; <input type="file" multiple name="lessonFile">
                                            </span>
                                        </span>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                    <span class="help-block">
                                        Try selecting one or more files and watch the feedback
                                    </span>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder="Lesson Title" required name="lessonTitle">
                                    </div>
                                </div>
                                <br>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea class="form-control" placeholder="Description" required name="description"></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" name="btnUploadLesson"><span class="glyphicon glyphicon-upload"></span> Upload Lesson</button>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-send"></span>   Send Lesson to student</button>
                                        <div class="form-group">
                                            <div id="myModal" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Please select lesson to upload</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-offset-1 col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="email">Lesson Title : </label>
                                                                        <select class="form-control" id="sel1">
                                                                            <option>1</option>
                                                                            <option>2</option>
                                                                            <option>3</option>
                                                                            <option>4</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="pwd">Class Name : </label>
                                                                        <select class="form-control" id="sel1">
                                                                            <option>1</option>
                                                                            <option>2</option>
                                                                            <option>3</option>
                                                                            <option>4</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-default">Submit</button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div><!--- close cold-md-12 --->
                </div>
                <!--- close row --->

                <hr>
            </form>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Lesson Title</th>
                    <th>Describe</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                    <td>
                        <a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!--- close teacher deshboard content --->


    </div>
</div>
<!---- close main content --->


<script src="../js/upload_file.js" type="text/javascript"></script>
</body>
</html>
