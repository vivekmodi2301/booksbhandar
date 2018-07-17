<?php
include "../../config.php";
include "../../function.php";
$email=$_GET['email'];
	$sr=mysqli_query($con,"select id,username from profile where username='$email'" );
if(mysqli_num_rows($sr))
{
	echo "<b style='color:#f00;'>Already exist.<b>";
	?>
    <script>
	document.getElementById('email').value="";
	document.getElementById('email').focus();
	
    </script>
    <?php
	}
	else{
		echo '<b style="color:#0f0">Available.</b> <br>';
		}