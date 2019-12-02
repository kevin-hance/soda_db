<?php
  include('database.php');
  mysql_select_db('sodatastic',$dbLocalhost) or die("Cannot connect: ".mysql_error());
  $dbRecords = mysql_query("SELECT * FROM drink_type WHERE drink_type_name = 'Health'",$dbLocalhost) or die("Problem reading table: ".mysql_error());

  $drinkt = array();
  while($record = mysql_fetch_row($dbRecords)){
      $drinkt[$record[0]] = array('name'=>$record[1]);
  }
  foreach($drinkt as $i => $v){
    echo "$i {$v['name']}</br>";
  }
?>