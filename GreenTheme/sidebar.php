	<div class="container-top-15">
		<div class="category-title-right">
			<h3>Топ оферта</h3>
		</div>
		<div id="top-offer">
		<?php 
			$top_offer_query = new WP_Query( 'adminorder=topoffer&posts_per_page=1' );
			if ($top_offer_query->have_posts ()) :
				while ( $top_offer_query->have_posts () ) :
					$top_offer_query->the_post ();
		?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	  		<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail('top-offer', array('class' => 'alignright'));
					}
			?>
				<h1>
					<strong><?php the_title(); ?></strong>
				</h1>
				<span>
					<em>
						<?php
							$args = array(
								'excerpt'	=> get_the_content(),
								'count'		=> 170
							);
							echo get_excerpt($args); 
						?>
					</em>
				</span>
			</a>
		<?php
			endwhile;
			endif;
			wp_reset_postdata();
		?>
		</div>
	</div>
	<?php if(!dynamic_sidebar('right-sidebar')):?>
		<div class="container-top-15">
			<div class="category-title-right">
				<h3>Приятели</h3>
			</div>
			<div id="fb-container">
				<div class="fb-like-box" data-href="https://www.facebook.com/vestniksega" data-width="292" data-colorscheme="dark" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
				<div class="fb-like-box" data-href="https://www.facebook.com/FacebookDevelopers" data-width="292" data-colorscheme="dark" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
			</div>
		</div>	
	<?php endif;?>
