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
	<table class="table table-striped">
		<caption> PHP MYSQL 멀티게시판 제작  </caption>
		<colgroup>
			<col  style="width:10%;" />
			<col  style="width:52%;" />
			<col style="width:13%;" />
			<col style="width:13%;" />
			<col style="width:10%;" />
		</colgroup>
		<thead>
			<tr> 
				<th> 번호 </th>
				<th> 제목 </th>
				<th> 글쓴이 </th>
				<th> 작성일 </th>
				<th> 조회 </th>
			</tr>
		</thead>
		<tbody>
<?php  
/*
    $con = mysqli_connect('localhost' , 'root' , '1234' , 'board' , 3306);
	if(  mysqli_connect_errno() ){  echo "DB연동 ERROR ";   exit();  }
	mysqli_set_charset( $con ,   "utf8" );
*/
	include_once  './db_connect.php';

	////////////////////////////
	//   paging 준비(1) 데이터준비 (112)  100개이상 
	//   = mysql
	/*     insert   into   multiboard   (             name , email ,pass , title , content , wdate , ip  , view      )  
										   ( select     name , email ,pass , title , content , wdate , ip  , view   from multiboard )  */
	/////////////////////////////
	/*				0   10  20  30				90
			        9   19  29  39               99 
	//  <이전		1   2   3    4   5 6 7 8 9  10 다음>
	*/
	//1)   전체글   256    count(*)   표-줄-칸
			$result   = mysqli_query( $con , "SELECT count(*) FROM multiboard"  );   # 표
			$row     = mysqli_fetch_array(  $result , MYSQLI_NUM  );  #줄
			$listtotal = $row[0];  #칸

			echo  "전체페이지수" . $listtotal;
	//2)   한페이지에 보여줄 게시물수 10
			$onepagelist = 10;

	//3)   총페이지계산   [전체글/한페이지게시물수] (256/10)   25.6   => 26개 /   (112/10) 11.2   => 12  /   ceil + round  floor
			$pagetotal =  ceil( $listtotal   / $onepagelist   );

	//4)   하단에 페이지수 나누기      <이전		1   2   3    4   5 6 7 8 9  10 다음>  
			$bottomlist = 10;
	//5)   최신글부터 10개씩가져오기         select * from multiboard    order by no   desc limit   어디서부터,  몇개   ;
	/*				0   10  20  30				90
			        9   19  29  39               99 
	//  <이전		1   2   3    4   5 6 7 8 9  10 다음>
	*/
			$pstartno = 0;
			if(    !empty(   $_GET['pstartno']    ) ){   $pstartno =   $_GET['pstartno'] ;   }
			else  if(  !$pstartno ||  $pstartno < 0  ) {   $pstartno = 0;   }

			$result   = mysqli_query( $con , "SELECT * FROM multiboard  order by no  desc  limit   $pstartno  , $onepagelist "  );  
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
	//6) 현재index                <이전		[1]   2   3    4   5 6 7 8 9  10 다음>
	/*      0(db에서 뽑아온 최신글)  ~9(db에서 뽑아온 최신글)  : 1  index  
		   10(db에서 뽑아온 최신글)~19(db에서 뽑아온 최신글)  : 2   index
		   20(db에서 뽑아온 최신글)~29(db에서 뽑아온 최신글)  : 3   index
			==>> 해야할일  0~9를   1로 만들기
						        10~19를 2로 만들기
						        20~29를 3로 만들기
			0				9		 =>1
			10				19		 =>2
		// 1. 한페이지에 들어가는 개수  - 소수점으로 만들어서 올림해버리기
			ceil((10+1)/10)			ceil((19+1)/10)		
			ceil(11/10)				ceil(20/10)
			ceil(1.1) =2				ceil(2) =2
	*/
	$current_page = ceil(    (  $pstartno + 1)    / $onepagelist   );
	echo     "<br/> 하단현재시작index". $current_page;
	$cnt = 0;  
	//7) 시작index  :   만약 4라면 1~10 사이라면 (1)    현재index                <이전		[1]   2   3    4   5 6 7 8 9  10 다음>
	/*   1~10  시작페이지가 1
		11~20  시작페이지가 11
		21~30  시작페이지가 21
		
		11=> 11		14=> 11		20	=> 11
		(11-1)			(14-1)			(20-1)
 floor(10/10)	 floor(13/10)	 floor(19/10)
 floor(1.0)		 floor(1.3)		 floor(1.9)
 1*10+1		 1*10+1		 1*10+1
								 (floor( (현재페이지-1)/현재하단index갯수)) *현재하단index갯수 + 1
	*/
	$start_page =    floor(($current_page-1)/$bottomlist  )  * $bottomlist + 1;
	
	//8)   끝 index  : 만약  4라면 1~10  사이라면 (10)
	$end_page =   $start_page + $bottomlist - 1;
	echo     "<br/> 하단시작index". $start_page   . " / " .  $end_page ;

?>
<?php   while(   $row= mysqli_fetch_array( $result  , MYSQLI_ASSOC  ) )  {    ?>
			<tr> 
				<td>  <?=$row['no']?> <!--  번호 -->  </td>
				<td><a  href="./board_detail.php?no=<?=$row['no']?>"><?=$row['title']?></a></td> 
				<!--   쿼리스트링 : 데이터를 넘기는 방법
						주소?이름=값&이름=값  
						해당하는 번호를 넘겨서, 첫번째글을 보여주세요라는 번호.... 번호를 넘기기		
				-->
				<td> <?=$row['name']?> </td>
				<td> <?=$row['wdate']?> </td>
				<td> <?=$row['view']?> </td>
			</tr>
<?php    }    ?>


			<!--  ######### 데이터 삽입 END  -->

			<!--  ######### 목록 화면에 보이기 -->
			<tr  style="text-align:center;">
				<td  colspan="5">
<?php

include_once './paging.php';
?>
				</td>
			</tr>
			<tr  class="menubars  text-right">  
				<td  colspan = "5"> 
					<a href="./board_write.php"  class="btn btn-danger">  글쓰기 </a>
				</td>
			</tr>
		</tbody>
	</table>
</div>
 </body>
</html>
 <?php
	mysqli_free_result(  $result  );

	//2-5. db연동해제
	/* mysqli_close(  $con );  */
	include_once "./db_connect_close.php";
?>