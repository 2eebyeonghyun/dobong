<?
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

//$pno = "060101";
//$view_url = "notice_view.php";
?>

<?
$_dep = array(8,1);
$_tit = array('마이페이지','회원정보 수정');
include $_SERVER['DOCUMENT_ROOT']."/new/include/common.php";
?>

<?include_once PATH.'/inc/board_config.php';?>

<?

/*
	$consent		= trim($_POST['consent']);
	$name			= trim($_POST['name']);
	$jumin1			= trim($_POST['jumin1']);
	$jumin2			= trim($_POST['jumin2']);

	if(!$_SESSION['member_id']) {
		if(!$_SESSION['dupInfo']){
			echo "<script>alert('잘못된 접근입니다.[D033]');history.back();</script>";
			exit;
		}
		if($consent!="Y") {
			echo "<script>alert('잘못된 접근입니다.[C038]');history.back();</script>";
			exit;
		}
		if(!$name) {
			echo "<script>alert('잘못된 접근입니다.[N0312]');history.back();</script>";
			exit;
		}
	}

  */

  /*

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
		$style3 = "none";
		if($row[memtype1]=="개인") $style1 = "";
		if($row[memtype1]=="기관") $style2 = "";
		if($row[memtype1]=="학생") $style3 = "";

	}
	//회원가입
	else{		
		$modeValue = "write";

		$style1 = "";
		$style2 = "none";
		$style3 = "none";
	}

  */
?>

<?
// fix.
$tmpproc = "new/mypage/member_proc2.php";
?>

</head>
<body>

<form name="locationFrm" method="post">
    <input type="hidden" name="pno">
    <input type="hidden" name="userid">
    <input type="hidden" name="passwd">
    <input type="hidden" name="name">
</form>

