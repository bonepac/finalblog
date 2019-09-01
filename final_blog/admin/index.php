<?php
include 'mysql.php';
include('includes/header.php');
$result = mysql_safe_query('SELECT * FROM posts');

?>


   
   <div class="container" id="page-wrap">

   <div id="main-content">
   		<div id="left-col">
   			<article class="entry">
				<h1>Welcome Admin </h1><br/><br/>
				<?php


echo <<<HTML
<a href="post_add.php">+ Add New Post</a><br/>
<a href="home.php">Manage Post</a><br/>
<a href="add_category.php">+ Add New Category</a><br/>
<a href="manage_category.php">Manage Category</a><br/>
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





















