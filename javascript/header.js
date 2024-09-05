$(function () {
    var $wrap = $('.wrap'),
        $header = $('.header'),
        $navi = $('.nav'),
        $gnb = $('.gnb > ul > li > a'),
        $gnbHover = $('.nav .gnb > ul > li'),
        $gnb_ = $('.nav .gnb > ul'),
        $gnbSub = $('.nav .gnb > ul > li > ul'),
        $bnt_all = $('.allBox'),
        $all_bg = $('.allmenuBox .bg'),
        $btn_all = $('.btn_all'),
        $all_bg = $('.wrap .all_bg'),
        $allmenuBox = $('.allmenuBox'),
        $gnb_bg = $('.gnb_bg'),
        $search_bth = $('.header .search_wr');

    $search_bth.on('click', function () {
        $header.toggleClass('search_over');
        $('.search_frm_wr').toggleClass('active');
    })

    $gnb_.on('click', '> li > a', function () {
        if(mChk() == true){
            $(this).closest('li').toggleClass('active').siblings().removeClass('active');
            return false;
        }
    });

    $(window).on('scroll', function () {
        bodyScroll = $(document).scrollTop();
        if (bodyScroll > 0) {
            $header.addClass('fix');
            $header.parent().parent().addClass('fix');
        } else {
            $header.removeClass('fix');
            $header.parent().parent().removeClass('fix');
        }
    });

    var menuCont = function () {
        $('.header .nav .gnb > ul > li').each(function () {
            $(this).on('mouseenter', function () {
                $header.addClass('ov');
            });
            $(this).on('mouseleave', function () {
                $header.removeClass('ov');
            });
        });

        $(document).on('click', function () { // 복제
            $('.allmenuBox .gnb > ul > li').each(function () {
                $(this).not('.link').children("a").off("click").on("click", function (e) {e.preventDefault();});
            });
        });

        /* allmenu */
        $('.header .gnb > ul').clone().appendTo('.allmenuBox .menuBox');
        $('.header .logo').clone().appendTo('.allmenuBox .mLogo');

        $bnt_all.off('click');
        $bnt_all.click(function () {
            $('html, body').addClass('body_hidden');
            $(this).addClass('active');
            $allmenuBox.removeClass('off').addClass('on');
            $('.allmenuBox .menuBox > ul > li > .subDepth').removeAttr("style");
        });

        /* gnb menu */
        $(document).on('click', function () { // 복제
            $(".allmenuBox .menuBox > ul > li").each(function () {
                var subDepthDiv = $(this).find('.subDepth');
                if (subDepthDiv.length > 0) {
                    $(this).children("a").off('click').on('click', function (e) {
                        e.preventDefault(); //a 태그 막기
                        var depth2 = $(this).siblings('.subDepth');
                        if (!depth2.is(':visible')) {
                            //$('.subDepth').removeAttr("style");
                            $('.menuBox > ul').find('.subDepth').stop().slideUp();
                            depth2.stop().slideDown();
                            $('.menuBox > ul > li').removeClass('hover');
                            $(this).parent().addClass('hover');
                        } else {
                            $('.menuBox > ul > li').removeClass('hover');
                            $('.menuBox > ul').find('.subDepth').stop().slideUp();
                        };
                    });
                }
            });

            $(".menuBox > ul > li > .subDepth.menu1 .depth2 > ul > li").each(function () {
                $(this)
                    .children("p")
                    .off("click")
                    .on("click", function (e) {
                        e.preventDefault();
                        var depth3 = $(this).siblings('.depth3');
                        if (!depth3.is(':visible')) {
                            $('.menuBox > ul > li > .subDepth .depth2 > ul > li').removeClass('on');
                            $(this).parent().addClass('on');
                            $('.menuBox > ul > li > .subDepth .depth2 > ul > li').find('.depth3').stop().slideUp();
                            depth3.stop().slideDown();
                        } else {
                            $(this).parent().removeClass('on');
                            depth3.stop().slideUp();
                        };
                    });
            });
        });

    }

    var windowSize = function () {
        var winWidth = $(window).width();
        if (winWidth > 1240) {
            $wrap.addClass('web');
            $wrap.removeClass('mobile');
            $('.allmenuBox .menuBox').empty();
            $('.allmenuBox .mLogo').empty();
            $('.allmenuBox .leng').empty();
            $('html, body').removeClass('body_hidden');
            $(this).addClass('active');
            $allmenuBox.removeClass('on');

            $('.header .nav .gnb > ul > li').each(function () {
                var subDepthDiv = $(this).find('.subDepth');
                if (subDepthDiv.length > 0) {
                    $(this).on('mouseenter', function () {
                        $header.addClass('over');
                        $(this).addClass('on');
                    });
                    $(this).on('mouseleave', function () {
                        $header.removeClass('over');
                        $(this).removeClass('on');
                    });
                }
            });

        } else {
            $wrap.removeClass('web');
            $wrap.addClass('mobile');

            $('.allmenuBox .menuBox').empty();
            $('.allmenuBox .mLogo').empty();
            $('.allmenuBox .leng').empty();
            $('html, body').removeClass('body_hidden');
            $(this).addClass('active');
            $allmenuBox.removeClass('on');
        }

        $('.allmenuBox .btn_close').click(function () {
            $('html, body').removeClass('body_hidden');
            $('.allBox').removeClass('active');
            $allmenuBox.removeClass('on').addClass('off');
        });

        $all_bg.click(function () {
            $('html, body').removeClass('body_hidden');
            $('.allBox').removeClass('active');
            $allmenuBox.removeClass('on').addClass('off');
        });

        menuCont();
    }

    var headerRe = function () {
        if (!navigator.userAgent.match(/Android|Mobile|iP(hone|od|ad)|BlackBerry|IEMobile|Kindle|NetFront|Silk-Accelerated|(hpw|web)OS|Fennec|Minimo|Opera M(obi|ini)|Blazer|Dolfin|Dolphin|Skyfire|Zune/)) {
            if ($bnt_all.is('.active')) {
                $bnt_all.click();

                $('.allmenuBox .menuBox').empty();
                $('.allmenuBox .mLogo').empty();
                $('.allmenuBox .leng').empty();
                $('html, body').removeClass('body_hidden');
                $(this).addClass('active');
                $allmenuBox.removeClass('on').addClass('off');
            }
        }
    }

    $(window).load(function () {
        windowSize();
        headerRe();
        menuCont;
    });

    $(window).resize(function () {
        windowSize();
        headerRe();
        menuCont;
    });

    $(window).on("orientationchange", function (event) {
        windowSize();
        headerRe();
        menuCont;
    });

    $('.nav .gnb > ul > li.over > a').clone().appendTo('.subtitleTop .location > .depthMenu > .stit1');

    var subTit2 = $(".gnb > ul > li .subDepth > ul > li.on > a").text();

    $(".subtitleTop .location > .depthMenu > .stit2").text(subTit2);
    console.log(subTit2)

    $(".nav .gnb > ul").clone().appendTo(".subtitleTop .gnb");

    $(".subtitleTop .gnb .subDepth").remove();
    for (var i = 1; i <= 20; i++) {
        $("#navi #gnb .menu" + i).clone().appendTo(".subtitleTop .depthMenu .subm" + i);
    };

    $(".subtitleTop .submenu-box .depth2 ul").remove();

    for (var i = 1; i <= 20; i++) {
        $("#navi #gnb .menu" + i).clone().appendTo(".lnbM" + i);
    };
});