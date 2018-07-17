<h1>BOOKS</H1>

<div class="read">Read Free Books Online and Download eBooks for Free

Find thousands of books to read online and download free eBooks. Discover and read free books by indie authors as well as tons of classic books. Browse categories to find your favorite literature genres: Romance, Fantasy, Thriller, Short Stories, Young Adult and Childrens Books. There are eBooks for everyone.</div><br><br>
<h1>We don't want your money!</h1>
<div class="read">As all files are hosted on our servers, you may transfer as many free ebooks as you wish to your desktop computer,laptop, tablet, kindle, iPad, iPhone, Android mobile and cell phones, kobo, nook, etc. absolutely free of charge. What's more each book is leagally authorized and licensed authorized and licensed in compilance with international Copyright law, so you can be certain that all e-books on this site may be transferred leagally in the India, and most other countries. So, keep your finances in order and your cash in the bank: our guarantee is your insurance of absolutely free ebook download.</div><br><br> 
<h1>Latest Books</h1>
<?php
$rs=mysqli_query($con,"select books.id,category.name as category,profile.name as member,books.name as novel,author,books.photo as photo from books left join category on catid=category.id left join profile on pid=profile.id order by id desc limit 0,2");
echo "select books.id,category.name as category,profile.name as member,books.name as novel,author,books.photo as photo from books left join category on catid=category.id left join profile on pid=profile.id order by id desc limit 0,2";
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
?>
<h1>Most Downloaded</h1>
<?php
$rs=mysqli_query($con,"select books.id,category.name as category,profile.name as member,books.name as novel,author,books.photo as photo from books left join category on catid=category.id left join profile on pid=profile.id order by download desc limit 0,2");
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
?>