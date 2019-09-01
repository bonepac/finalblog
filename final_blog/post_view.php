
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
   		<div class="col-md-8" id="left-col" style="padding-right: 90px;">
   			<article class="entry">
			<?php


$row = @mysql_fetch_assoc($result);
echo '<h2>'.$row['title'].'</h2>';
echo '<em>Posted '.date('F j<\s\up>S</\s\up>, Y', $row['date']).'</em><br/>';
echo nl2br($row['body']).'<br/>';
echo '<a href="index.php">View All</a>';

echo '<hr/>';
$result = mysql_safe_query('SELECT * FROM comments WHERE post_id=%s ORDER BY date ASC', $_GET['id']);
echo '<ol id="comments">';
while($row = @mysql_fetch_assoc($result)) {
	echo '<li id="post-'.$row['id'].'">';
	echo (empty($row['website'])?'<strong>'.$row['name'].'</strong>':'<a href="'.$row['website'].'" target="_blank">'.$row['name'].'</a>');
	echo '<small>'.date('j-M-Y g:ia', $row['date']).'</small><br/>';
	echo nl2br($row['content']);
	echo '</li>';
}
echo '</ol>';

echo <<<HTML
<form method="post" action="comment_add.php?id={$_GET['id']}">
		<div class="form-group">
		     <label for="name" class="col-lg-2 control-label">Name</label>
			<div class="col-lg-10">
				<input type="text" name="name" class="form-control" value="">
			</div>
		</div>
		<div style="height:5px;"></div>
		<div class="form-group">
		     <label for="email" class="col-lg-2 control-label">Email</label>
			<div class="col-lg-10">
				<input type="email" name="email" class="form-control" value="">
			</div>
		</div>
		<div style="height:5px;"></div>
		<div class="form-group">
		     <label for="website" class="col-lg-2 control-label">Website</label>
			<div class="col-lg-10">
				<input type="text" name="website" class="form-control" value="">
			</div>
		</div>
		<div style="height:5px;"></div>
		<div class="form-group">
		     <label for="comments" class="col-lg-2 control-label">Comments</label>
			<div class="col-lg-10">
				<textarea class="form-control"  name="content"></textarea>
			</div>
		</div>
		<div style="height:5px;"></div>
		<div class="form-group">
			<div class="col-md-6"></div>
			     <div  class="col-md-6" style="margin-left: 0px;">
			           <button type="submit" class="btn btn-default btn-primary pull-right" name="submit" style="margin-top:10px;">Post Comment</button>
					  </div>
			     </div>
		
	
</form>
HTML;
?>
				   			
			</article>		
   		</div>
   		<div class="col-md-4" id="right-col">

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
   	<?php include('includes/footer.php');?>
</body>
</html>



























































