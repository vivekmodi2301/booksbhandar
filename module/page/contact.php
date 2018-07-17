<style>
body {
  font: 16px Helvetica;
}

.container {
  width: 600px;
  margin: 2em auto;
  overflow: hidden;
  background: #1abc9c;
  border-radius: 5px;
}

.message, .contact, .name, .footer, header, footer, textarea {
  display: block;
  padding-top: 5px;
  margin: 0;
  border: 0;
  clear: both;
  overflow: hidden;
}

header, footer {
  height: 75px;
 
  line-height: 75px;
  padding-left: 20px;
  border-radius: 5px 5px 0 0;
}
header .h, footer .h {
  font-size: 1.2em;
  text-transform: uppercase;
  color: rgba(51, 51, 51, 0.4);
}

.first, .last {
  float: left;
  width: 278px;
  margin: 0;
  padding: 0 0 0 20px;
  border: 1px solid rgba(0, 0, 0, 0.1);
  height: 50px;
}

.last {
  width: 279px;
  border-left: 0;
}

.email, textarea {
  height: 50px;
  width: 600px;
  line-height: 50px;
  padding: 0 0 0 20px;
  border-top: 0;
  border-left: 1px solid rgba(0, 0, 0, 0.1);
  border-right: 1px solid rgba(0, 0, 0, 0.1);
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

textarea {
  height: 200px;
}

footer {
  height: 49px;
  border-top: 1px dashed rgba(0, 0, 0, 0.3);
  border-radius: 0 0 5px 5px;
  padding-left: 0;
  padding-right: 20px;
}
footer button {
  height: 32px;
  background: #e74c3c;
  border-radius: 5px;
  border: 0;
  margin: 7px 0;
  color: white;
  float: right;
  padding: 0 20px 0 20px;
  border-bottom: 3px solid #c0392b;
  transition: all linear .2s;
}
footer button:hover {
  background: #c0392b;
}
footer button:focus {
  outline: none;
}

.first:focus, .last:focus, .email:focus, textarea:focus, textarea:focus {
  outline: none;
  background:white;
  color: rgba(51, 51, 51, 0.7);
}

</style>
<?php
if(isset($_POST['name'])){
	if(is_array($_POST['name'])){
		$_POST['name']=implode($_POST['name'],' ');
	}
	addEdit('query',$_POST);?>
	<script>
		alert("Thank you for your valuable fedback");
		location.href="index.php?mod=page&do=home";
	</script>
	<?php
}
?>
<div class='container'>
  <header>
    <div class="h">Send us a suggestion!</div>
  </header>
  <div class='name'>
  <form method="post">
    <input name="name[]" class='first' placeholder='First Name' type='text'>
    <input name="name[]" class='last' placeholder='Last Name' type='text'>
  </div>
  <div class='contact'>
    <input class='email' value="<?php if(isset($_SESSION['mlogindtl'])){echo $_SESSION['mlogindtl']['username'];}?>" name="email" placeholder='E-mail Address' type='text'>
  </div>
  <div class='message'>
    <textarea name="query" placeholder='Your Suggestions Here!'></textarea>
  </div>
  <footer>
    <button>Send Suggestion</button>
  </footer>
</div>