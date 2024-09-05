<? 
$_dep = array(3,4,2);
$_tit = array('가정양육지원','발달지원 및 치료','영유아발달지원사업');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section support-page sub04-page sub04-2-page frm-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/support/treatment.php"><span>언어 및 놀이치료</span></a>
                        <a href="<?=DIR?>/support/treatment2.php" class="active"><span>영유아발달지원사업</span></a>
                        <a href="<?=DIR?>/support/treatment3.php"><span>양육상담</span></a>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>영유아발달 지원사업</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>기본검사를 통해 영유아의 전반적인 발달을 확인하고, 역기능적인 행동파악 및 부모의 양육태도검사 결과를 종합하여 발달지연 아동을 선별합니다. 기본검사 결과 발달지연이 의심되는 아동은 심층검사를 진행한 뒤 치료가 필요할 경우 상담 및 치료기관에 연계합니다.</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>이용대상</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>주민등록상 도봉구에 거주하는 24개월~6세 미만의 영유아 ※ 해당 기간 중 1회만 참여가능</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>이용내용 및 이용료</h3>
                        </div>

                        <div class="table_wr __mt30">
                            <table class="__table">
                                <colgroup>
                                    <col style="width: 20%;">
                                    <col style="width: 80%;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th>기본검사(무료)</th>
                                        <td>영유아발달검사(K-CDI), 영유아행동평가척도(CBCL1.5-5), 부모양육태도검사(PAT)</td>
                                    </tr>
                                    <tr>
                                        <th>심층검사(무료)</th>
                                        <td>웩슬러 지능검사, 사회정서평가, 언어종합검사, 심리발달종합검사</td>
                                    </tr>
                                    <tr>
                                        <th>치료 및 상담연계(자부담 비용 발생)</th>
                                        <td>언어치료, 놀이치료</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>이용방법</h3>
                        </div>

                        <ul class="list_box_wr grid-4">
                            <li>신청서 접수</li>
                            <li>기본검사 실시</li>
                            <li>심층검사 실시</li>
                            <li>치료연계</li>
                        </ul>

                        <ul class="__dotlist __txt15 __mt20">
                            <li>온라인 신청서를 접수하시면 담당자가 지원대상 확인 후 입력하신 휴대전화번호로 기본검사 3종 (온라인 검사지)을 발송해드립니다.</li>
                            <li>기본검사 결과는 2주 이내 신청자 메일로 발송되며, 기본검사 결과에 대한 임상심리사의 소견에 따라 영유아의 심층검사 여부가 결정됩니다.</li>
                            <li>심층검사 필요 시에는 도봉구육아종합지원센터(창동)에서 검사가 진행될 예정이며, 임상심리사의 임상적 면담에 따라 기본검사 결과와 다른 심리검사도구가 시행될 수 있습니다.</li>
                            <li>심층검사 후 아동에게 상담 및 치료가 필요하다고 판단이 될 경우 전문기관에 연계해드립니다.</li>
                        </ul>

                        <!-- <div class="__mt50 tac">
                            <a href="<?=DIR?>/support/treatment2_frm.php" target="_blank" class="__btn4">온라인 신청서 제출하기</a>
                        </div> -->
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>영유아발달 신호등 신청서</h3>
                        </div>

                        <form name="treatment_frm" id="treatment_frm" class="treatmentFrm" method="post" action="?" onsubmit="return submitbtn();" autocomplete="off">
                            <table class="treatment2_table __table">
                                <colgroup>
                                    <col style="width: 20%;">
                                    <col style="width: 30%;">
                                    <col style="width: 20%;">
                                    <col style="width: 30%;">
                                </colgroup>

                                <tbody>
                                    <tr>
                                        <th class="title_zo">신청자명</th>
                                        <td>
                                            <input type="text" name="counseling_name" id="counseling_name" class="__input counselingName">
                                        </td>

                                        <th class="title_zo border-bottom">휴대폰번호</th>
                                        <td class="border-bottom">
                                            <input type="text" name="counseling_tel" id="counseling_tel" class="__input counselingTel" maxlength="13" oninput="autoHyphen2(this)">
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="title_zo border-bottom mobile-w100">주소</th>
                                        <td class="border-bottom mobile-w100" colspan="3">
                                            <div class="location_wr">
                                                <div class="row">
                                                    <input type="text" id="sample6_postcode" class="__input location_1" placeholder="우편번호">
                                                    <input type="button" onclick="sample6_execDaumPostcode()" class="location_2" value="우편번호 찾기"><br>
                                                </div>

                                                <div class="row">
                                                    <input type="text" id="sample6_address" class="__input location_3" placeholder="주소"><br>
                                                    <input type="text" id="sample6_detailAddress" class="__input location_4" placeholder="상세주소">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="title_zo border-bottom mobile-w100">이메일</th>
                                        <td class="border-bottom mobile-w100" colspan="3">
                                            <div class="email_wr">
                                                <input type="email" name="counseling_email1" id="counseling_email1" class="__input counselingEmail1" placeholder="이메일">
                                                <p>@</p>
                                                <input type="email" name="counseling_email2" id="counseling_email2" class="__input counselingEmail2" placeholder="직접입력">
                                                <select name="selectEmail" id="selectEmail" class="selectEmail">
                                                    <option value="1">직접입력</option>
                                                    <option value="naver.com">naver.com</option>
                                                    <option value="hanmail.net">hanmail.net</option>
                                                    <option value="nate.com">nate.com</option>
                                                    <option value="yahoo.co.kr">yahoo.co.kr</option>
                                                    <option value="gmail.com">gmail.com</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>주 호소 문제를 자세히 작성해주세요</th>
                                        <td class="w100 border-bottom" colspan="3">
                                            <textarea name="counseling_information" id="counseling_information" class="__textarea counseling" placeholder="* 발생한 시기, 촉발요인 등"></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>문제행동에 대처하기 위해 가정에서 시도해 보신 훈육 방법은 무엇입니까?</th>
                                        <td class="w100 border-bottom" colspan="3">
                                            <textarea name="counseling_information2" id="counseling_information2" class="__textarea counseling" placeholder=""></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>이전에 상담 및 치료경험이 있습니까?</th>
                                        <td class="w100 border-bottom" colspan="3">
                                            <textarea name="counseling_information3" id="counseling_information3" class="__textarea counseling" placeholder="* 치료의 유형, 기간, 호전 정도 등"></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- 자녀정보입력 -->
                            <div class="__tit1 __mt50">
                                <h3>자녀정보입력 <span class="dib2 __green">※ 자녀 생년월일은 수정이 불가능하오니 정확히 입력해주시기 바랍니다.</span></h3>
                            </div>
                            
                            <div class="__m __mb20"><button type="button" class="__btn2 _add">자녀추가</button></div>

                            <table class="__tbl fix respond3" style="border-top-color:#222;">
                                <caption>TABLE</caption>
                                <colgroup class="__p">
                                    <col style="width:120px;">
                                    <col style="width:20%;">
                                    <col>
                                    <col style="width:15%;">
                                </colgroup>

                                <thead>
                                    <tr>
                                        <th scope="col"><button type="button" class="__btn2 _add">자녀추가</button></th>
                                        <th scope="col">자녀이름</th>
                                        <th scope="col">자녀 생년월일</th>
                                        <th scope="col">자녀 성별</th>
                                    </tr>
                                </thead>

                                <tbody class="_addThis">
                                    <?
                                    if($childRows){
                                      foreach($childRows as $k => $childrow){
                                    ?>
                                    
                                    <tr>
                                        <td data-th="삭제">-</td>
                                        <td data-th="자녀이름">
                                            <input type="hidden" name="tmp_family_idx[]" value="<?=$childrow['idx']?>">
                                            <input name="tmp_childName[]" type="text" class="__inp" value="<?=$childrow['name']?>" style="width:80px;ime-mode:active;">
                                        </td>
                                        <td data-th="자녀 생년월일">
                                            <ul class="__form" style="width:100%;">
                                                <li style="width:35%;">
                                                    <?
                                                      $tmp_jumin = explode("-",$childrow["jumin"]);
                                                      $tmp_birth1 = substr($tmp_jumin[0],0,2);
                                                      if($tmp_jumin[1] > 2) { $tmp_birth1 = "20".$tmp_birth1; } else { $tmp_birth1 = "19".$tmp_birth1; }
                                                      $tmp_birth2 = substr($tmp_jumin[0],2,2);
                                                      $tmp_birth3 = substr($tmp_jumin[0],4,2);
                                                    ?>
                                                    
                                                    <select name='tmp_cbirth1[]' class="__inp">
                                                        <? for ($y = date("Y"); $y >= date("Y")-110; $y--) { 
                                                            if($m < 10) {$m = "0".$m;}
                                                        ?>
                                                        <option value='<?=$y?>' <? if($y == $tmp_birth1){?>selected<?}?>><?=$y?></option>
                                                        <? } ?>
                                                    </select>
                                                </li>
                                                <li class="dash">-</li>
                                                <li>
                                                    <select name='tmp_cbirth2[]' class="__inp">
                                                        <? for ($m = 1; $m < 13; $m++) { 
                                                            if($m < 10) {$m = "0".$m;}
                                                          ?>	
                                                            <option value='<?=$m?>' <? if($m == $tmp_birth2){?>selected<?}?>><?=$m?></option>
                                                          <? } ?>
                                                    </select>
                                                </li>
                                                <li class="dash">-</li>
                                                <li>
                                                    <select name='tmp_cbirth3[]' class="__inp">
                                                        <? for ($d = 1; $d < 32; $d++) { 
                                                          if($d < 10) { $d = "0".$d;}
                                                        ?>
                                                          <option value='<?=$d?>' <? if($d == $tmp_birth3){?>selected<?}?>><?=$d?></option>
                                                        <? } ?>
                                                    </select>
                                                </li>
                                            </ul>
                                        </td>

                                        <td data-th="자녀 성별">
                                          <select name="tmp_csex[]" class="__inp">
                                              <option value="1" <?=$tmp_jumin[1]=="1" || $tmp_jumin[1]=="3"?"selected":""?>>남</option>
                                              <option value="2" <?=$tmp_jumin[1]=="2" || $tmp_jumin[1]=="4"?"selected":""?>>여</option>
                                          </select>
                                        </td>
                                    </tr>

                                    <?
                                      }
                                    }
                                    
                                    else{
                                      ?>
                                      
                                      <tr>
                                          <td data-th="삭제">-</td>
                                          <td data-th="자녀이름"><input type="text" class="__inp" name="childName[]"></td>
                                          <td data-th="자녀 생년월일">
                                              <ul class="__form" style="width:100%;">
                                                  <li style="width:35%;">
                                                      <select name='cbirth1[]' class="__inp">
                                                          <? for ($y = date("Y"); $y >= date("Y")-110; $y--) { 
                                                              if($m < 10) {$m = "0".$m;}
                                                            ?>	
                                                              <option value='<?=$y?>' <? if($y == date("Y")){?>selected<?}?>><?=$y?></option>
                                                            <? } ?>
                                                      </select>
                                                  </li>
                                                  <li class="dash">-</li>
                                                  <li>
                                                      <select name='cbirth2[]' class="__inp">
                                                        <? for ($m = 1; $m < 13; $m++) { 
                                                            if($m < 10) {$m = "0".$m;}
                                                          ?>	
                                                            <option value='<?=$m?>' <? if($m == date("m")){?>selected<?}?>><?=$m?></option>
                                                          <? } ?>
                                                      </select>
                                                  </li>
                                                  <li class="dash">-</li>
                                                  <li>
                                                      <select name='cbirth3[]' class="__inp">
                                                          <? for ($d = 1; $d < 32; $d++) { 
                                                            if($d < 10) { $d = "0".$d;}
                                                          ?>
                                                            <option value='<?=$d?>' <? if($d == date("d")){?>selected<?}?>><?=$d?></option>
                                                          <? } ?>
                                                      </select>
                                                  </li>
                                              </ul>
                                        </td>
                                        <td data-th="자녀 성별">
                                            <select name="csex[]" class="__inp">
                                                <option value="1" selected>남</option>
                                                <option value="2">여</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <? } ?>
                                </tbody>
                            </table>

                            <!-- 개인정보 수집 및 이용 동의서 -->
                            <div class="agree_wr __mt50">
                                <span class="title">개인정보 수집 및 이용 동의서</span>
                                
                                <ul class="dot_list __mt20">
                                    <li>도봉구육아종합지원센터(창동)에서는 영유아발달 신호등 진행 및 치료연계를 위해 아래와 같이 개인정보를 수집 및 이용하고자 합니다.</li>
                                </ul>

                                <div class="table_wr __mt30">
                                    <table class="__table">
                                        <colgroup>
                                            <col style="width: 20%;">
                                            <col style="width: 80%;">
                                        </colgroup>

                                        <tbody>
                                            <tr>
                                                <th class="border-right">수집 및 이용</th>
                                                <td class="w100 border-bottom">
                                                    <!-- <span class="title">(수집, 이용 목적)</span> -->
                                                    성명, 연락처, 생년월일, 주소, 이메일주소, 의뢰사유, 검사결과를 수집합니다. 수집된 개인정보는 관련 법령의 규정에 의해 3년이 지나면 폐기됩니다.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="border-right">개인정보 제3자 제공 동의</th>
                                                <td class="w100 border-bottom">참여자의 개인정보는 검사 진행 및 치료 연계 등을 위해 상담사 또는 관련 기관에 제공될 수 있습니다.</td>
                                            </tr>
                                            <tr class="textRight">
                                                <td colspan="2" class="w100 border-bottom">
                                                    <span class="title">개인 정보 이용에 동의하십니까?</span>
                                                    <ul class="agree_list __mt5">
                                                        <li><input type="radio" name="agree_" id="agree_Y" class="agree_radio"><label for="agree_Y">동의함</label></li>
                                                        <li><input type="radio" name="agree_" id="agree_N" class="agree_radio"><label for="agree_N">동의하지 않음</label></li>
                                                    </ul>
                                                    <p class="information_txt">(* 미동의시 상담이 진행되지 않습니다.)</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="agree_wr2 __mt30">
                                    <div class="frmdate_wr">
                                        <p class="year">2024년</p>
                                        <p class="month">05월</p>
                                        <p class="day">14일</p>
                                    </div>
                                </div>
                            </div>

                            <div class="button_wr __mt70">
                                <a href="<?=DIR?>/study/center_4.php" class="cancle_btn">취소하기</a>
                                <button type="submit" class="Submitbtn">신청하기</button>
                            </div>
                        </form>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>문의</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>02-994-3341 (화요일-토요일 09:00~18:00)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </article>

        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/f_popup.php"; ?>
    </section>
