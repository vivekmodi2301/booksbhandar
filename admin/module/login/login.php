<?php
if(isset($_POST['username'])){
	extract($_POST);
	$rs=mysqli_query($con,"select id,username,password from admin where username='$username' and password='$password'");
	if(mysqli_num_rows($rs)){
		$_SESSION['logindtl']=mysqli_fetch_assoc($rs);
		?>
        <script>
		alert("Welcome admin");
			location.href="index.php?mod=profile&do=list";
		</script>
        <?php
	}
}
?>
<div class="middle">
			<div class="login">
				Login
			</div>
			<div class="form">
				<form method="post">
					User Name:<input type="text" name="username" ><br>
					Password:<input type="password" name="password"><br>
					<input type="submit" value="Login"> <input type="Reset" value="Cancel">
                 </form>
			</div>
		</div>