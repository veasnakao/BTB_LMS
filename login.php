<?php
session_start();
include("include/connection.php");
?>

<!--btnLogin-->
<?php
if (isset($_POST['btnLogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

//    $sql_selectStudent = "select * from student where username='$username' and password='$password'";
//    $q_selectStudent = mysql_query($sql_selectStudent, $connection);
//    $r_selectStudent = mysql_fetch_array($q_selectStudent);
//    $studentCode = $r_selectStudent['studentCode'];
//
//    if (mysql_num_rows($q_selectStudent) <= 0) {
//        header("location:login.php?false");
//    } else {
//        header("location: student/student-dashboard.php?studentCode='$studentCode'");
//        $_SESSION['username'] = $r_selectStudent['username'];
//        $_SESSION['password'] = $r_selectStudent['password'];
//    }


    /* student */
    $sql_selectStudent = "SELECT * FROM student WHERE username='$username' AND password='$password'";
    $q_selectStudent = mysql_query($sql_selectStudent)or die(mysql_error());
    $r_selectStudent = mysql_fetch_array($q_selectStudent);
    $num_row_student = mysql_num_rows($q_selectStudent);
    $studentId = $r_selectStudent['studentId'];
    $studentCode = $r_selectStudent['studentCode'];



    /* teacher */
    $query_teacher = mysql_query("SELECT * FROM teacher WHERE username='$username' AND password='$password'")or die(mysql_error());
    $num_row_teacher = mysql_num_rows($query_teacher);
    $r_teacher = mysql_fetch_array($query_teacher);
    $teacherId = $r_teacher['teacherId'];
    $teacherCode = $r_teacher['teacherCode'];

    if( $num_row_student > 0 ) {
        $_SESSION['username']=$r_selectStudent['username'];
        $_SESSION['password']=$r_selectStudent['password'];
        $_SESSION['studentId'] = $studentId;
        header("location: student/student-dashboard.php");
    }
    else if ($num_row_teacher > 0){
        $_SESSION['username']=$r_teacher['username'];
        $_SESSION['password']=$r_teacher['password'];
        $_SESSION['teacherId'] = $teacherId;
        header("location: teacher/teacher-dashboard.php");
    }
    else{
        header("location: login.php?false");
    }

}
?>
<html>
<head>
    <title>Battambang E-Learning</title>

    <?php
    include("include/bootstrap_import.php");
    ?>

    <style>
        body {
            background-image: url(asset/images/bg-img.jpg);
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-color: #464646;
        }

        .logo {
            margin-top: 50px;
        }

        .my-nav {
            margin-top: 100px;
            font-size: 16px;
        }

        .form-login {
            background: rgba(255, 255, 255, 0.5);
            background: -moz-linear-gradient(left, rgba(255, 255, 255, 0.5) 0%, rgba(255, 255, 255, 0.5) 100%);
            background: -webkit-gradient(left top, right top, color-stop(0%, rgba(255, 255, 255, 0.5)), color-stop(100%, rgba(255, 255, 255, 0.5)));
            background: -webkit-linear-gradient(left, rgba(255, 255, 255, 0.5) 0%, rgba(255, 255, 255, 0.5) 100%);
            background: -o-linear-gradient(left, rgba(255, 255, 255, 0.5) 0%, rgba(255, 255, 255, 0.5) 100%);
            background: -ms-linear-gradient(left, rgba(255, 255, 255, 0.5) 0%, rgba(255, 255, 255, 0.5) 100%);
            background: linear-gradient(to right, rgba(255, 255, 255, 0.5) 0%, rgba(255, 255, 255, 0.5) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ffffff', GradientType=1);

            margin-top: 30px;
            border-radius: 7px;
            padding-bottom: 30px;
        }

    </style>
    <link rel="stylesheet" href="css/alertify.default.css" type="text/css">
    <link rel="stylesheet" href="css/alertify.css" type="text/css">
    <link rel="stylesheet" href="css/alertify.core.css" type="text/css">
    <link rel="stylesheet" href="css/alertify.bootstrap.css" type="text/css">
</head>
<body>


<div class="container">

    <div class="row">

        <div class="col-md-5 logo">
            <img src="asset/images/logo1.png" class="img-responsive">
        </div>

        <div class="col-md-offset-1 col-md-6 my-nav">
            <ul class="nav nav-pills">
                <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a href="#">About Us</a></li>
                <li class="active"><a href="login.php">Login</a></li>
            </ul>
        </div>
    </div>
    <!--- close header --->


    <div class="row">
        <div class="col-md-offset-7 col-md-4 form-login">

            <form role="form" method="post" action="">
                <h3 class="text-center text-primary"><span class="glyphicon glyphicon-lock"></span> Sign In</h3>
                <hr>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>

                <!-- alert false -->
                <div class="form-group">
                    <div class="col-md-12">
                        <?php
                        if (isset($_GET['false'])) {
                            echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\" id=\"danger-alert\">";
                            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
                            echo "<strong>Wrong username or password !</strong>";
                            echo "
                    <script>
                        $(document).ready(function(){
                            $(\"#danger-alert\").fadeTo(5000, 500).slideUp(500, function(){
                                $(\"#danger-alert\").alert('close');
                            });
                        });
                    </script>
                ";
                        }
                        ?>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Sign In" name="btnLogin">
            </form>
        </div>
        <br>
    </div>
    <!--- close sign in and sign out --->
    <div class="row">
        <div class="col-md-offset-7 col-md-4 form-login">

            <form role="form">
                <h3 class="text-center text-primary"><span class="glyphicon glyphicon-user"></span> Sign Up</h3>
                <hr>
                <div class="col-md-6" align="left">
                    <a href="signup_student.php" class="btn btn-primary">I'm a student</a>
                </div>
                <div class="col-md-6" align="right">
                    <a href="signup_teacher.php" class="btn btn-primary">I'm a teacher</a>
                </div>
            </form>

        </div>
    </div>


</div>
<!--- close container --->
<script src="js/alertify.min.js"></script>
</body>
</html>