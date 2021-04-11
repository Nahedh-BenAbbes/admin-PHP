<?php 

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
	<?php 

	if(isset($_POST['addnew'])){

		if( empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) ){
			echo "Please fillout all required fields"; 
		}else{		
			$name  = $_POST['name'];
			$email 	= $_POST['email'];
			$password 	= $_POST['password'];
			$sql = "INSERT INTO admin(name,email,password) 
		    VALUES('$name','$email','$password')";

			if( $con->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Successfully added new Admin</div>";
			}else{
				echo "<div class='alert alert-danger'>Error: There was an error while adding new user</div>";
			}
		}
	}
	?>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New Admin</h3> 
			<form action="" method="POST">
				<label for="name">name</label>
				<input type="text" id="name"  name="name" class="form-control"><br>
				<label for="email">email</label>
				<input type="text"  name="email" id="email" class="form-control"><br>
				<label for="password">password</label>
				<textarea rows="4" name="password" class="form-control"></textarea><br>
				<br>
				<input type="submit" name="addnew" class="btn btn-success" value="Add New">
			</form>
		</div>
	</div>
</div>
</div>

<?php 

 require_once 'footer.php';