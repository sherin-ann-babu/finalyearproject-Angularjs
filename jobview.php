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
	
	<table border="2">
	<tr>
	    <th>Job category</th>
	    <th>Job name</th>
	    <th>Job details</th>
	    <th>Last date for apply</th>
	    <th>Qualifications</th>
	    

	</tr>
	<?php
	foreach($data as $row){


	?>
	<tr><td><?php echo $row->jobcategory; ?></td>
		<td><?php echo $row->jobname; ?></td>
		<td><?php echo $row->jobdetails ; ?></td>
		<td><?php echo $row->lastdate ; ?></td>
		<td><?php echo $row->qualification ; ?></td>
		
		

		<td><a href="<?php echo base_url(); ?>Companycontroller/editjob/<?php echo $row->jobid;?>"class="btn btn-success">Edit </a></td>
		<td><a href="<?php echo base_url(); ?>Companycontroller/deletejob/<?php echo $row->jobid; ?>"class="btn btn-danger">Delete</a></td>
		<td><a href="<?php echo base_url(); ?>Companycontroller/jobviewapplication/<?php echo $row->jobid;?>">View job application </a></td>
	</tr>
    <?php } ?>
	</table>
	
</center>
</body>
</html>
