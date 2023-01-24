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
	<table class="table table-bordered"> 
	<tr>
	    <th>Name of user</th>
	    <th>Address</th>
	    <th>Contactno</th>
		<th>Product Category </th>
	    <th>Product subcategory</th>
	    <th>Companyname</th>
	    <th>Complaint</th>
	    <th>Damaged products</th>
	    <th>Photo</th>
	    <th>Complaint posted on</th>
	    
	    
	    

	</tr>
	<?php
	foreach($data as $row){


	?>
	<tr> 
        <td><?php echo $row->name ;?></td>
        <td><?php echo $row->address; ?></td>
        <td><?php echo $row->contactno; ?></td>
		<td><?php echo $row->category; ?></td>
		<td><?php echo $row->subcategory; ?></td>
		<td><?php echo $row->companyname ; ?></td>
		<td><?php echo $row->complaint ; ?></td>
		<td><?php echo $row->cnoofproducts ; ?></td>
		<td><img src="<?php echo base_url(); ?>uploads/<?php echo $row->photo; ?>"height="100" width="100"></td>
		<td><?php echo $row->currentdate; ?></td>

		<?php if($row->cstatus==0){ ?>
        <td><a href="<?php echo base_url(); ?>Companycontroller/approvecomplaint/<?php echo $row->cid;?>"class="btn btn-success">Approve </a></td>
        <td><a href="<?php echo base_url(); ?>Companycontroller/rejectcomplaint/<?php echo $row->cid; ?>"class="btn btn-danger">Reject</a></td>
        <?php } elseif($row->cstatus==1){ ?>
        <td><i class="btn btn-success">Approved</i></td>
        <td><a href="<?php echo base_url(); ?>Companycontroller/rejectcomplaint/<?php echo $row->cid; ?>"class="btn btn-danger">Reject</a></td>
         <?php } else { ?>
         <td><i class="btn btn-danger"> Rejected </i></td>
         <td><a href="<?php echo base_url(); ?>Companycontroller/approvecomplaint/<?php echo $row->cid;?>"class="btn btn-success">Approve </a></td>
         <?php } ?>

         <?php if( $row->cstatus==1 && $row->refstatus==1) { ?>
		<td><a href="<?php echo base_url(); ?>Companycontroller/comrefund/<?php echo $row->cid;?>" class="btn btn-primary">Refund Succes </a></td>
	
	<?php } else{ ?>
		<td></td>
	<?php } ?>
	</tr>
    <?php } ?>
	</table>
	
</center>
</body>
</html>