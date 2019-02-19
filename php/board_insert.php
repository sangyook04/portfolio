<?php
	header("Content-type:text/html;  charset=utf-8");
/*
    $con = mysqli_connect('localhost' , 'root' , '1234' , 'board' , 3306);
	if(  mysqli_connect_errno() ){  echo "DB연동 ERROR ";   exit();  }
	mysqli_set_charset( $con ,   "utf8" );
*/
	include_once  './db_connect.php';

	//2-4. 데이터 받아오기 POST  (title , name , email , pass , content)
	$name = $_POST['name']; $email = $_POST['email'];        $pass = $_POST['pass'];
	$title = $_POST['title'];      $content = $_POST['content'];  $ip    = $_SERVER['REMOTE_ADDR']; //IP주소
	// wdate - now()
	# echo  $name  . " / " .  $email  . " / " .  $pass  . " / " .  $title . " / " .  $content . " / " .  $ip;
	
	//2-5. 삽입기능 (mysqli_query) 
	$sql = "insert into multiboard ( name    , email   , pass     , title   , content    , wdate ,  ip       )  
			  values						( '$name' , '$email' , '$pass' , '$title' , '$content' , now() , '$ip'     )";
	$result = mysqli_query(  $con ,  $sql )  or  die(  mysqli_error(  $con  )  );
	
	//2-6. 삽입성공시 글쓰기에성공했습니다. 알림창. 
	//        실패기 관리자에게 문의바랍니다. 알림창
	if(  $result ){    echo "<script> alert('글등록에 성공했습니다.');</script>";  }
	else{    echo "<script> alert('관리자에게 문의바랍니다.');</script>";  }

	//2-7. 0초뒤에 게시판(board.php)으로 넘에가게 만들기  content='몇초뒤에; url=경로'
	echo "<meta  http-equiv='refresh'   content='0; url=./board.php'  />";

	include_once "./db_connect_close.php";
?>