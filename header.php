<html>
<head>
<title>Books Bhandar</title>
<link rel="stylesheet" href="<?php echo css;?>style.css">
<link rel="stylesheet" type="text/css" media="all" href="<?php echo css;?>Layout.css">
<link rel="stylesheet" href="<?php echo css;?>basic.css">
<script src="<?php echo js;?>jquery.js" type="text/javascript"></script>
</head>
<body>
	<table class="main" cellspacing="0px">
		<tr class="Header">
			<td>
            	<div id="navigation"> 
                <div class="innerNav">
                    <div class="logo"><img src="images/logo.png" height="100px" width="100px" border="0"></div>
                    <div class="SM_social"></a><a href="https://www.facebook.com/SandeepMaheshwariPage" target="_blank"><img src="images/Facebook.jpg"></a></div>
                    <div id="menu_mobile">
                        <div id="navigation_container"> 
                        <a id="pull" href="#">MENU</a>            
                        <ul>
						 <li><a href="index.php?mod=page&do=home">Home</a></li>
						<li><a href="index.php?mod=books&do=book">Books</a></li>
                        <?php 
						if(isset($_SESSION['mlogindtl'])){?>
							<li><a href="index.php?mod=page&do=profile">Profile</a></li>
							<li><a href="index.php?mod=mlogin&do=logout">Logout</a></li>
                           <?php } else{?>
						  
                           <li><a href="index.php?mod=mlogin&do=login">Login</a></li>
                           <?php }?>
						   <li><a href="index.php?mod=page&do=contact">Contact us</a></li>
                        </ul>      	
                    </div>
                    </div>
                </div>
                
                <div class="navLine">
                    <div class="red"></div>
                    <div class="blue"></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
            </td>   
		</tr>
		<tr class="middle">
			<td valign="top"><br><br><br>