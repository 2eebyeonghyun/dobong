<?
$_dep = array(8,1);
$_tit = array('마이페이지','회원정보 수정');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php";
?>

<?

	//마이페이지
	if($_SESSION['member_id']){
		$modeValue = "modify";
		//본인정보
		$query	= "SELECT
							A.userid      
						  , A.idx         
						  , A.memtype1    
						  , A.memtype2    
						  , A.memtype3    
						  , A.memtype4    
						  , A.memtype5    
						  , A.passwd      
						  , A.old_passwd  
						  , A.name        
						  , A.jumin1      
						  , A.jumin2      
						  , A.job1        
						  , A.job2        
						  , A.telType     
						  , AES_DECRYPT(UNHEX(A.homephone),'DM') homephone   
						  , AES_DECRYPT(UNHEX(A.workphone),'DM') workphone
						  , AES_DECRYPT(UNHEX(A.mobile),'DM') mobile
						  , A.smsyn       
						  , A.email       
						  , A.mailyn      
						  , A.homezipcode 
						  , A.homeaddress 
						  , A.homeaddress2
						  , A.regid       
						  , A.regdate     
						  , A.modid       
						  , A.moddate     
						  , A.toyEntry    
						  , A.sisulid     
						  , A.cpName      
						  , A.cpJang      
						  , A.cpNumber    
						  , A.cpTel       
						  , A.c_cd        
						  , A.s_cd        
						  , A.status1     
						  , A.status2     
						  , A.school1     
						  , A.school2     
					  FROM ona_member A
					 WHERE A.userid='".$_SESSION['member_id']."' and A.status1!='2'";

//echo $query;

		$row		= sqlRow($query);
		//자녀정보
		$query = "select * from ona_member_family where userid='".$_SESSION["member_id"]."' and relation!='본인' and status1!='2'";
		$childRows = sqlArray($query);


		$exEmail	= explode("@", $row[email]);		
		$exHp		= explode("-", $row[mobile]);
		$exCpTel	= explode("-", $row[cpTel]);

		if ( $row[telType] == "H" ) {
			$exTel	= explode("-", $row[homephone]);
		}else{
			$exTel	= explode("-", $row[workphone]);
		}

		$style1 = "none";
		$style2 = "none";
		if($row[memtype1]=="개인") $style1 = "";
		if($row[memtype1]=="기관") $style2 = "";

	}
	//회원가입
	else{		
		$modeValue = "write";

		$style1 = "";
		$style2 = "none";
	}
?>


