 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
  td {
    padding: 0 15px;
    padding-top: 10px;
    padding-bottom: 10px;
  }
</style>
</head>
<body>
<center><h2><u></u></h2>
<form method="post" action="<?php echo base_url();?>Companycontroller/expamountinsert">
	<table>
		<input type="hidden" name="hide" value="<?php echo $id;?>">
	<tr><td>Total Amount</td><td><input type="text" name="expamount" class="form-control" required></td></tr>
	
	<tr><td></td><td><input type="submit" value="Submit"></td></tr>
	</table>
</form>
</center>
</body>
</html>