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
<form method="post" action="<?php echo base_url();?>Companycontroller/shipdetailsinsert">
	<table>
	<tr><td>Name</td><td><input type="text" name="name" class="form-control" required></td></tr>
	<tr><td>Category</td><td><select name="scategory">
		<option value="none" selected="" disabled="">Select</option>
	<option value="goods">Goods</option><option value="travelling">Travelling</option></select></td></tr>
	<tr><td>Source</td><td><input type="text" name="source" class="form-control" required></td></tr>
	<tr><td>Destination</td><td><input type="text" name="destination" class="form-control" required></td></tr>
	<tr><td>Travelroute</td><td><input type="text" name="travelroute" class="form-control" required></td></tr>
	<tr><td>Startingdate</td><td><input type="date" name="startingdate" class="form-control" required></td></tr>
	<tr><td>Endingdate</td><td><input type="date" name="endingdate" class="form-control" required></td></tr>
	<tr><td>Otherdetails</td><td><input type="text" name="otherdetails" class="form-control" required></td></tr>
	<tr><td></td><td><input type="submit" value="ADD" class="btn btn-primary"></td></tr>
	</table>
</form>
</center>
</body>
</html>