<?php
include_once('../../config.php');
include_once('../../function.php');
	if(isset($_GET['bid'])){
		$bid=$_GET['bid'];
		?>
		<form method="post">
		<fieldset>
	<table width="100%">
	<tr>
		<legend>Add Comments</legend>
		<td><textarea rows="10" cols="100" name="comment"></textarea></td>
	</tr>
	<tr>
		<td><input type="submit" value="submit"></td>
	</tr>
	</fieldset>
		<?php
	}
	if(isset($_GET['cid'])){
		$cid=$_GET['cid'];
		$rs=mysqli_query($con,"select comments.id as id, books.name as book, profile.name as member,profile.photo as mempic, comments.comment as comment from comments left join books on bid=books.id left join profile on comments.pid=profile.id where bid=$cid limit 0,2");
		if(mysqli_num_rows($rs)){
		while($data=mysqli_fetch_assoc($rs)){
			extract($data);
			?>
			<fieldset>
	<table width="100%">
	<tr>
		<legend><?php echo $member;?></legend>
		<td><img src="images/<?php echo $mempic;?>" height="100px" width="100px" style="border-radius:25%; padding-right:15px"></td>
		<td style="font-style:justify;"><?php echo $comment;?></td>
	</tr>
	</table>
	</fieldset>
	<?php
		}
		}
		else{
			?>
			<span style="color:red">0 Comments till now</span>
			<?php
		}
		}
?>