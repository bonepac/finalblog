<?php
include 'mysql.php';
include('includes/header.php');
$cat = mysql_safe_query('SELECT * FROM  category');
if(!empty($_POST)) {
	if(mysql_safe_query('INSERT INTO posts (cat_id, title,body,date) VALUES (%s, %s,%s,%s)', $_POST['catid'], $_POST['title'], $_POST['body'], time()))
		echo 'Entry posted. <a href="post_view.php?id='.@mysql_insert_id().'">View</a>';
	else
		echo @mysql_error();
}
?>

  <div class="container" id="page-wrap">
   <div id="main-content">
   		<div id="left-col" style="padding-right: 90px;">
   			<article class="entry">
   				<h3>Add A Post Here</h3>
				<form method="post">
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" for="website" style="position:relative; top:7px;">Title</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="title" value="">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" for="website" style="position:relative; top:7px;">Category</label>
						</div>
						<div class="col-lg-10">
							<select name="catid" class="form-control">
								<option>..Select..</option>
								<option value="1">Music</option>
								<option value="2">Programming</option>
								<option value="3">Fashion</option>
								<option value="4">Electronics</option>
								<option value="5">Technology</option>
								
							</select>
						</div>
					</div>

					

					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" for="content" style="position:relative; top:7px;">Body</label>
						</div>
					<div class="col-lg-10">
						<textarea rows="5" cols="10" name="body" class="form-control"></textarea>
					</div>
				</div>
					<div style="height:10px;"></div>
				<div class="row">
						<button type="submit" name="submit" class="btn btn-primary pull-right">Comment</button>
				</div>
				</form>
				   			
			</article>		
   		</div>
   		<div id="right-col">

		   			<div >
		   				<h3>Categories.</h3> 
		   				<?php

							

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











