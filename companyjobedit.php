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
	<center>
		<form method="post" action="<?php echo base_url(); ?>Companycontroller/updatejob">
	<?php foreach($data as $row)
	{ ?>
	<table>
	<input type="hidden" name="id" value="<?php echo $row->jobid; ?>"> 
	<tr><td>Job category</td><td><input type="text" name="jobcategory" value="<?php echo $row->jobcategory; ?>"></td></tr>
 
	<tr><td>Job name</td><td><input type="text" name="jobname" value="<?php echo $row->jobname; ?>"></td></tr>
	<tr><td>Job details</td><td><textarea name="jobdetails" ><?php echo $row->jobdetails; ?></textarea></td></tr> 
	<tr><td>Last date for apply</td><td><input type="text" name="lastdate" value="<?php echo $row->lastdate; ?>"></td></tr>
	<tr><td>Qualifications</td><td><input type="text" name="qualification" value="<?php echo $row->qualification; ?>"></td></tr>
	
	<tr><td></td><td><input type="Submit" value="Edit"></td></tr>
	</table>
 <?php
  } ?>
</form>
</center>

</body>
</html>