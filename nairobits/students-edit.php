<?php
require('connection.php');
?>
<?php
 //edit variable      
if(isset($_GET['editid'])){

	$editid=$_GET['editid'];
	}
	    elseif(isset($_POST['editid'])){
    $editid = $_POST['editid'];
    $fname=ucfirst(mysqli_real_escape_string($conn,$_POST['fname']));
	$lname=ucfirst(mysqli_real_escape_string($conn,$_POST['lname']));

     	$query="UPDATE student_tbl SET firstname='{$fname}',
     	lastname='{$lname}' WHERE studentid= $editid";
    $result=mysqli_query($conn,$query);
        header("Location:students-edit.php?editid=$editid&success=1");
}
	else{
		header("Location:students.php");
	}

//sql statement
	$query="SELECT * FROM student_tbl WHERE studentid=$editid";
	  $result=mysqli_query($conn,$query)or die ("Query failed".mysqli_error($conn));   
	  
	 while($row=mysqli_fetch_array($result)){
	$fname=$row['firstname'];
	$lname=$row['lastname'];
	      }
	     ?>






<!DOCTYPE html>
<html>
<head>
	<title>guestform</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="header">
	<h2 style="color: #fff;">Nairobits students</h2>
</div>

<form action="students-edit.php" method="POST" name="guest_form" onsubmit="return validate()">
<?php if(isset($_GET['success'])){
echo '<div class="alert alert-success">Update Successful.</div>';
}
?>
<div class="input-group">
<input type="hidden" value="<?php echo $editid;?>" name="editid">
</div>                                                                                                                                                                                                                                                                                                                                             	    
<div class="input-group">
<input type="text" name="fname" value="<?php echo $fname;?>"><br> 
<label>First Name</label><br>
</div>
<div class="input-group">
<input type="text" name="lname" value="<?php echo $lname;?>"><br><br>
<label>Last Name</label><br>
</div>

<div class="input-group">
<input type="password" name="psw"><br><br>
<label>Password</label><br>
</div>

<input type="submit" name="update" value="update" class="btn btn-success">
<a class="btn btn-primary" href="students.php">Close</a>

</form>



<!-- script -->

<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
function  validate(){
var Fname=document.guest_form.fname.value;
var Lname=document.guest_form.lname.value;
var Password=document.guest_form.Password.value;
if(Fname==""){
alert('Please Enter First Name');
return false;
}
if(Lname==""){
alert('Please Enter Last Name');
return false;
}
if(Password==""){
alert('Please Enter Your Password');
return false;
}
return true;
}
	
</script>

</body>
</html>