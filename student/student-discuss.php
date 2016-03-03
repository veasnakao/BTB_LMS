<?php

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
    <link rel="stylesheet" href="../css/common.css" type="text/css">.


    <style type="text/css">
        .container {
            width:500px;
            margin:0 auto;
        }
        a{
            text-decoration:none;
        }
        h2 {
            font-size:20px;
            color:#03C;
        }
        .load {
            color:#06C;
        }
        input {
            float:right;
        }
        .space {
            margin-bottom:25px;
            margin-top:10px;
        }
        .showbox {
            border-bottom:1px #09C solid;
            width:490px;
            color:#033;
            font-weight:bold;
            word-wrap:break-word;
            padding:10px;
            font-size:14px;
            font-family:Tahoma, Geneva, sans-serif;
            margin-bottom:5px;
        }
    </style>


<!--    <script type="text/javascript">-->
<!--        $(function () {-->
<!--            $(".submit_button").click(function () {-->
<!--                var textcontent = $("#content").val();-->
<!--                var dataString = 'content=' + textcontent;-->
<!--                if (textcontent == '') {-->
<!--                    alert("Enter some text..");-->
<!--                    $("#content").focus();-->
<!--                }-->
<!--                else {-->
<!--                    $("#flash").show();-->
<!--                    $("#flash").fadeIn(400).html('<span class="load">Loading..</span>');-->
<!--                    $.ajax({-->
<!--                        type: "POST",-->
<!--                        url: "../action.php",-->
<!--                        data: dataString,-->
<!--                        cache: true,-->
<!--                        success: function (html) {-->
<!--//                            $("#show").after(html);-->
<!--                            $('#show').html(html);-->
<!--                            document.getElementById('content').value = '';-->
<!--                            $("#flash").hide();-->
<!--                            $("#content").focus();-->
<!--                        }-->
<!--                    });-->
<!--                }-->
<!--                return false;-->
<!--            });-->
<!--        });-->
<!---->
<!---->
<!--    </script>-->

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




                    <!--test comment in ajax-->
                    <form method="post" action="myTest.php">
                        <textarea style="width:500px; font-size:14px; height:60px; font-weight:bold; resize:none;"
                                  name="content" id="content"></textarea><br/>
                        <input type="from" name="from">
                        <input type="submit" value="Post" name="btnSend"/>
                    </form>

                    <div class="space"></div>
                    <div id="flash" align="left"  ></div>
                    <div id="show" align="left"></div>

<!--                    --><?php
//                    $check = mysql_query("SELECT * FROM comment order by id desc");
//                    if(isset($_POST['content']))
//                    {
//                        $content=mysql_real_escape_string($_POST['content']);
//                        $ip=mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
//                        mysql_query("insert into comment(msg,ip_add) values ('$content','$ip')");
//                        $fetch= mysql_query("SELECT msg,id FROM comment order by id desc");
//                        $row=mysql_fetch_array($fetch);
//                    }
//                    ?>
<!---->
<!--                    ?>-->
<!--                    <div class="showbox"> --><?php //echo $row['msg']; ?><!-- </div>-->

                </div>
            </div>
        </div>
    </div>
</div>
<!---- close main content --->

<script src="../js/modernizr.custom.79639.js"></script>
<script>
//    $(document).ready(function() {
//        $("#show").load("student-discuss.php");
//        var refreshId = setInterval(function() {
//            $("#show").load('student-discuss.php');
//        }, 9000);
//        $.ajaxSetup({ cache: false });
//    });

</script>



</body>
</html>