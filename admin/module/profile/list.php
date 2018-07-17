
	<table border="1px" width="100%">
	<tr>
		<td>S.NO</td>
		<td>Name</td>
		<td>Gender</td>
		<td>Mobile</td>
		<td>Photo</td>
		<td>Username</td>
		<td>Password</td>
	</tr>
	<?php
		$rs=mysqli_query($con,"select id,name,gender,mobile,photo,username,password from profile");
		$i=1;
		while($data=mysqli_fetch_assoc($rs)){
			extract($data);
			?>
			<tr>
				<td><?php echo $i++;?></td>
				<td><?php echo $name;?></td>
				<td><?php if($gender=='m'){ echo "male";} else{ echo "female";}?></td>
				<td><?php echo $mobile;?></td>
				<td><?php echo $photo;?></td>
				<td><?php echo $username?></td>
				<td><?php echo $password;?></td>
			</tr>
		<?php 
		}
		?>
	</table>
		