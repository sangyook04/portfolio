<?php
/*    $con = mysqli_connect('localhost' , '호스팅시db접속아이디' , '호스팅시db접속비밀번호' , '호스팅시db접속아이디' , 3306);   */
    //$con = mysqli_connect('localhost' , 'root' , '1234' , 'board' , 3306);
    $con = mysqli_connect('localhost' , 'amstar2' , 'dnrtkddl153' , 'amstar2' , 3306);
    if(  mysqli_connect_errno() ){  echo "DB연동 ERROR ";   exit();  }
    mysqli_set_charset( $con ,   "utf8" );
?>
