<?php get_header(); ?>

<div id="content">
	<article class="container-top-20">
	<?php
		$args=array(
		   'post_type'=>'page',
		   'pagename' => $post->post_name, 
		);
	
		$the_page_query = new WP_Query( $args);
		if ($the_page_query->have_posts ()) :
		while ( $the_page_query->have_posts () ) :
		$the_page_query->the_post ();
	?>
		<header>
			<h1 class="title"><?php the_title(); ?></h1>
		</header>
		<div class="post-content container-top-10">
			<?php 
				$content = apply_filters( 'the_content', get_the_content() );
				$content = str_replace( ']]>', ']]&gt;', $content );
				$content = str_replace('&nbsp;', '', $content);
				echo $content;
			?>
		</div>
		<p class="container-top-20">
			<?php the_tags('Етикети: '); ?>
		</p>
		<?php
			endwhile;
			endif;
			wp_reset_postdata();
		?>
	</article>
</div><!-- #content -->

<aside id="sidebar-container">
<?php
	get_sidebar();
?>
</aside>

<?php
get_footer ();
?>