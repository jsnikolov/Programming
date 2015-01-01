<?php get_header(); ?>

<div id="content">
	 <div class="container-top-20">
		<article class="clearfix">
			<?php
				$main_cat_query = new WP_Query( 'cat='.$cat.'&posts_per_page=1' );
				if ($main_cat_query->have_posts ()) :
				while ( $main_cat_query->have_posts () ) :
				$main_cat_query->the_post ();
			?>
	  		<header>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<h1 class="title"><?php the_title(); ?></h1>
				</a>
			</header>
			<div class="container-top-10">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail('main-news', array('class' => 'alignleft'));
						}
				?>
				</a>
				<?php
					$args = array(
							'excerpt'           => get_the_content(),
							'count'				=> 800,
							'p_tag'				=>true
					);
					echo get_excerpt($args);
				  //echo get_excerpt(get_the_content(), 850); ?>
			</div>
			<?php
				endwhile;
				endif;
				wp_reset_postdata();
			?>
		</article>
	</div>
	 
	 <div class="container-top-20">
		<div class="category-title-left">
			<h3>Още от
				<em><?php echo get_cat_name($cat); ?></em>
			</h3>
		</div>
		<div id="cat-list">
			<ul class="list">
				<?php
					$cat_args = array(
							'posts_per_page' => 25,
							'cat' => $cat,
							'paged' => $paged,
					);
					$list_cat_query = new WP_Query($cat_args);
					if ($list_cat_query->have_posts ()) :
					while ( $list_cat_query->have_posts () ) :
					$list_cat_query->the_post ();
				?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php
					endwhile;
					endif;
					wp_reset_postdata();
				?>
			</ul>
			<p class="container-top-20 center-text">
				<?php
					$big = 999999999; // need an unlikely integer
					
					$args = array(
					 		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format'       => '?paged=%#%',
							'total'        => $list_cat_query->max_num_pages,
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