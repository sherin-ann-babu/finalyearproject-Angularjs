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
		<form method="post" action="<?php echo base_url(); ?>Companycontroller/shipupdate">
	<?php foreach($data as $row)
	{ ?>
	<table>
	<input type="hidden" name="id" value="<?php echo $row->shipid; ?>">
	<tr><td>Name</td><td><input type="text" name="name" class="form-control" value="<?php echo $row->sname; ?>"></td></tr>
	<tr><td>Category</td><td><textarea name="scategory" class="form-control" ><?php echo $row->scategory; ?></textarea></td></tr> 
	<tr><td>Source</td><td><input type="text" name="source" class="form-control" value="<?php echo $row->source; ?>"></td></tr>
	<tr><td>Destination</td><td><input type="text" name="destination" class="form-control" value="<?php echo $row->destination; ?>"></td></tr>
	<tr><td>Travelroute</td><td><input type="text" name="travelroute" class="form-control"  value="<?php echo $row->travelroute; ?>"></td></tr>
	<tr><td>Startingdate</td><td><input type="text" name="startingdate" class="form-control"  value="<?php echo $row->startingdate; ?>"></td></tr>
	<tr><td>Endingdate</td><td><input type="text" name="endingdate" class="form-control"  value="<?php echo $row->endingdate; ?>"></td></tr>
  
	<tr><td>Otherdetails</td><td><input type="text" name="otherdetails" class="form-control"  value="<?php echo $row->otherdetails; ?>" ></td></tr>
	<tr><td></td><td><input type="Submit" value="Edit" class="btn btn-primary"></td></tr>
	</table>
 <?php
  } ?>
</form>
</center>

</body>
</html>