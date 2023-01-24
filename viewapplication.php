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
	<tr><th>Applicant</th>
		<th>Address</th>
		<th>District</th>
		<th>ContactNo</th>
	    <!-- <th>Job Category</th> -->
	    <!-- <th>Job name</th> -->
	    <!-- <th>Job details</th> -->
	    <!-- <th>Last date for apply</th> -->
	    <!-- <th>Qualification</th> -->
	    <th>CV</th>
	    

	</tr>
	<?php
	foreach($data as $row){


	?>
	<tr><td><?php echo $row->name; ?></td>
		<td><?php echo $row->address; ?></td>
		<td><?php echo $row->district; ?></td>
		<td><?php echo $row->contactno; ?></td>
		<!-- <td><?php echo $row->jobcategory; ?></td> -->
		<!-- <td><?php echo $row->jobname ; ?></td> -->
		<!-- <td><?php echo $row->jobdetails ; ?></td> -->
		<!-- <td><?php echo $row->lastdate ; ?></td> -->
		<!-- <td><?php echo $row->qualification ; ?></td> -->
		<td><?php echo $row->cv; ?></td>
		<?php if($row->cv!=null)
        {

        ?>
        <td><a href="<?php echo base_url();?>uploads/<?php echo $row->cv;?>"target="_blank">CV download</a></td>
        <?php
        }?>
        <?php if($row->apstatus==0){ ?>
        <td><a href="<?php echo base_url(); ?>Companycontroller/approvejob/<?php echo $row->jid;?>"class="btn btn-success">Approve </a></td>
        <td><a href="<?php echo base_url(); ?>Companycontroller/rejectjob/<?php echo $row->jid; ?>"class="btn btn-danger">Reject</a></td>
        <?php } elseif($row->apstatus==1){ ?>
        <td><a href="<?php echo base_url(); ?>Companycontroller/callletter/<?php echo $row->jid; ?>"class="btn btn-info">Send Interview Call letter</a></td> 
        <td><a href="<?php echo base_url(); ?>Companycontroller/rejectjob/<?php echo $row->jid; ?>"class="btn btn-danger">Reject</a></td>
         <?php } else { ?>
         <td>Rejected</td>
         <td><a href="<?php echo base_url(); ?>Companycontroller/approvejob/<?php echo $row->jid;?>"class="btn btn-success">Approve </a></td>
         <?php } ?>
		
	</tr>
    <?php } ?>
	</table>
	
</center>
</body>
</html>
