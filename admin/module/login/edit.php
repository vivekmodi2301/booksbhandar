<?php
	$id="";
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		extract(mysqli_fetch_assoc(mysqli_query($con,"select id,username,password from admin where id=$id")));
	}
	if(isset($_POST['username'])){
		addEdit('admin',$_POST,$id);
		?>
		<script>
			location.href="index.php?mod=login&do=list";
		</script>
		<?php
	}
?>
<form method="post">
	Username:<input type="text" value="<?php if($username){echo $username;}?>" name="username"><br>
	Password:<input type="<?php if($id){?>text<?php } else { ?>password<?php } ?>" value="<?php if($username){echo $password;}?>" name="password"><br>
	<input type="submit" value="submit">
</form>