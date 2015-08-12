<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Subversion Browser</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
      <script> $(function() { $( "#datepicker" ).datepicker(); }); </script>
      <script> $(function() { $( "#datepicker1" ).datepicker(); }); </script>
  <script>
  $(function() {
    $( "#tags" ).autocomplete({
      source: "/get_branch_list.php"
    });
  });
  </script>
<style>
input[type=text1] {
    padding: 9px;
    border: solid 1px #0B173B;
    outline: 0;
    font: normal 13px/100% Verdana, Tahoma, sans-serif;
    width: 200px;
    background: #FFFFFF;
    }
input[type=submit] {
    padding: 9px;
    border: solid 1px #0B173B;
    outline: 0;
    font: normal 13px/100% Verdana, Tahoma, sans-serif;
    width: 100px;
    background: #FFFFFF;
    }
.form label {
    margin-left: 10px;
    color: #0B173B;
    
</style>
</head>
<body>
<center><h2> CSI Subversion Browser </h2>
<form action="get_data.php" method="post" enctype="multipart/form-data"> 
<div class="ui-widget">
<table>
  <tr><td><label for="tags">Branch: </label></td>
  <td><input type="text1" id="tags" name="branch"></td><tr>
  <tr><td><label for ="tags">From Date:</label></td>
  <td><input type="text1" name="datevalue" id="datepicker" /></td></tr>
  <tr><td><label for ="tags">To Date:</label></td>
  <td><input type="text1" name="datevalue1" id="datepicker1" /> </td></tr>
 <tr><td></td><td><input type=submit value = "Get Data"></td><tr>
</table>
</div></center>
</form>
 
</body>
</html>
