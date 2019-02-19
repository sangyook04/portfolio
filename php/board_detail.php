<!DOCTYPE html>
<html  lang="ko">
 <head>
  <meta charset="UTF-8"/>
  <title> New title </title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 </head>
 <body>
    <h1 class="hidden">COMPANY-LOGO</h1>
	<nav class="navbar navbar-default"> 
      <h2 class="hidden">GNB</h2>
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="#">COMPANY</a>
		</div>
		<ul class="nav navbar-nav navbar-right">
		  <li><a href="#"><span class="glyphicon glyphicon-th-list"></span> BOARD</a></li>
		  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
		  <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		</ul>
	  </div>
	</nav>

    <div class="container">
	<?php   ################ TODO1
		//1.  db연동	//2.  db연동 에러 확인    //3.  utf8 설정
		//$con = mysqli_connect('localhost' , '본인닷홈계정아이디' , '본인닷홈계정비밀번호' , '본인닷홈계정아이디' , 3306);					
/*
    $con = mysqli_connect('localhost' , 'root' , '1234' , 'board' , 3306);
	if(  mysqli_connect_errno() ){  echo "DB연동 ERROR ";   exit();  }
	mysqli_set_charset( $con ,   "utf8" );
*/
	include_once  './db_connect.php';

		//4.  해당번호받아오기
		$no = $_GET['no'];
		//5.  해당번호의 데이터 출력 (select *  from multiboard  where no= 해당번호  - 표
		$result = mysqli_query( $con , "select *  from multiboard  where no='$no'" );
		//6. $row =  mysqli_fetch_array  - 줄
		$row = mysqli_fetch_array(  $result , MYSQLI_ASSOC );
		//7. $row['필드명']  -  칸
		# echo $row['title'];
		//8. 자원해제
		mysqli_free_result(  $result );

	?>
	<h3>QNA</h3>
	 <form action="./board_insert.php"  method="post">
		<table  id="peopleTable"  summary=" PHP MYSQL 멀티게시판 제작 "  class="table table-striped">
			<caption> PHP MYSQL 멀티게시판 제작 </caption>
			<colgroup>
				<col width="30%" />
				<col width="*" />
			</colgroup>
			<thead>
				<tr> 
					<th  scope="col"  colspan="2">  상세페이지  </th>
				</tr>
			</thead>
			<tbody>
				<tr>  
					<th scope="row">   제목  </td> 
					<td > <?=$row['title']?>	</td>
				</tr>
				<tr>  
					<th scope="row">   이름  </td>
					<td > 	<?=$row['name']?>  </td>
				</tr>
				<tr>  
					<th scope="row">   이메일  </td>
					<td > <?=$row['email']?>  </td>
				</tr>
				<tr>  
					<th scope="row">  조회수   </td>
					<td > <?=$row['view']?>   </td>
				</tr>
				<tr>  
					<th scope="row">  날짜   </td>
					<td > 
						<?=$row['wdate']?>
					</td>
				</tr>
				<tr>  
					<th scope="row">   내용  </td>
					<td>  <?=str_replace( "\n"  , "<br/>"   , $row['content'] ) ?>  </td>
				</tr>
				<tr class="menubars  text-right">
					<td colspan="2" > <!-- ###-->
						 <a href="./board.php"  class="btn btn-danger"> [목록보기] </a> 
						 <a href="./board_edit.php?no=<?=$no?>"  class="btn btn-danger"> [수정] </a>
						 <a href="./board_delform.php?no=<?=$no?>"  class="btn btn-danger"> [삭제] </a> 
					</td>
				</tr>
			</tbody>
		</table>
	 </form>		
</div>
 </body>
</html>
<?php    
		///// 조회수 업데이트 : 글을 한번읽어 줬으므로 view 숫자 한개 올려주기 / 해당하는 글번호의
		//  insert / select / delete / update
		mysqli_query($con, "UPDATE  multiboard
						         SET        view = view+1
						         WHERE   no='$no'"); 
		mysqli_close($con);   
?>