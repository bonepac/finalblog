
<?php
include 'mysql.php';
$id = $_GET['id'];
include('includes/header.php');
$result = mysql_safe_query("SELECT * FROM posts WHERE posts.cat_id='$id'");
$tit =  mysql_safe_query("SELECT name FROM category WHERE id='$id'");

function readMoreFunction($story_desc,$link,$targetFile,$id) {  
//Number of characters to show  
$chars = 350;  
$story_desc = substr($story_desc,0,$chars);  
$story_desc = substr($story_desc,0,strrpos($story_desc,' '));  
$story_desc = $story_desc." <a href='$link?$targetFile=$id'><br/>Read More...</a>";  
return $story_desc; 
}
?>

<div class="container" id="page-wrap">

   <div id="main-content">
   		<div class="col-md-8" id="left-col">
   
   			<article class="entry">
			<?php
				
				
				while($row = @mysql_fetch_assoc($result)){
					if ($row != '') {
						echo readMoreFunction($row['body'],"post_view.php","id",$row['id']);  
					}else{
						echo "No Post in this category";
					}
				
				
				
			}
			?>
				   			
			</article>		
   		</div>
   		<div class="col-md-4"  id="right-col">

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





































