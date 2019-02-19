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
		<h3>QNA</h3>
		<?php
				//	board_edit.php (삭제시 비밀번호 입력칸)				==>>>  controller : board_update.php
				// ㅁ 해당글의번호 데이터채우기(수정하게)	
				//ㅁ 비밀번호칸은 비우기(사용자가 입력하게)
				//1. db연동 - 에러확인 - utf8
/*
    $con = mysqli_connect('localhost' , 'root' , '1234' , 'board' , 3306);
	if(  mysqli_connect_errno() ){  echo "DB연동 ERROR ";   exit();  }
	mysqli_set_charset( $con ,   "utf8" );
*/
	include_once  './db_connect.php';
				//2. 해당글번호 데이터 가져오기
				$no = $_GET['no'];
				$result = mysqli_query(   $con , "select * from multiboard  where no='$no'");  // 표
				$row = mysqli_fetch_array(  $result   ,MYSQLI_ASSOC  );
				
		?>

		 <form action="./board_update.php?no=<?=$no?>"  method="post">
			<table  id="peopleTable"  summary=" PHP MYSQL 멀티게시판 제작 "  class="table table-striped">
				<caption> PHP MYSQL 멀티게시판 제작 </caption>
				<colgroup>
					<col width="30%" />
					<col width="*" />
				</colgroup>
				<thead>
					<tr> 
						<th  scope="col"  colspan="2">  글쓰기  </th>
					</tr>
				</thead>
				<tbody>
					<tr>  
						<th scope="row"> <label  for="title"> 제목 </label></td> 
						<td > 
							<input type="text"  name="title"  id="title"     value="<?=$row['title']?>"  class="form-control" /> <!-- ###-->
						</td>
					</tr>
					<tr>  
						<th scope="row"> <label  for="name"> 이름 </label></td>
						<td > 
							<input type="text"  name="name"  id="name" value="<?=$row['name']?>"  class="form-control"  />
						</td>
					</tr>
					<tr>  
						<th scope="row"> <label  for="email"> 이메일 </label></td>
						<td > 
							<input type="text"  name="email"  id="email"    value="<?=$row['email']?>"  class="form-control" /> <!-- ###-->
						</td>
					</tr>
					<tr>  
						<th scope="row"> <label  for="pass"> 비밀번호  </label></td>
						<td > 
							<input type="password"  name="pass"  id="pass"  class="form-control" /> <!-- ###-->
							<span> * 수정,삭제시 필수 ! </span>
						</td>
					</tr>
					<tr>  
						<th scope="row"> <label  for="content"> 내용 </label></td>
						<td > 
							<textarea   name="content"  id="content"   rows="5"  cols="56"  class="form-control" ><?=$row['content']?></textarea><!-- ###-->
						</td>
					</tr>
					<tr class="menubars  text-right">
						<td colspan="2" > <!-- ###-->
							<input type="submit"  value="저장"  class="btn btn-danger"/>	 
							<input type="button"     value="목록" onclick="history.back(-1)" class="btn btn-danger" />	
						</td>
					</tr>
				</tbody>
			</table>
		 </form>		
	</div>
 </body>
</html>
<?php    
		mysqli_free_result( $result );
		include_once "./db_connect_close.php";  
?>