<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/new/include/header.php"; ?>

    <section class="section member-page mypage-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/new/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/mypage/modify.php" class="active"><span>회원정보 수정</span></a>
                        <a href="<?=DIR?>/mypage/toy.php"><span>대여리스트</span></a>
                        <a href="<?=DIR?>/mypage/study.php"><span>온라인신청내역</span></a>
                        <a href="<?=DIR?>/mypage/leave.php"><span>회원탈퇴</span></a>
                    </div>

                    <form name="frm" method="post" action="<?=$INFO['url_ssl'].$tmpproc?>" onsubmit="return input_check(this);" target="procFrame">
                        <input type="hidden" name="ret_host" value="<?=$HTTP_HOST?>">
                        <input type="hidden" name="submitting" value="N">
                        <input type="hidden" name="idCheck" value="<?=$row['userid']?>">
                        <input type='hidden' name='toDay' value="<?=date("Y-m-d")?>">
                        <input type="hidden" name="mode" value="<?=$modeValue?>">
                        <input type="hidden" name="name" value="<?=$name?>">
                        <input type="hidden" name="jumin1" value="<?=$jumin1?>">
                        <input type="hidden" name="jumin2" value="<?=$jumin2?>">
                        <input type="hidden" name="virtualNo" value="<?=$_SESSION['virtualNo']?>">
                        <input type="hidden" name="dupInfo" value="<?=$_SESSION['dupInfo']?>">
                        <input type="hidden" name="authInfo" value="<?=$_SESSION['authInfo']?>">

                        <div class="__tit1">
                            <h3>회원분류</h3>
                        </div>

                        <div class="__memSel">
                            <div class="tbl">
                                <div class="lef">
                                    <? if( $modeValue == "write" ){ ?>
                                        <label><input type="radio" name="memtype1" value="개인" onclick="mbType();" checked> 개인회원</label>
                                        <label><input type="radio" name="memtype1" value="기관" onclick="mbType();"> 기관회원</label>
                                        <label><input type="radio" name="memtype1" value="학생" onclick="mbType();"> 학생회원</label>
                                    <? }else{ ?>
                                        <input type="hidden" name="memtype1" value="<?=$row[memtype1]?>"><font color="darkblue"><?=$row[memtype1]?></font>
                                        
                                        <?
                                            unset($result02);
                                            unset($row02);
                                            $query02 = "SELECT name, memberno FROM ona_member_family WHERE userid='".$_SESSION['member_id']."' and mbCard = 'Y' and status1 = '1'";
                                          //	$query = "SELECT name, memberno FROM ona_member_family WHERE userid='hjhj2939' and mbCard = 'Y' and status1 = '1'";
                                            $result02	= mysql_query($query02);

                                            $num_ = 0;
                                            while($row02 = mysql_fetch_array($result02)){
                                              $num_++;
                                              $dm_name = $row02['name'];	
                                              $dm_no = $row02['memberno'];

                                              $type_ = "답십리점";
                                              if(substr($dm_no,0,3)=="DMJ" || substr($dm_no,0,2)=="JG") $type_ = "제기점";
                                              if(substr($dm_no,0,3)=="DMH" || substr($dm_no,0,2)=="HG") $type_ = "휘경점";
                                        ?>
                                        
                                        <div style="text-align:center;width:100%;padding:10px 0 0 0;">
                                            <div style="padding:0 0 5px 0;"><?=$type_?> 대여회원 <?=$dm_name?></div><div id="bcTarget<?=$num_?>" style="width:190px;height:70px;margin:0px auto;padding:5px 0 0 0;"></div>
                                        </div>

                                        <script type="text/javascript">
                                            $("#bcTarget<?=$num_?>").barcode("<?=$dm_no?>", "code39");

                                          //    바코드 타입    
                                            //    codabar
                                            //    code11 (code 11)
                                            //    code39 (code 39)
                                            //    code93 (code 93)
                                            //    code128 (code 128)
                                            //    ean8 (ean 8)
                                            //    ean13 (ean 13)
                                            //    std25 (standard 2 of 5 - industrial 2 of 5)
                                            //    int25 (interleaved 2 of 5)
                                            //    msi
                                            //    datamatrix (ASCII + extended)
                                        </script>

                                        <?
                                          } // end while
                                        ?>
                                    <? } ?>
                                </div>
                            </div>
                        </div>

                        <div class="__tit1 __mt50">
                            <h3>회원분류 <span class="dib2 __orange"><i class="axi axi-check"></i> 체크 항목은 필수입력 사항입니다. </span></h3>
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
                                        <? if( $row['userid'] || $_SESSION['masterSession']=="master"){ ?>
                                            <input type="hidden" name="userid" value="<?=$row['userid']?>">
                                        <?=$row[userid]?>
                                        <? }else{ ?>
                                            <input type="text" class="__inp __m-w50p" style="width:270px;" name="userid" maxlength="12" style="IME-MODE:disabled;" onkeydown="onlyId()"> &nbsp;
                                            <button type="button" class="__btn2 vat" onclick="popId2();">중복확인</button>
                                        <? } ?>
                                    </td>
                                </tr>
                                
                                <?if($modeValue=="write"){?>
                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 비밀번호</th>
                                    <td>
                                        <input type="password" class="__inp __m-w100p" style="width:270px;" name="passwd" maxlength="20">
                                        <span class="__dib ml">비밀번호는 8~20자리의 영문과 숫자와 특수문자의 혼합해주세요.</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 비밀번호 확인</th>
                                    <td>
                                        <input type="password" class="__inp __m-w100p" style="width:270px;" name="passwd2" maxlength="20">
                                        <span class="__dib ml">비밀번호를 한번 더 입력해 주세요.</span>
                                    </td>
                                </tr>
                                
                                <?}else{?>
                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 비밀번호</th>
                                    <td>
                                        <input type="password" class="__inp __m-w100p" style="width:270px;" name="passwd" maxlength="20">
                                        <input type="checkbox" name="chgpasswd" onclick="chgPasswd(this.checked)"><span class="__dib ml">※비밀번호 변경시 체크해 주세요.</span>
                                    </td>
                                </tr>

                                <tr id="tr_newpasswd" style="display:none;">
                                    <th scope="row"><i class="axi axi-check __orange"></i> 새 비밀번호</th>
                                    <td>
                                        <input type="password" class="__inp __m-w100p" style="width:270px;" name="newpasswd" maxlength="20">
                                        <span class="__dib ml">변경하실 새 비밀번호를 입력해 주세요.</span>
                                    </td>
                                </tr>

                                <tr id="tr_newpasswd2" style="display:none;">
                                    <th scope="row"><i class="axi axi-check __orange"></i> 새 비밀번호 확인</th>
                                    <td>
                                        <input type="password" class="__inp __m-w100p" style="width:270px;" name="newpasswd2" maxlength="20">
                                        <span class="__dib ml">새 비밀번호를 한번 더 입력해 주세요.</span>
                                    </td>
                                </tr>

                                <?}?>

                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 성명</th>
                                    <td><?=!$_SESSION['member_id']?$name:$row[name]?></td>
                                </tr>
                                
                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 이메일</th>
                                    <td>
                                        <ul class="__form email __m-w100p" style="width:423px">
                                            <li><input type="text" class="__inp" name="email1" value="<?=$exEmail[0]?>"></li>
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
                                                <select name="tel1" class="__inp">
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
                                            <li><input type="text" class="__inp" name="tel2" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="<?=$exTel[1]?>"></li>
                                            <li class="dash">-</li>
                                            <li><input type="text" class="__inp" name="tel3" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="<?=$exTel[2]?>"></li>
                                        </ul>
                                        
                                        <div class="__mt10">
                                            <label><input type="radio" value="H" name="telType" checked> 집</label>
                                            <label><input type="radio" value="O" name="telType"> 직장</label>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 핸드폰번호</th>
                                    <td>
                                        <ul class="__form __m-w100p" style="width:423px;">
                                            <li>
                                                <select name="hp1" class="__inp">
                                                    <option value="010" <?if($exHp[0] == "010"){ echo"selected"; }?>>010</option>
                                                    <option value="011" <?if($exHp[0] == "011"){ echo"selected"; }?>>011</option>
                                                    <option value="016" <?if($exHp[0] == "016"){ echo"selected"; }?>>016</option>
                                                    <option value="017" <?if($exHp[0] == "017"){ echo"selected"; }?>>017</option>
                                                    <option value="018" <?if($exHp[0] == "018"){ echo"selected"; }?>>018</option>
                                                    <option value="019" <?if($exHp[0] == "019"){ echo"selected"; }?>>019</option>
                                                </select>
                                            </li>
                                            <li class="dash">-</li>
                                            <li><input type="text" class="__inp" name="hp2" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="<?=$exHp[1]?>"></li>
                                            <li class="dash">-</li>
                                            <li><input type="text" class="__inp" name="hp3" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="<?=$exHp[2]?>"></li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 주소</th>
                                    <td>
                                        <ul class="__form __m-w100p" style="width:290px;">
                                            <li><input type="text" class="__inp" name="homezipcode" id="homezipcode" maxlength="7" value="<?=$row[homezipcode]?>"></li>
                                            <li class="space"></li>
                                            <li style="width:100px;"><button type="button" class="__btn2 __w100p" onclick="address_find()">우편번호찾기</button></li>
                                        </ul>
                                        <p class="__mt10"><input type="text" class="__inp" name="homeaddress" id="homeaddress" value="<?=$row[homeaddress]?>"></p>
                                        <p class="__mt10"><input type="text" class="__inp" name="homeaddress2" id="homeaddress2" value="<?=$row[homeaddress2]?>"></p>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 이메일 수신여부</th>
                                    <td>
                                        <label><input type="radio" value="Y" name="mailyn" checked> 수신</label>
                                        <label><input type="radio" value="N" name="mailyn" <? if($row['mailyn'] == "N"){ echo "checked"; } ?>> 수신하지 않음</label>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> SMS서비스 수신여부</th>
                                    <td>
                                        <label><input type="radio" value="Y" name="smsyn" checked> 수신</label>
                                        <label><input type="radio" value="N" name="smsyn" <? if($row['smsyn'] == "N"){ echo "checked"; } ?>> 수신하지 않음</label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <input type="hidden" name="sisulid">

                        <script language="javascript">
                            function job1Choice(v1) {
                                switch (v1) {
                                    case "부모":
                                        document
                                            .getElementById("idJob2")
                                            .style
                                            .display = "none";
                                        document
                                            .getElementById("idJobEteMsg")
                                            .style
                                            .display = "none";
                                        document
                                            .getElementById("idSisulInfo")
                                            .style
                                            .display = "none";
                                        break;
                                    case "보육시설종사자":
                                        document
                                            .getElementById("idJob2")
                                            .style
                                            .display = "";
                                        document
                                            .getElementById("idJobEteMsg")
                                            .style
                                            .display = "none";
                                        document
                                            .getElementById("idSisulInfo")
                                            .style
                                            .display = "";
                                        break;
                                    case "기타":
                                        document
                                            .getElementById("idJob2")
                                            .style
                                            .display = "none";
                                        document
                                            .getElementById("idJobEteMsg")
                                            .style
                                            .display = "";
                                        document
                                            .getElementById("idSisulInfo")
                                            .style
                                            .display = "none";
                                        break;
                                }
                            }
                        </script>

                        <div class="__tit1 __mt50">
                            <h3>추가정보입력 <span class="dib2 __orange"><i class="axi axi-check"></i> 체크 항목은 필수입력 사항입니다. </span></h3>
                        </div>

                        <!-- 개인 -->
                        <table class="__tblView respond" id="member_style1" style="display:<?=$style1?>;">
                            <caption>TABLE</caption>
                            <colgroup>
                                <col style="width:180px;">
                                <col>
                            </colgroup>
                            
                            <tbody>
                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 구분</th>
                                    <td>
                                        <select name='job1' class="__inp" style="width:150px;" onChange="job1Choice(this.value)">
                                            <option value="부모" <?if($row[job1] == "부모"){ echo"selected"; }?>>부모</option>
                                            <option value="보육시설종사자" <?if($row[job1] == "보육시설종사자"){ echo"selected"; }?>>보육교직원</option>	
                                            <option value="기타" <?if($row[job1] == "기타"){ echo"selected"; }?>>기타</option>
                                        </select>
                                        <select id="idJob2" class="__inp" name='job2' style="width:150px;display:none;">
                                            <option value="원장" <?if($row[job2] == "원장"){ echo"selected"; }?>>원장</option>
                                            <option value="보육교사" <?if($row[job2] == "보육교사"){ echo"selected"; }?>>보육교사</option>
                                            <option value="영양사" <?if($row[job2] == "영양사"){ echo"selected"; }?>>영양사</option>
                                            <option value="조리사" <?if($row[job2] == "조리사"){ echo"selected"; }?>>조리사</option>
                                            <option value="사무원" <?if($row[job2] == "사무원"){ echo"selected"; }?>>사무원</option>
                                            <option value="간호사" <?if($row[job2] == "간호사"){ echo"selected"; }?>>간호사</option>
                                            <option value="기타" <?if($row[job2] == "기타"){ echo"selected"; }?>>기타</option>
                                        </select>
                                        <span id="idJobEteMsg" <?if($row[job1] != "기타"){?>style="display:none;"<? } ?>>&nbsp;&nbsp;<font color="#FF9703">※ 예비맘 포함</font></span>
                                    </td>
                                </tr>

                                <tr id="idSisulInfo" style="display:none;">
                                    <th scope="row"><i class="axi axi-check __orange"></i> 어린이집정보</th>
                                    <td>
                                        시설명 <input type="text" name="cpNameA" size="20" value="<?=$row[cpName]?>" class="__inp"> 
									어린이집유형<!--  <input type="text" name="memtype3A"value="<?=$row[memtype3]?>" size="10"> --> <!--<img src="../../images/btn/btn_sisul.gif" align="absmiddle"  onclick="popSisul4();" style="cursor:pointer"> readonly 제거-->
                                        <select name="memtype3A" class="__inp">
                                            <option value="" <?=$row[memtype3]==""?"selected":""?>>선택</option>
                                            <option value="국공립" <?=$row[memtype3]=="국공립"?"selected":""?>>국공립</option>
                                            <option value="민간" <?=$row[memtype3]=="민간"?"selected":""?>>민간</option>
                                            <option value="가정" <?=$row[memtype3]=="가정"?"selected":""?>>가정</option>
                                            <option value="직장" <?=$row[memtype3]=="직장"?"selected":""?>>직장</option>
                                            <option value="기타" <?=$row[memtype3]=="기타"?"selected":""?>>기타</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 장난감/도서 대여 회원가입</th>
                                    <td>
                                        <label><input type="radio" value="Y" name="toyEntry1" checked onclick="toyEntryChange1('<?=$modeValue?>');"> 가입</label>
                                        <label><input type="radio" value="N" name="toyEntry1" <? if($row['toyEntry'] == "N"){ echo "checked"; } ?> onclick="toyEntryChange1('<?=$modeValue?>');"> 가입하지 않음</label>
                                        
                                        <p class="__mt10 __orange">가입시 “가입방법 및 이용방법”을 반드시 확인하세요.</p>
                                        <p class="__mt10"><a href="javascript:fadeIn('.__popBasic.popInfo');" class="__btn2">가입방법 및 이용방법</a></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <? 
                          if($row[job2]){
                            echo "<script>
                                    job1Choice('".$row[job1]."');
                                  </script>";
                          }
                        ?>

                        <!-- 기관 -->
                        <table class="__tblView respond" id="member_style2" style="display:<?=$style2?>;">
                            <caption>TABLE</caption>
                            <colgroup>
                                <col style="width:180px;">
                                <col>
                            </colgroup>
                            
                            <tbody>
                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 지역구분</th>
                                    <td>
                                        <label><input type="radio" name="memtype4" value="관내" onclick="mbType2()" checked> 관내</label>
                                        <label><input type="radio" name="memtype4" value="관외" onclick="mbType2()" <? if($row['memtype4'] == "관외"){ echo "checked"; } ?>> 관외</label>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 어린이집유형</th>
                                    <td>
                                        <select name="memtype3" class="__inp">
                                            <option value="">선택하세요</option>
                                            <option value="국공립" <?if($row[memtype3] == "국공립"){ echo"selected"; }?>>국공립</option>
                                            <option value="사회복지법인" <?if($row[memtype3] == "사회복지법인"){ echo"selected"; }?>>사회복지법인</option>
                                            <option value="법인·단체 등" <?if($row[memtype3] == "법인·단체 등"){ echo"selected"; }?>>법인·단체 등</option>
                                            <option value="민간" <?if($row[memtype3] == "민간"){ echo"selected"; }?>>민간</option>
                                            <option value="가정" <?if($row[memtype3] == "가정"){ echo"selected"; }?>>가정</option>
                                            <option value="직장" <?if($row[memtype3] == "직장"){ echo"selected"; }?>>직장</option>
                                            <option value="협동" <?if($row[memtype3] == "협동"){ echo"selected"; }?>>협동</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 구분</th>
                                    <td>
                                        <select name="memtype5" class="__inp">
                                            <option value="">선택하세요</option>
                                            <option value="시설장" <?if($row[memtype5] == "시설장"){ echo"selected"; }?>>원장</option>
                                            <option value="교사" <?if($row[memtype5] == "교사"){ echo"selected"; }?>>교사</option>
                                            <option value="기타종사자" <?if($row[memtype5] == "기타종사자"){ echo"selected"; }?>>기타종사자</option>
                                        </select>
                                    </td>
                                </tr>
						
                                <tr id="memtypeTwo">
                                    <td colspan="2">
                                        <table class="__tblView respond">
                                            <caption>TABLE</caption>
                                            <colgroup>
                                                <col style="width:180px;">
                                                <col>
                                            </colgroup>
                                            <tbody>
                                                <tr>
                                                    <th scope="row"><i class="axi axi-check __orange"></i> 어린이집명</th>
                                                    <td><input name="cpName" type="text" class="__inp" value="<?=$row[cpName]?>"></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row"><i class="axi axi-check __orange"></i> 원장명</th>
                                                    <td><input name="cpJang" type="text" class="__inp" value="<?=$row[cpJang]?>"></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row"><i class="axi axi-check __orange"></i> 사업자등록번호</th>
                                                    <td>
                                                        <input name="cpNumber" type="text" class="__inp" value="<?=$row[cpNumber]?>">
                                                        <span>&nbsp;&nbsp;<font color="#FF9703">※ - 는 반드시 입력해주세요</font></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 어린이집 전화번호</th>
                                    <td>
                                        <ul class="__form __m-w100p" style="width:423px;">
                                            <li>
                                                <select name="cpTel1" class="__inp">
                                                    <option value=02 <?if($exCpTel[0] == "02"){ echo"selected"; }?>>서울(02)</option>
                                                    <option value=031 <?if($exCpTel[0] == "031"){ echo"selected"; }?>>경기(031)</option>
                                                    <option value=032 <?if($exCpTel[0] == "032"){ echo"selected"; }?>>인천(032)</option>
                                                    <option value=033 <?if($exCpTel[0] == "033"){ echo"selected"; }?>>강원(033)</option>
                                                    <option value=041 <?if($exCpTel[0] == "041"){ echo"selected"; }?>>충남(041)</option>
                                                    <option value=042 <?if($exCpTel[0] == "042"){ echo"selected"; }?>>대전(042)</option>
                                                    <option value=043 <?if($exCpTel[0] == "043"){ echo"selected"; }?>>충북(043)</option>
                                                    <option value=051 <?if($exCpTel[0] == "051"){ echo"selected"; }?>>부산(051)</option>
                                                    <option value=052 <?if($exCpTel[0] == "052"){ echo"selected"; }?>>울산(052)</option>
                                                    <option value=053 <?if($exCpTel[0] == "053"){ echo"selected"; }?>>대구(053)</option>
                                                    <option value=054 <?if($exCpTel[0] == "054"){ echo"selected"; }?>>경북(054)</option>
                                                    <option value=055 <?if($exCpTel[0] == "055"){ echo"selected"; }?>>경남(055)</option>
                                                    <option value=061 <?if($exCpTel[0] == "061"){ echo"selected"; }?>>전남(061)</option>
                                                    <option value=062 <?if($exCpTel[0] == "062"){ echo"selected"; }?>>광주(062)</option>
                                                    <option value=063 <?if($exCpTel[0] == "063"){ echo"selected"; }?>>전북(063)</option>
                                                    <option value=064 <?if($exCpTel[0] == "064"){ echo"selected"; }?>>제주(064)</option>
                                                    <option value=070 <?if($exCpTel[0] == "070"){ echo"selected"; }?>>070</option>
                                                </select>
                                            </li>
                                            <li class="dash">-</li>
                                            <li><input type="text" class="__inp" name="cpTel2" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="<?=$exCpTel[1]?>"></li>
                                            <li class="dash">-</li>
                                            <li><input type="text" class="__inp" name="cpTel3" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="<?=$exCpTel[2]?>"></li>
                                        </ul>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 장난감/도서 대여 회원가입</th>
                                    <td>
                                        <label><input type="radio" value="Y" name="toyEntry2" checked onclick="toyEntryChange2('<?=$modeValue?>');"> 가입</label>
                                        <label><input type="radio" value="N" name="toyEntry2" <? if($row['toyEntry'] == "N"){ echo "checked"; } ?> onclick="toyEntryChange2('<?=$modeValue?>');"> 가입하지 않음</label>

								                        <p class="__mt10 __orange">가입시 “가입방법 및 이용방법”을 반드시 확인하세요.</p>
								                        <p class="__mt10"><a href="javascript:fadeIn('.__popBasic.popInfo');" class="__btn2">가입방법 및 이용방법</a></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <!-- 학생 -->
                        <table class="__tblView respond" id="member_style3" style="display:<?=$style3?>;">
                            <caption>TABLE</caption>
                            <colgroup>
                                <col style="width:180px;">
                                <col>
                            </colgroup>
                            
                            <tbody>
                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 대학교/전공</th>
                                    <td>
                                        <input name="school1" type="text" class="__inp" style="width:100px;"> 대학교
                                        <input name="school2" type="text" class="__inp" style="width:120px;"> 전공
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th scope="row"><i class="axi axi-check __orange"></i> 장난감/도서 대여 회원가입</th>
                                    <td>
                                        <label><input type="radio" value="Y" name="toyEntry3" checked onclick="toyEntryChange3('<?=$modeValue?>');"> 가입</label>
                                        <label><input type="radio" value="N" name="toyEntry3" <? if($row['toyEntry'] == "N"){ echo "checked"; } ?> onclick="toyEntryChange3('<?=$modeValue?>');"> 가입하지 않음</label>

								                        <p class="__mt10 __orange">가입시 “가입방법 및 이용방법”을 반드시 확인하세요.</p>
								                        <p class="__mt10"><a href="javascript:fadeIn('.__popBasic.popInfo');" class="__btn2">가입방법 및 이용방법</a></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <script language="javascript">
                            function _f_add() {
                                var tmpChildTable = document.getElementById("childTable");
                                var tmpHiddenChildTable = document.getElementById("hiddenChildTable");

                                tmpChildTable.appendChild(
                                    document.getElementById("hiddenChildTable").rows[0].cloneNode(true)
                                );
                            }
                            function _f_del(obj) {
                                var tmpObj = obj;
                                while (tmpObj.nodeName != "TR") {
                                    tmpObj = tmpObj.parentNode;
                                }
                                tmpObj
                                    .parentNode
                                    .removeChild(tmpObj);
                            }
                        </script>

                        <div class="__tit1 __mt50">
                            <h3>자녀정보입력 <span class="dib2 __green">※ 자녀 주민등록번호는 수정이 불가능하오니 정확히 입력해주시기 바랍니다.</span></h3>
                        </div>
                        
                        <div class="__m __mb20"><button type="button" class="__btn2 _add">자녀추가</button></div>

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
                                  <th scope="col"><button type="button" class="__btn2 _add">자녀추가</button></th>
                                  <th scope="col">자녀이름</th>
                                  <th scope="col">자녀 생년월일</th>
                                  <th scope="col">자녀 성별</th>
                                  <th scope="col">재원</th>
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
                                  <td data-th="재원">
                                      <select name="tmp_nursery[]" class="__inp">
                                          <option value="어린이집" <?=$childrow['nursery']=="어린이집"?"selected":""?>>어린이집</option>
                                          <option value="유치원" <?=$childrow['nursery']=="유치원"?"selected":""?>>유치원</option>
                                          <option value="기타" <?=$childrow['nursery']=="기타"?"selected":""?>>기타</option>
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
                                  <td data-th="재원">
                                      <select name="nursery[]" class="__inp">
                                          <option value="어린이집" selected>어린이집</option>
                                          <option value="유치원">유치원</option>
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
                              <button type="submit" class="__btn1">확인</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
        </article>
        
        <? include $_SERVER['DOCUMENT_ROOT']."/new/include/f_popup.php"; ?>
    </section>
