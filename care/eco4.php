<?
$_dep = array(2,9,4);
$_tit = array('��������','������ ��ƾ����','������ ��ƾ����');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
</head>
<body>
<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit_tab">
				<h2><img src="../images/icon/sub_ico_renew2.png">������ ��ƾ����</h2>
			</div>
			<div id="content">
				
				

				<div class="__tab3">
<!--
					<a href="<?=DIR?>/care/eco1.php"><span>����ģȭ����</span></a>
					<a href="<?=DIR?>/care/eco2.php"><span>����ģȭ�����</span></a>
-->
                    <a href="<?=DIR?>/care/eco4.php" class="active"><span>������ ��ƾ����</span></a>
					<a href="<?=DIR?>/care/eco3.php"><span>�츮���� ��������</span></a>
				</div>

				
				<div class="__greenHead">
					<dl>
						<dt>������ ��ƾ�����̶�?</dt>
						<dd class="no_after">
							�α� ����� ���� ���α׷��� ���� ���� �����Ͽ� ������ ���� ����ϰ�, �Լ� ��⸦ �������� �����Ͽ�
��� ȿ������ ���������ν� ������� ���� ����ϰ� �����ڿ� �Ƶ����� ������ �Ǵ� �̷� ��������
���� ���Դϴ�.
						</dd>
					</dl>
				</div>


				<div class="tac __mt50">
					<img src="<?=DIR?>/images/moa_main_img.png" alt="">
				</div>

                <ul class="__txt15 __mt20">
					<li style="text-align: center;">������, �ΰ�, ����, ���Τ���ü ��, ��ȸ��������, ���� ����� �� ���� ���� ������ �ؼ��ϰ�, ����� �� ���°� ����� �����ϸ�, 
					<br>
					�������
���� ������ �������� �Բ� ������ �Բ� �����ϴ� ������ ��ƾ������ �����ϰ��� �մϴ�.</li>
					
				</ul>

                <div class="moa_kindergarten __mt50">
                    <h3>
                        <span>�̷������� ���� � ��</span>
                        ������ ��ƾ����
                    </h3>
                    <div class="mk_diagram_box">
                        <ul>
                            <li>
                                <h5>
                                ����� ��
                                <br>
                                ���� ���� �ؼ�
                                </h5>
                            </li>
                            <li>
                                <h5>����� ��
                                <br>
                                ���°� ���
                                </h5>
                            </li>
                            <li>
                                <h5>
                                ������� ����
                                <br>
                                ������ ����
                                </h5>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="__tit1 __mt50">
					<h3>��������</h3>
				</div>
				<div class="moa_direction moa_min_container __mt30">
				    <ul>
				        <li>
				            <div class="direction_tit">
                                <span>
                                    ���� � ȿ��ȭ
                                </span>
				            </div>
                            <div class="direction_list">
                                <ul>
                                    <li>�η� ���� (��ü����, ���� ���� ��)</li>
                                    <li>���� ����</li>
                                    <li>��Ÿ ������ ����� ���� � (�߰� ���� ����, ���� ���� ��)</li>
                                    <li>��ǰ ���� ���� (���� ����, ���� ��)</li>
                                </ul>
                            </div>
				        </li>
				        <li>
				            <div class="direction_tit">
                                <span>
                                    ���� ������ ���
                                </span>
				            </div>
                            <div class="direction_list">
                                <ul>
                                    <li>�н�����ü ��� ���� ������, ���� �߽� �������� ��õ (���� ���� ��)</li>
                                    <li>��ȣ ������ ���� ���� ȯ�� �� ���� ����</li>
                                    <li>����� �� ���� ���α׷� ���� �� ��õ</li>
                                </ul>
                            </div>
				        </li>
				        <li>
				            <div class="direction_tit">
                                <span>
                                    �θ� ���� Ȱ��ȭ
                                </span>
				            </div>
                            <div class="direction_list">
                                <ul>
                                    <li>� ����ȸ</li>
                                    <li>�θ��� ��� ����</li>
                                    <li>�θ� ������ ���� �θ� ���� ����</li>
                                    <li>�θ� ���� ���α׷� �� ���</li>
                                    <li>�θ� ���Ƹ�</li>
                                </ul>
                            </div>
				        </li>
				        <li>
				            <div class="direction_tit">
                                <span>
                                    ������Ʈ��ŷ ��ȭ
                                </span>
				            </div>
                            <div class="direction_list">
                                <ul>
                                    <li>����� �α��� ���� Ȱ�� (�� ü���, ����, ��ȭ ����, �ҹ漭 ��)</li>
                                    <li>���� �ֹ��� ��� ����</li>
                                    <li>���� �� ��� ����</li>
                                </ul>
                            </div>
				        </li>
				    </ul>
				</div>
                <div class="__tit1 __mt50">
					<h3>��������</h3>
				</div>
				<div class="moa_task moa_min_container __mt30">
				    <ul>
				        <li>
				            <strong>
				                ����� ���� ��� ������ ����
				                <span>������ ��������ü ����</span>
				            </strong>
				            <div class="moa_task_list">
				                <ul>
				                    <li>�α� 3~5�� �������
				                    <br>
