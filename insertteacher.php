<?php 

require_once 'connect.php';

require_once 'header.php';

echo "<div class='container'>";

if( isset($_POST['delete'])){
	$sql = "DELETE FROM teacher WHERE idteacher=" . $_POST['idteacher'];
	if($con->query($sql) === TRUE){
		echo "<div class='alert alert-success'>Successfully delete  user</div>";
	}
}

$sql 	= "SELECT * FROM teacher";
$result = $con->query($sql); 

if( $result->num_rows > 0)
{ 
	?>
	<h2>List of all teacher</h2>
	<table class="table table-bordered table-striped">
		<tr>
			<td>name</td>
			<td>email</td>
			<td width="70px">Delete</td>
			<td width="70px">EDIT</td>
		</tr>
	<?php
	while( $row = $result->fetch_assoc()){ 
		echo "<form action='' method='POST'>";	//added
		echo "<input type='hidden' value='". $row['idteacher']."' name='idteacher' />"; //added
		echo "<tr>";
		echo "<td>".$row['first_name'] . "</td>";
		echo "<td>".$row['last_name'] . "</td>";
		echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger' /></td>";  
		echo "<td><a href='editteacher.php?id=".$row['idteacher']."' class='btn btn-info'>Edit</a></td>";
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