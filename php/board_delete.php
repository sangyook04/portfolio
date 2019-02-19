<?php
	header("Content-type:text/html; charset=utf-8");
		#### 해당번호의 글삭제 board_delete.php	//1. db연동 - 에러확인 - utf8
/*
    $con = mysqli_connect('localhost' , 'root' , '1234' , 'board' , 3306);
	if(  mysqli_connect_errno() ){  echo "DB연동 ERROR ";   exit();  }
	mysqli_set_charset( $con ,   "utf8" );
*/
	include_once  './db_connect.php'; 
		
		//2. 해당글번호의 비밀번호 찾기 : select * from multiboard  where  no='$no'
		//3. 유저가 입력한 비밀번호 가져오기  : $_POST['pass']
		$no = $_GET['no'];   $pass = $_POST['pass'];
		$result = mysqli_query( $con ,  "SELECT pass  from multiboard  where no='$no'");   #표
		$row = mysqli_fetch_array(  $result , MYSQLI_ASSOC );  # 줄
		
		//4. 2과3번이 같다면 삭제진행 (board.php)
		//5. 아니라하면 비밀번호를 확인해주세요 알림창	-다시 비밀번호 입력폼으로 넘기기 (board_delform.php)
		if( $pass == $row['pass']  ){
			mysqli_query(  $con  ,  "delete  from   multiboard   where  no='$no'");
			echo "<script> alert('삭제되었습니다.'); </script>";
			echo "<meta http-equiv='refresh'   content='0; url=./board.php'>";
		}else{	echo "<script> alert('비밀번호를 확인해주세요');  history.go(-1); </script>";   }

		mysqli_free_result(  $result  );   
		include_once "./db_connect_close.php";
?>