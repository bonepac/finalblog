
<?php
include 'mysql.php';
include('includes/header.php');
$result = mysql_safe_query('SELECT * FROM posts');

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
   		<div id="left-col" style="padding-right: 90px;">
   			<article class="entry">
			<?php
				
				
				while($row = @mysql_fetch_assoc($result)){
				/*echo '<h2>'.$row['title'].'</h2>';
				echo '<em>Posted '.date('F j<\s\up>S</\s\up>, Y', $row['date']).'</em><br/>';
				echo nl2br($row['body']).'<br/>';
				echo '<a href="post_view.php?id='.$row['id'].'">Read More</a> || <a href="post_edit.php?id='.$row['id'].'">Edit</a> || <a href="post_delete.php?id='.$row['id'].'">Delete</a><br/><br/>';*/
				echo readMoreFunction($row['body'],"post_view.php","id",$row['id']);  
				
			}
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





































