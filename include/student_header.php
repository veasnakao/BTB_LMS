<?php
//include("../include/connection.php");
//include("../include/bootstrap_import.php");
//?>

<!---->
<?php
session_start();
if (isset($_SESSION['studentId'])) {
    $studentId = $_SESSION['studentId'];
    $sql_selectStudent = "Select * From student where studentId=$studentId";
    $q_selectStudent = mysql_query($sql_selectStudent, $connection);
    while ($rStudent = mysql_fetch_array($q_selectStudent)) {
        $studentId = $rStudent[0];
        $getUsername = $rStudent[4];
        $getPhoto = $rStudent[7];
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
            <a class="navbar-brand" href="#" style="color:#FFF;">Student Dashboard</a>
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

