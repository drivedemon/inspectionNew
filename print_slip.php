<?
session_start();
include("MPDF54/mpdf.php");
include '../include/connect.php';
mysql_select_db("inspection_new");
$id = $_GET['id'];
$divi = $_GET['division'];
$type_export = $_GET['t'];
$font="font-family:garuda;table-layout:fixed;overflow:wrap;";

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

$sql = "SELECT d.type_locate,d.inspect_type,d.budget_year,ul.name,d.inspect_date";
$sql .= " ,d.r1_1,d.r1_2,d.r1_3,d.r1_4,d.r1_5";
$sql .= " ,d.r2_1,d.r2_2,d.r2_3,d.r2_4,d.r2_5,d.r2_6,d.r2_7";
$sql .= " ,d.r3_1,d.r3_2,d.r3_3,d.r3_4,d.r3_5,d.r3_6,d.r3_7,d.r3_8,d.r3_9,d.r3_10";

if (!empty($type_export)) {
  $sql .= " ,cr.r_cen1_1_1,cr.r_cen1_1_2,cr.r_cen1_2_1,cr.r_cen1_2_2,cr.r_cen1_3_1,cr.r_cen1_3_2,cr.r_cen1_4_1,cr.r_cen1_4_2,cr.r_cen1_5_1,cr.r_cen1_5_2,cr.r_cen1_5_3";
  $sql .= " ,cr.r_cen2_1_1,cr.r_cen2_1_2,cr.r_cen2_1_3,cr.r_cen2_2_1,cr.r_cen2_2_2,cr.r_cen2_2_3,cr.r_cen2_3_1,cr.r_cen2_3_2,cr.r_cen2_3_3,cr.r_cen2_4_1,cr.r_cen2_4_2";
  $sql .= " ,cr.r_cen2_5_1,cr.r_cen2_5_2,cr.r_cen2_6_1,cr.r_cen2_6_2,cr.r_cen2_6_3,cr.r_cen2_7_1,cr.r_cen2_7_2,cr.r_cen2_7_3,cr.r_cen3_1_1,cr.r_cen3_1_2,cr.r_cen3_1_3";
  $sql .= " ,cr.r_cen3_2_1,cr.r_cen3_2_2,cr.r_cen3_2_3,cr.r_cen3_3_1,cr.r_cen3_3_2,cr.r_cen3_3_3,cr.r_cen3_4_1,cr.r_cen3_4_2,cr.r_cen3_4_3,cr.r_cen3_5_1,cr.r_cen3_5_2";
  $sql .= " ,cr.r_cen3_5_3,cr.r_cen3_6_1,cr.r_cen3_6_2,cr.r_cen3_7_1,cr.r_cen3_7_2,cr.r_cen3_7_3,cr.r_cen3_8_1,cr.r_cen3_8_2,cr.r_cen3_9_1,cr.r_cen3_10_1";
  $sql .= " FROM data d, userlogin ul, center_reason cr";
  $sql .= " WHERE d.division=ul.username AND d.center_id=cr.id AND d.id='$id'";
} else {
  // $sql .= " ,";
  // $sql .= " FROM data d, userlogin ul, center_reason cr";
  // $sql .= " WHERE d.division=ul.username AND d.center_id=cr.id AND d.id='$id'";
}
// echo $sql;
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result);

$data['inspect_type'] = ($data['inspect_type'] == 1)?'ปกติ':'พิเศษ';

