<?php
	$id="";
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		extract(mysqli_fetch_assoc(mysqli_query($con,"select id,name from category where id=$id")));
	}
	if(isset($_POST['name'])){
		addEdit('category',$_POST,$id);
		?>
		<script>
			location.href="index.php?mod=category&do=list";
		</script>
		<?php
	}
?>
<form method="post">
	Category Name:<input type="text" value="<?php if($name){echo $name;}?>" name="name"><br>
	<input type="submit" value="submit">
</form>