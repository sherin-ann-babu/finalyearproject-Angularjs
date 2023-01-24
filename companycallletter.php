<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Call letter Details</title>
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
<form method="post" action="<?php echo base_url();?>Companycontroller/callletterinsert" enctype="multipart/form-data">
	<?php foreach($data as $row)
	{ ?>
	<table>
		<input type="hidden" name="id" value="<?php echo $row->jid; ?>"> 
	<tr><td>Upload Callletter</td><td><input type="file" name="uploadcallletter" class="form-control" required></td></tr>
	
	<tr><td></td><td><button type="submit" class="btn btn-primary">Submit</button></td></tr>
	</table>
	<?php
	} ?>
</form>
</center>
</body>
</html>