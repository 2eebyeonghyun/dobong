<? 
$_dep = array(6,4);
$_tit = array('커뮤니티','구인');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section notice-page job-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
			          <div id="content">
                    <div class="__greenHead2 __mb30">
                        <dl>
                            <dt>어린이집에서 채용공고를 등재할 경우,</dt>
                            <dd>
                                기관 전화번호 외의 핸드폰번호는 개인정보보호법에 따라 기록할수 없습니다.<br> 
                                도봉구육아종합지원센터 기준에 적합한 경우만 구인 등록이 가능하오니 안내사항을 반드시 확인하시기 바랍니다.
                            </dd>
                        </dl>
                    </div>

                    <form action="?" method="post" name="job_write_frm" id="job_write_frm" class="jobWriteFrm" onsubmit="return submitbtn();">
                        <table class="jobWriteFrm_table __table">
                            <colgroup>
                                <col style="width: 10%;">
                                <col style="">
                                <col style="width: 10%;">
                                <col style="">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th>공개설정</th>
                                    <td class="w100 border-bottom" colspan="3">
                                        <ul class="radio_wr grid-2">
                                            <li><input type="radio" name="public_chk" id="public_chk_Y" class="publicChk" checked><label for="public_chk_Y">모집중</label></li>
                                            <li><input type="radio" name="public_chk" id="public_chk_N" class="publicChk"><label for="public_chk_N">마감</label></li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <th>시설명</th>
                                    <td class="w100">
                                        <input type="text" name="jobfrm_company" id="jobfrm_company" class="__input">
                                    </td>

                                    <th>시설유형</th>
                                    <td class="w100 border-bottom">
                                        <select name="jobfrm_category" id="jobfrm_category" class="__select">
                                            <option value="시설유형">시설유형</option>
                                            <option value="국공립">국공립</option>
                                            <option value="법인">법인</option>
                                            <option value="민간">민간</option>
                                            <option value="직장">직장</option>
                                            <option value="가정">가정</option>
                                            <option value="부모협동">부모협동</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <th>시설장</th>
                                    <td class="w100"><input type="text" name="jobfrm_ceo" id="jobfrm_ceo" class="__input"></td>
                                    
                                    <th>아동정원</th>
                                    <td class="w100 border-bottom"><input type="text" name="jobfrm_count" id="jobfrm_count" class="__input" onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };"></td>
                                </tr>

                                <tr>
                                    <th>모집직종</th>
                                    <td class="w100 border-bottom" colspan="3">
                                        <ul class="checkbox_wr">
                                            <li><input type="checkbox" name="jobfrm_checkbox" id="checkbox1" class="__checkbox"><label for="checkbox1">보육교사</label></li>
                                            <li><input type="checkbox" name="jobfrm_checkbox" id="checkbox2" class="__checkbox"><label for="checkbox2">원장, 특수교사</label></li>
                                            <li><input type="checkbox" name="jobfrm_checkbox" id="checkbox3" class="__checkbox"><label for="checkbox3">대체교사</label></li>
                                            <li><input type="checkbox" name="jobfrm_checkbox" id="checkbox4" class="__checkbox"><label for="checkbox4">야간연장교사</label></li>
                                            <li><input type="checkbox" name="jobfrm_checkbox" id="checkbox5" class="__checkbox"><label for="checkbox5">연장보육전담교사</label></li>
                                            <li><input type="checkbox" name="jobfrm_checkbox" id="checkbox6" class="__checkbox"><label for="checkbox6">보조교사</label></li>
                                            <li><input type="checkbox" name="jobfrm_checkbox" id="checkbox7" class="__checkbox"><label for="checkbox7">보육도우미</label></li>
                                            <li><input type="checkbox" name="jobfrm_checkbox" id="checkbox8" class="__checkbox"><label for="checkbox8">조리사</label></li>
                                            <li><input type="checkbox" name="jobfrm_checkbox" id="checkbox9" class="__checkbox"><label for="checkbox9">기타</label></li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <th>연락처</th>
                                    <td class="w100">
                                        <ul class="tel_wr">
                                            <li class="select">
                                                <select name="jobfrm_tel" id="jobfrm_tel" class="__select">
                                                    <option value=02 <?if($exTel[0] == "02"){ echo"selected"; }?>>서울(02)</option>
                                                    <option value=031 <?if($exTel[0] == "031"){ echo"selected"; }?>>경기(031)</option>
                                                    <option value=032 <?if($exTel[0] == "032"){ echo"selected"; }?>>인천(032)</option>
                                                    <option value=033 <?if($exTel[0] == "033"){ echo"selected"; }?>>강원(033)</option>
                                                    <option value=041 <?if($exTel[0] == "041"){ echo"selected"; }?>>충남(041)</option>
                                                    <option value=042 <?if($exTel[0] == "042"){ echo"selected"; }?>>대전(042)</option>
                                                    <option value=043 <?if($exTel[0] == "043"){ echo"selected"; }?>>충북(043)</option>
                                                    <option value=051 <?if($exTel[0] == "051"){ echo"selected"; }?>>부산(051)</option>
                                                    <option value=052 <?if($exTel[0] == "052"){ echo"selected"; }?>>울산(052)</option>
                                                    <option value=053 <?if($exTel[0] == "053"){ echo"selected"; }?>>대구(053)</option>
                                                    <option value=054 <?if($exTel[0] == "054"){ echo"selected"; }?>>경북(054)</option>
                                                    <option value=055 <?if($exTel[0] == "055"){ echo"selected"; }?>>경남(055)</option>
                                                    <option value=061 <?if($exTel[0] == "061"){ echo"selected"; }?>>전남(061)</option>
                                                    <option value=062 <?if($exTel[0] == "062"){ echo"selected"; }?>>광주(062)</option>
                                                    <option value=063 <?if($exTel[0] == "063"){ echo"selected"; }?>>전북(063)</option>
                                                    <option value=064 <?if($exTel[0] == "064"){ echo"selected"; }?>>제주(064)</option>
                                                    <option value=070 <?if($exTel[0] == "070"){ echo"selected"; }?>>070</option>
                                                </select>
                                            </li>
                                            <li class="dash">-</li>
                                            <li class="jobfrmTel"><input type="text" name="jobfrm_tel2" id="jobfrm_tel2" class="__input jobfrmTel2" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };"></li>
                                            <li class="dash">-</li>
                                            <li class="jobfrmTel jobfrmTel2"><input type="text" name="jobfrm_tel3" id="jobfrm_tel3" class="__input jobfrmTel3" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };"></li>
                                        </ul>
                                    </td>

                                    <th>이메일</th>
                                    <td class="w100 border-bottom">
                                        <ul class="email_wr">
                                            <li class="text"><input type="text" name="email1" id="email1" class="__input"></li>
                                            <li class="dash">@</li>
                                            <li class="text"><input type="text" name="email2" id="email2" class="__input"></li>
                                            <li class="select">
                                                <select class="__select" onChange="if(this.value=='NONE'){this.form.email2.select();this.form.email2.focus();}else{this.form.email2.value=this.value;}">
                                                    <option value=NONE>직접입력</option>
                                                    <option value=chollian.net>chollian.net</option>
                                                    <option value=empal.com>empal.com</option>
                                                    <option value=freechal.com>freechal.com</option>
                                                    <option value=hanafos.com>hanafos.com</option>
                                                    <option value=hanmail.net>hanmail.net</option>
                                                    <option value=hanmir.com>hanmir.com</option>
                                                    <option value=hihome.com>hihome.com</option>
                                                    <option value=hitel.net>hitel.net</option>
                                                    <option value=intizen.com>intizen.com</option>
                                                    <option value=kebi.com>kebi.com</option>
                                                    <option value=korea.com>korea.com</option>
                                                    <option value=kornet.net>kornet.net</option>
                                                    <option value=lycos.co.kr>lycos.co.kr</option>
                                                    <option value=msn.com>msn.com</option>
                                                    <option value=naver.com>naver.com</option>
                                                    <option value=nate.com>nate.com</option>
                                                    <option value=netian.com>netian.com</option>
                                                    <option value=netsgo.com>netsgo.com</option>
                                                    <option value=orgio.net>orgio.net</option>
                                                    <option value=sayclub.com>sayclub.com</option>
                                                    <option value=shinbiro.com>shinbiro.com</option>
                                                    <option value=thrunet.com>thrunet.com</option>
                                                    <option value=unitel.co.kr>unitel.co.kr</option>
                                                    <option value=yahoo.com>yahoo.com</option>
                                                    <option value=yahoo.co.kr>yahoo.co.kr</option>
                                                </select>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <th>자격조건</th>
                                    <td class="w100 border-bottom" colspan="3">
                                        <ul class="checkbox_wr">
                                            <li><input type="checkbox" name="jobfrm_checkbox2" id="checkbox2_1" class="__checkbox"><label for="checkbox2_1">보육교사 1급</label></li>
                                            <li><input type="checkbox" name="jobfrm_checkbox2" id="checkbox2_2" class="__checkbox"><label for="checkbox2_2">보육교사 2급</label></li>
                                            <li><input type="checkbox" name="jobfrm_checkbox2" id="checkbox2_3" class="__checkbox"><label for="checkbox2_3">보육교사 3급</label></li>
                                            <li><input type="checkbox" name="jobfrm_checkbox2" id="checkbox2_4" class="__checkbox"><label for="checkbox2_4">유치원정교사 1급</label></li>
                                            <li><input type="checkbox" name="jobfrm_checkbox2" id="checkbox2_5" class="__checkbox"><label for="checkbox2_5">유치원정교사 2급</label></li>
                                            <li><input type="checkbox" name="jobfrm_checkbox2" id="checkbox2_6" class="__checkbox"><label for="checkbox2_6">기타</label></li>
                                        </ul>

                                        <input type="text" name="jobfrm_checkbox_text" id="jobfrm_checkbox_text" class="__input jobfrm_checkboxText" placeholder="그 외 자격조건을 입력해주세요">
                                    </td>
                                </tr>

                                <tr>
                                    <th>근무시간</th>
                                    <td class="w100" >
                                        <div class="time_wr">
                                            <ul class="list">
                                                <li class="select">
                                                    <select name="jobfrm_time_start_hour" id="jobfrm_time_start_hour" class="__select hour">
                                                        <option value="">00시</option>
                                                        <option value="">01시</option>
                                                        <option value="">02시</option>
                                                        <option value="">03시</option>
                                                        <option value="">04시</option>
                                                        <option value="">05시</option>
                                                        <option value="">06시</option>
                                                        <option value="">07시</option>
                                                        <option value="">08시</option>
                                                        <option value="">09시</option>
                                                        <option value="">10시</option>
                                                        <option value="">11시</option>
                                                        <option value="">12시</option>
                                                        <option value="">13시</option>
                                                        <option value="">14시</option>
                                                        <option value="">15시</option>
                                                        <option value="">16시</option>
                                                        <option value="">17시</option>
                                                        <option value="">18시</option>
                                                        <option value="">19시</option>
                                                        <option value="">20시</option>
                                                        <option value="">21시</option>
                                                        <option value="">22시</option>
                                                        <option value="">23시</option>
                                                    </select>
                                                    <select name="jobfrm_time_start_min" id="jobfrm_time_start_min" class="__select min">
                                                        <option value="">00분</option>
                                                        <option value="">15분</option>
                                                        <option value="">30분</option>
                                                        <option value="">45분</option>
                                                    </select>
                                                </li>
                                                <li class="dash">~</li>
                                                <li class="select">
                                                    <select name="jobfrm_time_end_hour" id="jobfrm_time_end_hour" class="__select hour">
                                                        <option value="">00시</option>
                                                        <option value="">01시</option>
                                                        <option value="">02시</option>
                                                        <option value="">03시</option>
                                                        <option value="">04시</option>
                                                        <option value="">05시</option>
                                                        <option value="">06시</option>
                                                        <option value="">07시</option>
                                                        <option value="">08시</option>
                                                        <option value="">09시</option>
                                                        <option value="">10시</option>
                                                        <option value="">11시</option>
                                                        <option value="">12시</option>
                                                        <option value="">13시</option>
                                                        <option value="">14시</option>
                                                        <option value="">15시</option>
                                                        <option value="">16시</option>
                                                        <option value="">17시</option>
                                                        <option value="">18시</option>
                                                        <option value="">19시</option>
                                                        <option value="">20시</option>
                                                        <option value="">21시</option>
                                                        <option value="">22시</option>
                                                        <option value="">23시</option>
                                                    </select>
                                                    <select name="jobfrm_time_end_min" id="jobfrm_time_end_min" class="__select min">
                                                        <option value="">00분</option>
                                                        <option value="">15분</option>
                                                        <option value="">30분</option>
                                                        <option value="">45분</option>
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>

                                    <th>급여</th>
                                    <td class="w100 border-bottom"><input type="text" name="jobfrm_pay" id="jobfrm_pay" class="__input"></td>
                                </tr>

                                <tr>
                                    <th>마감일</th>
                                    <td class="w100" ><input type="date" name="jobfrm_endday" id="jobfrm_endday" class="__input"></td>

                                    <th>주소</th>
                                    <td class="w100 border-bottom">
                                        <ul class="location_wr">
                                            <li class="location_1"><input type="text" name="homezipcode" id="homezipcode" class="__input"></li>
                                            <li class="location_btn_wr"><button type="button" class="location_btn" onclick="address_find();">우편번호찾기</button></li>
                                            <li class="location_2"><input type="text" name="homeaddress" id="homeaddress" class="__input"></li>
                                            <li class="location_3"><input type="text" name="homeaddress2" id="homeaddress2" class="__input"></li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <th>내용</th>
                                    <td class="w100 border-bottom" colspan="3">
                                        <textarea name="jobfrm_textarea" id="jobfrm_textarea" class="__textarea"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="button_wr __mt70">
                            <a href="?" class="cancle_btn">취소하기</a>
                            <button type="submit" class="Submitbtn">신청하기</button>
                        </div>
                    </form>
                </div>
            </div>
        </article>

        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/f_popup.php"; ?>
    </section>
