<?php 

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
	<?php 
	
	if(isset($_POST['update'])){

		if( empty($_POST['name']) || empty($_POST['email']) || 
			empty($_POST['password'])  )
		{
			echo "Please fillout all required fields"; 
		}else{		
			$name  = $_POST['name'];
			$email 	= $_POST['email'];
			$password 	= $_POST['password'];
			$sql = "UPDATE users SET name='{$name}', email = '{$email}',
						password = '{$password}'
						WHERE idadmin=" . $_POST['idadmin'];

			if( $con->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Successfully updated  Admin</div>";
			}else{
				echo "<div class='alert alert-danger'>Error: There was an error while updating user info</div>";
			}
		}
	}
	$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
	$sql = "SELECT * FROM users WHERE idadmin={$id}";
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
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;MODIFY Admin</h3> 
			<form action="" method="POST">
				<input type="hidden" value="<?php echo $row['idadmin']; ?>" name="idadmin">
				<label for="name">name</label>
				<input type="text" id="name"  name="name" value="<?php echo $row['name']; ?>" class="form-control"><br>
				<label for="email">email</label>
				<input type="text"  name="email" id="email" value="<?php echo $row['email']; ?>" class="form-control"><br>
				<label for="password">password</label>
				<textarea rows="4" name="password" class="form-control"><?php echo $row['password']; ?></textarea><br>
				<br>
				<input type="submit" name="update" class="btn btn-success" value="Update">
			</form>
		</div>
	</div>
</div>
</div>

<?php 

 require_once 'footer.php';