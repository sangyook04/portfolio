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
	<h3>데이터 삭제 비밀번호 확인</h3>
	<form           action="./board_delete.php?no=<?=$_GET['no']?>"    method="post"   id="delform">
		<fieldset>
		   <legend> 비밀번호확인</legend>
			  <p>
				    <label for="pass">	비밀번호 </label>
					<input type="password"   id="pass" name="pass"  size="10"  maxlength="8"  class="form-control"  />
					<input  type="submit"  value="확인"  class="btn btn-danger"/>
					<input  type="reset"    value="취소"   onclick="history.back(-1)"   class="btn btn-danger"/>
			  </p>
		</fieldset>
	</form>
</div>
 </body>
</html>
