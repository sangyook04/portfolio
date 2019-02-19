<?php 
/////////0) 기본셋팅
        $PHP_SELF = $_SERVER['PHP_SELF'];
        if($pagetotal < $end_page) {$end_page = $pagetotal;}
    /////////1) 이전
        if($start_page >= $bottomlist){
            $prev = ($start_page-2)*$onepagelist;
            echo "<a href='$PHP_SELF?pstartno=$prev' > [이전] </a>";
        }
    /////////2) 1~10 index
        for($index = $start_page; $index <= $end_page; $index++){
            $page = ($index-1) * $onepagelist;
            echo "<a href='$PHP_SELF?pstartno=$page' > $index </a>";
        }
    /////////3) 다음
        if($pagetotal > $end_page){
            $next = $end_page * $onepagelist;
            echo "<a href='$PHP_SELF?pstartno=$next' > [다음] </a>";
        }
       ?>