</div>

<? include $_SERVER['DOCUMENT_ROOT']."/new/include/footer.php"; ?>

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
                        <td>
                            홈페이지에서 회원가입(제출서류) → 동대문구육아종합지원센터에서 가입신청서 작성 및 연회비 납부 → 회원카드 발급 → 장난감 및 도서 대여 가능
                        </td>
                    </tr>
                    <tr>
                        <td>이용방법</td>
                        <td class="tal">
                            <dl class="__popDl">
                                <dt>[개인회원]</dt>
                                <dd>
                                    1회 장난감 2점, 도서 3권 대여, 7일 대여(7일 연장 가능) 장난감을 대여하지 않을경우 도서 5권 대여
                                </dd>
                            </dl>
                            <dl class="__popDl">
                                <dt>[기관회원]</dt>
                                <dd>
                                    1회 장난감 5점, 도서 5권 대여, 7일 대여(7일 연장 가능) 장난감을 대여하지 않을경우 도서 10권 대여
                                </dd>
                            </dl>
                            <dl class="__popDl">
                                <dt>[학생회원]</dt>
                                <dd>
                                    1회 장난감 2점, 도서 3권 대여, 7일 대여(7일 연장 가능) 장난감을 대여하지 않을경우 도서 5권 대여
                                </dd>
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
                    (주민등록등본1부, 장애인 가종은 복지카드, 다둥이행복카드발급가정은 다둥이 행복카드, 기초생활수급권자 및 차상위계층은 수그바증명서를 꼭 지참해야 회원가입 가능)
                </li>
            </ul>
        </div>
    </div>
    <div class="bg _close" onclick="fadeOut($(this).closest('.__popBasic'));"></div>
</div>

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
        html+='</select>'; html+='</li>'; html+='</ul>'; html+='</td>'; html+='<td data-th="자녀 성별">'; html+='<select name="csex[]" class="__inp">'; html+='<option value="1" selected="selected">남</option>'; html+='<option value="2">여</option>'; html+='</select>'; html+='</td>'; html+='<td data-th="재원">'; html+='<select name="nursery[]" class="__inp">'; html+='<option value="어린이집" selected="selected">어린이집</option>'; html+='<option value="유치원">유치원</option>'; html+='<option value="기타">기타</option>'; html+='</select>'; html+='</tr>';

	$('._addThis').append(html);
});
</script>


</body>
<script language="javascript" src="../../include/js/member.js"></script>
<script src="https://ssl.daumcdn.net/dmaps/map_js_init/postcode.v2.js"></script>
<script type="text/javascript" src="../js/jquery-barcode.js"></script>
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
</html>