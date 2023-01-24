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
		<form method="post" action="<?php echo base_url(); ?>Companycontroller/update">
	<?php foreach($data as $row)
	{ ?>
	<table>
	<input type="hidden" name="id" value="<?php echo $row->comloginid; ?>">
	
	<tr><td>Name</td><td><input type="text" value="<?php echo $row->companyname; ?>"name="compname" class="form-control"></td></tr>
	<tr><td>Address</td><td><textarea name="address" class="form-control"><?php echo $row->address; ?></textarea></td></tr>
	<tr><td>State</td><td><select name="state" class="form-control">
									<option value="<?php echo $row->state; ?>" selected="" disabled=""><?php echo $row->state; ?></option>
									<option>Andhra Pradesh </option>
									<option>Arunachal Pradesh</option>
									<option>Goa</option>
									<option>Tamilnadu</option>
									<option>Meghalaya</option>
									<option>Gujarat</option>
									<option>WestBengal</option>
									<option>Assam</option>
									<option>Bihar </option>
									<option>Kerala</option>
								</select></td></tr>
	<tr><td>District</td><td><select name="district" class="form-control">
									<option value="<?php echo $row->district; ?>" selected="" disabled=""><?php echo $row->district; ?></option>
									<option>Bangura</option>
									<option>Patna</option>
									<option>Saran</option>
									<option>Kolkata</option>
									<option>Magadh</option>
									<option>Bhagalpur</option>
									<option>Thiruvananthapuram</option>
									<option>Kollam</option>
									<option>Pathanamthitta</option>
									<option>Alapuzha</option>
									<option>Kottayam</option>
									<option>Idukki</option>
									<option>Eranakulam</option>
									<option>Thrissur</option>
									<option>Palakkad</option>
									<option>Malapuram</option>
									<option>Kozhikode</option>
									<option>Wayanad</option>
									<option>Kannur</option>
									<option>Kasaragod</option>
									<option>Birbhum</option>
									<option>Howrah</option>
								</select></td></tr>
	<tr><td>Contactno</td><td><input type="text" name="contactno" value="<?php echo $row->contactno; ?>" class="form-control"></td></tr>
	<tr><td></td><td><input type="Submit" value="Edit" class="btn btn-primary"></td></tr>
	</table>
 <?php
  } ?>
</form> 
</center>
</div>

</body>
</html>