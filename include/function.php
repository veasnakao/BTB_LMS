<?php

//function active action
function activeAction($requestUri){
	$current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
	if ($current_file_name == $requestUri)
		echo "class='active'";
}

//function insert
function insertRecord($tableName,$data){
    global $connection;

//	$split_formField = implode(', ',$formField);
////	$after_split_formField = `$split_formField`;
//
//    $split_formData = implode("', '", $formData);
//    $after_split_formData = "'".$split_formData."'";
//
//    $sql_insert = "insert into {$tableName} ({$split_formField}) values($after_split_formData)";
//    $q_insert = mysql_query($sql_insert,$connection);
//    confirm_query($q_insert);
//	return $q_insert;

	$fields = array_keys( $data );
	$values = array_map( "mysql_real_escape_string", array_values( $data ) );
	mysql_query( "INSERT INTO {$tableName} (".implode(",",$fields).") VALUES ('".implode("','", $values )."');") or die( mysql_error() );
    
}




//function update
/*
function updateRecordById($tableName,$id,$idvalue,$field=array(),$formData=array()){
    
    global $connection;
    
    $updateText="Update {$tableName} set ";
    $split_arr = implode("', '", $field);
    echo "";
   
    
}
*/
function updateRe($tbl,$field=array(),$fval=array()){

	global $connection;

	$utext ="Update {$tbl} set ";
	for($i=1;$i<count($field);$i++)
	{
		if($i!=1)
		{
			$utext.=",";
		}
		$utext.= " {$field[$i]}='$fval[$i]'";

	}
	$utext.=" where {$field[0]}={$fval[0]}";
	echo $utext;
	$myquery = mysql_query($utext,$connection);
	confirm_query($myquery);

}


function updateR($tbl,$id,$idvalue,$field=array(),$fval=array()){
    
            global $connection;
            $splitF = implode("', '", $field);
            $splitV = implode("', '",$fval);
            $utext ="Update {$tbl} set ";
            for($i=0;$i<count($field);$i++)
            {
                if($i!=0)
                {
                    $utext.= ",";
                }
                $utext.= $splitF[$i]=$splitV[$i];
                echo $utext;
            }
            
            
            $utext.=" where $id=$idvalue";
           
            $query = mysql_query($utext,$connection);
            confirm_query($query);
	       return $q_insert;
}   
        


function checkLogin()
{
    if(!(isset($_SESSION['username']) && isset($_SESSION['password']))){
    	header("location: ../login.php");
   	}
}

function confirm_query($result_set) 
{
		if (!$result_set) {
			die("Database query failed: <br>" . mysql_error());
		}
}


//function get_all_menu
function get_all_menu(){
    global $connection;
    $sql_selectMenu = "select * from tblmenu";
    $q_selectMenu = mysql_query($sql_selectMenu,$connection);
    
    while($r_selectMenu = mysql_fetch_array($q_selectMenu)){
       if($r_selectMenu[0]==1){
           $menutext = "<li";
           if(!isset($_GET['menuid']))
           { 
               $menutext.= " class=\"active\"";
           }
           $menutext.= "><a href=\"index.php\">$r_selectMenu[1]</a></li>";
           echo $menutext; 					
       } 
       else{									
           $menutext = "<li";
           if(isset($_GET['menuid']))
           { 
				if($_GET['menuid']==$r_selectMenu[0])
				{
				    $menutext.= " class=\"active\"";
				}
           }				
           $menutext.= "><a href=\"index.php?menuid=$r_selectMenu[0]\">$r_selectMenu[1]</a></li>";
           echo $menutext; 
										
       }
    }//close loop menu from tblmenu

}
//close function get_all_menu





function get_all_article_return($GetAll=true,$FieldName=NULL,$value=NULL)
{
	global $connection;
	$sql;
	if($GetAll==true)
	{
		$sql = "Select * From tblarticle ORDER by artId DESC ";
	}else
	{		
		$sql = "Select * From tblarticle where {$FieldName}={$value}";
	}
	$query = mysql_query($sql,$connection);
	confirm_query($query);
	return $query;
}


function get_all_article_echo()
{
	$myquery;
	$readmore = true;
	if(isset($_GET['menuid']))
	{
		$mid = $_GET['menuid'];
		$myquery=get_all_article_return(false,"menuId",$mid);
	}
	elseif(isset($_GET['articleid']))
	{
		$aid = $_GET['articleid'];
		$myquery=get_all_article_return(false,"artId",$aid);
		$readmore = false;
	}else
	{
		$myquery=get_all_article_return();
	}
	
	while($rArt = mysql_fetch_array($myquery))
	{
	 echo "<h3><a href=\"index.php?articleid=$rArt[0]\">$rArt[artTitle]</a></h3>";
	 	if ($readmore==true)
		{
	 	$afterCut = substr($rArt['artDetail'],0,300)." ...<br>";
			$afterCut.="<a href=\"index.php?articleid=$rArt[0]\" class=\"btn btn-success btn-xs a-read-more\">Read More</a><br><br>";

		}else
		{
			$afterCut=$rArt['artDetail']."<br>";
		}
	 echo "<p class='text-justify p-indent'>".$afterCut;	
	 echo "</p>";
     echo "<hr class=\"style-one\">";
	  
	}
	
}



?>