</div>

<? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/footer.php"; ?>

</body>
<script language="javascript" src="../../include/js/member.js"></script>
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
    function sample6_execDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var addr = ''; // 주소 변수
                var extraAddr = ''; // 참고항목 변수

                //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                    addr = data.roadAddress;
                } else { // 사용자가 지번 주소를 선택했을 경우(J)
                    addr = data.jibunAddress;
                }

                // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                if(data.userSelectedType === 'R'){
                    // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                    // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                    if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있고, 공동주택일 경우 추가한다.
                    if(data.buildingName !== '' && data.apartment === 'Y'){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                    if(extraAddr !== ''){
                        extraAddr = ' (' + extraAddr + ')';
                    }
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('sample6_postcode').value = data.zonecode;
                document.getElementById("sample6_address").value = addr;
                // 커서를 상세주소 필드로 이동한다.
                document.getElementById("sample6_detailAddress").focus();
            }
        }).open();
    }
</script>

<!-- 자녀정보입력 추가 스크립트 -->
<script>
    function addDel(a) {
        $(a)
            .closest('tr')
            .remove();
    }

    $('._add').on('click', function () {
        var html = '<tr>';
        html += '<td data-th="삭제">';

        var html = '<tr>';
        html += '<td data-th="삭제">';
        html += '<button type="button" class="__del" onclick="addDel(this);"><i class="axi axi-' +
                'close"></i></button>';
        html += '</td>';
        html += '<td data-th="자녀이름">';
        html += '<input type="text" class="__inp" name="childName[]">';
        html += '</td>';
        html += '<td data-th="자녀 생년월일">';
        html += '<ul class="__form" style="width:100%;">';
        html += '<li style="width:35%;">';
        html += '<select name="cbirth1[]" class="__inp">';
        <? for ($y = date("Y"); $y >= date("Y")-110; $y--) { if($m < 10) {$m = "0".$m;}?>	
	      html+='<option value="<?=$y?>" <? if($y == date("Y")){?>selected<?}?>><?=$y?></option>';
        <? } ?>
        html+='</select>'; html+='</li>'; html+='<li class="dash">-</li>'; html+='<li>'; html+='<select name="cbirth2[]" class="__inp">';
        <? for ($m = 1; $m < 13; $m++) { if($m < 10) {$m = "0".$m;}?>
	      html+='<option value="<?=$m?>" <? if($m == date("m")){?>selected<?}?>><?=$m?></option>';
        <? } ?>
        html+='</select>'; html+='</li>'; html+='<li class="dash">-</li>'; html+='<li>'; html+='<select name="cbirth3[]" class="__inp">';
        <? for ($d = 1; $d < 32; $d++) { if($d < 10) { $d = "0".$d;}?>
	      html+='<option value="<?=$d?>" <? if($d == date("d")){?>selected<?}?>><?=$d?></option>';
        <? } ?>
        html+='</select>'; html+='</li>'; html+='</ul>'; html+='</td>'; html+='<td data-th="자녀 성별">'; html+='<select name="csex[]" class="__inp">'; html+='<option value="1" selected="selected">남</option>'; html+='<option value="2">여</option>'; html+='</select>'; html+='</tr>';

	      $('._addThis').append(html);
    });
