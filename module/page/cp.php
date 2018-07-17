<?php
include_once("../../config.php");
include_once("../../function.php");
	if(isset($_GET['password'])){
		$password=$_GET['password'];
		$id=$_GET['id'];
		echo $_SESSION['mlogindtl']['id'];
		$rs=mysqli_query($con,"select id,username,password from profile where id=$id and password='$password'");
		if(mysqli_num_rows($rs)){
			?>
			<th>New password</th><td><input type="password" name="newpass" required></th>
			<?php
		}
		else{
			echo "type right password";
		}
	}
?>