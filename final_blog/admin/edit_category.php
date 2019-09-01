<?php
include 'mysql.php';
include('includes/header.php');
if(!empty($_POST)) {
	if(mysql_safe_query('UPDATE category SET name=%s WHERE id=%s', $_POST['name'],  $_GET['id']))
		redirect('category.php?id='.$_GET['id']);
	else
		echo @mysql_error();
}

$result = mysql_safe_query('SELECT * FROM category WHERE id=%s', $_GET['id']);

if(!@mysql_num_rows($result)) {
	echo 'Post #'.$_GET['id'].' not found';
	exit;
}
?>


   <div class="container" id="page-wrap">

   <div id="main-content">
   		<div id="left-col" style="padding-right: 120px; padding-top: 20px;">
   			<article class="entry">
				
<?php


$row = @mysql_fetch_assoc($result);

echo <<<HTML
<form method="post">
	<div class="row">
	   <div class="col-lg-2">
			<label class="control-label" for="website" style="position:relative; top:7px;">Category</label>
		</div>
		<div class="col-lg-10">
			<input type="text" class="form-control" name="name" value="{$row['name']}">
		</div>
	</div>
	<div style="height:10px;"></div>
	<div class="row">
		<button type="submit" name="submit" class="btn btn-primary pull-right">Save</button>
	</div>
</form>
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






























