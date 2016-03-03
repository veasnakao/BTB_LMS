<?php
session_start();
?>
<?php
if(isset($_POST['btnLogin'])){
    $userName = $_POST['txtUsername'];
    $password = $_POST['txtPassword'];

    $sql_selectUser = "select * from tbluser where userName='$userName' and password='$password'";
    $q_selectUser = mysql_query($sql_selectUser,$connection);
    $r_selectUser = mysql_fetch_array($q_selectUser);

    //$get_userName = $r_selectUser['userName'];
    //$get_password = $r_selectUser['password'];

    $_SESSION['userName'] = $r_selectUser['userName'];
    $_SESSION['password'] = $r_selectUser['password'];

    if(isset($_SESSION['userName']) && isset($_SESSION['password'])){
        header("location:adminpage.php");
    }
    else{
        header("location:login.php");
    }
}
?>