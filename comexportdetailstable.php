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
	<table class="table table-bordered" >
	<tr>
	    <th>Ship Name</th>
		<th>Product Category </th>
	    <th>Product subcategory</th>
	    <th>Companyname</th>
	    <th>No.ofproducts</th>
	    <th>Recepient name</th>
	    <th>Recepient address</th>
	    <th>Recepient contactno</th>
	    <th>Recepient email</th>
	    <th>Applied on</th>
	    <th>Payment status</th>
	    <th>Cancel status</th>
	    
	    

	</tr>
	<?php
	foreach($data as $row){


	?>
	<tr> 
        <td><?php echo $row->name ;?></td>
		<td><?php echo $row->category; ?></td>
		<td><?php echo $row->subcategory; ?></td>
		<td><?php echo $row->companyname ; ?></td>
		<td><?php echo $row->noofproducts ; ?></td>
		<td><?php echo $row->recname ; ?></td>
		<td><?php echo $row->recaddress ; ?></td>
		<td><?php echo $row->reccontactno ; ?></td>
		<td><?php echo $row->recemail ; ?></td>
		<td><?php echo $row->applyon; ?></td>
		<?php if($row->paystatus==1){ ?>
			<td>Paid</td>
		<?php } else { ?>
			<td> Pending </td>
		<?php } ?>
		<?php if($row->cancelstatus==1){ ?>
			<td>Cancelled</td>
		<?php } else { ?>
			<td> Not cancelled </td>
		<?php } ?>
		
		<?php if($row->status==0){ ?>
        <td><a href="<?php echo base_url(); ?>Companycontroller/approveexport/<?php echo $row->eid;?>"class="btn btn-success">Approve </a></td>
        <td><a href="<?php echo base_url(); ?>Companycontroller/rejectexport/<?php echo $row->eid; ?>"class="btn btn-danger">Reject</a></td>
        <?php } elseif($row->status==1){ ?>
        <td>Approved</td>
        <td><a href="<?php echo base_url(); ?>Companycontroller/rejectexport/<?php echo $row->eid; ?>"class="btn btn-danger">Reject</a></td>
         <?php } else { ?>
         <td>Rejected</td>
         <td><a href="<?php echo base_url(); ?>Companycontroller/approveexport/<?php echo $row->eid;?>"class="btn btn-success">Approve </a></td>
         <?php } ?>
         <?php if($row->paystatus!=0 && $row->cancelstatus==1 && $row->refundstatus==0) { ?>
		<td><a href="<?php echo base_url(); ?>Companycontroller/refund/<?php echo $row->eid;?>" class="btn btn-warning">Refund </a></td>
	<?php } elseif($row->paystatus!=0 && $row->cancelstatus==1 && $row->refundstatus==1) {?>
		<td><i class="btn btn-info">Refund Success</i></td>
	<?php } else{ ?>
		<td></td>
	<?php } ?>
		                     
		
		

		
	</tr>
    <?php } ?>
	</table>
	
</center>
</body>
</html>