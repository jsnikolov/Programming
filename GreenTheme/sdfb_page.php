<?php get_header(); ?>

<div id="content">
	<article class="container-top-20">
	<?php
		$args=array(
		   'post_type'=>'page',
		   'pagename' => 'за-нас',
		);
	
		$the_page_query = new WP_Query( $args);
		if ($the_page_query->have_posts ()) :
		while ( $the_page_query->have_posts () ) :
		$the_page_query->the_post ();
	?>
		<header>
			<h1 class="title"><?php the_title(); ?></h1>
		</header>
		<div class="container-top-10">
			<?php the_content(); ?>
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