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
                <a href="add-department.php" class="list-group-item active"><span
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
        <div class="col-md-offset-1 col-md-8">
            <div class="row">
                <div class="col-md-12 teacher-content">
                    <h4><span class="glyphicon glyphicon glyphicon-plus"></span> Add Department</h4>
                    <hr>
                    <form class="form-inline" action="add_edit_delete_department.php" method="post">
                        <div class="form-group">
                            <!--                    <label for="exampleInputName2">Subject ID</label>-->
                            <input type="hidden" class="form-control" name="txtDepartmentId" id="departmentId" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName2">Department Code</label>
                            <input type="text" class="form-control" name="txtDepartmentCode" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName2">Department Name</label>
                            <input type="text" class="form-control" name="txtDepartmentName" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="btnAddDepartment"
                                onclick="increaseDepartmentId()">
                            <span class="glyphicon glyphicon glyphicon-plus"></span> Add Department
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-md-12">
                <?php
                if (isset($_GET['addDepartment'])) {
                    echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\" id=\"success-alert\">";
                    echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
                    echo "<strong>Success</strong> Department has been added.";
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
                $sql_selectDepartment = "select * from department ORDER by departmentId DESC";
                $q_sql_selectDepartment = mysql_query($sql_selectDepartment, $connection);
                while ($rDepartment = mysql_fetch_array($q_sql_selectDepartment)) {
                    echo "<div class=\"col-md-2\">";
                    echo "<img src=\"../asset/images/department.jpg\" class=\"img-responsive img-thumbnail\">";
                    echo "<div class=\"text-center\">" . $rDepartment['departmentCode'] . " | " . $rDepartment['departmentName'] . "</div>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
        <!--- close teacher deshboard content --->

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
</body>
</html>