if ($data['type_locate'] == 1) {
  $stack = array("r1_1" => array("๑.๑ บุคลากร" => $data['r1_1'], "cen1_1" => array($data['r_cen1_1_1'], $data['r_cen1_1_2'])),
  "r1_2" => array("๑.๒ งบประมาณ" => $data['r1_2'], "cen1_2" => array($data['r_cen1_2_1'], $data['r_cen1_2_2'])),
  "r1_3" => array("๑.๓ อาคารสถานที่" => $data['r1_3'], "cen1_3" => array($data['r_cen1_3_1'], $data['r_cen1_3_2'])),
  "r1_4" => array("๑.๔ ยานพาหนะ" => $data['r1_4'], "cen1_4" => array($data['r_cen1_4_1'], $data['r_cen1_4_2'])),
  "r1_5" => array("๑.๕ ตัวชี้วัดตามคำรับรอง" => $data['r1_5'], "cen1_5" => array($data['r_cen1_5_1'], $data['r_cen1_5_2'], $data['r_cen1_5_3'])),
  "r2_1" => array("๒.๑ การรับตัวเด็กแและเยาวชน" => $data['r2_1'], "cen2_1" => array($data['r_cen2_1_1'], $data['r_cen2_1_2'], $data['r_cen2_1_3'])),
  "r2_2" => array("๒.๒ การประเมินความเสี่ยงและความจำเป็น" => $data['r2_2'], "cen2_2" => array($data['r_cen2_2_1'], $data['r_cen2_2_2'], $data['r_cen2_2_3'])),
  "r2_3" => array("๒.๓ การส่งต่อนักวิชาชีพเพื่อประเมินเฉพาะด้าน" => $data['r2_3'], "cen2_3" => array($data['r_cen2_3_1'], $data['r_cen2_3_2'], $data['r_cen2_3_3'])),
  "r2_4" => array("๒.๔ การรายงานข้อเท็จจริง" => $data['r2_4'], "cen2_4" => array($data['r_cen2_4_1'], $data['r_cen2_4_2'])),
  "r2_5" => array("๒.๕ การดำเนินงานตามมาตรการพิเศษ" => $data['r2_5'], "cen2_5" => array($data['r_cen2_5_1'], $data['r_cen2_5_2'])),
  "r2_6" => array("๒.๖ การลงข้อมูลในระบบ CM ของเด็กและเยาวชนถูกต้องครบถ้วน" => $data['r2_6'], "cen2_6" => array($data['r_cen2_6_1'], $data['r_cen2_6_2'], $data['r_cen2_6_3'])),
  "r3_1" => array("๓.๑ งานด้านคดี" => $data['r3_1'], "cen3_1" => array($data['r_cen3_1_1'], $data['r_cen3_1_2'], $data['r_cen3_1_3'])),
  "r3_2" => array("๓.๒ งานรักษาความมั่นคงปลอดภัย" => $data['r3_2'], "cen3_2" => array($data['r_cen3_2_1'], $data['r_cen3_2_2'], $data['r_cen3_2_3'])),
  "r3_3" => array("๓.๓ การควบคุมดูแลเด็กและเยาวชนในสถานควบคุม" => $data['r3_3'], "cen3_3" => array($data['r_cen3_3_1'], $data['r_cen3_3_2'], $data['r_cen3_3_3'])),
  "r3_4" => array("๓.๔ การแก้ไขบำบัดฟื้นฟูเด็กและเยาวชน" => $data['r3_4'], "cen3_4" => array($data['r_cen3_4_1'], $data['r_cen3_4_2'], $data['r_cen3_4_3'])),
  "r3_5" => array("๓.๕ การป้องกันและปราบปรามการทุจริตประพฤติมิชอบ" => $data['r3_5'], "cen3_5" => array($data['r_cen3_5_1'], $data['r_cen3_5_2'], $data['r_cen3_5_3'])),
  "r3_6" => array("๓.๖ การสนับสนุนของเครือข่าย" => $data['r3_6'], "cen3_6" => array($data['r_cen3_6_1'], $data['r_cen3_6_2'])),
  "r3_7" => array("๓.๗ การประหยัดพลังงาน" => $data['r3_7'], "cen3_7" => array($data['r_cen3_7_1'], $data['r_cen3_7_2'], $data['r_cen3_7_3'])),
  "r3_8" => array("๓.๘ การดำเนินงานด้านการเงินการคลัง" => $data['r3_8'], "cen3_8" => array($data['r_cen3_8_1'], $data['r_cen3_8_2'])),
  "r3_9" => array("๓.๙ การอำนวยความยุติธรรมและการป้องกันปัญหาเด็กและเยาวชน" => $data['r3_9'], "cen3_9" => array($data['r_cen3_9_1'])),
  "r3_10" => array("๓.๑๐ การสนับสนุนภารกิจของสถานพินิจ" => $data['r3_10'], "cen3_10" => array($data['r_cen3_10_1']))
);
} else {
  $stack = array("r1_1" => array("๑.๑ บุคลากร" => $data['r1_1'], "cen1_1" => array($data['r_cen1_1_1'], $data['r_cen1_1_2'])),
  "r1_2" => array("๑.๒ งบประมาณ" => $data['r1_2'], "cen1_2" => array($data['r_cen1_2_1'], $data['r_cen1_2_2'])),
  "r1_3" => array("๑.๓ อาคารสถานที่" => $data['r1_3'], "cen1_3" => array($data['r_cen1_3_1'], $data['r_cen1_3_2'])),
  "r1_4" => array("๑.๔ ยานพาหนะ" => $data['r1_4'], "cen1_4" => array($data['r_cen1_4_1'], $data['r_cen1_4_2'])),
  "r1_5" => array("๑.๕ ตัวชี้วัดตามคำรับรอง" => $data['r1_5'], "cen1_5" => array($data['r_cen1_5_1'], $data['r_cen1_5_2'], $data['r_cen1_5_3'])),
  "r2_1" => array("๒.๑ การรับตัวเด็กแและเยาวชน" => $data['r2_1'], "cen2_1" => array($data['r_cen2_1_1'], $data['r_cen2_1_2'], $data['r_cen2_1_3'])),
  "r2_2" => array("๒.๒ การจำแนกและจัดทำแผนฝึกอบรมรายบุคคล" => $data['r2_2'], "cen2_2" => array($data['r_cen2_2_1'], $data['r_cen2_2_2'], $data['r_cen2_2_3'])),
  "r2_3" => array("๒.๓ การฝึกอบรม/การบำบัด" => $data['r2_3'], "cen2_3" => array($data['r_cen2_3_1'], $data['r_cen2_3_2'], $data['r_cen2_3_3'])),
  "r2_4" => array("๒.๔ เกษตรอินทรีย์" => $data['r2_4'], "cen2_4" => array($data['r_cen2_4_1'], $data['r_cen2_4_2'])),
  "r2_5" => array("๒.๕ ห้องเรียนกีฬา" => $data['r2_5'], "cen2_5" => array($data['r_cen2_5_1'], $data['r_cen2_5_2'])),
  "r2_6" => array("๒.๖ การจัการจัดการศึกษาสามัญอาชีวศึกษาและอุดมศึกษา" => $data['r2_6'], "cen2_6" => array($data['r_cen2_6_1'], $data['r_cen2_6_2'], $data['r_cen2_6_3'])),
  "r2_7" => array("๒.๗ การลงข้อมูลในระบบ TR ของเด็กและเยาวชนถูกต้องครบถ้วน" => $data['r2_7'], "cen2_7" => array($data['r_cen2_7_1'], $data['r_cen2_7_2'], $data['r_cen2_7_3'])),
  "r3_1" => array("๓.๑ การรักษาความมั่นคงปลอดภัย" => $data['r3_1'], "cen3_1" => array($data['r_cen3_1_1'], $data['r_cen3_1_2'], $data['r_cen3_1_3'])),
  "r3_2" => array("๓.๒ การบริการที่เป็นมิตแก่เด็กและเยาวชน" => $data['r3_2'], "cen3_2" => array($data['r_cen3_2_1'], $data['r_cen3_2_2'], $data['r_cen3_2_3'])),
  "r3_3" => array("๓.๓ การรับตัวเด็กและเยาวชน" => $data['r3_3'], "cen3_3" => array($data['r_cen3_3_1'], $data['r_cen3_3_2'], $data['r_cen3_3_3'])),
  "r3_4" => array("๓.๔ การบำบัดแก้ไขฟื้นฟูเด็กและเยาวชน" => $data['r3_4'], "cen3_4" => array($data['r_cen3_4_1'], $data['r_cen3_4_2'], $data['r_cen3_4_3'])),
  "r3_5" => array("๓.๕ การประชุมคณะกรรมการสหวิชาชีพ" => $data['r3_5'], "cen3_5" => array($data['r_cen3_5_1'], $data['r_cen3_5_2'], $data['r_cen3_5_3'])),
  "r3_6" => array("๓.๖ การติดตามภายหลังปล่อย" => $data['r3_6'], "cen3_6" => array($data['r_cen3_6_1'], $data['r_cen3_6_2'])),
  "r3_7" => array("๓.๗ การดำเนินงานป้องกันและปราบปรามการทุจริตประพฤติมิชอบ" => $data['r3_7'], "cen3_7" => array($data['r_cen3_7_1'], $data['r_cen3_7_2'], $data['r_cen3_7_3'])),
  "r3_8" => array("๓.๘ การสนับสนุนการดำเนินงานของเครือข่าย" => $data['r3_8'], "cen3_8" => array($data['r_cen3_8_1'], $data['r_cen3_8_2'])),
  "r3_9" => array("๓.๙ การประหยัดพลังงาน" => $data['r3_9'], "cen3_9" => array($data['r_cen3_9_1'])),
  "r3_10" => array("๓.๑๐ การเงินการคลัง" => $data['r3_10'], "cen3_10" => array($data['r_cen3_10_1']))
);
}

