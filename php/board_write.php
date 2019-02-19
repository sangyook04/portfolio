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
	 <form action="./board_insert.php"  method="post">
		<table  id="peopleTable"  summary=" PHP MYSQL 멀티게시판 제작 "  class="table  tabel-striped">
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
						<input type="text"  name="title"  id="title"  class="form-control"  /> <!-- ###-->
					</td>
				</tr>
				<tr>  
					<th scope="row"> <label  for="name"> 이름 </label></td>
					<td > 
						<input type="text"  name="name"  id="name"  class="form-control"  /><!-- ###-->
					</td>
				</tr>
				<tr>  
					<th scope="row"> <label  for="email"> 이메일 </label></td>
					<td > 
						<input type="text"  name="email"  id="email"  class="form-control"  /><!-- ###-->
					</td>
				</tr>
				<tr>  
					<th scope="row"> <label  for="pass"> 비밀번호  </label></td>
					<td > 
						<input type="password"  name="pass"  id="pass"  class="form-control"  /> <!-- ###-->
						<span> * 수정,삭제시 필수 ! </span>
					</td>
				</tr>
				<tr>  
					<th scope="row"> <label  for="content"> 내용 </label></td>
					<td > 
						<textarea   name="content"  id="content"   rows="5"  cols="56" class="form-control"  ></textarea>
					</td>
				</tr>
				<tr class="menubars text-right">
					<td colspan="2" > <!-- ###-->
						<input type="submit"  value="저장"  class="btn btn-danger"/>	
						<input type="reset"     value="다시쓰기"  class="btn btn-danger"/>		
						<input type="button"     value="목록" onclick="history.back(-1)"   class="btn btn-danger"/>	
					</td>
				</tr>
			</tbody>
		</table>
	 </form>		
</div>
 </body>
</html>