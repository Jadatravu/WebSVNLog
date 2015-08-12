<?php
$strg = trim(strip_tags($_REQUEST['term']));
$result_array = array();
$homepage = file_get_contents('/usr/local/share/WebSVNLog/svn_branches.json');
$obj = json_decode($homepage);
foreach ($obj as $value){
  if(strstr($value,$strg)){
    array_push($result_array, $value);
  }
}
print_r(json_encode($result_array));
?>
