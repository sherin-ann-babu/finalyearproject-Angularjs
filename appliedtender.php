<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<center>
	
		<table class="table table-bordered" >
	<tr><th>Tender Type</th>
	    <th>Tender Name</th>
	    <th>Amount</th>
	    <th>Last date for apply</th>
	    <th>Posted on</th>
	    <th>Other details</th>
	</tr>
	<?php
	foreach($data as $row){


	?>
	<tr><td><?php echo $row->tendertype; ?></td>
		<td><?php echo $row->tendername; ?></td>
		<td><?php echo $row->amount ; ?></td>
		<td><?php echo $row->lastdateforapply; ?></td>
		<td><?php echo $row->posted_on; ?></td>
		<td><?php echo $row->otherdetails; ?></td>
		<?php if($row->tendertype=="Open Tender") { ?><td><a href="<?php echo base_url(); ?>Contractorcontroller/tenderapply/<?php echo $row->tid;?>" class="btn btn-primary">Apply </a></td>
		<?php }else{ ?>
		 <td><a href="<?php echo base_url(); ?>Contractorcontroller/tenderclosedapply/<?php echo $row->tid;?>" >Date </a></td>
		 <?php } ?>
		<!-- <td><a href="<?php echo base_url(); ?>Contractorcontroller/tenderapply/<?php echo $row->tid;?>">Apply </a></td> -->

		
	</tr>
    <?php } ?>
	</table>
	
</body>
</html>