</div>
<? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/footer.php"; ?>

</body>
<script src="https://ssl.daumcdn.net/dmaps/map_js_init/postcode.v2.js"></script>
<script>
    function address_find() {
        new daum
            .Postcode({
                oncomplete: function (data) {

                    // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분. 우편번호와 주소 정보를 해당 필드에 넣고, 커서를 상세주소 필드로
                    // 이동한다. 새우편주소 5자리 zonecode
                    document
                        .getElementById('homezipcode')
                        .value = data.zonecode;
                    document
                        .getElementById('homeaddress')
                        .value = data.address;

                    // 전체 주소에서 연결 번지 및 ()로 묶여 있는 부가정보를 제거하고자 할 경우, 아래와 같은 정규식을 사용해도 된다. 정규식은 개발자의
                    // 목적에 맞게 수정해서 사용 가능하다. var addr =
                    // data.address.replace(/(\s|^)\(.+\)$|\S+~\S+/g, '');
                    // document.getElementById('addr').value = addr;

                    document
                        .getElementById('homeaddress2')
                        .focus();
                }
            })
            .open();
    }
    function chgPasswd(chk) {
        if (chk) {
            document
                .getElementById("tr_newpasswd")
                .style
                .display = '';
            document
                .getElementById("tr_newpasswd2")
                .style
                .display = '';
        } else {
            document
                .getElementById("tr_newpasswd")
                .style
                .display = 'none';
            document
                .getElementById("tr_newpasswd2")
                .style
                .display = 'none';
        }
    }
