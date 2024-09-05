$OBJ = {
	'win' : $(window),
	'doc' : $(document),
	'html' : $('html')
}

function winW(){//창 너비
	return $OBJ.win.width();
}

function winH(){// 창 높이
	return $OBJ.win.height();
}

function winSh(){// 스크롤 값
	return $OBJ.win.scrollTop();
}

function ajaxLink(href,type,idx){//a:주소, b:type, c:넘길 값
	$.ajax({
		type: type,
		url: href,
		data : idx,
		success : function(data) {
			$('body').find('._popAjax').remove().end().append(data).find('._popAjax').fadeIn(500);
		}
	});
}

function getDate(element){
	var date;
	try{
		date = $.datepicker.parseDate(dateFormat, element.value);
	}catch(error){
		date = null;
	}
	return date;
}

function ajaxClose(a){
	$(a).fadeOut(500,function(){$(this).remove()});
}

function fadeIn(a){//a:주소, b:type, c:넘길 값
	$(a).fadeIn(500);
}

function fadeOut(a){
	$(a).fadeOut(500);
}

function mChk(){// 모바일 체크
	return $('#mchk').is(':visible');
}

var head = {
	init : function(){
		this.action();
	},
	action : function(){
		var a = $('#header');
		var sch = a.find('.sch');
		var mnu = a.find('.mnu');
		var gnb = a.find('.gnb');
		var nav = $('#nav');
		var mGnb = nav.find('.gnb');

		sch.on('click',function(){
			$OBJ.html.toggleClass('schOn');
			$OBJ.html.removeClass('navOn');
		});

		mnu.on('click',function(){
			$OBJ.html.toggleClass('navOn');
			$OBJ.html.removeClass('schOn');
		});

		gnb.on({
			'mouseenter' : function(){
				$OBJ.html.addClass('navOn');
			},
			'mouseleave' : function(){
				$OBJ.html.removeClass('navOn');
			}
		});
		
		mGnb.on('click','> li > a',function(){
			if(mChk() == true){
				$(this).closest('li').toggleClass('active').siblings().removeClass('active');
				return false;
			}
		});

	}
};


//GOTOP
var gotop = {
	init : function(){
		this.action();
	},
	action : function(){
		var a = $('#gotop');

		function goTopShow(){
			if(winSh() > 100){
				a.addClass('show');
			}else{
				a.removeClass('show');
			}
		}

		a.on('click',function(){
			$.scrollTo($OBJ.html,300);
		});

		$OBJ.win.on('load scroll',function(){
			goTopShow();
		});

	}
}


var vis = {
	init : function(){
		this.action();
	},
	action : function(){
		var a = $('#vis');
		var roll = a.find('.roll');


		roll.slick({
			fade: true,
			speed: 1000,
			arrows: true,
			dots: false,
			autoplay: true,
			pauseOnHover: false,
			autoplaySpeed: 5000
		});


	}
}


var ban = {
	init : function(){
		this.action();
	},
	action : function(){
		var a = $('#main .one');
		var roll = a.find('.roll');

		roll.slick({
			fade: true,
			speed: 1000,
			arrows: true,
			dots: false,
			autoplay: true,
			pauseOnHover: false,
			autoplaySpeed: 5000
		});

	}
}


var rel = {
	init : function(){
		this.action();
	},
	action : function(){
		var a = $('#rel');
		var roll = a.find('.roll');
		var play = a.find('.play');
		var prev = a.find('.prev');
		var next = a.find('.next');

		roll.slick({
			slidesToShow: 6,
			speed: 300,
			arrows: false,
			dots: false,
			autoplay: true,
			pauseOnHover: false,
			autoplaySpeed: 3000,
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						variableWidth: true
					}
				}
			]
		});

		prev.on('click',function(){
			roll.slick('slickPrev');
		});

		next.on('click',function(){
			roll.slick('slickNext');
		});

		play.on('click',function(){
			play.toggleClass('stop');
			if(play.hasClass('stop')){
				roll.slick('slickPause');
			}else{
				roll.slick('slickPlay');
			}
		});

	}
}

var his = {
	init : function(){
		this.action();
	},
	action : function(){
		var a = $('.__history2');

		function visActive(num){
			a.attr('data-num',num);
		}
		
		$('._hisFor').on('init', function(event, slick){
			visActive(0);
		});

		$('._hisFor').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			infinite :false,
			adaptiveHeight: true,
			asNavFor: '._hisNav'
		});
		$('._hisNav').slick({
			variableWidth: true,
			asNavFor: '._hisFor',
			infinite :false,
			dots: false,
			focusOnSelect: true
		});

		
		$('._hisFor').on('beforeChange', function(event, slick, currentSlide, nextSlide){
			visActive(nextSlide);
		});

		$('._hisNav').on('click','box a',function(){
			return false;
		});

		/*
		$('._hisFor').on('afterChange', function(event, slick, currentSlide){
			visActive(currentSlide);
		});
		*/

	}
}


$OBJ.doc.ready(function(){
	head.init();
	gotop.init();
	rel.init();
});

$OBJ.win.on('load',function(){
	AOS.init({
		duration:1000,
		offset: 20
	});
});


// for paging
function goPage(i){
  $("input[name=page]").val(i);
  $("form[name=viewForm]").submit();
}