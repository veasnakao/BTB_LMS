<?php
session_start();
include("../include/connection.php");
include("../include/function.php");
include("../include/isset_teacherCode.php");


?>

<?php
//get teacherCode
if (isset($_GET['studentCode'])) {
    $getStudentCode = $_GET['studentCode'];
    $sql_selectStudent = "Select * From student where studentCode=$getStudentCode";
    $q_selectStudent = mysql_query($sql_selectStudent, $connection);
    while ($rStudent = mysql_fetch_array($q_selectStudent)) {
        $getStudentId = $rStudent[0];
        $getStudentCode = $rStudent[1];
        $getPhoto = $rStudent[7];
    }
    $_SESSION['studentId'] = $getStudentId;
}


//btnPreview
if (isset($_POST['btnFinish'])) {
    $studentCode = $_POST['studentCode'];
    if (isset($_FILES["photo"])) {
        $target_dir = "../asset/images/student/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $photo = basename($_FILES["photo"]["name"]);
            $sql_upload_img = "update student set photo = '$photo' where studentCode = '$studentCode'";
            $q_upload_img = mysql_query($sql_upload_img, $connection);
            if (!$q_upload_img) {
                echo die(mysql_error());
            }else{
                header("Location: student-dashboard.php");
//                header("Location: teacher_upload_photo.php");
            }
        }

    }
}


?>
<html>
<head>
    <title>Battambang E-Learning</title>

    <?php
    include("../include/bootstrap_import.php");
    ?>

    <style>
        body {
            background-image: url(../asset/images/bg-img.jpg);
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

        .user-photo {
            width: 205px;
            height: 204px;
            border-radius: 50%;
            margin-left: 370px;
        }

        .my-col-space {
            margin-right: 70px;
        }
    </style>
    <script type="text/javascript" src="../js/bootstrap-filestyle.min.js"></script>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-5 logo">
            <img src="../asset/images/logo1.png" class="img-responsive">
        </div>

        <div class="col-md-offset-1 col-md-6 my-nav">
            <ul class="nav nav-pills">
                <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </div>
    <!--- close header --->


    <div class="row">
        <div class="col-md-offset-1 col-md-10 form-login">
            <form role="form" method="post" action="" enctype="multipart/form-data">
                <h3 class="text-center text-primary">Please upload your photo</h3>
                <hr>

                <?php
                echo "<img src='../asset/images/student/$getPhoto' class='user-photo' id='img_url'>";
                ?>
                <hr>
                <div class="row">
                    <input type="hidden" class="filestyle" name="studentCode" value="<?php echo $getStudentCode; ?>">

                    <div class="col-md-offset-4 col-md-1 my-col-space">
                        <input type="file" class="filestyle" data-input="false" name="photo" id="img_file" onChange="img_pathUrl(this);">
                    </div>
<!--                    <div class="col-md-1 my-col-space">-->
<!--                        <button type="submit" class="btn btn-primary text-right" name="btnPreview">Preview Photo-->
<!--                        </button>-->
<!--                    </div>-->
                    <div class="col-md-1 my-col-space">
                        <button type="submit" class="btn btn-success text-right" name="btnFinish">Finish</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--- close sign in and sign out --->


</div>
<!--- close container --->

<script>
    $(":file").filestyle({input: false});
</script>

<!--display image after insert-->
<script>
    function img_pathUrl(input){
        $('#img_url')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    }
</script>

</body>
</html>