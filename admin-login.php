<?php
session_start();
include("include/connection.php");
?>
<?php
if (isset($_POST['btnLogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_selectUser = "select * from user where username='$username' and password='$password'";
    $q_selectUser = mysql_query($sql_selectUser, $connection);
    $r_selectUser = mysql_fetch_array($q_selectUser);


    if (mysql_num_rows($q_selectUser) <= 0) {
        header("location: admin-login.php?false");
    } else {
        header("location: admin/admin-dashboard.php");
        $_SESSION['username'] = $r_selectUser['username'];
        $_SESSION['password'] = $r_selectUser['password'];
    }
}
?>
<html>
<head>
    <title>Login</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/login_script.js"></script>
    <link rel="stylesheet" href="css/login_style.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/alertify.default.css" type="text/css">
    <link rel="stylesheet" href="css/alertify.css" type="text/css">
    <link rel="stylesheet" href="css/alertify.core.css" type="text/css">
    <link rel="stylesheet" href="css/alertify.bootstrap.css" type="text/css">
</head>


<div class="container">
    <div class="card card-container">

        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"/>

        <p id="profile-name" class="profile-name-card"></p>

        <form class="form-sdignin" method="post" action="">
            <span id="reauth-email" class="reauth-email"></span>
            <input type="text" id="inputEmail" class="form-control" placeholder="Username" required autofocus
                   name="username"><br>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required
                   name="password"><br>

            <!-- alert false-->
            <div class="col-md-12">
                <?php
                if (isset($_GET['false'])) {
                    echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\" id=\"danger-alert\">";
//                    echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
                    echo "Wrong username or password !";
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
            <input type="submit" name="btnLogin" class="btn btn-lg btn-info btn-block btn-signin" value="Login">
        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->

<script src="js/alertify.min.js"></script>
</html>