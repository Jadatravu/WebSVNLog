<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Subversion Browser results</title>
 <head> <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
</head>
<body>
<div class ="table-responsive">
<table class = "table table-striped table-bordered" >
<thead>
<tr><th>Revision</th><th>Author</th><th>Message</th></tr>
</thead>
<tbody>
<?php
$branch = trim(strip_tags($_REQUEST['branch']));
$from_date = trim(strip_tags($_REQUEST['datevalue']));
$to_date = trim(strip_tags($_REQUEST['datevalue1']));
$result=exec("python /var/www/html/svn_log.py $branch $from_date $to_date",$out);
$res_dec = json_decode($result,true);
$flag = ksort($res_dec,SORT_NUMERIC);
/*
if ($flag){
echo ("<tr><td>True</td><td></td><td></td></tr>");
}else{
echo ("<tr><td>False</td><td></td><td></td></tr>");

}*/
foreach ($res_dec as $key => $val){
   echo ("<tr><td>").$key.("</td>");
   echo ("<td>").$val["author"].("</td>");
   echo ("<td>").$val["message"].("</td><tr>");
   //echo ("<tr><td>"). $key. ("</td><td>"). $res_dec->$key->author. ("</td><td>").$res_dic->$key->message.("</td></tr>");
}
?>
</tbody>
</table>
</div>
</body>
</html>
