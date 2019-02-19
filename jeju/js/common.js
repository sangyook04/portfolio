$(function() {
    function swing() {
        $('.left').animate({'left':'25px'},800).animate({'left':'35px'},800, swing);
    }
    swing();
});


$(document).on('click', function(){
	
	if ($("input:checkbox[id='btn2']").is(":checked") == true){

		$('body').addClass('stop-scrolling');


	}else{

		$('body').removeClass('stop-scrolling');


	}

});
//btn2를 체크시 스크롤을 막아줌

$(document).on('click', function(){
	if ($("input:checkbox[id='btn2']").is(":checked") == true){

		$('.mainlogo .left').css('visibility', 'hidden');
		$('.sns').css('visibility', 'hidden');
		

	} else {

		setTimeout(function (){

			$('.mainlogo .left').css('visibility', 'visible');
			$('.sns').css('visibility', 'visible');
		}, 400);
	};
});
//sns등의 애니메이션 시간을 맞춰줌
