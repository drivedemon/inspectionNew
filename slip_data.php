<?
session_start();
include '../include/connect.php';
mysql_select_db("salary");

$m=array(1=>'มกราคม',2=>'กุมภาพันธ์',3=>'มีนาคม',4=>'เมษายน',5=>'พฤษภาคม',6=>'มิถุนายน',7=>'กรกฎาคม',8=>'สิงหาคม',9=>'กันยายน',10=>'ตุลาคม',11=>'พฤศจิกายน',12=>'ธันวาคม');

$font="font-family:garuda;";
$year=$_GET['year'];
$month=$_GET['month'];
$id_card=$_GET['id_card'];
$salary=$_GET['salary'];

$sql="select * from $salary where id_card='$id_card' and year='$year' and month='$month'";
// echo $sql;
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result);
// print_r($data);

?>
<div class="msg">
	<?
	if($data==""){
		echo "ไม่พบข้อมูล";
		// exit(0);
	}
	?>

</div>

<table width="492" border="0" align="center" style="<?=$font?>">

	<tr>

		<td colspan="2" align="center"><strong>รายงานการตรวจราชการกรณี</strong></td>

	</tr>

	<tr>

		<td colspan="2" align="center"><strong>ประจำเดือน <span class="dotted"><?=$m[$data[month]]?></span> ปี พ.ศ. <span class="dotted"><?=$data[year]?></span></strong></td>

	</tr>

	<tr>

		<td colspan="2" align="center">&nbsp;</td>

	</tr>

	<tr>

		<td width="118">ชื่อ-นามสกุล</td>

		<td class="dotted_fixwidth"><?=$data[prename].$data[firstname]." ".$data[lastname]?></td>

	</tr>

	<tr>

		<td>หน่วยงาน</td>

		<td class="dotted_fixwidth"><?=$data[division2]?></td>

	</tr>

	<tr>

		<td>&nbsp;</td>

		<td class="dotted_fixwidth"><?=$data[division1]?></td>

	</tr>

	<tr>

		<td>โอนเงินเข้า</td>

		<td class="dotted_fixwidth"><?=$data[bank_name]?></td>

	</tr>

	<tr>

		<td>เลขที่บัญชี</td>

		<td class="dotted_fixwidth"><?=$data[account_no]?></td>

	</tr>

</table>

<br />

