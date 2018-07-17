<?php
if(isset($_GET[id])){
	$id=$_GET[id];
}
if(isset($_POST['opassword'])){
	$pass=$_POST['newpass'];
	mysqli_query($con,"update profile set password='$pass' where id=$id");
	?>
	<script>
		location.href="index.php?mod=page&do=profile";
	</script>
	<?php
}
?>
<script src="js/jquery.js"></script>
<div class="msignin">
			<div class="login">
				Change password
			</div>
				<form method="post">
			
			<table cellspacing="0">
					<tr><th>Old Password</th><td><input type="password" name="opassword" onChange="cp(this.value,'<?php echo $id;?>')"></td></tr>
					<tr id="password"></tr>
					<tr><td colspan="2"><input type="submit" disabled id="bt" value="submit"></td></tr>
            	 </table>
     </form>
			
				 </div>

<script>
	function cp(pass,id){
		$.ajax({
			url:"module/page/cp.php",
			data:'password='+pass+'&id='+id,
			type:'GET',
			success:function(rs){
				$('#password').html(rs);
				bt.disabled=false;
				}
		});
	}
</script>