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
                        class="glyphicon glyphicon-menu-right active"></span> Dashboard</a>
                <a href="add-department.php" class="list-group-item"><span
                        class="glyphicon glyphicon-menu-right"></span> Add Department</a>
                <a href="add-class.php" class="list-group-item"><span
                        class="glyphicon glyphicon-envelope"></span> Add Class</a>
                <a href="add-subject.php" class="list-group-item"><span class="glyphicon glyphicon-upload"></span> Add
                    Subject</a>
                <a href="add-teacher.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt"></span> Add
                    Teacher</a>
            </div>
            <!--- close teacher action --->
        </div>
        <!--- close teacher deshboard action --->


        <!--- teacher deshboard content --->
        <div class="col-md-offset-1 col-md-8 teacher-content">
            <h4>All Department</h4>
            <a href="admin-dashboard.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left" style="width: 70px;"></span></a>
            <hr>
            <?php
            $sql_selectDepartment = "select * from department ORDER by departmentId ASC";
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