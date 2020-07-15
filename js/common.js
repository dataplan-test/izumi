var j = jQuery ;

//etc

j(function(){
	//マージン0px
	j("#banner li:last-child , #fInfo li:last-child").css("margin-right","0px");

	//メニューボーダーなし
	j(".menu_list dt:first-child , .menu_list dt:first-child+dd").css("border-top","none");
	j(".menu_list dd:last-child , #lunch_list dt:nth-child(5) , #bar_list dt:nth-child(19)").css("border-bottom","none");

	//バナーロールオーバー
	j("#banner img , #image_list img").mouseover(function(){
		j(this).css("opacity","0.8");
	}).mouseout(function() {
		j(this).css("opacity","1");
	});

});


//固定メニュー表示
$(function(){

	var contHeight = $('body').height(); //コンテンツ高さ

	var $Limit = contHeight / 5 ; //コンテンツ高さの5分の1

	var slideMenu = $('#scroll_nav');

	$(window).on('scroll' , function(){

		var $scrollValue = $(window).scrollTop();//スクロール値

		if($scrollValue >= $Limit ){//出てくる
			slideMenu.slideDown(600,'easeOutCirc');
		}else{//戻る
			slideMenu.slideUp(600,'easeOutExpo');
		}

	});

});

//パララックス

$(function(){
    $('#page').stellar({
        scrollProperty: 'transform'
    });
});

$(function(){
	$.stellar({
		horizontalScrolling: false,
		verticalOffset: 40
	});
});

//スクロール

$(function() {
    var showFlag = false;
    var topBtn = $('#scrolltop');
    topBtn.css('bottom', '-50px');
    var showFlag = false;
    //スクロールが100に達したらボタン表示
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            if (showFlag == false) {
                showFlag = true;
                topBtn.stop().animate({'bottom' : '0'}, { duration: 600 , easing: 'easeOutExpo'});
            }
        } else {
            if (showFlag) {
                showFlag = false;
                topBtn.stop().animate({'bottom' : '-50px'}, { duration: 300 , easing: 'easeInCirc'});
            }
        }
    });
    //スクロールしてトップ
    　　topBtn.click(function () {
        $('body,html').animate({scrollTop: 0}, { duration: 800 , easing: 'easeOutExpo'});
        return false;
    });
});

// =======================================
//
//	spmenu
//
// =======================================
$(function(){
	$(".menu_btn_wrap").on("click", function() {

		if (!$("#nav_sp").hasClass('toggle')) {
		}
        $("#nav_wrap").toggleClass("toggle");
		$("#nav_sp").toggleClass("toggle");
        $(".menu_btn").toggleClass("active");
    });
});
$(window).on('load resize', function(){
	$("#nav_wrap").removeClass("toggle");
	$("#nav_sp").removeClass("toggle");
	$(".menu_btn").removeClass("active");

});
$(function(){
	$("#nav_sp a").on("click", function() {

		if (!$("#nav_sp").hasClass('toggle')) {
		}
		$("#nav_sp").toggleClass("toggle");
        $(".menu_btn").toggleClass("active");
    });
});
