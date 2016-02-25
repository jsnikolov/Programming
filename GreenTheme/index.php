<?php get_header(); ?>
<div id="content">
	<article class="container-top-20">
	<?php
		if (have_posts ()) :
			while (have_posts () ) :
				the_post ();
			$post_ID =  get_the_ID();
			$subtitle = "subtitle";
			$autor = "autor";
	?>
		<header>
			<h1 class="title"><?php the_title(); ?></h1>
			<h4 class="sub-title"><?php echo get_post_meta($post_ID, $subtitle, true); ?></h4>
		</header>
			<div class="autor-date">
				<span class="autor"><?php echo get_post_meta($post_ID, $autor, true); ?></span>
				<span class="date"><?php  echo get_the_date('d F Y'); ?></span>
			</div>
			<div class="post-content container-top-10">
				<?php 
					$content = apply_filters( 'the_content', get_the_content() );
					$content = str_replace( ']]>', ']]&gt;', $content );
					$content = str_replace('&nbsp;', '', $content);
					echo $content;
				?>
			</div>
			<div id="fb-root"></div>
			<div class="container-top-20 clearfix">
				<p class="tags"><?php the_tags('Етикети: '); ?></p>
				<div class="fb-like-share">
					<div class="fb-like" data-layout="button" data-share="true" data-width="450" data-show-faces="false"></div>
				</div>
			</div>
	<?php
		endwhile;
		endif;
	?>
	
	<?php if(!dynamic_sidebar('ads-at-home')):?>
	<?php endif;?>
	
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