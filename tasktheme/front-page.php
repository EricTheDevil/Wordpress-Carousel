<?php get_header(); ?>

	<?php 
	//query for last 2 post(in category article) that got published 
	$counter = 0;
	$wpb_recent_query = new WP_Query(
		array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-2,'category_name' => 'article')); 

	?>
 
<?php if ( $wpb_recent_query->have_posts() ) : 
	//checking for featured images from the last 2 post
	while ( $wpb_recent_query->have_posts() ) : $wpb_recent_query->the_post(); 
		if ( has_post_thumbnail() ) 
			{ 
				$image_url[$counter] = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' )[0];
				$counter++;				
			}
	endwhile; 
?>
	<!--container for carousel-->
	<div class="container">
		<!--bootstrap carousel-->
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			
			<ol class="carousel-indicators">
			  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			  <li data-target="#myCarousel" data-slide-to="1"></li>
			  <li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<div class="carousel-inner">
				<div class="item active">
					<?php echo '<img src="' . $image_url[0] .'" alt="">' ?>
				</div>
					
				<div class="item">
					<?php echo '<img src="' . $image_url[1] . '" alt="">' ?>
				</div>
			</div>

			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			  <span class="glyphicon glyphicon-chevron-left"></span>
			  <span class="sr-only">Previous</span>
			</a>
			
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
			  <span class="glyphicon glyphicon-chevron-right"></span>
			  <span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	
	<!--container for everything else-->
	<div class="container" id="lower_container">

		<div class="row">
			<div class="col-sm-7">
				<?php while ( $wpb_recent_query->have_posts() ) : $wpb_recent_query->the_post(); ?>
					<!--container for the recent posts-->
					<div class="article_group"> 
							<h3> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a> </h3>
								<?php the_excerpt(); ?>
					</div>
					<br>
				<?php endwhile; ?>
			</div>
			
			<!--empty space-->
			<div class="col-sm-1" id="empty_placeholder">
			</div>
			
			<!--feedback form-->
			<div class="col-sm-3" id="form_prop">	
				<form method="post" action="dataconnect.php">			  
				
					<input type="text" id="search_input" placeholder="Search...">
					<input type="button" id="search_btn" value="go">
					 <br><br>
					<label><h1> Lähetä palautetta </h1></label>
					 <br>
					 
					<label><small> Nimesi </small></label>
					 <br>			 
					<input type="input" placeholder="Name" name="name" required>
					 <br>
					 
					<label><small>Sähköposti</small></label>
					 <br>			 
					<input type="email" name="email" placeholder="Email address" required>
					 <br>
					 
					<label><small> Viesti </small></label>
					 <br>
					<textarea name="Message" name="message" maxlength="6000" required > </textarea>
					 <br><br>
			
					<input type="submit" id="form_prop_submit" value="Lähetä">
					
				</form>				
			</div>
		</div>			
	</div>
    
<?php wp_reset_postdata(); ?>
 
<?php endif; ?>

<?php get_footer(); ?>