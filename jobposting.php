<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Job Details</title>
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
<form method="post" action="<?php echo base_url();?>Companycontroller/jobinsert">
	<table>
	<tr><td>Job category</td><td><input type="text" name="jobcategory" class="form-control" required></td></tr>
	
	<tr><td>Job name</td><td><input type="text" name="jobname" class="form-control" required></td></tr>
	<tr><td>Job details</td><td><input type="text" name="jobdetails" class="form-control" required></td></tr>
	<tr><td>Last date for apply</td><td><input type="date" name="lastdate" class="form-control" required></td></tr>
	
	<tr><td>Qualifications</td><td><input type="text" name="qualification" class="form-control" required></td></tr>
	<tr><td></td><td><input type="submit" value="Post" class="btn btn-success"></td></tr>
	</table>
</form>
</center>
</body>
</html>