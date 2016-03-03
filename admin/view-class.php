<?php
include("../include/connection.php");
include("../include/function.php");
?>

<?php
if (isset($_POST['btnAddClass'])) {
    $classId = $_POST['txtClassId'];
    $className = $_POST['txtClassName'];
    $formData = array($classId, $className);
    $tableName = 'class';
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
                <a href="admin-dashboard.php" class="list-group-item active"><span class="glyphicon glyphicon-menu-right"></span> Dashboard</a>
                <a href="add-department.php" class="list-group-item"><span class="glyphicon glyphicon-menu-right"></span> Add Department</a>

                <a href="add-class.php" class="list-group-item"><span
                        class="glyphicon glyphicon-envelope"></span> Add Class</a>
                <a href="add-subject.php" class="list-group-item"><span class="glyphicon glyphicon-upload"></span> Add Subject</a>
                <a href="add-teacher.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt"></span> Add Teacher</a>
            </div>
            <!--- close teacher action --->
        </div>
        <!--- close teacher deshboard action --->


        <!--- teacher deshboard content --->
        <div class="col-md-offset-1 col-md-8 teacher-content">
            <h4><span class="glyphicon glyphicon glyphicon-plus"></span> Add Classroom</h4>
            <a href="admin-dashboard.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left" style="width: 70px;"></span></a>
            <hr>

                <?php
                $sql_selectClass = "select * from class";
                $q_sql_selectClass = mysql_query($sql_selectClass, $connection);
                while ($rClass = mysql_fetch_array($q_sql_selectClass)) {
                    echo "<div class=\"col-md-2\">";
                    echo "<img src=\"../asset/images/classroom.png\" class=\"img-responsive img-thumbnail\">";
                    echo "<div class=\"text-center\">".$rClass['classId']. " | " . $rClass['className'] . "</div>";
                    echo "</div>";
                }
                ?>



        </div>

    </div>
</div>
<!---- close main content --->

<?php
$maxClassId = mysql_query( "SELECT max(classId) as maxClassId FROM class" );
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