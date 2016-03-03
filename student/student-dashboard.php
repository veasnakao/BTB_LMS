<?php
session_start();
include("../include/connection.php");
include("../include/function.php");

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

    <link rel="stylesheet" href="../css/style7.css" type="text/css">
    <link rel="stylesheet" href="../css/common.css" type="text/css">
</head>

<body>
<!---- header teacher deshboard --->
<?php
include("../include/student_header.php");
?>
<!---- close header teacher deshboard --->

<br><br><br>

<!---- main content ---->
<div class="container-fluid">
    <div class="row">
        <!--- teacher deshboard action --->
        <div class="col-md-2 my-position-fix">
            <?php
            include("../include/student_action.php");
            ?>
            <!--- close teacher action --->
        </div>
        <!-- teacher dashboard-->
        <div class="col-md-offset-3 col-md-8 teacher-content">
            <h4> Student Dashboard</h4>
            <hr>
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!---- close main content --->

<script src="../js/modernizr.custom.79639.js"></script>

</body>
</html>