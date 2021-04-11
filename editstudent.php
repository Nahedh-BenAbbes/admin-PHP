<?php 

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
	<?php 
	
	if(isset($_POST['update'])){

		if( empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['class'])   )
		{
			echo "Please fillout all required fields"; 
		}else{		
			$first_name  = $_POST['first_name'];
			$last_name 	= $_POST['last_name'];
            $class 	= $_POST['class'];

			$sql = "UPDATE teacher SET name='{$first_name}', last_name = '{$last_name}', class = '{$class}'
						WHERE idstudent=" . $_POST['idstudent'];

			if( $con->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Successfully updated  student</div>";
			}else{
				echo "<div class='alert alert-danger'>Error: There was an error while updating user info</div>";
			}
		}
	}
	$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
	$sql = "SELECT * FROM users WHERE idstudent={$id}";
	$result = $con->query($sql);

	if($result->num_rows < 1){
		header('Location: index.php');
		exit;
	}
	$row = $result->fetch_assoc();
	?>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;MODIFY Teacher</h3> 
			<form action="" method="POST">
				<input type="hidden" value="<?php echo $row['idstudent']; ?>" name="idstudent">
				<label for="first_name">first name</label>
				<input type="text" id="first_name"  name="first_name" value="<?php echo $row['first_name']; ?>" class="form-control"><br>
				<label for="last_name">last name</label>
				<input type="text"  name="last_name" id="last_name" value="<?php echo $row['last_name']; ?>" class="form-control"><br>
                <label for="class">class</label>
				<input type="text"  name="class" id="class" value="<?php echo $row['class']; ?>" class="form-control"><br>
				
				<br>
				<input type="submit" name="update" class="btn btn-success" value="Update">
			</form>
		</div>
	</div>
</div>
</div>

<?php 

 require_once 'footer.php';