</script>

<script>
    function submitbtn() {
        var f = document.treatment_frm;

        if (!f.agree_Y.checked) {
            alert('개인정보 수집 및 이용 동의서 동의 여부를 체크해주세요');
            return false;
        }

        if ($.trim($("#counseling_name").val()) == "") {
            alert("신청자명을 입력해주세요");
            $("#counseling_name").select();
            return false;
        }

        if ($("#counseling_tel").val() == "") {
            alert("연락처를 선택해주세요");
            $("#counseling_tel").select();
            return false;
        }

        if ($.trim($("#counseling_tel").val()).length < 10 || $.trim($("#counseling_tel").val()).length > 13) {
            alert("연락처는 10~13자리 입니다");
            $("#counseling_tel").select();
            return false;
        }

        if ($("#sample6_address").val() == "") {
            alert("주소를 입력해주세요");
            $("#sample6_address").select();
            return false;
        }

        if ($("#sample6_detailAddress").val() == "") {
            alert("상세주소를 입력해주세요");
            $("#sample6_detailAddress").select();
            return false;
        }

        if ($("#counseling_email1").val() == "") {
            alert("이메일을 입력해주세요");
            $("#counseling_email1").select();
            return false;
        }

        if ($("#counseling_email2").val() == "") {
            alert("이메일을 선택해주세요");
            $("#counseling_email2").select();
            return false;
        }

        f.action = "";
        f.submit();
    }
</script>
</html>