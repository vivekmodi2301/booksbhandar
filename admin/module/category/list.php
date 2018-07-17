<?php
if(isset($_GET['did'])){
	deletedata('category',$_GET['did']);
}
?>
<table border="1px" width="100%">
	<tr>
		<td>S.NO</td>
		<td>Name</td>
		<td>Action</td>
	</tr>
	<tr>
		<td colspan="3"><a href="index.php?mod=category&do=edit">Add new category</a></td>
	</tr>
	<?php
		$rs=mysqli_query($con,"select id,name from category");
		$i=1;
		while($data=mysqli_fetch_assoc($rs)){
			extract($data);
			?>
			<tr>
				<td><?php echo $i++;?></td>
				<td><?php echo $name;?></td>
				<td>
					<a href="index.php?mod=category&do=edit&id=<?php echo $id;?>">Update</a>
					&nbsp;&nbsp;|&nbsp;&nbsp;
					<a href="#" onClick="ddata(<?php echo $id;?>)">Delete</a>
				</td>
			</tr>
			<?php
		}
	?>
</table>
<script>
	function ddata(did){
	if(confirm("do you really want to delete")){
	location.href="index.php?mod=category&do=list&did="+did;
	}
	}
</script>