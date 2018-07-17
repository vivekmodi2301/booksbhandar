<?php
if(isset($_GET['bid'])){
	$bid=$_GET['bid'];
}
if(isset($_POST['username'])){
	$username=addslashes($_POST['username']);
	$password=addslashes($_POST['password']);
	$rs=mysqli_query($con,"select id,name,username,password,valid from profile where username='$username' and password='$password'");
	$dtl=mysqli_fetch_assoc($rs);
	if(mysqli_num_rows($rs) && $dtl['password']==$password){
		$_SESSION['mlogindtl']=$dtl;
		?>
        <script>
		alert("Welcome <?php echo $_SESSION['mlogindtl']['name'];?>");
		<?php if($bid){?>
		location.href="index.php?mod=books&do=book&id=<?php echo $bid;?>";
		<?php } else { ?>
		location.href="index.php?mod=page&do=home";
		<?php } ?>
		</script>
        <?php
	}
	else{
		?>
		<span style="color:red;">Please enter correct username and password</span>
		<?php
	}
}
?>
<div class="msignin">
			<div class="login">
				Login
			</div>
			<table cellspacing="0">
			<?php if(isset($_GET['bid'])){?> <tr><td colspan="2"><div style="color:red">Please Login first</div></td></tr><br><?php }?>
				<form method="post">
					<tr><th>User Name</th><td><input type="text" placeholder="Enter your Email address" name="username" ></td></tr>
					<tr><th>Password</th><td><input type="password" id="pass" placeholder="Enter your Password" name="password"></td></tr>
                    <tr>
                    	<td colspan="2"><input type="checkbox" style="margin-bottom:5px; margin-left:5px;" onChange="change()">    Show Password</td>
                    </tr>
					<tr><td colspan="2"><input type="submit" value="Login"> New user <a href="#" onclick="signin()">Sign in!!</a> here 
					&nbsp; <a href="index.php?mod=mlogin&do=fp">Forget password</a></td></tr>
                 </form>
			</table>
			</div>
		<script>
		function signin(){
			alert("hii new user");
			location.href="index.php?mod=profile&do=edit";
		}
		function change(){
			a=document.getElementById('pass').type;
			if(a=='password'){
				document.getElementById('pass').type="text";
				}	
				else{
					document.getElementById('pass').type="password";
					}
		}
		</script>