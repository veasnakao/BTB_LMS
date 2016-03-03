<?php
include("../include/connection.php");
include("../include/function.php");
if(isset($_POST['btnSend'])){
    $msg = $_POST['content'];
    $from = $_POST['from'];

//    $fromField = array('msg','from');
//    $myfield = implode(", ",$fromField);
//    $after = "`".$myfield."`";
//    echo $myfield.'<br>';
//    echo $after;
//    $data = array($msg,$from);
    $data = array(
        'msg'  =>  $msg,
        'from'     =>  $from
    );
    $tableName = 'comment';
    insertRecord($tableName,$data);

}
?>