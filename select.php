<?php

include 'connection.php';
$id = $_POST['id'];
$outp = '';


$query1 = "SELECT * FROM  member a LEFT JOIN emp_standard b ON a.id_emp = b.id_emp 
                                    LEFT JOIN emp_address c on b.id_emp = c.id_emp 
                                    where a.id_emp = $id";

$result = mysqli_query($conn, $query1);



$outp .= "<div class='table table-responsive'>
    <table class='table table-bordered'>";
while ($row = mysqli_fetch_array($result)) {
    $outp .= '<tr>
                    <td width="30%"><label>รหัสพนักงาน</label></td>
                    <td width="70%">' . $row['id_emp'] . '</td>
                </tr>';

    $outp .= '<tr>
                <td width="30%"><label>ชื่อผู้ใช้งาน</label></td>
                <td width="70%">' . $row['username'] . '</td>
            </tr>';

    $outp .= '<tr>
            <td width="30%"><label>รหัสผ่าน</label></td>
            <td width="70%">' . $row['password'] . '</td>
             </tr>';

    $outp .= '<tr>
             <td width="30%"><label>ประเภทผู้ใช้งาน</label></td>
             <td width="70%">' . $row['role'] . '</td>
              </tr>';


    $outp .= '<tr>
              <td width="30%"><label>ตำแหน่ง</label></td>
              <td width="70%">' . $row['position'] . '</td>
          </tr>';

    $outp .= '<tr>
              <td width="30%"><label>ชื่อเล่น</label></td>
              <td width="70%">' . $row['nname'] . '</td>
          </tr>';

    $outp .= '<tr>
          <td width="30%"><label>ชื่อ</label></td>
          <td width="70%">' . $row['fname'] . '</td>
      </tr>';

    $outp .= '<tr>
      <td width="30%"><label>นามสกุล</label></td>
      <td width="70%">' . $row['lname'] . '</td>
       </tr>';

    $outp .= '<tr>
       <td width="30%"><label>เบอร์โทรศัพท์</label></td>
       <td width="70%">' . $row['tel'] . '</td>
        </tr>';


    $outp .= '<tr>
        <td width="30%"><label>ที่อยู่</label></td>
        <td width="70%">' . $row['hose'] . '</td>
         </tr>';

    $outp .= '<tr>
         <td width="30%"><label>ตำบล</label></td>
         <td width="70%">' . $row['supdistrict'] . '</td>
     </tr>';

    $outp .= '<tr>
     <td width="30%"><label>อำเภอ</label></td>
     <td width="70%">' . $row['district'] . '</td>
 </tr>';

    $outp .= '<tr>
 <td width="30%"><label>จังหวัด</label></td>
 <td width="70%">' . $row['province'] . '</td>
  </tr>';

    $outp .= '<tr>
  <td width="30%"><label>รหัสไปรษณีย์</label></td>
  <td width="70%">' . $row['PostalCode'] . '</td>
   </tr>';
}

$outp .= '</table></div>';
echo $outp;