</script>
<script>
    function submitbtn() {
        var f = document.job_write_frm;

        if ($("#jobfrm_company").val() == "") {
            alert("시설명을 입력해주세요");
            $("#jobfrm_company").select();
            return false;
        }

        if ($("#jobfrm_ceo").val() == "") {
            alert("시설장을 입력해주세요");
            $("#jobfrm_ceo").select();
            return false;
        }

        if ($("#jobfrm_count").val() == "") {
            alert("아동정원을 입력해주세요");
            $("#jobfrm_count").select();
            return false;
        }

        if ($("input[name=jobfrm_checkbox]:checkbox:checked").length < 1) {
            alert("모집직종을 선택해주세요");
            $("input[name=jobfrm_checkbox]").select();
            return false;
        }

        if ($("#jobfrm_tel2").val() == "") {
            alert("연락처를 입력해주세요");
            $("#jobfrm_tel2").select();
            return false;
        }

        if ($("#jobfrm_tel3").val() == "") {
            alert("연락처를 입력해주세요");
            $("#jobfrm_tel3").select();
            return false;
        }

        if ($("#email1").val() == "") {
            alert("이메일을 입력해주세요");
            $("#email1").select();
            return false;
        }

        if ($("#email2").val() == "") {
            alert("이메일을 입력해주세요");
            $("#email2").select();
            return false;
        }

        if ($("input[name=jobfrm_checkbox2]:checkbox:checked").length < 1) {
            alert("자격조건을 선택해주세요");
            $("input[name=jobfrm_checkbox2]").select();
            return false;
        }

        if ($("#jobfrm_pay").val() == "") {
            alert("급여를 입력해주세요");
            $("#jobfrm_pay").select();
            return false;
        }

        if ($("#homezipcode").val() == "") {
            alert("우편번호를 입력해주세요");
            $("#homezipcode").select();
            return false;
        }

        if ($("#homeaddress").val() == "") {
            alert("주소를 입력해주세요");
            $("#jobfrm_pay").select();
            return homeaddress;
        }

        if ($("#homeaddress2").val() == "") {
            alert("상세주소를 입력해주세요");
            $("#homeaddress2").select();
            return false;
        }

        if ($("#jobfrm_textarea").val() == "") {
            alert("내용을 입력해주세요");
            $("#jobfrm_textarea").select();
            return false;
        }

        f.action = "";
        f.submit();
    }
</script>
</html>