</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section member-page mypage-page join-page join_2-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/mypage/modify.php" class="active"><span>회원정보 수정</span></a>
                        <a href="<?=DIR?>/mypage/toy.php"><span>대여리스트</span></a>
                        <a href="<?=DIR?>/mypage/study.php"><span>온라인신청내역</span></a>
                        <a href="<?=DIR?>/mypage/leave.php"><span>회원탈퇴</span></a>
                    </div>

                    <form name="frm" method="post" action="?" onsubmit="return input_check(this);" target="procFrame">
                        <div class="__tit1">
                            <h3>회원분류 <span class="dib2 __green">※ 회원님의 분류항목을 선택해주세요.</span></h3>
                        </div>
                        
                        <div class="__memSel">
                            <div class="tbl">
                                <div class="lef">
                                    <? if( $modeValue == "write" ){ ?>
                                        <label><input type="radio" name="memtype1" value="개인" onclick="mbType();" checked> 개인회원</label>
                                        <!-- <label><input type="radio" name="memtype1" value="기관" onclick="mbType();"> 기관회원</label> -->
                                    <? }else{ ?>
                                        <input type="hidden" name="memtype1" value="<?=$row[memtype1]?>"><?=$row[memtype1]?>
                                    <? } ?>
                                </div>
                                
                                <div class="rig">
                                    <dl>
                                        <dt>개인회원 :</dt>
                                        <dd>영유아자녀를 둔 모든 양육자, 예비부모, 임신을 계획 중인 분 등</dd>
                                    </dl>
                                    <dl>
                                        <dt>기관회원 :</dt>
                                        <dd>도봉구에 소재한 어린이집 원장, 보육교직원</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>

                        <div class="barcode_wr">
                            <div class="inner">
                                <div class="text_wr">
                                    <span class="title">방학센터 대여회원 홍길동</span>
                                </div>

                                <div class="barcode_area">
                                    <!-- 바코드가 들어가게 되면 scss 부분 수정 부탁드립니다. -->
                                    <span class="barcode"></span>
                                </div>
                            </div>
                        </div>

                        <div class="__tit1 __mt50">
                            <h3>회원정보 <span class="dib2 __orange"><i class="axi axi-check"></i> 체크 항목은 필수입력 사항입니다. </span></h3>
                        </div>

                        <table class="__tblView respond">
                            <caption>TABLE</caption>
                            <colgroup>
                                <col style="width:180px;">
                                <col>
                            </colgroup>
                            
                            <tbody>
                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 회원아이디</th>
                                    <td>
                                        <input type="text" class="__inp __m-w50p" style="width:270px;" value="test0000"> &nbsp;
                                        <button type="button" class="__btn2 vat" >중복확인</button>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 비밀번호</th>
                                    <td>
                                        <input type="password" class="__inp __m-w100p" style="width:270px;">
                                        <span class="__dib ml">비밀번호는 8~20자리의 영문과 숫자와 특수문자의 혼합해주세요.</span>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 비밀번호 확인</th>
                                    <td>
                                        <input type="password" class="__inp __m-w100p" style="width:270px;">
                                        <span class="__dib ml">비밀번호를 한번 더 입력해 주세요.</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 성명</th>
                                    <td>홍길동</td>
                                </tr>
                                
                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 이메일</th>
                                    <td>
                                        <ul class="__form email __m-w100p" style="width:423px">
                                            <li><input type="text" class="__inp" value="test"></li>
                                            <li class="dash">@</li>
                                            <li><input type="text" class="__inp" name="email2" value="<?=$exEmail[1]?>"></li>
                                            <li class="space"></li>
                                            <li class="sel">
                                                <select class="__inp" onChange="if(this.value=='NONE'){this.form.email2.select();this.form.email2.focus();}else{this.form.email2.value=this.value;}">
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
                                    <th scope="row"> 전화번호</th>
                                    <td>
                                        <ul class="__form __m-w100p" style="width:423px;">
                                            <li>
                                                <select name="" id="" class="__inp">
                                                    <option value=02 selected>서울(02)</option>
                                                    <option value=031>경기(031)</option>
                                                    <option value=032>인천(032)</option>
                                                    <option value=033>강원(033)</option>
                                                    <option value=041>충남(041)</option>
                                                    <option value=042>대전(042)</option>
                                                    <option value=043>충북(043)</option>
                                                    <option value=051>부산(051)</option>
                                                    <option value=052>울산(052)</option>
                                                    <option value=053>대구(053)</option>
                                                    <option value=054>경북(054)</option>
                                                    <option value=055>경남(055)</option>
                                                    <option value=061>전남(061)</option>
                                                    <option value=062>광주(062)</option>
                                                    <option value=063>전북(063)</option>
                                                    <option value=064>제주(064)</option>
                                                    <option value=070>070</option>
                                                </select>
                                            </li>
                                            <li class="dash">-</li>
                                            <li><input type="text" class="__inp" value="000"></li>
                                            <li class="dash">-</li>
                                            <li><input type="text" class="__inp" value="0000"></li>
                                        </ul>

                                        <div class="__mt10">
                                            <label><input type="radio" checked> 집</label>
                                            <label><input type="radio"> 직장</label>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 핸드폰번호</th>
                                    <td>
                                        <ul class="__form __m-w100p" style="width:423px;">
                                            <li>
                                                <select name="hp1" class="__inp">
                                                    <option value="010" selected>010</option>
                                                    <option value="011">011</option>
                                                    <option value="016">016</option>
                                                    <option value="017">017</option>
                                                    <option value="018">018</option>
                                                    <option value="019">019</option>
                                                </select>
                                            </li>
                                            <li class="dash">-</li>
                                            <li><input type="text" class="__inp" value="000"></li>
                                            <li class="dash">-</li>
                                            <li><input type="text" class="__inp" value="0000"></li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 주소</th>
                                    <td>
                                        <ul class="__form __m-w100p" style="width:290px;">
                                            <li><input type="text" class="__inp" name="homezipcode" id="homezipcode" maxlength="7" value="08390"></li>
                                            <li class="space"></li>
                                            <li style="width:100px;"><button type="button" class="__btn2 __w100p" onclick="address_find();">우편번호찾기</button></li>
                                        </ul>
                                        <p class="__mt10"><input type="text" class="__inp" name="homeaddress" id="homeaddress" value="서울 구로구 디지털로26길 123"></p>
                                        <p class="__mt10"><input type="text" class="__inp" name="homeaddress2" id="homeaddress2" value="지플러스코오롱디지털타워 1510호"></p>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 이메일 수신여부</th>
                                    <td>
                                        <label><input type="radio" checked> 수신</label>
                                        <label><input type="radio"> 수신하지 않음</label>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> SMS서비스 수신여부</th>
                                    <td>
                                        <label><input type="radio" checked> 수신</label>
                                        <label><input type="radio"> 수신하지 않음</label>
                                    </td>
                                </tr>

                                <tr class="pay_m">
                                    <th scope="row"><i class="axi axi-check __orange"></i> 유료회원가입<br>(도서·장난감대여 등)</th>
                                    <td>
                                        <label><input type="radio" value="Y" id="toyEntry1Y" name="toyEntry1" onclick="toyEntryChange1('<?=$modeValue?>');" checked> 가입</label>
                                        <label><input type="radio" value="N" id="toyEntry1N" name="toyEntry1" onclick="toyEntryChange1('<?=$modeValue?>');"> 가입하지 않음</label>

                                        <p class="__mt10 __orange">가입시 “가입방법 및 이용방법”을 반드시 확인하세요.</p>
                                        <p class="__mt10"><a href="javascript:fadeIn('.__popBasic.popInfo');" class="__btn2">가입방법 및 이용방법</a></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- 개인 -->
                        <div class="private_m">
                            <div class="__tit1 __mt50">
                                <h3>추가정보입력 <span class="dib2 __orange"><i class="axi axi-check"></i> 체크 항목은 필수입력 사항입니다. </span></h3>
                            </div>

                            <table class="__tblView respond" id="member_style1" style="display:<?=$style1?>;">
                                <caption>TABLE</caption>
                                <colgroup>
                                    <col style="width:180px;">
                                    <col>
                                </colgroup>
                                
                                <tbody>
                                    <tr>
                                        <th scope="row"><i class="axi axi-check __orange"></i> 회원지역구분</th>
                                        <td>
                                            <label><input type="radio" value="dobong" name="member_chk" checked> 도봉구민</label>
                                            <label><input type="radio" value="seoul" name="member_chk"> 서울시민</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><i class="axi axi-check __orange"></i> 주 이용 센터</th>
                                        <td>
                                            <label><input type="radio" value="banghak" name="center_chk" checked> 방학센터</label>
                                            <label><input type="radio" value="changdong" name="center_chk"> 창동센터</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><i class="axi axi-check __orange"></i> 연회비감면<br> 대상자 여부</th>
                                        <td class="m_grid_wr">
                                            <label><input type="radio" value="redu_1" name="redu_chk" checked> 해당없음</label>
                                            <label><input type="radio" value="redu_2" name="redu_chk"> 수급권자 및 차상위계층</label>
                                            <label><input type="radio" value="redu_3" name="redu_chk"> 국가유공자</label>
                                            <label><input type="radio" value="redu_4" name="redu_chk"> 장애인세대</label>
                                            <label><input type="radio" value="redu_5" name="redu_chk"> 다둥이카드소지자</label>
                                            <label><input type="radio" value="redu_6" name="redu_chk"> 한부모가족지원법에 따른 지원대상자</label>
                                            <label><input type="radio" value="redu_7" name="redu_chk"> 기타 구청장이 인정하는 자</label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <div class="information_text_wr">
                                <ul class="list">
                                    <li><p>* 영유아 본인 혹은 부모가 감면기준에 해당되는 경우에만 감면대상입니다. (조부모 등 제외)</p></li>
                                    <li><p>* 연회비 감면 대상인 경우, 감면서류 확인 후 가입이 완료됩니다.</p></li>
                                </ul>
                            </div>
                        </div>

                        <? 
                          if($row[job2]){
                            echo "<script>
                                    job1Choice('".$row[job1]."');
                                  </script>";
                          }
                        ?>

                        <!-- 기관 -->
                        <div class="institutional_m" style="display: none">
                            <div class="__tit1 __mt50">
                                <h3>추가정보입력 <span class="dib2 __orange"><i class="axi axi-check"></i> 체크 항목은 필수입력 사항입니다. </span></h3>
                            </div>

                            <table class="__tblView respond" id="member_style2" style="display:<?=$style2?>;">
                                <caption>TABLE</caption>
                                <colgroup>
                                    <col style="width:180px;">
                                    <col>
                                </colgroup>
                                
                                <tbody>
                                    <tr>
                                        <th scope="row"><i class="axi axi-check __orange"></i> 어린이집유형</th>
                                        <td>
                                            <select name="memtype3" class="__inp">
                                                <option value="">선택하세요</option>
                                                <option value="국공립">국공립</option>
                                                <option value="사회복지법인">사회복지법인</option>
                                                <option value="법인·단체 등">법인·단체 등</option>
                                                <option value="민간" selected>민간</option>
                                                <option value="가정">가정</option>
                                                <option value="직장">직장</option>
                                                <option value="협동">협동</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row"><i class="axi axi-check __orange"></i> 종사자구분</th>
                                        <td>
                                            <select name="memtype5" class="__inp">
                                                <option value="">선택하세요</option>
                                                <option value="원장" selected>원장</option>
                                                <option value="보유교사">보유교사</option>
                                                <option value="특수교사(치료사)">특수교사(치료사)</option>
                                                <option value="간호사(간호조무사)">간호사(간호조무사)</option>
                                                <option value="영양사">영양사</option>
                                                <option value="조리원">조리원</option>
                                                <option value="기타 보육교직원">기타 보육교직원</option>
                                            </select>
                                        </td>
                                    </tr>
                    
                                    <tr>
                                        <th scope="row"><i class="axi axi-check __orange"></i> 어린이집명</th>
                                        <td class="flexbox">
                                            <input name="cpName" type="text" class="__inp company_search_textbox" value="A어린이집">
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row"><i class="axi axi-check __orange"></i> 어린이집 전화번호</th>
                                        <td>
                                            <ul class="__form __m-w100p" style="width:423px;">
                                                <li>
                                                    <select name="cpTel1" class="__inp">
                                                        <option value=02 selected>서울(02)</option>
                                                        <option value=031>경기(031)</option>
                                                        <option value=032>인천(032)</option>
                                                        <option value=033>강원(033)</option>
                                                        <option value=041>충남(041)</option>
                                                        <option value=042>대전(042)</option>
                                                        <option value=043>충북(043)</option>
                                                        <option value=051>부산(051)</option>
                                                        <option value=052>울산(052)</option>
                                                        <option value=053>대구(053)</option>
                                                        <option value=054>경북(054)</option>
                                                        <option value=055>경남(055)</option>
                                                        <option value=061>전남(061)</option>
                                                        <option value=062>광주(062)</option>
                                                        <option value=063>전북(063)</option>
                                                        <option value=064>제주(064)</option>
                                                        <option value=070>070</option>
                                                    </select>
                                                </li>
                                                <li class="dash">-</li>
                                                <li><input type="text" class="__inp" name="cpTel2" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="000"></li>
                                                <li class="dash">-</li>
                                                <li><input type="text" class="__inp" name="cpTel3" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="0000"></li>
                                            </ul>
                                        </td>
                                    </tr>

                                    <!-- <tr>
                                        <th scope="row"><i class="axi axi-check __orange"></i> 장난감/도서 대여 회원가입</th>
                                        <td>
                                            <label><input type="radio" value="Y" name="toyEntry2" checked onclick="toyEntryChange2('<?=$modeValue?>');"> 가입</label>
                                            <label><input type="radio" value="N" name="toyEntry2" <? if($row['toyEntry'] == "N"){ echo "checked"; } ?> onclick="toyEntryChange2('<?=$modeValue?>');"> 가입하지 않음</label>
                                            <p class="__mt10 __orange">가입시 “가입방법 및 이용방법”을 반드시 확인하세요.</p>
                                            <p class="__mt10"><a href="javascript:fadeIn('.__popBasic.popInfo');" class="__btn2">가입방법 및 이용방법</a></p>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>

                        <script language="javascript">
                            function _f_add(){
                              var tmpChildTable = document.getElementById("childTable");
                              var tmpHiddenChildTable = document.getElementById("hiddenChildTable");

                              tmpChildTable.appendChild(document.getElementById("hiddenChildTable").rows[0].cloneNode(true));
                            }
                            function _f_del(obj){
                              var tmpObj = obj;
                              while(tmpObj.nodeName!="TR"){
                                tmpObj = tmpObj.parentNode;
                              }
                              tmpObj.parentNode.removeChild(tmpObj);
                            }
                        </script>

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

                        <!-- 가족정보입력 -->
                        <div class="__tit1 __mt50">
                            <h3>가족정보입력 <span class="dib2 __green">※ 가족 구성원이 센터를 함께 이용할 경우 등록해주시기 바랍니다. (배우자 등)</span></h3>
                        </div>

                        <div class="__m __mb20"><button type="button" class="__btn2 _add2">추가</button></div>

                        <table class="__tbl fix respond3" style="border-top-color:#222;">
                            <caption>TABLE</caption>
                            <colgroup class="__p">
                                <col style="width:120px;">
                                <col style="width:20%;">
                                <col>
                                <col style="width:15%;">
                                <col style="width:25%;">
                            </colgroup>

                            <thead>
                                <tr>
                                    <th scope="col"><button type="button" class="__btn2 _add2">추가</button></th>
                                    <th scope="col">이름</th>
                                    <th scope="col">생년월일</th>
                                    <th scope="col">성별</th>
                                    <th scope="col">관계</th>
                                </tr>
                            </thead>

                            <tbody class="_addThis2">
                                <?
                                if($childRows){
                                  foreach($childRows as $k => $childrow){
                                ?>
                                
                                <tr>
                                    <td data-th="삭제">-</td>
                                    <td data-th="이름">
                                        <input type="hidden" name="tmp_family_idx[]" value="<?=$childrow['idx']?>">
                                        <input name="tmp_childName[]" type="text" class="__inp" value="<?=$childrow['name']?>" style="width:80px;ime-mode:active;">
                                    </td>
                                    <td data-th="생년월일">
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

                                    <td data-th="성별">
                                      <select name="tmp_csex[]" class="__inp">
                                          <option value="1" <?=$tmp_jumin[1]=="1" || $tmp_jumin[1]=="3"?"selected":""?>>남</option>
                                          <option value="2" <?=$tmp_jumin[1]=="2" || $tmp_jumin[1]=="4"?"selected":""?>>여</option>
                                      </select>
                                    </td>

                                    <td data-th="관계">
                                        <select name="tmp_parents[]" class="__inp">
                                            <option value="부">부</option>
                                            <option value="모">모</option>
                                            <option value="조부">조부</option>
                                            <option value="조모">조모</option>
                                            <option value="기타">기타</option>
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
                                      <td data-th="이름"><input type="text" class="__inp" name="childName[]"></td>
                                      <td data-th="생년월일">
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
                                    <td data-th="성별">
                                        <select name="csex[]" class="__inp">
                                            <option value="1" selected>남</option>
                                            <option value="2">여</option>
                                        </select>
                                    </td>
                                    <td data-th="관계">
                                        <select name="tmp_parents[]" class="__inp">
                                            <option value="부">부</option>
                                            <option value="모">모</option>
                                            <option value="조부">조부</option>
                                            <option value="조모">조모</option>
                                            <option value="기타">기타</option>
                                        </select>
                                    </td>
                                </tr>

                                <? } ?>
                            </tbody>
                        </table>

                        <div class="__botArea">
                            <div class="cen">
                                <a href="#" class="__btn1 gray">취소</a> &nbsp;
                                <button type="submit" class="__btn1" onclick="?">확인</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </article>

        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/f_popup.php"; ?>
    </section>
</div>

<? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/footer.php"; ?>


<div class="__popBasic popInfo">
	  <div class="inner">
        <div class="title">
            <h3>장난감 / 도서 대여 회원가입 안내</h3>
            <button type="button" class="close _close" onclick="fadeOut($(this).closest('.__popBasic'));"><i class="axi axi-close"></i></button>
        </div>

        <div class="desc">
            <div class="__tit1">
                <h3>회원별 연회비 및 구비서류</h3>
            </div>

            <table class="__tbl type2">
                <caption>TABLE</caption>
                <colgroup>
                    <col style="width:100px;">
                    <col>
                </colgroup>

                <thead>
                    <tr>
                        <th scope="col">회원구분</th>
                        <th scope="col">회원별 가입안내</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>기관회원</td>
                        <td class="tal">
                            <dl class="__popDl">
                                <dt>[회원자격]</dt>
                                <dd>동대문구 소재 어린이집</dd>
                            </dl>
                            <dl class="__popDl">
                                <dt>[연회비]</dt>
                                <dd>20,000원(대관료 포함)</dd>
                            </dl>
                            <dl class="__popDl">
                                <dt>[구비서류]</dt>
                                <dd>회원가입 신청서, 고유 번호증 또는 어린이집 인가증</dd>
                            </dl>
                        </td>
                    </tr>

                    <tr>
                        <td>개인회원</td>
                        <td class="tal">
                            <dl class="__popDl">
                                <dt>[회원자격]</dt>
                                <dd>만 5세 이하의 영유아 자녀를 둔 동대문구 주민, 예비부모 동대문구 소재 어린이집 보육교직원</dd>
                            </dl>
                            <dl class="__popDl">
                                <dt>[연회비]</dt>
                                <dd>10,000원</dd>
                            </dl>
                            <dl class="__popDl">
                                <dt>[구비서류]</dt>
                                <dd>회원가입 신청서, 신분증, 주민등록등본1부</dd>
                            </dl>
                        </td>
                    </tr>

                    <tr>
                        <td>학생회원</td>
                        <td class="tal">
                            <dl class="__popDl">
                                <dt>[회원자격]</dt>
                                <dd>보육관련학과 대학생</dd>
                            </dl>
                            <dl class="__popDl">
                                <dt>[연회비]</dt>
                                <dd>10,000원</dd>
                            </dl>
                            <dl class="__popDl">
                                <dt>[구비서류]</dt>
                                <dd>회원가입 신청서, 학생증</dd>
                            </dl>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="__tit1 __mt50">
                <h3>회원 가입방법 및 이용방법</h3>
            </div>

            <table class="__tbl type2">
                <caption>TABLE</caption>
                <colgroup>
                    <col style="width:100px;">
                    <col>
                </colgroup>
                <thead>
                    <tr>
                        <th scope="col">회원구분</th>
                        <th scope="col">회원별 가입안내</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>가입방법</td>
                        <td>홈페이지에서 회원가입(제출서류) → 동대문구육아종합지원센터에서 가입신청서 작성 및 연회비 납부 → 회원카드 발급 → 장난감 및 도서 대여 가능</td>
                    </tr>

                    <tr>
                        <td>이용방법</td>
                        <td class="tal">
                            <dl class="__popDl">
                                <dt>[개인회원]</dt>
                                <dd>1회 장난감 2점, 도서 3권 대여, 7일 대여(7일 연장 가능) 장난감을 대여하지 않을경우 도서 5권 대여 </dd>
                            </dl>
                            <dl class="__popDl">
                                <dt>[기관회원]</dt>
                                <dd>1회 장난감 5점, 도서 5권 대여, 7일 대여(7일 연장 가능) 장난감을 대여하지 않을경우 도서 10권 대여 </dd>
                            </dl>
                            <dl class="__popDl">
                                <dt>[학생회원]</dt>
                                <dd>1회 장난감 2점, 도서 3권 대여, 7일 대여(7일 연장 가능) 장난감을 대여하지 않을경우 도서 5권 대여 </dd>
                            </dl>
                        </td>
                    </tr>
                </tbody>
            </table>

            <ul class="__dotlist dang __txt14 __orange __mt15">
                <li>기초생활수급권자 및 차상위계층, 장애인 가족 무료(관계서류 구비)</li>
                <li>다둥이 행복카드 발급가정, 한부모 가족 지원법에 의한 보호대상자 전액 무료</li>
                <li>
                    회원 가입시 모든 구비서류를 제출해야만 회원가입이 가능합니다.<br>
                    (주민등록등본1부, 장애인 가종은 복지카드, 다둥이행복카드발급가정은 다둥이 행복카드,	기초생활수급권자 및 차상위계층은 수그바증명서를 꼭 지참해야 회원가입 가능)
                </li>
            </ul>
        </div>
    </div>

    <div class="bg _close" onclick="fadeOut($(this).closest('.__popBasic'));"></div>
</div>

<div class="compopup_wr">
  <form action="?" method="post" name="compop_frm" id="compop_frm" class="compopfrm">
      <div class="search_wr">
          <input type="text" class="__input">
          <button type="button" class="search_btn">검색</button>
      </div>
      <div class="company_list">
          <ul class="list">
              <li><a href="#none">테스트 어린이집</a></li>
              <li><a href="#none">테스트 어린이집</a></li>
              <li><a href="#none">테스트 어린이집</a></li>
              <li><a href="#none">테스트 어린이집</a></li>
              <li><a href="#none">테스트 어린이집</a></li>
              <li><a href="#none">테스트 어린이집</a></li>
              <li><a href="#none">테스트 어린이집</a></li>
              <li><a href="#none">테스트 어린이집</a></li>
              <li><a href="#none">테스트 어린이집</a></li>
              <li><a href="#none">테스트 어린이집</a></li>
          </ul>
      </div>

      <a href="#none" class="compopup_close_btn">닫기</a>
  </form>
</div>

</body>
<script language="javascript" src="../../include/js/member.js"></script>
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
    document.addEventListener('DOMContentLoaded', function () {
        const private_m = document.querySelector('.private_m');
        const barcode_wr = document.querySelector('.barcode_wr');
        const radioY = document.getElementById('toyEntry1Y');
        const radioN = document.getElementById('toyEntry1N');

        function toggleBox() {
            if (radioY.checked) {
                private_m.style.display = 'block';
                barcode_wr.style.display = 'block';
            } else if (radioN.checked) {
                private_m.style.display = 'none';
                barcode_wr.style.display = 'none';
            }
        }

        // 이벤트 리스너 등록
        radioY.addEventListener('change', toggleBox);
        radioN.addEventListener('change', toggleBox);

        // 페이지 로드 시 초기 상태 설정
        toggleBox();
    });
</script>

<script>
    $(document).ready(function(){
        $("input:radio[name=memtype1]").click(function(){
            if($("input[name=memtype1]:checked").val() == "기관"){
                $(".pay_m").css("display","table-row");
                $(".pay_m").css("display","none");
                $(".institutional_m").css("display","block");
                $(".private_m").css("display","none");
            }else if($("input[name=memtype1]:checked").val() == "개인"){
                $(".pay_m").css("display","none");
                $(".pay_m").css("display","table-row");
                $(".institutional_m").css("display","none");
            }
        }); 
    });
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

<!-- 가족정보입력 추가 스크립트 -->
<script>
  function addDel(a) {
      $(a)
          .closest('tr')
          .remove();
  }

  $('._add2').on('click', function () {
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
      html+='</select>'; html+='</li>'; html+='</ul>'; html+='</td>'; html+='<td data-th="자녀 성별">'; html+='<select name="csex[]" class="__inp">'; html+='<option value="1" selected="selected">남</option>'; html+='<option value="2">여</option>'; html+='</select>'; html+='<td data-th="관계">'; html+='<select name="parents[]" class="__inp">'; html+='<option value="1" selected="selected">부</option>'; html+='<option value="2">모</option>'; html+='<option value="2">조부</option>'; html+='<option value="2">조모</option>'; html+='<option value="2">기타</option>'; html+='</select>'; html+='</tr>';

      $('._addThis2').append(html);
  });
</script>
</html>