<table align="center" cellpadding="5" cellspacing="0" class="tb_slip" style="<?=$font?>">

	<tr>

		<th width="272">รายการรายรับ</th>

		<th width="111">จำนวนเงิน(บาท)</th>

		<th width="257">รายการรายจ่าย</th>

		<th width="108">จำนวนเงิน(บาท)</th>

	</tr>

	<tr>

		<td>เงินเดือน/ค่าจ้างประจำ</td>

		<td align="right"><? if($receive1==0) echo ""; else echo number_format($receive1,2);?></td>

		<td valign="top">กบข. / กสจ. (รายเดือน)</td>

		<td align="right" valign="top"><? if($expenses3==0) echo ""; else echo number_format($expenses3,2);?></td>

	</tr>

	<tr>

		<td>เงินเดือน/ค่าจ้างประจำ(ตกเบิก)</td>

		<td align="right"><? if($receive2==0) echo ""; else echo number_format($receive2,2);?></td>

		<td valign="top">ภาษี</td>

		<td align="right" valign="top"><? if($expenses1==0) echo ""; else echo number_format($expenses1,2);?></td>

	</tr>

	<tr>

		<td>เงินปจต. / วิชาชีพ / วิทยฐานะ</td>

		<td align="right"><? if($receive3==0) echo ""; else echo number_format($receive3,2);?></td>

		<td valign="top">สหกรณ์ศาล</td>

		<td align="right" valign="top"><? if($expenses2==0) echo ""; else echo number_format($expenses2,2);?></td>

	</tr>

	<tr>

		<td>เงินปจต. / วิชาชีพ / วิทยฐานะ (ตกเบิก)</td>

		<td align="right"><? if($receive4==0) echo ""; else echo number_format($receive4,2);?></td>

		<td valign="top">สหกรณ์กระทรวง</td>

		<td align="right" valign="top"><? if($expenses10==0) echo ""; else echo number_format($expenses10,2);?></td>

	</tr>

	<tr>

		<td>ต.ข.ท.ปจต. / ต.ข.8-8ว. / ต.ด.จ. 1-7</td>

		<td align="right"><? if($receive5==0) echo ""; else echo number_format($receive5,2);?></td>

		<td valign="top">เงินบำรุงเรียกคืน / ชดใช้ทางแพ่ง / อายัดเงิน</td>

		<td align="right" valign="top"><? if($expenses7==0) echo ""; else echo number_format($expenses7,2);?></td>

	</tr>

	<tr>

		<td>เงินเพิ่มค่าครองชีพ/พ.ช.ค.(ตกเบิก)</td>

		<td align="right"><? if($receive10==0) echo ""; else echo number_format($receive10,2);?></td>

		<td valign="top">สินเชื่อ ธ.กรุงไทย</td>

		<td align="right" valign="top"><? if($expenses9==0) echo ""; else echo number_format($expenses9,2);?></td>

	</tr>

	<tr>

		<td>พ.ต.น.</td>

		<td align="right"><? if($receive11==0) echo ""; else echo number_format($receive11,2);?></td>

		<td valign="top">ง.ก.ส.(ออมสิน)</td>

		<td align="right" valign="top"><? if($expenses8==0) echo ""; else echo number_format($expenses8,2);?></td>

	</tr>

	<tr>

		<td>พ.ต.ส.พ.</td>

		<td align="right"><? if($receive12==0) echo ""; else echo number_format($receive12,2);?></td>

		<td valign="top">เงินกู้เพื่อที่อยู่อาศัย(ธอส.)</td>

		<td align="right" valign="top"><? if($expenses4==0) echo ""; else echo number_format($expenses4,2);?></td>

	</tr>

	<tr>

		<td>เงิน พ.ส.ร. / พ.ต.ก.</td>

		<td align="right"><? if($receive7==0) echo ""; else echo number_format($receive7,2);?></td>

		<td valign="top">ค่าฌาปนกิจสงเคราะห์</td>

		<td align="right" valign="top"><? if($expenses5==0) echo ""; else echo number_format($expenses5,2);?></td>

	</tr>

	<tr>

		<td>เงินเสี่ยงภัยพื้นที่พิเศษ จ.ชายแดนใต้</td>

		<td align="right"><? if($receive13==0) echo ""; else echo number_format($receive13,2);?></td>

		<td valign="top">เงินบำรุง / เงินทุน / กู้สวัสดิการ / สงเคราะห์</td>

		<td align="right" valign="top"><? if($expenses6==0) echo ""; else echo number_format($expenses6,2);?></td>

	</tr>

	<tr>

		<td>อื่น ๆ</td>

		<td align="right"><? if($receive9==0) echo ""; else echo number_format($receive9,2);?></td>

		<td valign="top">อื่น ๆ</td>

		<td align="right" valign="top"><? if($expenses11==0) echo ""; else echo number_format($expenses11,2);?></td>

	</tr>

	<tr>

		<td class="tr_border_top">รวมรายรับ</td>

		<td align="right" class="tr_border_top"><? if($data[receive_sum]==0) echo ""; else echo number_format($data[receive_sum],2);?></td>

		<td class="tr_border_top">รวมรายจ่าย</td>

		<td class="tr_border_top" align="right"><? if($data[expenses_sum]==0) echo ""; else echo number_format($data[expenses_sum],2);?></td>

	</tr>

	<tr>

		<td>&nbsp;</td>

		<td align="right">&nbsp;</td>

		<td>รับสุทธิ</td>

		<td align="right"><? if($data[salary_sum]==0) echo ""; else echo number_format($data[salary_sum],2);?></td>

	</tr>

</table>

<table width="492" border="0" align="center" style="<?=$font?>">

	<tr>

		<td align="right">&nbsp;</td>

	</tr>

	<tr>

		<td align="right">&nbsp;</td>

	</tr>



	<?

	$sql1="select * from salary_main,signature where salary_main.sig_id=signature.sig_id and year='$year' and month='$month' and type='$salary'";

	echo $sql1;

	$result1=mysql_query($sql1);

	$row1=mysql_fetch_array($result1);

	if($row1[sig_path]!=""){

		?>

		<tr>

			<td width="478" align="center">ลงชื่อ<img src="sig/<?=$row1[sig_path]?>" width="125" height="60" style="border-bottom:1px dotted #000;" />ผู้รับรอง</td>

		</tr>

		<tr>

			<td align="center">(<?=$row1[sig_name]?>)</td>

		</tr>

		<?

		if($row1[position1]!=""){

			echo "<tr>";

			echo "<td align=\"center\">$row1[position1]</td>";

			echo "</tr>";

		}

		if($row1[position2]!=""){

			echo "<tr>";

			echo "<td align=\"center\">$row1[position2]</td>";

			echo "</tr>";

		}

		?>

		<?

	}else{

		?>

		<tr>

			<td width="478" align="center">ลงชื่อ..................................................................... ผู้รับรอง</td>

		</tr>

		<tr>

			<td align="center">(............................................................)</td>

		</tr>

		<?

	}

	?>



	<tr>

		<td align="center">(<?=substr($data[data_date],0,2)."/".substr($data[data_date],2,2)."/".substr($data[data_date],4,4)?>)</td>

	</tr>

	<tr>

		<td align="center">วัน เดือน ปี ที่ออกหนังสือรับรอง</td>

	</tr>

</table>



<p align="center"  style="font-size:large">เอกสารฉบับนี้เป็นเอกสารของทางราชการ ผู้ใดทำการปลอมแปลง แก้ไขส่วนใดส่วนหนึ่ง ถือว่าเป็นความผิดทางวินัยและอาญา</p>
