 <!DOCTYPE html>
<html  lang="en" ng-app="myApp">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
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
	<div ng-controller="cntrl"> 
<center><h2><u></u></h2>
<form method="post" action="<?php echo base_url();?>Companycontroller/companyinsert" name="SaveForm" ng-submit="funcSave()">
	<table >
	<tr><td>Name</td><td><input type="text" maxlength="60" ng-pattern="/^[a-zA-Z. ]*[a-zA-Z]{1,60}$/"  name="compname"  ng-model="compname" class="form-control" required><br/>                  
                 <span style="color:red" ng-show="SaveForm.compname.$dirty && SaveForm.compname.$invalid" class="ng-hide">   
                  Please Enter Valid  Name.!  
                 </span></td></tr>
	<tr><td>Address</td><td><textarea name="address" class="form-control" required></textarea></td></tr>
	<tr><td>State</td><td><select name="state" class="form-control">
									<option value="none" selected="" disabled="">Select</option>
									<option>Andhra Pradesh </option>
									<option>Arunachal Pradesh</option>
									<option>Goa</option>
									<option>Tamilnadu</option>
									<option>Tamilnadu</option>
									<option>Maharastra</option>
									<option>Meghalaya</option>
									<option>Gujarat</option>
									<option>WestBengal</option>
									<option>Assam</option>
									<option>Bihar </option>
									<option>Karnataka</option>
									<option>Kerala</option>
								</select></td></tr>
	<tr><td>District</td><td><select name="district" class="form-control">
									<option value="none" selected="" disabled="">Select</option>
									<option>Bangura</option>
									<option>Patna</option>
									<option>Saran</option>
									<option>Kanhil</option>
									<option>Kolkata</option>
									<option>Uddugur</option>
									<option>guowrdi</option>
									<option>North goa</option>
									<option>South goa</option>
									<option>Panaji</option>
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
	<tr><td>Contactno</td><td><input type="text" name="contactno" maxlength="12"  ng-pattern="/^[1-9][0-9]{11}$/" ng-model="contactno" class="form-control" required><br/>                      
                <span style="color:red" ng-show="SaveForm.contactno.$dirty && SaveForm.contactno.$invalid" class="ng-hide">   
                   Please Enter Valid  Contact No.!  
                   </span></td></tr>
	<tr><td>Email</td><td><input type="email" name="email" class="form-control" required/></td></tr>
	<tr><td>Password</td><td><input type="password" name="password" class="form-control"  required></td></tr>
	<tr><td></td><td><input type="submit" value="Register" ng-disabled="SaveForm.$invalid" class="btn btn-primary"></td></tr>
	</table>
</form>
<script>
var app = angular.module("myApp", []);  
      app.controller('cntrl',function($scope){  
          
       $scope.funcSave = function()  
       {  
          if($scope.SaveForm.$valid) {  
             alert("Form is Valid..!!");  
             }  
          else  
          {  
          alert("Form is not Valid..!!");  
          }  
       }  
         
       })      
            
</script> 
</center>
</body>
</html>