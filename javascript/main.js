$(function () {
    var secret = $('.__secret');

    secret.on('click', function () {
        alert('글 보기 권한이 없습니다.');
        return false;
    })
})

$(function () {
    $('#selectEmail').change(function () {
        $("#selectEmail option:selected").each(function () {
            if ($(this).val() == '1') {
                $("#counseling_email2").val('');
                $("#counseling_email2").attr("disabled", false);
            } else {
                $("#counseling_email2").val($(this).text());
                $("#counseling_email2").attr("disabled", true);
            }
        });
    });
});

$(function () {
    var Enswiper = new Swiper('.mainSwiper', {
        observer: true,
        observeParents: true,
        speed: 800,
        effect: 'slide',
        autoplay: {
            delay: 6000,
            disableOnInteraction: false
        },
        loop: true,
        loopAdditionalSlides: 1,
        slidesPerView: 1,
        pagination: {
            el: '.cont1 .swiper-options .pagination-bullet',
            type: 'bullets'
        },
        navigation: {
            nextEl: ".cont1 .swiper-options .swiper-button-next",
            prevEl: ".cont1 .swiper-options .swiper-button-prev"
        }
    });

    var numberPasing = new Swiper(".mainSwiper", {
        pagination: {
            el: ".cont1 .swiper-options .pagination-number .pager-fraction",
            type: "fraction",
            clickable: true
        }
    });

    $('.cont1 .swiper-options .swiper-auto .slideBtn').on('click', function () {
        $('.cont1 .swiper-options .swiper-auto .slideBtn').toggleClass('active');

        if ($(this).hasClass('btn-play')) {
            Enswiper
                .autoplay
                .start();
        } else {
            Enswiper
                .autoplay
                .stop();
        }
    });

    Enswiper.controller.control = numberPasing;

    var swiper = new Swiper(".popup_wr_swiper", {
        slidesPerView: 3,
        spaceBetween: 25,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        }
    });

    var swiper = new Swiper(".infoSwiper", {
        speed: 1000,
        effect: 'slide',
        autoplay: {
            delay: 6000,
            disableOnInteraction: false
        },
        loop: true,
        slidesPerView: 1,
        pagination: {
            el: ".main-page .cont4 .information_wr .swiper-pagination",
        },
    });
});

$(function () {
    var swiper = new Swiper(".f_popup_swiper", {
        observer: true,
        observeParents: true,
        slidesPerView: 6,
        loop: true,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
        speed: 5000,
        slidesOffsetAfter: 10,
        loopAdditionalSlides: 1,
        navigation: {
            nextEl: ".footer_popup_wr .swiper-options .swiper-button-next",
            prevEl: ".footer_popup_wr .swiper-options .swiper-button-prev"
        },
        breakpoints: {
            320: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            1240: {
                slidesPerView: 6,
            }
        }
    });

    /*
    var swiper = new Swiper(".f_popup_swiper", {
        cssMode: true,
        slidesPerView: 6,
        spaceBetween: 45,
        speed: 1000,
        effect: 'slide',
        autoplay: {
            delay: 3000,
            disableOnInteraction: false
        },
        navigation: {
            nextEl: ".footer_popup_wr .swiper-options .swiper-button-next",
            prevEl: ".footer_popup_wr .swiper-options .swiper-button-prev"
        },
        breakpoints: {
            320: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            1240: {
                slidesPerView: 6,
                spaceBetween: 45
            }
        }
    });
    */

    $('.footer_popup_wr .swiper-auto .footer_btn').on('click', function () {
        $('.footer_popup_wr .swiper-auto .footer_btn').toggleClass('active');

        if ($(this).hasClass('btn-play')) {
            swiper
                .autoplay
                .start();
        } else {
            swiper
                .autoplay
                .stop();
        }
    });
});

function main_newsTab(index) {
    var tabs = document.querySelectorAll(
        '.main-page .cont3 .tab_btn_wr .list .tab_item'
    );
    var tabContents = document.querySelectorAll(
        '.main-page .cont3 .tab_inner_wrap .tab_inner'
    );

    tabs.forEach(function (tab) {
        tab
            .classList
            .remove('active');
    });
    tabContents.forEach(function (tabContent) {
        tabContent
            .classList
            .remove('active');
    });

    tabs[index]
        .classList
        .add('active');
    tabContents[index]
        .classList
        .add('active');
}

$(function () {
    var popup_wr = $('.popup_wr');
    var pop_close_btn = $('.popup_wr .close_wr .close_btn');

    pop_close_btn.on('click', function () {
        popup_wr.toggleClass('active');
    })
})

var autoHyphen = function (target) { // 예약확인 하이픈추가
    target.value = target
        .value
        .replace(/[^0-9]/g, '')
        .replace(/^(\d{0,3})(\d{0,4})(\d{0,4})$/g, "$1-$2-$3")
        .replace(/(\-{1,2})$/g, "");
}

var autoHyphen2 = function (target) { // 예약확인 하이픈추가
    target.value = target
        .value
        .replace(/[^0-9]/g, '')
        .replace(/(^02|^0505|^1[0-9]{3}|^0[0-9]{2})([0-9]+)?([0-9]{4})$/, "$1-$2-$3");
}

$(function(){
    var reserveBtn = $('.rental_table .reservebtn');
    var calendar_wr = $('.view-page .reserve_wr');

    reserveBtn.on('click', function(){
        calendar_wr.toggleClass('on');
    })
})

$(function () {
    const items = document.querySelectorAll(".view-page .calendar_table td.select");
    //배열로 저장되기 때문에 forEach로 하나씩 이벤트를 등록해준다.
    items.forEach((item) => {
        item.addEventListener('click', () => {
            items.forEach((e) => {
                //하나만 선택되도록 기존의 효과를 지워준다.
                e
                    .classList
                    .remove('active');
            })
            // 선택한 그 아이만 효과를 추가해준다.
            item
                .classList
                .add('active');
        })
    })
});

$(function () {
    var body = $('body');
    var combtn = $('.company_search_textbox');
    var compopupbox = $('.compopup_wr');
    var closecombtn = $('.compopup_close_btn');

    combtn.on('click', function () {
        body.addClass('over');
        compopupbox.addClass('on');
    });

    closecombtn.on('click', function(){
        body.removeClass('over');
        compopupbox.removeClass('on');
    });
});

function rentalsubmitbtn() {
    var f = document.rental_frm;

    if ($("#search_text_box").val() == "") {
        alert("검색어를 입력해주세요");
        $("#search_text_box").select();
        return false;
    }

    f.submit();
}

$(document).ready(function () {
    AOS.init({once: true});
});