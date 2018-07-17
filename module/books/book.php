<h1><div class="addbook"><a href="<?php if($_SESSION['mlogindtl']){?>index.php?mod=books&do=edit<?php } else {?>index.php?mod=mlogin&do=login<?php }?>" style="text-decoration:none;align:center;">Add new Book</a></h1>
<fieldset>
	<legend>Find books from Book name or Category name</legend>
	<form method="post">
		<input type="text" name="name" style="margin-right:0px; margin-left:30%;" placeholder="enter book name or category name"><input type="submit" style="margin-left:0px;"  value="search">
	</form>
</fieldset>
<?php
$url="index.php?mod=books&do=book&";
if(isset($_REQUEST['name'])){
	$url.="name=$name&";

	$limit=1;
	$frmdataget=$_REQUEST;
		PaginationWork();
$totRslt=mysqli_fetch_assoc(mysqli_query($con,"select count(*) as tot from books left join category on catid=category.id left join profile on pid=profile.id where books.name like '%$bname%' or category.name like '%$bname%'"));
	$bname=$_POST['name'];
	$rs=mysqli_query($con,"select books.id as id,books.name as novel,author,category.name as category,profile.name as profile ,books.photo as photo, book as file from books left join category on catid=category.id left join profile on pid=profile.id where books.name like '%$bname%' or category.name like '%$bname%' limit ".$frmdata['from'].", ".$frmdata['to']);
	if(!mysqli_num_rows($rs)){
		?>
		<div style="color:red;">No book or Category found, Please try onother name</div><?php
	}
	while($data=mysqli_fetch_assoc($rs)){
		extract($data);
?>
<fieldset>
			<table>
	<tr>
		<legend><?php echo $novel;?></legend>
		<td rowspan="3" width="30%"><img src="images/<?php echo $photo;?>">
		<td>NAME</td><td><?php echo $novel;?></td>
	</tr>
	<tr>
		<td>Author</td><td><?php echo $author;?><td>
	</tr>
	<tr>
		<td><a href="index.php?mod=books&do=book&id=<?php echo $id;?>">READ MORE</a></td>
	</tr>
		</table>
		</fieldset>
<?php }  PaginationDisplay($totRslt['tot'],$url.'pageNumber=',''); exit; }?>
<?php if(!isset($_GET['catid'])&&!isset($_GET['id'])&&!isset($_GET['catid'])&&!isset($_GET['b'])){ ?>
<fieldset>
<legend>Categories</legend>
<table border="0px" width="100%" cellspacing="0" cellpadding="0">
<tr>
<?php
	$rs=mysqli_query($con,"select id,name from category");
	$i=0;
	while($data=mysqli_fetch_assoc($rs)){
	if($i++%3==0)
	echo "</tr><tr>";
?>
	<td style="padding-left:40px; padding-bottom:5px; padding-top:5px;">
	<a href="index.php?mod=books&do=book&catid=<?php echo $data['id'];?>" style="text-decoration:none; font-size:20px;"><?php echo $data['name']."<br>";
	?>
	</td>
	
<?php
	}
?>
</tr>
	</table>
	</fieldset>
<?php }	
?>	
<?php
$find="";
if(isset($_GET['b'])&&!isset($_GET['catid'])&&!isset($_GET['bid'])){
	$find=$_GET['b'];
	$qry=mysqli_query($con,"select books.id as id,books.name as novel,author,category.name as category,profile.name as profile ,books.photo as photo, book as file from books left join category on catid=category.id left join profile on pid=profile.id where books.name like '$find%'");
	if(!mysqli_num_rows($qry)){
		?>
		<div style="color:red;">No book or Category found, Please try onother name</div><?php
	}
	while($data=mysqli_fetch_assoc($qry)){
		extract($data);
?>
<fieldset>
			<table>
	<tr>
		<legend><?php echo $novel;?></legend>
		<td rowspan="3" width="30%"><img src="images/<?php echo $photo;?>">
		<td>NAME</td><td><?php echo $novel;?></td>
	</tr>
	<tr>
		<td>Author</td><td><?php echo $author;?><td>
	</tr>
	<tr>
		<td><a href="index.php?mod=books&do=book&id=<?php echo $id;?>">READ MORE</a></td>
	</tr>
	</table>
	</fieldset>
	<?php
}

	exit;
}
?>

<fieldset>
<legend>Search Books by Alphabet </legend>
<?php
for($i=A;$i<Z;$i++){
	?>
	<a href="index.php?mod=books&do=book&b=<?php echo $i;?>" style="text-decoration:none; font-size:30px;"><?php
	echo $i;?>
	&nbsp;
	<?php
}?>

