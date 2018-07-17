<?php
if(isset($_GET['did'])){
	deletedata('admin',$_GET['did']);
}
?>
<table border="1px" width="100%">
	<tr>
		<td>S.NO</td>
		<td>Username</td>
		<td>Password</td>
		<td>Action</td>
	</tr>
	<tr>
		<td colspan="4"><a href="index.php?mod=login&do=edit">Add new admin</a></td>
	</tr>
	<?php
		$rs=mysqli_query($con,"select id,username,password from admin");
		$i=1;
		while($data=mysqli_fetch_assoc($rs)){
			extract($data);
			?>
			<tr>
				<td><?php echo $i++;?></td>
				<td><?php echo $username;?></td>
				<td><?php echo $password?></td>
				<td>
					<a href="index.php?mod=login&do=edit&id=<?php echo $id;?>">Update</a>
					&nbsp;&nbsp;|&nbsp;&nbsp;
					<a href="#" onClick="ddata(<?php echo $id;?>)">Delete</a>
			</tr>
			<?php
		}
	?>
</table>
<script>
	function ddata(did){
	if(confirm("do you really want to delete")){
	location.href="index.php?mod=login&do=list&did="+did;
	}
	}
</script>