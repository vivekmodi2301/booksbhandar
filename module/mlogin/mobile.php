<?php
	include_once("../../config.php");
	include_once("../../function.php");
	if(isset($_GET['username'])){
		$username=$_GET['username'];
	}
	$rs=mysqli_query($con,"select id,username,mobile from profile where username='$username'");
	if(!mysqli_num_rows($rs)){
		?>
		<b style='color:red'>Plz type correct username</b>
		<script>
			document.getElementById('username').value="";
			document.getElementById('username').focus();
		</script>
		<?php
	} 
	else{
		?>
		<th>Mobile</th><td><input type="text" name="mobile"></td>
		<?php
	}
?>