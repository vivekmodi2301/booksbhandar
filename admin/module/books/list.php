<?php
if(isset($_GET['did'])){
	deletedata('category',$_GET['did']);
}
?>
<table border="1px" width="100%">
	<tr>
		<td>S.NO</td>
		<td>Name</td>
		<td>Category</td>
		<td>Upload By</td>
		<td>Author</td>
		<td>Photo</td>
		<td>Download</td>
		<td>Action</td>
	</tr>
	<?php
		$rs=mysqli_query($con,"select books.id as id,profile.name as user, category.name as cat,books.name,catid,pid, author,book,books.photo,download from books left join profile on pid=profile.id left join category on catid=category.id");
		$i=1;
		while($data=mysqli_fetch_assoc($rs)){
			extract($data);
			?>
			<tr>
				<td><?php echo $i++;?></td>
				<td><?php echo $name;?></td>
				<td><?php echo $cat; ?></td>
				<td><?php echo $user; ?></td>
				<td><?php echo $author;?></td>
				<td><?php echo $photo;?></td>
				<td><?php echo $download;?></td>
				<td><a href="#" onClick="ddata(<?php echo $id;?>)">Delete</a></td>
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
		