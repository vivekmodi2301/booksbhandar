<?php
	if(isset($_GET['did'])){
		$did=$_GET['did'];
		mysqli_query($con,"delete from profile where id=$did");
		session_destroy();
		?>
		<script>
			location.href="index.php?mod=mlogin&do=login";
		</script>
		<?php
	}
	if(isset($_SESSION['mlogindtl'])){
		$id=$_SESSION['mlogindtl']['id'];
	extract(mysqli_fetch_assoc(mysqli_query($con,"select id,name,gender,mobile,photo,time,username from profile where id=$id")));
	}
?>
<div class="signin">
<table cellspacing="15px" width="40%" border="0px;">
	<tr>
		<td colspan="3" align="center"><img src="images/<?php echo $photo;?>" height="200px" width="200px" style="border-radius:50%"></td>
	</tr>	
	<tr>
		<td>Name</td>
		<td><?php echo $name;?></td>
	</tr>
	<tr>
		<td>Gender</td>
		<td><?php if($gender=='m'){echo "Male";}else{echo "Female";}?></td>
	</tr>
	<tr>
		<td>Mobile</td>
		<td><?php echo $mobile;?></td>
	</tr>
	<tr>
		<td>User name</td>
		<td><?php echo $username;?></td>
	</tr>
	<tr>
		<td >First Sign in!! date </td>
		<td><?php
			echo date('M/d/Y',$time);
			?>
		</td>
	</tr>
	<tr>
		<td >First Sign in!! time </td>
		<td><?php
			echo date('h:i:s a',$time);
			?>
		</td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr>
		<td colspan="2" style="text-align:center;"><a href="index.php?mod=page&do=changepass&id=<?php echo $id;?>">Change Password</a></td>
	</tr>
	<tr>
		<td colspan="2" style="text-align:center;"><a href="#" onclick="deleteac(<?php echo $id;?>)">Delete</a>Your account</td>
	</tr>
	<tr>
		<td colspan="2" style="text-align:center;"><a href="index.php?mod=profile&do=edit">Edit Profile</a></td>
	</tr>
</table>
</div>
<script>
	function deleteac(id){
		if(confirm("Do you really want to delete your account")){
			location.href="index.php?mod=page&do=profile&did="+id;
		}
	}
</script>