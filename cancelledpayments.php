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
		<?php if($row->paystatus==0){ ?>
			<td>Not Paid</td>
		<?php } elseif($row->paystatus==1 && $row->refundstatus==0 ) { ?>
			<td><a href="<?php echo base_url(); ?>Companycontroller/refund/<?php echo $row->eid;?>">Refund</a></td>
		<?php } else { ?>
		
		
        <td>Refund sucess</td>
        
         <?php } ?>
		                     
		
		

		
	</tr>
    <?php } ?>
	</table>
	
</center>
</body>
</html>