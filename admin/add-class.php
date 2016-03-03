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
                <a href="admin-dashboard.php" class="list-group-item"><span
                        class="glyphicon glyphicon-menu-right"></span> Dashboard</a>
                <a href="add-department.php" class="list-group-item"><span
                        class="glyphicon glyphicon-menu-right"></span> Add Department</a>

                <a href="add-class.php" class="list-group-item active"><span
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

        <div class="col-md-offset-1 col-md-8">
            <div class="row">
                <div class="col-md-12 teacher-content">
                    <h4><span class="glyphicon glyphicon glyphicon-plus"></span> Add Classroom</h4>
                    <hr>

                    <form class="form-inline" action="add_edit_delete_class.php" method="post">
                        <input type="hidden" class="form-control" name="txtClassId" id="classId" required>

                        <div class="form-group">
                            <label for="exampleInputName2">Class Code</label>
                            <input type="text" class="form-control" name="txtClassCode" required id="classCode">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName2">Class Name</label>
                            <input type="text" class="form-control" name="txtClassName" required>
                        </div>

                        <button type="submit" class="btn btn-primary" name="btnAddClass" onclick="increaseClassId()">
                            <span class="glyphicon glyphicon glyphicon-plus"></span> Add Class
                        </button>

                    </form>
                </div>
                <!--- close teacher deshboard content --->
            </div>

            <!--alert message   -->
            <div class="col-md-10">
                <?php
                if (isset($_GET['addClass'])) {
                    echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\" id=\"success-alert\">";
                    echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
                    echo "<strong>Success</strong> Teacher has been added.";
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

            <div class="col-md-12 teacher-content">
                <?php
                $sql_selectClass = "select * from class ORDER BY classId DESC";
                $q_sql_selectClass = mysql_query($sql_selectClass, $connection);
                while ($rClass = mysql_fetch_array($q_sql_selectClass)) {
                    echo "<div class=\"col-md-2\">";
                    echo "<img src=\"../asset/images/classroom.png\" class=\"img-responsive img-thumbnail\">";
                    echo "<div class=\"text-center\">" . $rClass['classCode'] . " | " . $rClass['className'] . "</div>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>

    </div>
</div>
<!---- close main content --->

<?php
$maxClassId = mysql_query("SELECT max(classId) as maxClassId FROM class");
$get_maxClassId = mysql_fetch_array($maxClassId);
$show_maxClassId = $get_maxClassId['maxClassId'];
echo "<script>

                function increaseClassId(){
                    document.getElementById('classId').value=$show_maxClassId+1;
                }
            </script>";
?>
</body>
</html>