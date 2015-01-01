<?php get_header('header.php'); ?>
<div id="content">
	
	<div class="container-top-20">
		<div class="category-title-left">
			<h3>
				<?php printf( __( 'Резултати от търсенето за: %s', 'Green Theme' ), '<em>' . get_search_query(false) . '</em>'); ?>
			</h3>
		</div>
		<div id="cat-list">
			<ul class="list">
				
				<?php
					$key = get_search_query();
					$args = array(
							'posts_per_page' => 25,
							's' => $key,
							'paged' => $paged,
					);
					$search_query = new WP_Query($args);
					
					if(!$search_query->have_posts () || !$key || $key == ''){
						echo '<li>Няма намерени резултати за вашето търсене</li>';
					}
					else{
						while ( $search_query->have_posts () ){
							$search_query->the_post ();
				?>
				<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
				<?php
						}//end-WHILE
					wp_reset_postdata();
				?>
			</ul>
			<p class="container-top-20 center-text">
				<?php
					$big = 999999999; // need an unlikely integer
					
					$args = array(
					 		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format'       => '?paged=%#%',
							'total'        => $search_query->max_num_pages,
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
				}//end-IF
				?>
			</p>
		</div>
	</div>
</div>
	<!-- end CONTENT -->
	<!-- start RIGHT-SIDEBAR -->
<aside id="sidebar-container">
<?php
	get_sidebar();
?>
</aside>
	<!-- end RIGHT-SIDEBAR -->
<?php
get_footer ();
?>