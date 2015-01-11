<?php get_header(); ?>
<div id="content">
	<div class="container-top-20">
	<div class="category-title-left">
		<h3>
			<?php
				printf( __( 'Архив с етикет: <em>"%s"</em>', 'greentheme' ), single_tag_title( '', false ) );
			?>
		</h3>
	</div>
	<ul>
		<?php
		if (have_posts ()) :
				while (have_posts () ) :
					the_post ();
				$post_ID =  get_the_ID();
				$autor = "autor";
		?>
		<li class="container-top-20">
				<header>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<h2><?php the_title(); ?></h2>
					</a>
				</header>
					<div class="autor-date">
						<span class="autor"><?php echo get_post_meta($post_ID, $autor, true); ?></span>
						<span class="date"><?php  echo get_the_date('d F Y'); ?></span>
					</div>
					<div class="container-top-10">
						<?php the_excerpt(); ?>
					</div>
		</li>
		<?php
			endwhile;
			endif;
		?>
	</ul>
	</div>
		<p class="container-top-20 center-text">
			<?php
				$big = 999999999;   /* need an unlikely integer*/
				
				$args = array(
				 		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format'       => '?paged=%#%',
						'total'        => $wp_query->max_num_pages,
						'current'      => max( 1, get_query_var('paged') ),
						'show_all'     => False,
						'end_size'     => 1,
						'mid_size'     => 2,
						'prev_next'    => True,
						'prev_text'    => __('« Предишни'),
						'next_text'    => __('Следваща страница »'),
						'type'         => 'plain',
						'add_args'     => False,
						'add_fragment' => ''
				);
				echo paginate_links( $args );
			?>
		</p>
</div>
	
<aside id="sidebar-container">
<?php 
	get_sidebar();
?>
</aside>
<?php
get_footer ();
?>