$ins_d = thainumDigit(substr($data['inspect_date'], -2));
$ins_m = monthnumDigit(substr($data['inspect_date'], 5, -3));
$ins_y = thainumDigit(substr($data['inspect_date'], 0, -6)+543);
$ins_fulldate = $ins_d." ".$ins_m." ".$ins_y;


ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
  <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
  </head>
  <body>
    <div class="msg">
      <?
      // foreach ($stack as $key => $value) {
      //   echo "$key==";
      //   // print_r($value);
      //   echo "<br>";
      //   foreach ($value as $skey => $svalue) {
      //     echo "$skey===";
      //     if (!empty($svalue)) {
      //     if (!is_array($svalue)) {
      //       echo "$svalue";
      //     } else {
      //       print_r($svalue);
      //       // echo "===";
      //       //   print_r($svalue[1]);
      //     }
      //   }
      //     echo "<br>";
      //   }
      // }
      if($data==""){
        echo "ไม่พบข้อมูล";
        exit(0);
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
    </table>

    <br />
    <table align="center" cellpadding="5" cellspacing="0" class="tb_slip" style="<?=$font?> ">
      <thead>
        <tr style="height: 20px !important;">
          <th width="15%">หัวข้อการตรวจราชการ</th>
          <th width="55%">ข้อค้นพอ/ผลการดำเนินงาน</th>
          <th width="25%">ข้อเสนอแนะของผู้ตรวจราชการกรม</th>
        </tr>
      </thead>

      <tbody>
        <!-- <td width='20%' valign='top'></td>
        <td width='20%' valign='top'></td>
        <td width='20%' valign='top'></td> -->
        <?php
        foreach ($stack as $key => $value) {
          foreach ($value as $skey => $svalue) {
            if (!is_array($svalue)) {
              echo "<tr>";
              echo "<td width='20%' valign='top'>$skey</td>";
              if (!empty($svalue)) {
                echo "<td width='20%' valign='top'>".thainumDigit($svalue)."</td>";
              } else {
                echo "<td width='20%' valign='top'>-</td>";
              }
            } else {
              echo "<td width='20%' valign='top'>";
              if (!empty($svalue[0])) {
                echo "- ";
                print_r(thainumDigit($svalue[0]));
                echo "<br>";
              }
              if (!empty($svalue[1])) {
                echo "- ";
                print_r(thainumDigit($svalue[1]));
                echo "<br>";
              }
              if (!empty($svalue[2])) {
                echo "- ";
                print_r(thainumDigit($svalue[2]));
              }
              if (empty($svalue[0]) && empty($svalue[1]) && empty($svalue[2])) {
                echo "- ";
              }
              echo "</td>";
              echo "</tr>";
            }
          }
        }
      ?>

    </tbody>
  </table>
</body>
</html>





<?php
$html = ob_get_contents(); //เก็บค่า html ไว้ใน $html
ob_end_clean();
$mpdf=new mPDF();
$mpdf=new mPDF('th', 'A4-L', 0, 'UTF-8');

$mpdf->SetDisplayMode('fullpage');
$mpdf->SetAutoFont();

// LOAD a stylesheet
$stylesheet = file_get_contents('css/slip_style.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($html);

$mpdf->Output();

exit;
?>
