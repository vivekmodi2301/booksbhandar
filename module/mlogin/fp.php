<script src="js/jquery.js"></script>
<?php
	if(isset($_POST['username'])){
		$username=$_POST['username'];
		$mobile=$_POST['mobile'];
		$qry=mysqli_query($con,"select id,username,mobile,password from profile where username='$username' and mobile='$mobile'");
		if(!mysqli_num_rows($qry)){
			?>
			<b style='color:red'>Your username and mobile no. does not match</b>
			<?php
		}
		else{
			$data=mysqli_fetch_assoc($qry);
			?>
			<b style="color:green">Your password is <?php echo $data['password'];?>.<a href="index.php?mod=mlogin&do=login">Login</a>here</b>
			<?php
			exit;
		}
	}
?>
<div class="msignin">
			<div class="login">
				Forget password
			</div>
			<form method="post">
			<table>
			<?php if(isset($_GET['bid'])){?> <div style="color:red">Please Login first</div><br><?php }?>
				
					<tr><th>User Name</th><td><input type="text" id="username" name="username" onChange="fp(this.value)"></td></tr>
					<tr id="mobile"></tr>
					<tr><td colspan="2"><input type="submit" disabled id="bt" value="Get me!"></td></tr>
			</table>
			</form>
</div>
<script>
	function fp(un){
		$.ajax({
			url:"module/mlogin/mobile.php",
			data:'username='+un,
			type:'GET',
			success:function(rs){$('#mobile').html(rs);
			bt.disabled=false;
			}
		});
	}
</script>