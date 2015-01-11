</div><!-- #main -->
<footer id="footer">
	<div>
		<ul>
		<?php
			$args=array(
				'post_type'=>'page',
				'pagename' => 'за-нас',
			);
		
			$the_page_query = new WP_Query($args);
			if ($the_page_query->have_posts ()) :
			while ( $the_page_query->have_posts () ) :
			$the_page_query->the_post ();
		?>
			<li>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</li>
		<?php
			endwhile;
			endif;
			wp_reset_postdata();
		?>
			<li>
				<a href="mailto:office@dvatabuka.eu" title="Email: office@dvatabuka.eu">Email: office@dvatabuka.eu</a>
			</li>
		</ul>
		<p>&copy; 2014</p>
	</div>
</footer>
</div><!-- #wrapper -->
    <?php wp_footer(); ?>
</body>
</html>