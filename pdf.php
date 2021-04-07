<?php
	require_once __DIR__ . '/vendor/autoload.php';
    include'connection.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];	
$mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8', 
            'format' => 'A4',
            'margin_left' => 15,
            'margin_right' => 15,
            'margin_top' => 16,
            'margin_bottom' => 16,
            'margin_header' => 9,
            'margin_footer' => 9,
            'mirrorMargins' => true,

            'fontDir' => array_merge($fontDirs, [
                __DIR__ . 'vendor/mpdf/mpdf/custom/font/directory',
            ]),
            'fontdata' => $fontData + [
                'thsarabun' => [
                    'R' => 'THSarabunNew.ttf',
                    'I' => 'THSarabunNew Italic.ttf',
                    'B' => 'THSarabunNew Bold.ttf',
                    'U' => 'THSarabunNew BoldItalic.ttf'
                ]
            ],
            'default_font' => 'thsarabun',
            'defaultPageNumStyle' => 1
        ]);

        $ftime = $_POST["ftime"];
        $ctime = $_POST["ctime"];
        $position = $_POST["position"];

        if(empty($position)){
            $sql = "SELECT b.id_emp,a.fname,a.lname,a.position ,b.mycount,b.mysum  FROM emp_standard a INNER JOIN 
            (SELECT id_emp,COUNT(*) AS mycount, SUM(ttime) AS mysum 
            FROM timework WHERE workdate BETWEEN '$ftime' AND '$ctime'  GROUP BY id_emp)  b ON b.id_emp = a.id_emp";
            $query = mysqli_query($conn, $sql);
        }else{
            $sql = "SELECT b.id_emp,a.fname,a.lname,a.position ,b.mycount,b.mysum  FROM emp_standard a INNER JOIN 
            (SELECT id_emp,COUNT(*) AS mycount, SUM(ttime) AS mysum 
            FROM timework WHERE workdate BETWEEN '$ftime' AND '$ctime' GROUP BY id_emp)  b ON b.id_emp = a.id_emp  WHERE a.position = '$position'";
            $query = mysqli_query($conn, $sql);
        }
        
    $content = "";
    if (mysqli_num_rows($query) > 0) {
        $i = 1;
        while($row = mysqli_fetch_assoc($query)) {
            $content .= '<tr style="border:1px solid #000;">
                <td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.$i.'</td>
                <td style="border-right:1px solid #000;padding:3px;text-align:center;" >'.$row['id_emp'].'</td>
                <td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.$row['fname'].'&nbsp;'.$row['lname'].'</td>
                <td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.$row['position'].'</td>
                <td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.$row['mysum'].'</td>
            </tr>';
            $i++;
        }
    }
    
    mysqli_close($conn);
    

 
$head = '
<h2 style ="text-align: center;"><img src="logo.jpg"  width="10%"  style="vertical-align:middle;margin:0px 0px"></h2>
<h2 style ="text-align: center;" > บริษัทน็อคดาวน์ เซ็นเตอร์ จำกัด</h2>
<h4 style ="text-align: center;" >รายงานสรุปผลชั่วโมงการทำงาน ตามผู้รับผิดชอบ </h4>
<hr>


<table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
    <tr style="border:1px solid #000;padding:4px;">
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="10%">ลำดับ</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="20%">รหัสพนักงาน</td>
        <td  width="30%" style="border-right:1px solid #000;padding:4px;text-align:center;">&nbsp;ชื่อ-นามสกุล</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="20%">ตำแหน่ง</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="20%">จำนวนชั่วโมง</td>
    </tr>
 
</thead>
    <tbody>';
    
$end = "</tbody>
</table>";
 
$mpdf->WriteHTML($head);
 
$mpdf->WriteHTML($content);
 
$mpdf->WriteHTML($end);
 
$mpdf->Output();