
<?php
include 'mysql.php';
include('includes/header.php');
$result = mysql_safe_query('SELECT * FROM posts WHERE id=%s LIMIT 1', $_GET['id']);

if(!@mysql_num_rows($result)) {
	echo 'Post #'.$_GET['id'].' not found';
	exit;
}

?>


 <div class="container" id="page-wrap">

   <div id="main-content">
   		<div id="left-col" style="padding-right: 90px;">
   			<article class="entry">
			<?php


$row = @mysql_fetch_assoc($result);
echo '<h2>'.$row['title'].'</h2>';
echo '<em>Posted '.date('F j<\s\up>S</\s\up>, Y', $row['date']).'</em><br/>';
echo nl2br($row['body']).'<br/>';
echo '<a href="post_edit.php?id='.$_GET['id'].'">Edit</a> | <a href="post_delete.php?id='.$_GET['id'].'">Delete</a> | <a href="home.php">View All</a>';

echo '<hr/>';
$result = mysql_safe_query('SELECT * FROM comments WHERE post_id=%s ORDER BY date ASC', $_GET['id']);
echo '<ol id="comments">';
while($row = @mysql_fetch_assoc($result)) {
	echo '<li id="post-'.$row['id'].'">';
	echo (empty($row['website'])?'<strong>'.$row['name'].'</strong>':'<a href="'.$row['website'].'" target="_blank">'.$row['name'].'</a>');
	echo ' (<a href="comment_delete.php?id='.$row['id'].'&post='.$_GET['id'].'">Delete</a>)<br/>';
	echo '<small>'.date('j-M-Y g:ia', $row['date']).'</small><br/>';
	echo nl2br($row['content']);
	echo '</li>';
}
echo '</ol>';

echo <<<HTML
<form method="post" action="comment_add.php?id={$_GET['id']}">
	<div class="row">
		<div class="col-lg-2">
			<label class="control-label" for="name" style="position:relative; top:7px;">Name</label>
		</div>
	<div class="col-lg-10">
		<input type="text" class="form-control" name="name" value="{$_COOKIE['name']}">
	</div>
	</div>
	<div class="row">
		<div class="col-lg-2">
			<label class="control-label" for="email" style="position:relative; top:7px;">Email</label>
		</div>
	<div class="col-lg-10">
		<input type="text" class="form-control" name="email" value="{$_COOKIE['email']}" >
	</div>
	</div>


	<div class="row">
		<div class="col-lg-2">
			<label class="control-label" for="website" style="position:relative; top:7px;">Website</label>
		</div>
	<div class="col-lg-10">
		<input type="text" class="form-control" name="website" value="{$_COOKIE['website']}">
	</div>
	</div>

	<div style="height:10px;"></div>
		<div class="row">
			<div class="col-lg-2">
				<label class="control-label" for="content" style="position:relative; top:7px;">comment</label>
			</div>
	<div class="col-lg-10">
		<textarea rows="5" cols="10" name="content" class="form-control"></textarea>
	</div>
	</div>
	<div style="height:10px;"></div>
	<div class="row">
		<button type="submit" name="submit" class="btn btn-primary pull-right">Comment</button>
		</div>
	</form>
<!--<form >
	<table>
		<tr>
			<td><label for="name">Name:</label></td>
			<td><input name="name" id="name" value="{$_COOKIE['name']}"/></td>
		</tr>
		<tr>
			<td><label for="email">Email:</label></td>
			<td><input name="email" id="email" value="{$_COOKIE['email']}"/></td>
		</tr>
		<tr>
			<td><label for="website">Website:</label></td>
			<td><input name="website" id="website" value="{$_COOKIE['website']}"/></td>
		</tr>
		<tr>
			<td><label for="content">Comments:</label></td>
			<td><textarea name="content" id="content"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Post Comment"/></td>
		</tr>
	</table>
</form>-->
HTML;
?>
				   			
			</article>		
   		</div>
   		<div id="right-col">

		   			<div >
		   				<h3>Categories.</h3> 
		   				<?php

							$cat = mysql_safe_query('SELECT * FROM  category');

							while ($row = @mysql_fetch_assoc($cat)) {
								echo '<a href="category.php?id='.$row["id"].'">'. $row["name"] .'</a><br/><br/>';
							}
							?>
					</div>

						<div>
							<h3>Daily Quote of the Day</h3>
		   				<p>What is success?</p><br/>
						<p>"Success is not final; failure is not fatal: It is the courage to continue that counts." - Winston S. Churchill</p>

		   			</div>
		   	
   			</div>
   			<div class="clear"></div>
   		</div>
   		</div>
   	<?php include('../includes/footer.php');?>
</body>
</html>



























































