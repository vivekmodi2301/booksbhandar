<html>
<head>
<title>Books Bhandar</title>
<link rel="stylesheet" href="<?php echo css;?>style.css">
<link rel="stylesheet" type="text/css" media="all" href="<?php echo css;?>Layout.css">
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
                        <?php 
						if(isset($_SESSION['logindtl'])){?>
							<li><a href="index.php?mod=login&do=list">Admin</a></li>
							<li><a href="index.php?mod=category&do=list">Category</a></li>
							<li><a href="index.php?mod=profile&do=list">Profile</a></li>
							<li><a href="index.php?mod=books&do=list">Books</a></li>
                           <li><a href="index.php?mod=login&do=logout">Logout</a></li> 
						   
                           <?php } else{?>
                           <li><a href="index.php?mod=login&do=login">login</a></li>
                           <?php }?>
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