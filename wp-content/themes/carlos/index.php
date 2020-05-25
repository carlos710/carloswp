<?php
global $wp_query;
get_header();
?>
<main role="main" class="main-content-container">
	<section class="main-content">
		<div class="container">
			<?php
			if ( $wp_query->have_posts() ) : 
			?>

				<h3 class="Tcenter">Regular post List</h3>
				<div class="container">
					<div class="row">
						<?php while ( $wp_query->have_posts() ) : $wp_query-> the_post(); ?>
							<div class="col-md-3">
							  <div class="card card-default p-3">
								  <?php the_title(); ?>
							  </div>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			<?php endif; ?>	
			<h3 class="Tcenter">Movie List</h3>
			<?php
			$movie_query = new WP_Query(
				[
					'posts_per_page' => 12,
					'orderby' => 'title',
					'order' => 'ASC',
					'post_type' => 'movie',
					'post_status' => 'publish',
				]
			);			
			if ( $movie_query->have_posts() ) : 
			?>
				<div class="container">
					<div class="row">
						<?php while ( $movie_query->have_posts() ) : $movie_query->the_post(); ?>
							<div class="col-md-3">
							  <div class="card card-default p-3">
								  <strong>Movie name: </strong> <?php the_title(); ?><br />
								  <strong>Movie Director: </strong> <?php echo get_field('movie_director'); ?><br />
								  <strong>Movie Year: </strong> <?php echo get_field('movie_year'); ?>
							  </div>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php get_footer(); ?>