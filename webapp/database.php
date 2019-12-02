<?php
$dbLocalhost = mysql_connect("localhost","root","usbw") or die("Cannot connect: ".mysql_error());

mysql_select_db('sodatastic',$dbLocalhost) or die("Cannot connect: ".mysql_error());

// $dbRecords = mysql_query("SELECT * FROM drink",$dbLocalhost) or die("Problem reading table: ".mysql_error());

// $drink = array();
// while($record = mysql_fetch_row($dbRecords)){
//     $drink[$record[0]] = array('name'=>$record[1], 'man_id'=>$record[2], 'caffine'=>$record[3],
//       'surgar'=>$record[4], 'sodium'=>$record[5], 'serving'=>$record[6],
//       'drink_type_id'=>$record[7], 'flavor_id'=>$record[8]);
// }
// foreach($drink as $i => $v){
//   echo "$i {$v['name']}</br>";
// }

// echo "<a href='test.php'>here</a>";


// $_SESSION['drink'] = $drink;
// mysql_close($dbLocalhost);
?>