���� ����ü�� ����</li>
				                    <li>����� �� �����������θ�
				                    <br>
�Ҹ��� ���� �� ���밨 ����</li>
				                </ul>
				            </div>
				        </li>
				        <li>
				            <strong>
				                ���� ���� ������ ����
				                <span>���� ���α׷� ���ߤ��</span>
				            </strong>
				            <div class="moa_task_list">
				                <ul>
				                    <li>���α׷� ���ߤ����� ����
				                    <br>
(� ����ȸ)</li>
				                    <li>�������, ������ �� ������ ����
				                    <br>
���� ��ȭ</li>
				                </ul>
				            </div>
				        </li>
				        <li>
				            <strong>
				                ����� ȿ���� ��� ����
				                <span>����� �� �Լ� ����</span>
				            </strong>
				            <div class="moa_task_list">
				                <ul>
				                    <li>����ü �� ����� �� ������ ��
				                    <br>
��� ��Ȳ ����</li>
				                    <li>���� ���Ƹ���, ����� �� ���Ի�
				                    <br>
��� �Լ� ����</li>
				                </ul>
				            </div>
				        </li>
				    </ul>
				</div>
                <div class="__tit1 __mt50">
					<h3>���� ���α׷� �</h3>
				</div>
				<div class="moa_program moa_min_container">
				    <table class="__tbl fix type2 __mt30">
					<caption>TABLE</caption>
					<colgroup class="__p">
						<col width="30%">
						<col width="*">
					</colgroup>
					<tbody>
						<tr>
							<td>�����</td>
							<td>
							    <p>
							        <span class="mp_blue">�η�</span>
							        ���� (��ü����, ���� ���� ��)
							        <br>
							        <span class="mp_blue">����</span>
                                    ���� (�Թ�, �𷡳����� ���� ��)
							    </p>
							</td>
						</tr>
						<tr>
							<td>����������</td>
							<td>
							    <p>
							        <span class="mp_blue">�������α׷� ����</span>
							        (��������, �������� ���� ��)
							    </p>
							</td>
						</tr>
						<tr>
							<td>�θ�����</td>
							<td>
							    <p>
							        <span class="mp_blue">�θ��� ��� ����</span>
							        <br>
							        �θ� ���� ���α׷� �� ��� (�ȸ, �������� ��� ��)
							    </p>
							</td>
						</tr>
						<tr>
							<td>������Ʈ��ŷ</td>
							<td>
							    <p>
							        ���� ���� Ȱ�� (��ü���, ����, ��ȭ ����, �ҹ漭 ��)
							        <br>
							        <span class="mp_blue">���� �ֹ��� ��� ����</span>
                                    (�����ֹΰ� �Բ� �Թ� �ٹ̱� ��)
							    </p>
							</td>
						</tr>

						
					</tbody>
				</table>

				</div>
                <div class="__tit1 __mt50">
					<h3>����ü��</h3>
				</div>
                <div class="moa_system moa_min_container __mt50">
                    <div class="moa_system_tit">
                        <div class="mst_deco1">
                            <div class="mst_deco2">
                                <strong>
                                    ������
                                    <br>
                                    ��ƾ����
                                </strong>
                            </div>
                        </div>
                    </div>
                    <div class="moa_system_list left">
                        <div class="msl_inner">
                            <ul>
                                <li>
                                    <span class="msl_tit">����</span>
                                    <ul>
                                        <li>�������α׷� �� ��ȹ������ ����</li>
                                        <li>����� ���� ����, �Լ� ���� ����</li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="msl_tit">��������</span>
                                    <ul>
                                        <li>���� ���� ���� ����, ���� �� ���� ����</li>
                                        <li>�������� ���� ����</li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="msl_tit">�θ�</span>
                                    <ul>
                                        <li>�������α׷� ����</li>
                                        <li>��������� �� �Լ� ���� ����</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="moa_system_list right">
                        <div class="msl_inner">
                            <ul>
                                <li>
                                    <span class="msl_tit">�����</span>
                                    <ul>
                                        <li>��� ��ȹ ���� �� � �Ѱ�</li>
                                        <li>�������ȸ, ��� ����, ���� ����
