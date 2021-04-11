<?php 

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
	<?php 

	if(isset($_POST['addnew'])){

		if( empty($_POST['first_name']) || empty($_POST['last_name']) ){
			echo "Please fillout all required fields"; 
		}else{		
			$first_name  = $_POST['first_name'];
			$last_name 	= $_POST['last_name'];
			$sql = "INSERT INTO teacher(first_name,last_name) 
		    VALUES('$first_name','$last_name')";

			if( $con->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Successfully added new teacher</div>";
			}else{
				echo "<div class='alert alert-danger'>Error: There was an error while adding new user</div>";
			}
		}
	}
	?>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New teacher</h3> 
			<form action="" method="POST">
				<label for="first_name">name</label>
				<input type="text" id="first_name"  name="first_name" class="form-control"><br>
				<label for="last_name">last name</label>
				<input type="text"  name="last_name" id="last_name" class="form-control"><br>
				<br>
				<input type="submit" name="addnew" class="btn btn-success" value="Add New">
			</form>
		</div>
	</div>
</div>
</div>

<?php 

 require_once 'footer.php';