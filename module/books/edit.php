<?php
	if(isset($_POST['name'])){
			$_POST['pid']=$_SESSION['mlogindtl']['id'];
			$_POST['photo']=time().'_'.$_FILES['photo']['name'];
			move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$_POST['photo']);
			$_POST['book']=time().'_'.$_FILES['book']['name'];
			move_uploaded_file($_FILES['book']['tmp_name'],'upload/'.$_POST['book']);
			addEdit('books',$_POST);
	}
?>
<div class="msignin">
	<div class="login">
		Books
	</div>
<form method="post" enctype="multipart/form-data">
<table cellspacing="0" border="1px">
	<tr><th>Category</th><td><select name="catid">
	<option>Select category</option>
		<?php 
			$rs=mysqli_query($con,"select id,name from category");
			while($data=mysqli_fetch_assoc($rs)){
				?>
				<option value="<?php echo $data['id'];?>">
					<?php echo $data['name'];?>
				</option>
				<?php
			}
		?>
	</select></td></tr>
	<tr><th>Name</th><td><input type="text" name="name" placeholder="Enter book name"></td></tr>
	<tr><th>Book</th><td><input type="file" name="book"></td></th>
	<tr><th>Author</th><td><input type="text" name="author" placeholder="Enter Author name"></td></tr>
	<tr><th>Photo</th><td><input type="file" name="photo"></td></tr>
	<tr><td colspan="2"><input type="submit" value="submit"></td></tr>
</form>
</div>
</div>