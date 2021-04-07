<?php include 'connection.php';

$sql3 ="SELECT `workin`,`workout` FROM `timework`";
$result3 = mysqli_query($conn,$sql3) or die("Error in query: $sql3 " .mysqli_error($sql3));
$arr = mysqli_fetch_array($result3);

$start_time = $arr['workin'];
$end_time = $arr['workout'];




$data = array($start_time);
$date = new DateTime($end_time);
$h =0;
$m =0;
$s =0;

    foreach($data as $time){
        $a = explode(":",$time);
        $h = $h-$a[0];
        $m = $m-$a[1];
        $s = $s-$a[2];
    }
    $date->modify("$h hour $m min");
    $sum = $date->format('H ชั่วโมง i นาที ');
    var_dump($sum);

?>

<?php
// $data = array("02:00:00", "01:00:00");
// $date = new DateTime('0000-00-00 00:00:00');
// $h = 0;
// $m = 0;
// $s = 0;
// foreach($data as $time){
//     $a = explode(":",$time);    
//     $h = $h+$a[0];
//     $m = $m+$a[1];
//     $s = $s+$a[2];
// }
// $date->modify("$h hour $m min $s sec");
// echo $date->format('H ชั่วโมง i นาที s วินาที');
 
?>

