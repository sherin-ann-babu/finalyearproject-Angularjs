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
	<tr><th>Name</th>
	    <th>Category</th>
	    <th>Source</th>
	    <th>Destination</th>
	    <th>Travelroute</th>
	    <th>Startingdate</th>
	    <th>Endingdate</th>
	    <th>Otherdetails</th>

	</tr>
	<?php
	foreach($data as $row){


	?>
	<tr><td><?php echo $row->sname; ?></td>
		<td><?php echo $row->scategory; ?></td>
		<td><?php echo $row->source ; ?></td>
		<td><?php echo $row->destination ; ?></td>
		<td><?php echo $row->travelroute ; ?></td>
		<td><?php echo $row->startingdate ; ?></td>
		<td><?php echo $row->endingdate ; ?></td>
		<td><?php echo $row->otherdetails ; ?></td>
		

		<td><a href="<?php echo base_url(); ?>Companycontroller/editship/<?php echo $row->shipid;?>" class="btn btn-success">Edit </a></td>
		<td><a href="<?php echo base_url(); ?>Companycontroller/shipdelete/<?php echo $row->shipid; ?>" class="btn btn-danger">Delete</a></td>
	</tr>
    <?php } ?>
	</table>
	
</center>
</body>
</html>
