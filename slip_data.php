<?
session_start();
include '../include/connect.php';
mysql_select_db("inspection_new");

function thainamedepartFull($name){
	return str_replace(array( 'ศฝฯ' , 'สพฯ'),
	array( "ศูนย์ฝึกและอบรมเด็กและเยาวชน" , "สถานพินิจและคุ้มครองเด็กและเยาวชน"),
	$name);
};

function thainumDigit($num){
	return str_replace(array( '0' , '1' , '2' , '3' , '4' , '5' , '6' ,'7' , '8' , '9' ),
	array( "๐" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙" ),
	$num);
};

function monthnumDigit($num){
	return str_replace(array( '01' , '02' , '03' , '04' , '05' , '06' ,'07' , '08' , '09' , '10' , '11' , '12' ),
	array( "มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม" ),
	$num);
};

function utf8_strlen($s) {
		$c = strlen($s); $l = 0;
    for ($i = 0; $i < $c; ++$i) if ((ord($s[$i]) & 0xC0) != 0x80) ++$l;
    return $l;
}

$m=array(1=>'มกราคม',2=>'กุมภาพันธ์',3=>'มีนาคม',4=>'เมษายน',5=>'พฤษภาคม',6=>'มิถุนายน',7=>'กรกฎาคม',8=>'สิงหาคม',9=>'กันยายน',10=>'ตุลาคม',11=>'พฤศจิกายน',12=>'ธันวาคม');

$font="font-family:garuda;table-layout:fixed;";
$id=$_GET['id'];
$month=$_GET['month'];
$id_card=$_GET['id_card'];
$salary=$_GET['salary'];
// echo "$id";
// $sql="select * from $salary where id_card='$id_card' and year='$year' and month='$month'";
$sql = "SELECT d.inspect_type,d.budget_year,ul.name,d.inspect_date";
$sql .= " FROM data d, userlogin ul";
$sql .= " WHERE d.division=ul.username AND d.id='$id'";
// echo $sql;
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result);

$data['inspect_type'] = ($data['inspect_type'] == 1)?'ปกติ':'พิเศษ';
$ins_d = thainumDigit(substr($data['inspect_date'], -2));
$ins_m = monthnumDigit(substr($data['inspect_date'], 5, -3));
$ins_y = thainumDigit(substr($data['inspect_date'], 0, -6)+543);
$ins_fulldate = $ins_d." ".$ins_m." ".$ins_y;
// print_r($data);
// $newtext = "12345678901234567890123456789012345678901234567890123456789 ";
$newtext = "แนะนำให้หน่วยรับการตรวจพิจารณาใช้มาตรการพิเศษแทนการดำเนินคดีอาญาให้กับเด็กและเยาวชน โดยทำความเข้าใจกับผู้เสียหายและผู้ปกครองในการใช้มาตรการทางเลือกเพื่อแก้ไขเด็กและเยาวชน ที่อาจสามารถกลับตัวเป็นคนดีได้โดยไม่ต้องฟ้อง และแสดงถึงประสิทธิภาพและประสิทธิผลถึงระดับความสำเร็จในการบรรลุเป้าหมายตัวชี้วัดของหน ";
// $newtext = wordwrap($newtext, 72, "<br /> ", true);
$xnewtext = utf8_strlen($newtext);

echo $xnewtext;
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
		<td colspan="2" align="center"><strong>รายงานการตรวจราชการกรณี<?=$data['inspect_type']?> ประจำปีงบประมาณ พ.ศ. <?=thainumDigit($data['budget_year'])?></strong></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><strong>กรมพินิจและคุ้มครองเด็กและเยาวชน</strong></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><strong><?=thainamedepartFull($data['name'])?></strong></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><strong>วันที่ตรวจราชการ <?=$ins_fulldate?></strong></td>
	</tr>
	<tr>
		<td colspan="2" align="center">&nbsp;</td>
	</tr>
	<tr>
		<td width="118">ชื่อ-นามสกุล</td>
		<td class="dotted_fixwidth"><?=$data[prename].$data[firstname]." ".$data[lastname]?></td>
	</tr>
</table>

<br />
<table align="center" cellpadding="5" cellspacing="0" class="tb_slip" style="<?=$font?>">
	<thead>
		<tr style="height: 20px !important;">
			<th width="20%">หัวข้อการตรวจราชการ</th>
			<th width="55%">ข้อค้นพอ/ผลการดำเนินงาน</th>
			<th width="25%">ข้อเสนอแนะของผู้ตรวจราชการกรม</th>
		</tr>
	</thead>
	<tbody>
	<tr>
		<td valign="top">เงินเดือน/ค่าจ้างประจำ</td>
		<!-- 23 บรรทัด 60 char-->
		<td>
<?=$newtext?>

		</td>
		<td valign="top">

			<?=$newtext?>
		</td>
	</tr>
</tbody>
</table>
