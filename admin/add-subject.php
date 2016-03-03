<?php
include("../include/connection.php");
include("../include/function.php");
?>

<?php
if (isset($_POST['btnAddSubject'])) {
    $subjectId = $_POST['txtSubjectId'];
    $subjectCode = $_POST['txtSubjectCode'];
    $subjectName = $_POST['txtSubjectName'];
    $formData = array($subjectId, $subjectCode,$subjectName);
    $tableName = 'subject';
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
                <a href="admin-dashboard.php" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> Dashboard</a>
                <a href="add-department.php" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> Add Department</a>

                <a href="add-class.php" class="list-group-item"><span
                        class="glyphicon glyphicon-envelope"></span> Add Class</a>
                <a href="add-subject.php" class="list-group-item active"><span class="glyphicon glyphicon-upload"></span> Add Subject</a>
                <a href="add-teacher.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt"></span> Add Teacher</a>
                <a href="add-teacher-class.php" class="list-group-item"><span
                        class="glyphicon glyphicon-list-alt"></span> Add Teacher Class</a>
            </div>
            <!--- close teacher action --->
        </div>
        <!--- close teacher deshboard action --->


        <!--- teacher deshboard content --->
        <div class="col-md-offset-1 col-md-8 teacher-content">
            <h4><span class="glyphicon glyphicon glyphicon-plus"></span> Add Subject</h4>
            <hr>

            <form class="form-inline" action="" method="post">

                <div class="form-group">
<!--                    <label for="exampleInputName2">Subject ID</label>-->
                    <input type="hidden" class="form-control" name="txtSubjectId" id="subjectId" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputName2">Subject Code</label>
                    <input type="text" class="form-control" name="txtSubjectCode" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputName2">Subject Name</label>
                    <input type="text" class="form-control" name="txtSubjectName" required>
                </div>

                <button type="submit" class="btn btn-primary" name="btnAddSubject" onclick="increaseSubjectId()">
                    <span class="glyphicon glyphicon glyphicon-plus"></span> Add Subject
                </button>

            </form>


        </div>
        <!--- close teacher deshboard content --->

        <div class="col-md-offset-1 col-md-8 teacher-content">
                <?php
                $sql_selectSubject = "select * from subject ORDER by subjectId ASC";
                $q_sql_selectSubject = mysql_query($sql_selectSubject, $connection);
                while ($rSubject = mysql_fetch_array($q_sql_selectSubject)) {
                    echo "<div class=\"col-md-2\">";
                    echo "<img src=\"../asset/images/subjects.png\" class=\"img-responsive img-thumbnail\">";
                    echo "<div class=\"text-center\">" . $rSubject['subjectCode'] . " | ". $rSubject['subjectName'] ."</div>";
                    echo "</div>";
                }
                ?>

            

        </div>

    </div>
</div>
<!---- close main content --->

<?php
$maxSubjectId = mysql_query( "SELECT max(subjectId) as maxSubjectId FROM subject" );
$get_maxSubjectId = mysql_fetch_array($maxSubjectId);
$show_maxSubjectId = $get_maxSubjectId['maxSubjectId'];
echo "<script>

                function increaseSubjectId(){
                    document.getElementById('subjectId').value=$show_maxSubjectId+1;
                }
            </script>";
?>
</body>
</html>