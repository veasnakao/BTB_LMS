<?php
//include("../include/connection.php");
//include("../include/bootstrap_import.php");
//?>

<!---->
<?php
session_start();
if (isset($_SESSION['teacherId'])) {
    $teacherId = $_SESSION['teacherId'];
    $sql_selectTeacher = "Select * From teacher where teacherId=$teacherId";
    $q_selectTeacher = mysql_query($sql_selectTeacher, $connection);
    while ($rTeacher = mysql_fetch_array($q_selectTeacher)) {
        $teacherId = $rTeacher[0];
        $getUsername = $rTeacher[4];
        $getPhoto = $rTeacher[7];
    }
}

//?>
<nav class="navbar navbar-inverse navbar-fixed-top my-nav-fix-top">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="color:#FFF;">Teacher Dashboard</a>
        </div>


        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>

                    <a href="#" style="color:#FFF; font-size:16px;" data-toggle="dropdown" class="dropdown-toggle">
                        <span class="glyphicon glyphicon-user"></span> <?php echo $getUsername; ?>
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="../logout.php?logout">Logout</a></li>
                        </ul>
                    </a>

                </li>
            </ul>
        </div>


    </div>
</nav>

