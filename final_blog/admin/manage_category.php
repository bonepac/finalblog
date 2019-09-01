
<?php
include 'mysql.php';
include('includes/header.php');
$cat = mysql_safe_query('SELECT * FROM  category');
?>


   <div class="container" id="page-wrap">

   <div id="main-content">
   		<div id="left-col">
   			<article class="entry">
   				Welcome Admin
			<?php
				echo "<br/><br/>";
				while ($row = @mysql_fetch_assoc($cat)) {
					echo '<a href="edit_category.php?id='.$row["id"].'">'. $row["name"] .'<br/>Edit</a> || <a href="delete_category.php?id='.$row["id"].'">Delete</a><br/><br/>';
				}
				
			?>
				   			
			</article>		
   		</div>
   		<div  id="right-col">

		   			<div >
		   				<h3>Categories.</h3> 
		   				<?php

							$cate = mysql_safe_query('SELECT * FROM  category');

							while ($row = @mysql_fetch_assoc($cate)) {
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





































