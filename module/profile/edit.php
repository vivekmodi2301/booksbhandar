<?php
$id="";
$err="";
if(isset($_SESSION['mlogindtl'])){
	$id=$_SESSION['mlogindtl']['id'];
	extract(mysqli_fetch_assoc(mysqli_query($con,"select id,name,gender,mobile,photo,username from profile where id=$id")));
}
if(isset($_POST['name'])){
	if($_FILES['photo']['name']){
		if($_SESSION['mlogindtl']){
			unlink("images/$photo");
		}
			$_POST['photo']=time().'_'.$_FILES['photo']['name'];
			move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$_POST['photo']);
		}
		if(!strcasecmp($_POST['catchacode'],$_SESSION['6_letters_code']))
			{	
				if(!$_POST['name']){
					$err.="Please Enter Your Name<br>";
				}
				
				if(!$_POST['gender']){
					$err.="Please Select your Gender<br>";			
				}
				if(!$_POST['mobile']){
					$err.="Please enter Your Mobile no.<br>";
				}
				if(!$_SESSION['mlogindtl']){
					if(!$_POST['photo']){
						$err.="Please Upload your Photo<br>";	
					}
				}
				if(!$_POST['username']){
					$err.="Please Enter Your username<br>";	
				}
				if(!$_SESSION['mlogindtl']){
				if(!$_POST['password']){
					$err.="Please enter Your Password<br>";	
				}
				}
				if($err){
					?>
					<span style="color:red;">
					<?php
					echo $err;
					?>
					</span>
					<?php
				}
				else{
					unset($_POST['catchacode']);
		addEdit('profile',$_POST,$id);
				}
			}else
			{
				?>
                <script>
				alert("Plz enter valid cpatcha code!");
				</script>
                <?php
				$info=$_POST;
				}
		
		if(!isset($_SESSION['mlogindtl'])){
	?>
	
	<?php
}
else{
	?>
	<script>
		location.href="index.php?mod=page&do=profile";
	</script>
	<?php
}
}
?>
<div class="msignin">
	<div class="login">
		Login
	</div>
<table cellspacing="0" border="0px">
		<form method="post" enctype="multipart/form-data">
			<tr><th>Name</th><td><input type="text"  value="<?php if($name){ echo $name;}?>" placeholder="Enter your name" name="name"></td></tr>
			<tr><th>Gender</th><td><input type="radio" <?php if($gender=='m'){?>checked <?php } ?>  name="gender" value="m">  Male  <input type="radio" name="gender" <?php if($gender=='f'){?>checked <?php } ?> value="f">  Female</td></tr>
			<tr><th>Mobile</th><td><input type="text"  placeholder="Enter your Mobile no." value="<?php if($mobile){echo $mobile;}?>" name="mobile"></td></tr>
			<?php if(isset($_SESSION['mlogindtl'])){
				?>
				<tr><td colspan="2" style="padding-left:10px;"><img src="images/<?php echo $photo;?>" height="50px" width="50px"></td></tr>
				<?php
			}
			?>
			<tr><th>Photo</th><td><input type="file" name="photo"></td></tr>
			<?php if(!isset($_SESSION['mlogindtl'])){?>
			<input type="hidden" name="time" value=<?php echo time();?>>
			<?php }?>
			<tr><th>User Name</th><td><input type="text" id="email"  onChange="validuser(this.value)" value="<?php if($username){echo $username;}?>" <?php if(isset($_SESSION['mlogindtl'])){?> readonly <?php } ?> placeholder="abc@gmail.com" name="username" ><span id="errmsg"></span></td></tr>
			<?php if(!isset($_SESSION['mlogindtl'])){?>
			<tr><th>Password</th><td><input type="password"  placeholder="Enter your password" name="password"></td></tr>
			<?php }?>
			<tr>
            	<th>Enter Captcha code</th>
                <td>
                <img src="captcha_code_file.php?rand=1234" id='captchaimg' />
<br />

<small>Can't read the image? click<a href='javascript:refreshCaptcha();'>here</a>to refresh</small>
<br />
	<input type="text" name="catchacode" placeholder="Enter captcha" required/>

                </td>
            </tr>
			<tr><td colspan="2" ><input type="submit" value="<?php if(!isset($_GET['id'])){?>Sign In!!<?php } else{?> Change <?php }?>"></td></tr>
        </form>
</table>
</div>
</div>
<script>
function refreshCaptcha()
{
	captchaimg.src= captchaimg.src.substring(0,captchaimg.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
function validuser(user)
{
	errmsg.innerHTML="<img src='images/loading52.gif' height='30' width='30' align='right'>";
	$.ajax({
	url:"module/profile/valid_user.php",
	data:"email="+user,
	type:'GET',
	success: function(rs){ $('#errmsg').html(rs);}
	});
}
</script>	