<?php 

require_once 'connect.php';

require_once 'header.php';

echo "<div class='container'>";

if( isset($_POST['delete'])){
	$sql = "DELETE FROM admin WHERE idadmin=" . $_POST['userid'];
	if($con->query($sql) === TRUE){
		echo "<div class='alert alert-success'>Successfully delete  user</div>";
	}
}

$sql 	= "SELECT * FROM admin";
$result = $con->query($sql); 

if( $result->num_rows > 0)
{ 
	?>
	<h2>List of all admin</h2>
	<table class="table table-bordered table-striped">
		<tr>
			<td>name</td>
			<td>email</td>
			<td>password</td>
			<td width="70px">Delete</td>
			<td width="70px">EDIT</td>
		</tr>
	<?php
	while( $row = $result->fetch_assoc()){ 
		echo "<form action='' method='POST'>";	//added
		echo "<input type='hidden' value='". $row['idadmin']."' name='idadmin' />"; //added
		echo "<tr>";
		echo "<td>".$row['name'] . "</td>";
		echo "<td>".$row['email'] . "</td>";
		echo "<td>".$row['password'] . "</td>";
		echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger' /></td>";  
		echo "<td><a href='edit.php?id=".$row['idadmin']."' class='btn btn-info'>Edit</a></td>";
		echo "</tr>";
		echo "</form>"; //added 
	}
	?>
	</table>
<?php 
}
else
{
	echo "<br><br>No Record Found";
}
?> 
</div>

<?php 

 require_once 'footer.php';