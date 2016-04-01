<?php
if(!empty($_REQUEST['data'])){
  $data = $_REQUEST['data'];
  $fname = mktime().".json";//generates random name

  $file = fopen("upload/" .$fname, 'w');//creates new file
  fwrite($file, $data);
  fclose($file);
  echo "upload/".$fname;
}
 ?>