<a href="atoz.php?b=Z" style="text-decoration:none; font-size:30px;">Z</A><br>
</fieldset>
<?php 	
	$bid=0;
	$catid=0;
	if(isset($_GET['id']) or isset($_GET['catid'])){
		if(isset($_GET['id'])){
			$bid=$_GET['id'];
		}
		if(isset($_GET['catid'])){
			$catid=$_GET['catid'];
		}
		$rs=mysqli_query($con,"select books.id as id,books.name as novel,author,category.name as category,profile.name as profile ,books.photo as photo, book as file, download from books left join category on catid=category.id left join profile on pid=profile.id where books.id=$bid or category.id=$catid");
		while($data=mysqli_fetch_assoc($rs)){
			extract($data);
			?>
			<fieldset>
			<table>
	<tr>
		<legend><?php echo $novel;?></legend>
		<?php 
		if($bid){?>
		<td rowspan="7" width="30%"><img src="images/<?php echo $photo;?>" style="height:300px;">
		<?php }
		else{
		?>
		<td rowspan="3" width="30%"><img src="images/<?php echo $photo;?>" style="height:100px;">
		<?php }?>
		<td>NAME</td><td><?php echo $novel;?></td>
	</tr>
	<tr>
		<td>Author</td><td><?php echo $author;?><td>
	</tr>
	<?php
	
	 if($bid){?>
	<tr>
		<td>Category</td><td><?php echo $category;?></td>
	</tr>
	<tr>
		<td>Uploaded by</td><td><?php echo $profile;?></td>
	</tr>
	<tr>
		<td>Uploaded date</td><td><?php
			$pos=strpos($file,'_');
			$date=substr($file,0,$pos);
			echo date('M/d/Y',$date);
		?>
		</td>
	</tr>
	<tr>
		<td>Uploaded time</td><td><?php
			echo date('h:i:s a',$date);
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="left">
		<?php if($_SESSION['mlogindtl']){?><a href="index.php?mod=books&do=download&id=<?php echo $id;?>"><?php }else{?><a href="index.php?mod=mlogin&do=login&bid=<?php echo $id;?>"><?php }?>Download</a>
		&nbsp;
		<?php
		if(isset($_SESSION['mlogindtl'])){?>
		<a href="#" onClick="acom(<?php echo $id;?>)">Add Comments</a>
		<?php } else{
			?>
			<a href="index.php?mod=mlogin&do=login&bid=<?php echo $id;?>">Add Comments</a>
			<?php
		}
	}
	else{
		?>
		<tr>
		<td><a href="index.php?mod=books&do=book&id=<?php echo $id;?>">READ MORE</a></td>
	</tr>
	<?php
	}
		?>
		</td>
	</tr>
		</table>
		</fieldset>
			<?php
		
	?>
	<div id="acomments"></div>
	<?php
	if(isset($_POST['comment'])){
		$_POST['bid']=$id;
		$_POST['pid']=$_SESSION['mlogindtl']['id'];
		addEdit('comments',$_POST);
	}
	?>
	<script src="js/jquery.js"></script>
	<script>
		function acom(id){
			$.ajax({
				url:"module/books/comments.php",
				data:'bid='+id,
				type:'GET',
				success:function(rs){$('#acomments').html(rs)}
			});
		}
	</script>
	<?php if($bid){?>
	<h1 onClick="showcom(<?php echo $id;?>)">Comments</h1>
	<?php }?>
	<div id="scomments"></div>
	<script>
		function showcom(id){
			$.ajax({
				url:"module/books/comments.php",
				data:'cid='+id,
				type:'GET',
				success:function(rs){$('#scomments').html(rs)}
			});
		}
	</script>
	<?php } } if(isset($_GET['id'])){?>
	<h1>Related Books</h1>
	<?php
		$rs=mysqli_query($con,"select books.id as id,books.name as novel,author,category.name as category,profile.name as profile ,books.photo as photo, book as file from books left join category on catid=category.id left join profile on pid=profile.id where category.name='$category' and books.name !='$novel'");
		if(!mysqli_num_rows($rs)){
			$rs=mysqli_query($con,"select books.id as id,books.name as novel,author,category.name as category,profile.name as profile ,books.photo as photo, book as file from books left join category on catid=category.id left join profile on pid=profile.id where books.name!='$novel' order by id desc limit 0,2");
		}
		while($data=mysqli_fetch_assoc($rs)){
			extract($data);
			?>
		<fieldset>
			<table>
	<tr>
		<legend><?php echo $novel;?></legend>
		<td rowspan="3" width="30%"><img src="images/<?php echo $photo;?>">
		<td>NAME</td><td><?php echo $novel;?></td>
	</tr>
	<tr>
		<td>Author</td><td><?php echo $author;?><td>
	</tr>
	<tr>
		<td><a href="index.php?mod=books&do=book&id=<?php echo $id;?>">READ MORE</a></td>
	</tr>
		</table>
		</fieldset>
		<?php	
	}
	}
?>