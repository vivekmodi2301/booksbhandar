<?php
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		if(!isset($_SESSION['mlogindtl'])){
			?>
			<script>
				location.href="index.php?mod=mlogin&do=login&bid=<?php echo $id;?>";
			</script>
			<?php
		}else{
		extract(mysqli_fetch_assoc(mysqli_query($con,"select id,book,download from books where id=$id")));
		$download=$download+1;
		mysqli_query($con,"update books set download=$download where id=$id");
		?>
		<script>
			location.href="upload/<?php echo $book;?>";
		</script>
		<?php
		}
		?>
		<script>
			location.href="index.php?mod=books&do=book";
		</script>
		<?php
	}
?>