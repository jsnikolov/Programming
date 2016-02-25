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
	<?php endif;?>
	
	<?php if(!dynamic_sidebar('ads-right-sidebar')):?>
	<?php endif;?>
