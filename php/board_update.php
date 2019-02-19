<?php
	header("Content-type:text/html; charset=utf-8");
/*
    $con = mysqli_connect('localhost' , 'root' , '1234' , 'board' , 3306);
	if(  mysqli_connect_errno() ){  echo "DB연동 ERROR ";   exit();  }
	mysqli_set_charset( $con ,   "utf8" );
*/
	include_once  './db_connect.php';

	$no = $_GET['no'];          $name = $_POST['name'];  $pass = $_POST['pass'];
	$email = $_POST['email'];  $title = $_POST['title'];      $content = $_POST['content'];  
	$result = mysqli_query( $con , "SELECT pass  FROM multiboard WHERE no='$no'");
	$row = mysqli_fetch_array($result , MYSQLI_ASSOC);
	
	if(  $pass == $row['pass'] ){
		mysqli_query($con , "UPDATE multiboard
								  SET       name='$name'       , title='$title'  , 
											  content ='$content' , email='$email' 
								  WHERE  no = '$no'  ");
		echo "<script> alert('수정을 완료했습니다. '); </script>";							
	}else{ 	echo "<script> alert('비밀번호를 확인해주세요');  history.go(-1); </script>"; }

	echo "<meta http-equiv='Refresh'  content='1; url=./board_detail.php?no=$no'>";
	mysqli_free_result($result);
	include_once "./db_connect_close.php";
?>