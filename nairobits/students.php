<?php
require('connection.php');
?>
<?php
if(isset($_POST['btn_guests'])){
//form variables
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$password=$_POST['password'];
	//password statement
	$fname=ucfirst(mysqli_real_escape_string($conn,$_POST['fname']));
	$lname=ucfirst(mysqli_real_escape_string($conn,$_POST['lname']));
	$password=md5($_POST['psw']);


	//sql statement
	$query="INSERT INTO student_tbl(firstname,lastname)VALUES
	       ('{$fname}','{$lname}')";
	       $result=mysqli_query($conn,$query);
	       header("Location:students.php");
	      
}

if(isset($_GET['deleteid'])){
$id=$_GET['deleteid'];
$query="DELETE FROM student_tbl WHERE id=$studentid";
   $result=mysqli_query($conn,$query);
	       header("Location:students.php");


}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Nairobits Students</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="header">
	<h2 style="color: #fff;">Nairobits Student Database</h2>
</div>

<form action="students.php" method="POST" name="guest_form" onsubmit="return validate()">
<div class="input-group">
<label>First Name</label><br>
<input type="text" name="fname"><br>
</div>
<div class="input-group">
<label>Last Name</label><br>
<input type="text" name="lname"><br>
</div>
<div class="input-group">
<label>Password</label><br>
<input type="password" name="psw"><br>
</div>
<div class="input-group">
<input type="submit" name="btn_guests" value="submit" class="btn btn-success">
</div>
</form>
<table class="table table-striped ">
	<thead>
		<tr>
			<th>studentid</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Action</th>
		</tr>
    </thead>
    <tbody>
    <?php
$query="SELECT * FROM student_tbl";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result)){
	echo'
	 <tr>  
<td>'.$row['studentid'].'</td>
<td>'.$row['firstname'].'</td>
<td>'.$row['lastname'].'</td>
<td><a href="students.php?deleteid='.$row['studentid'].'"class="btn btn-danger btn-xs" onclick="return confirm(\'Delete?\')"><span class="glyphicon glyphicon-trash"></span></a>
<a href="students-edit.php?editid='.$row['studentid'].'"class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil "></span></a>
</td>



	</tr>';

}
?>	

    </tbody>


</table>









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