��� ���� ȫ��</li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="msl_tit">��ġ��</span>
                                    <ul>
                                        <li>���� ����� ������Ȯ��</li>
                                        <li>����ü�� ����ȸ���������
Ưȭ���α׷� ���� ����</li>
                                        <li>��� ȫ�� �� �� ��</li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="msl_tit">���������������������</span>
                                    <ul>
                                        <li>����� � ����, �������α׷�
������, ���米��</li>
                                        <li>����ü �� ����(����) ����</li>
                                        <li>��� Ȯ�� �� ȫ��</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>    
                <div class="__tit1 __mt50">
					<h3>���빮�� �������ü ��Ȳ</h3>
				</div>
                <div class="moa_program moa_min_container">
				    <table class="__tbl fix type2 __mt30">
					<caption>TABLE</caption>
					<colgroup class="__p">
						<col width="10%">
						<col width="18%">
						<col width="16%">
						<col width="16%">
						<col width="*">
					</colgroup>
					<thead>
					    <tr>
					        <th>����</th>
					        <th>�������</th>
					        <th>����</th>
					        <th>����ó</th>
					        <th>�ּ�</th>
					    </tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>����</td>
							<td>������</td>
                            <td>02-2215-3342</td>
                            <td>���빮�� õȣ���89�� 30</td>
						</tr>
						<tr>
						    <td>2</td>
							<td>����</td>
							<td>������</td>
                            <td>02-2245-6390</td>
                            <td>���빮�� ���ѷ�27���� 65</td>
						</tr>
                        <tr>
                            <td>3</td>
                            <td>����</td>
                            <td>���δ�ü</td>
                            <td>02-2213-0304</td>
                            <td>���빮�� ��ʸ��� 51</td>
                        </tr>
						<tr>
						    <td>4</td>
							<td>�޺�</td>
							<td>������</td>
                            <td>02-2242-0089</td>
                            <td>���빮�� �簡���� 190 16�� 108ȣ</td>
						</tr>
					</tbody>
				</table>

				</div>
                <div class="__tit1 __mt50">
                    <h3>���빮�� �ְ����ü ��Ȳ</h3>
                </div>
                <div class="moa_program moa_min_container">
                    <table class="__tbl fix type2 __mt30">
                        <caption>TABLE</caption>
                        <colgroup class="__p">
                            <col width="10%">
                            <col width="18%">
                            <col width="16%">
                            <col width="16%">
                            <col width="*">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>����</th>
                                <th>�������</th>
                                <th>����</th>
                                <th>����ó</th>
                                <th>�ּ�</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>��ȭ</td>
                                <td>�ΰ�</td>
                                <td>02-2244-9118</td>
                                <td>���빮�� �����12���� 20</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>��ȭ����</td>
                                <td>����</td>
                                <td>02-2245-5141</td>
                                <td>���빮�� �����12���� 20</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>�ؼ�</td>
                                <td>������</td>
                                <td>02-6452-7942</td>
                                <td>���빮�� ��õ�� 248</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>����</td>
                                <td>�ΰ�</td>
                                <td>02-6451-7942</td>
                                <td>���빮�� ��õ�� 248</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>
</body>
</html>