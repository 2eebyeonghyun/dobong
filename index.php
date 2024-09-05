<? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; ?>

<body>
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <div class="wrap">
        <section class="section main-page">
            <article class="cont cont1">
                <div class="inner">
                    <div class="swiper mainSwiper">
                        <div class="text_wr">
                            <span class="sub_txt">서울특별시 도봉구</span>
                            <span class="main_txt">육아종합지원센터</span>
                        </div>
                        <ul class="swiper-wrapper">
                            <li class="swiper-slide">
                                <!-- <div class="text_wr">
                                    <span class="sub_txt">서울특별시 도봉구</span>
                                    <span class="main_txt">육아종합지원센터</span>
                                </div> -->
                                <div class="img_wr">
                                    <img src="<?=DIR?>/img/mainA.png" alt="">
                                </div>
                            </li>
                            <li class="swiper-slide">
                                <div class="img_wr">
                                    <img src="<?=DIR?>/img/mainA.png" alt="">
                                </div>
                            </li>
                            <li class="swiper-slide">
                                <div class="img_wr">
                                    <img src="<?=DIR?>/img/mainA.png" alt="">
                                </div>
                            </li>
                            <li class="swiper-slide">
                                <div class="img_wr">
                                    <img src="<?=DIR?>/img/mainA.png" alt="">
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="swiper-options">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-slot">
                            <div class="swiper-pagination pagination-bullet"></div>
                            <div class="swiper-auto">
                                <button type="button" class="main_btn slideBtn btn-play"><i class="axi axi-play-arrow"></i></button>
                                <button type="button" class="main_btn slideBtn btn-stop active"><i class="axi axi-pause2"></i></button>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>

                <div class="right_popup_wr">
                    <ul class="list">
                        <li><a href="#none" target="_blank"><img src="<?=DIR?>/img/icon/right_popup1.png" alt="유튜브 아이콘"></a></li>
                        <li><a href="#none" target="_blank"><img src="<?=DIR?>/img/icon/right_popup2.png" alt="인스타그램 아이콘"></a></li>
                        <li><a href="#none" target="_blank"><img src="<?=DIR?>/img/icon/right_popup3.png" alt="카카오채널 아이콘"></a></li>
                        <li><a href="#none" target="_blank"><img src="<?=DIR?>/img/icon/right_popup4.png" alt="카카오스토리 아이콘"></a></li>
                        <li><a href="#none" target="_blank"><img src="<?=DIR?>/img/icon/right_popup5.png" alt="네이버블로그 아이콘"></a></li>
                    </ul>
                </div>
            </article>

            <article class="cont cont2">
                <div class="inner">
                    <ul class="service_list">
                        <li>
                            <div class="icon">
                                <img src="<?=DIR?>/img/service_icon.png" alt="자주찾는 서비스 아이콘">
                            </div>
                            <div class="text">
                                <span class="color">자주찾는</span> 
                                <p>서비스 →</p>
                            </div>
                        </li>
                        <li>
                            <a href="#none">
                                <div class="icon">
                                    <img src="<?=DIR?>/img/service_icon1.png" alt="실내놀이실 아이콘">
                                </div>
                                <div class="information">
                                    <span class="title">실내놀이실 예약</span>
                                    <p class="text">교육 및 놀이실 예약</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <div class="icon">
                                    <img src="<?=DIR?>/img/service_icon2.png" alt="교육 및 행사 아이콘">
                                </div>
                                <div class="information">
                                    <span class="title">교육 및 행사 신청</span>
                                    <p class="text">교육 및 놀이실 예약</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <div class="icon">
                                    <img src="<?=DIR?>/img/service_icon3.png" alt="도서 장난감 대여 아이콘">
                                </div>
                                <div class="information">
                                    <span class="title">도서 장난감 대여</span>
                                    <p class="text">도서·장난감대여</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <div class="icon">
                                    <img src="<?=DIR?>/img/service_icon4.png" alt="대체인력추가신청 아이콘">
                                </div>
                                <div class="information">
                                    <span class="title">대체인력추가신청</span>
                                    <p class="text">어린이집지원</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <div class="icon">
                                    <img src="<?=DIR?>/img/service_icon5.png" alt="상담 아이콘">
                                </div>
                                <div class="information">
                                    <span class="title">상담</span>
                                    <p class="text">커뮤니티</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </article>

            <article class="cont cont3">
                <div class="inner">
                    <div class="news_wr">
                        <div class="tab_btn_wr">
                            <h6 class="title">공지 게시판</h6>
                            <ul class="list">
                                <li class="tab_item active" onclick="main_newsTab(0)"><span>공지사항</span></li>
                                <li class="tab_item" onclick="main_newsTab(1)"><span>자료실</span></li>
                                <li class="tab_item" onclick="main_newsTab(2)"><span>구인정보</span></li>
                            </ul>

                            <a href="#none" class="moreBtn_"><i class="axi axi-plus"></i></a>
                        </div>

                        <div class="contents">
                            <div class="tab_inner_wrap">
                                <div class="tab_inner active">
                                    <ul class="list">
                                        <li class="news_card">
                                            <a href="#none">
                                                <span class="news_subject">공지사항</span>
                                                <div class="news_contents">
                                                    <div class="main_txt_wr">
                                                        <span class="news_title">공지사항 제목</span>
                                                        <p class="news_text">도봉구 육아종합지원센터 공지사항 내용입니다. 아래 내용을 입력해주세요.</p>
                                                    </div>

                                                    <div class="sub_txt_wr">
                                                        <p class="news_date">2024.00.00</p>
                                                        <p class="news_writer">관리자</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="news_card">
                                            <a href="#none">
                                                <span class="news_subject">공지사항</span>
                                                <div class="news_contents">
                                                    <div class="main_txt_wr">
                                                        <span class="news_title">공지사항 제목</span>
                                                        <p class="news_text">도봉구 육아종합지원센터 공지사항 내용입니다. 아래 내용을 입력해주세요.</p>
                                                    </div>

                                                    <div class="sub_txt_wr">
                                                        <p class="news_date">2024.00.00</p>
                                                        <p class="news_writer">관리자</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="news_card">
                                            <a href="#none">
                                                <span class="news_subject">공지사항</span>
                                                <div class="news_contents">
                                                    <div class="main_txt_wr">
                                                        <span class="news_title">공지사항 제목</span>
                                                        <p class="news_text">도봉구 육아종합지원센터 공지사항 내용입니다. 아래 내용을 입력해주세요.</p>
                                                    </div>

                                                    <div class="sub_txt_wr">
                                                        <p class="news_date">2024.00.00</p>
                                                        <p class="news_writer">관리자</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="news_card">
                                            <a href="#none">
                                                <span class="news_subject">공지사항</span>
                                                <div class="news_contents">
                                                    <div class="main_txt_wr">
                                                        <span class="news_title">공지사항 제목</span>
                                                        <p class="news_text">도봉구 육아종합지원센터 공지사항 내용입니다. 아래 내용을 입력해주세요.</p>
                                                    </div>

                                                    <div class="sub_txt_wr">
                                                        <p class="news_date">2024.00.00</p>
                                                        <p class="news_writer">관리자</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab_inner">
                                    <ul class="list">
                                    <li class="news_card">
                                            <a href="#none">
                                                <span class="news_subject">공지사항</span>
                                                <div class="news_contents">
                                                    <div class="main_txt_wr">
                                                        <span class="news_title">공지사항 제목</span>
                                                        <p class="news_text">도봉구 육아종합지원센터 공지사항 내용입니다. 아래 내용을 입력해주세요.</p>
                                                    </div>

                                                    <div class="sub_txt_wr">
                                                        <p class="news_date">2024.00.00</p>
                                                        <p class="news_writer">관리자</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="news_card">
                                            <a href="#none">
                                                <span class="news_subject">공지사항</span>
                                                <div class="news_contents">
                                                    <div class="main_txt_wr">
                                                        <span class="news_title">공지사항 제목</span>
                                                        <p class="news_text">도봉구 육아종합지원센터 공지사항 내용입니다. 아래 내용을 입력해주세요.</p>
                                                    </div>

                                                    <div class="sub_txt_wr">
                                                        <p class="news_date">2024.00.00</p>
                                                        <p class="news_writer">관리자</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="news_card">
                                            <a href="#none">
                                                <span class="news_subject">공지사항</span>
                                                <div class="news_contents">
                                                    <div class="main_txt_wr">
                                                        <span class="news_title">공지사항 제목</span>
                                                        <p class="news_text">도봉구 육아종합지원센터 공지사항 내용입니다. 아래 내용을 입력해주세요.</p>
                                                    </div>

                                                    <div class="sub_txt_wr">
                                                        <p class="news_date">2024.00.00</p>
                                                        <p class="news_writer">관리자</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="news_card">
                                            <a href="#none">
                                                <span class="news_subject">공지사항</span>
                                                <div class="news_contents">
                                                    <div class="main_txt_wr">
                                                        <span class="news_title">공지사항 제목</span>
                                                        <p class="news_text">도봉구 육아종합지원센터 공지사항 내용입니다. 아래 내용을 입력해주세요.</p>
                                                    </div>

                                                    <div class="sub_txt_wr">
                                                        <p class="news_date">2024.00.00</p>
                                                        <p class="news_writer">관리자</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab_inner">
                                    <ul class="list">
                                    <li class="news_card">
                                            <a href="#none">
                                                <span class="news_subject">공지사항</span>
                                                <div class="news_contents">
                                                    <div class="main_txt_wr">
                                                        <span class="news_title">공지사항 제목</span>
                                                        <p class="news_text">도봉구 육아종합지원센터 공지사항 내용입니다. 아래 내용을 입력해주세요.</p>
                                                    </div>

                                                    <div class="sub_txt_wr">
                                                        <p class="news_date">2024.00.00</p>
                                                        <p class="news_writer">관리자</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="news_card">
                                            <a href="#none">
                                                <span class="news_subject">공지사항</span>
                                                <div class="news_contents">
                                                    <div class="main_txt_wr">
                                                        <span class="news_title">공지사항 제목</span>
                                                        <p class="news_text">도봉구 육아종합지원센터 공지사항 내용입니다. 아래 내용을 입력해주세요.</p>
                                                    </div>

                                                    <div class="sub_txt_wr">
                                                        <p class="news_date">2024.00.00</p>
                                                        <p class="news_writer">관리자</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="news_card">
                                            <a href="#none">
                                                <span class="news_subject">공지사항</span>
                                                <div class="news_contents">
                                                    <div class="main_txt_wr">
                                                        <span class="news_title">공지사항 제목</span>
                                                        <p class="news_text">도봉구 육아종합지원센터 공지사항 내용입니다. 아래 내용을 입력해주세요.</p>
                                                    </div>

                                                    <div class="sub_txt_wr">
                                                        <p class="news_date">2024.00.00</p>
                                                        <p class="news_writer">관리자</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="news_card">
                                            <a href="#none">
                                                <span class="news_subject">공지사항</span>
                                                <div class="news_contents">
                                                    <div class="main_txt_wr">
                                                        <span class="news_title">공지사항 제목</span>
                                                        <p class="news_text">도봉구 육아종합지원센터 공지사항 내용입니다. 아래 내용을 입력해주세요.</p>
                                                    </div>

                                                    <div class="sub_txt_wr">
                                                        <p class="news_date">2024.00.00</p>
                                                        <p class="news_writer">관리자</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <article class="cont cont4">
                <div class="inner">
                    <div class="calendar_wr">
                        <div class="lef">
                            <div class="calendar_day_wr">
                                <a href="#none" class="cal_btn cal_prev"><i class="axi axi-chevron-left2"></i></a>
                                <span class="cal_day">2024 00</span>
                                <a href="#none" class="cal_btn cal_next"><i class="axi axi-chevron-right2"></i></a>
                            </div>

                            <div class="calendar_contents_wr">
                                <table class="calendar_table">
                                    <thead>
                                        <tr>
                                            <th class="ct01 sun">Sun</th>
                                            <th class="ct02">Mon</th>
                                            <th class="ct03">Tue</th>
                                            <th class="ct04">Wed</th>
                                            <th class="ct05">Thu</th>
                                            <th class="ct06">Fri</th>
                                            <th class="ct07 sat">Sat</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td class="empty sun"><a href="#none"></a></td>
                                            <td class="empty"><a href="#none"></a></td>
                                            <td class="empty"><a href="#none"></a></td>
                                            <td class=""><a href="#none">1</a></td>
                                            <td class="event event_tomorrow"><a href="#none">2</a></td>
                                            <td class=""><a href="#none">3</a></td>
                                            <td class="sat"><a href="#none">4</a></td>
                                        </tr>

                                        <tr>
                                            <td class="sun"><a href="#none">5</a></td>
                                            <td class=""><a href="#none">6</a></td>
                                            <td class=""><a href="#none">7</a></td>
                                            <td class="event event_today"><a href="#none">8</a></td>
                                            <td class=""><a href="#none">9</a></td>
                                            <td class=""><a href="#none">10</a></td>
                                            <td class="sat"><a href="#none">11</a></td>
                                        </tr>

                                        <tr>
                                            <td class="sun"><a href="#none">12</a></td>
                                            <td class=""><a href="#none">13</a></td>
                                            <td class=""><a href="#none">14</a></td>
                                            <td class=""><a href="#none">15</a></td>
                                            <td class=""><a href="#none">16</a></td>
                                            <td class=""><a href="#none">17</a></td>
                                            <td class="sat"><a href="#none">18</a></td>
                                        </tr>

                                        <tr>
                                            <td class="sun"><a href="#none">19</a></td>
                                            <td class=""><a href="#none">20</a></td>
                                            <td class=""><a href="#none">21</a></td>
                                            <td class=""><a href="#none">22</a></td>
                                            <td class="event event_tomorrow"><a href="#none">23</a></td>
                                            <td class=""><a href="#none">24</a></td>
                                            <td class="sat"><a href="#none">25</a></td>
                                        </tr>

                                        <tr>
                                            <td class="sun"><a href="#none">26</a></td>
                                            <td class="event event_today"><a href="#none">27</a></td>
                                            <td class=""><a href="#none">28</a></td>
                                            <td class=""><a href="#none">29</a></td>
                                            <td class=""><a href="#none">30</a></td>
                                            <td class="empty"><a href="#none"></a></td>
                                            <td class="empty sat"><a href="#none"></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="rig">
                            <div class="text_wr">
                                <div class="twbox_">
                                    <span class="title">행사일정</span>
                                    <ul class="list">
                                        <li>
                                            <span class="ball"></span>
                                            <p class="text">오늘</p>
                                        </li>

                                        <li>
                                            <span class="ball ball2"></span>
                                            <p class="text">행사/일정</p>
                                        </li>
                                    </ul>
                                </div>

                                <a href="#none" class="moreBtn_"><i class="axi axi-plus"></i></a>
                            </div>

                            <div class="contents_wr">
                                <ul class="list">
                                    <li>
                                        <div class="day_wr">
                                            <span class="day">22</span>
                                            <p class="year">2024.00</p>
                                        </div>
                                        <div class="contents">
                                            <span class="title">공지사항 제목이 노출되는 부분입니다.</span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="day_wr">
                                            <span class="day">22</span>
                                            <p class="year">2024.00</p>
                                        </div>
                                        <div class="contents">
                                            <span class="title">공지사항 제목이 노출되는 부분입니다.</span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="day_wr">
                                            <span class="day">22</span>
                                            <p class="year">2024.00</p>
                                        </div>
                                        <div class="contents">
                                            <span class="title">공지사항 제목이 노출되는 부분입니다.</span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="day_wr">
                                            <span class="day">22</span>
                                            <p class="year">2024.00</p>
                                        </div>
                                        <div class="contents">
                                            <span class="title">공지사항 제목이 노출되는 부분입니다.</span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="day_wr">
                                            <span class="day">22</span>
                                            <p class="year">2024.00</p>
                                        </div>
                                        <div class="contents">
                                            <span class="title">공지사항 제목이 노출되는 부분입니다.</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="information_wr">
                        <div class="text_wr">
                            <span class="title">이용안내</span>
                            <div class="swiper-pagination"></div>
                        </div>

                        <div class="contents_wr">
                            <div class="swiper infoSwiper">
                                <ul class="swiper-wrapper">
                                    <li class="swiper-slide">
                                        <ul class="list">
                                            <li>
                                                <div class="img_wr"><img src="<?=DIR?>/img/support/playground1_img1.png" alt="센터 이미지"></div>
                                                <div class="info_wr">
                                                    <span class="title">도봉구육아종합지원센터<br> 도담도담나눔센터 중계본동</span>
                                                    <p class="tel">02-000-0000</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="img_wr"><img src="<?=DIR?>/img/support/playground1_img2.png" alt="센터 이미지"></div>
                                                <div class="info_wr">
                                                    <span class="title">도봉구육아종합지원센터<br> 도담도담나눔센터 중계본동</span>
                                                    <p class="tel">02-000-0000</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="img_wr"><img src="<?=DIR?>/img/support/playground1_img3.png" alt="센터 이미지"></div>
                                                <div class="info_wr">
                                                    <span class="title">도봉구육아종합지원센터<br> 도담도담나눔센터 중계본동</span>
                                                    <p class="tel">02-000-0000</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="swiper-slide">
                                        <ul class="list">
                                            <li>
                                                <div class="img_wr"><img src="<?=DIR?>/img/support/playground2_img1.png" alt="센터 이미지"></div>
                                                <div class="info_wr">
                                                    <span class="title">도봉구육아종합지원센터<br> 도담도담나눔센터 중계본동</span>
                                                    <p class="tel">02-000-0000</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="img_wr"><img src="<?=DIR?>/img/support/playground2_img2.png" alt="센터 이미지"></div>
                                                <div class="info_wr">
                                                    <span class="title">도봉구육아종합지원센터<br> 도담도담나눔센터 중계본동</span>
                                                    <p class="tel">02-000-0000</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="img_wr"><img src="<?=DIR?>/img/support/playground2_img3.png" alt="센터 이미지"></div>
                                                <div class="info_wr">
                                                    <span class="title">도봉구육아종합지원센터<br> 도담도담나눔센터 중계본동</span>
                                                    <p class="tel">02-000-0000</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="swiper-slide">
                                        <ul class="list">
                                            <li>
                                                <div class="img_wr"><img src="<?=DIR?>/img/support/playground3_img1.png" alt="센터 이미지"></div>
                                                <div class="info_wr">
                                                    <span class="title">도봉구육아종합지원센터<br> 도담도담나눔센터 중계본동</span>
                                                    <p class="tel">02-000-0000</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="img_wr"><img src="<?=DIR?>/img/support/playground3_img2.png" alt="센터 이미지"></div>
                                                <div class="info_wr">
                                                    <span class="title">도봉구육아종합지원센터<br> 도담도담나눔센터 중계본동</span>
                                                    <p class="tel">02-000-0000</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="img_wr"><img src="<?=DIR?>/img/support/playground3_img3.png" alt="센터 이미지"></div>
                                                <div class="info_wr">
                                                    <span class="title">도봉구육아종합지원센터<br> 도담도담나눔센터 중계본동</span>
                                                    <p class="tel">02-000-0000</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/f_popup.php"; ?>
        </section>
    </div>
    
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/footer.php"; ?>
</body>
</html>