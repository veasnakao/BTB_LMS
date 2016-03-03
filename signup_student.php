<?php
include("include/connection.php");
include("include/function.php");
session_start();

?>
<?php

//btnSignUpTeacher
if (isset($_POST['btnSignUpStudent'])) {
    $studentCode = $_POST['studentCode'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    //session variable
//    $_SESSION['teacherCode'] = $teacherCode;
    $sql_signUp = "update student set username = '$username', password = '$password' where studentCode = '$studentCode'";
    $q_signUp = mysql_query($sql_signUp,$connection);
    if(!$q_signUp){
        echo die(mysql_error());
    }else{
        header("Location: student/student_upload_photo.php?studentCode='$studentCode'");
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

</head>
<body>

<div class="container">

    <div class="row">

        <div class="col-md-5 logo">
            <img src="asset/images/logo1.png" class="img-responsive">
        </div>

        <div class="col-md-offset-1 col-md-6 my-nav">
            <ul class="nav nav-pills">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a href="#">About Us</a></li>
                <li class="active"><a href="logout.php">Login</a></li>
            </ul>
        </div>
    </div>
    <!--- close header --->


    <div class="row">
        <div class="col-md-offset-7 col-md-4 form-login">

            <form role="form" action="" method="post">
                <h3 class="text-center text-primary"><span class="glyphicon glyphicon-lock"></span> Sign Up as Student</h3>
                <hr>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Teacher Code" name="studentCode">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Re-type password" name="repassword">
                </div>
                <input type="submit" class="btn btn-primary" value="Sign Up" name="btnSignUpStudent">

            </form>

        </div>

    </div>
    <!--- close sign in and sign out --->


</div>
<!--- close container --->

</body>
</html>