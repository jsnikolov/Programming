<?php get_header(); ?>

<div id="content">

	 <div class="container-top-20">
		<article class="clearfix">
			<?php
				$main_news_query = new WP_Query( 'adminorder=mainnews&posts_per_page=1' );
				if ($main_news_query->have_posts ()) :
				$main_news_query->the_post ();
				$post_ID =  get_the_ID();
				$autor = "autor";
			?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php if ( has_post_thumbnail() ){
						the_post_thumbnail('main-news', array('class' => 'alignright'));
					}
			?>
			</a>
			<div class="main-news">
				<header>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<h1 class="title"><?php the_title(); ?></h1>
					</a>
				</header>
				<div class="autor-date">
					<span class="autor"><?php echo get_post_meta($post_ID, $autor, true); ?></span>
					<span class="date"><?php  echo get_the_date('d F Y'); ?></span>
				</div>
				<p class="container-top-10">
					<?php 
						$args = array(
								'excerpt'           => get_the_content(),
								'count'				=> 350,
						);
						echo get_excerpt($args); 
					?>
				</p>
			</div>
			<?php
				endif;
				wp_reset_postdata();
			?>
		</article>
	</div>

	<div class="container-top-20 news-boxes">
		<div class="category-title-right">
			<h3>НОВИНИ</h3>
		</div>
		<?php
			$the_box_query = new WP_Query( 'adminorder=newsbox&posts_per_page=3' );
			if ($the_box_query->have_posts ()) :
			while ( $the_box_query->have_posts () ) :
			$the_box_query->the_post ();
		?>
		<article class="container-top-10">
			<div>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php if ( has_post_thumbnail() ){
								the_post_thumbnail('news', array('class' => 'aligncenter'));
							}
					?>
				</a>
			</div>
			<header>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<h2><?php the_title(); ?></h2>
				</a>
			</header>
		</article>
		<?php
			endwhile;
			endif;
			wp_reset_postdata();
		?>
	</div>

	<div class="container-top-20">

		<div class="quote">
			<article>
				<?php
					$notes_query = new WP_Query( 'adminorder=citations&posts_per_page=1' );
					if ($notes_query->have_posts ()) :
					$notes_query->the_post ();
					$post_ID =  get_the_ID();
					$citat = "citat";
				?>
				<header>
					<div class="note-bar center-text">Прозрение</div>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<h2><?php the_title(); ?></h2>
					</a>
				</header>
				<div class="container-top-10">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail('citat', array('class' => 'center'));
								}
						?>
					</a>
					<p class="container-top-5 left-text">
						<em><?php echo get_post_meta($post_ID, $citat, true); ?></em>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="read-more">Виж още ...</a>
					</p>
				</div>
			<?php
				endif;
				wp_reset_postdata();
			?>
			</article>
		</div>
	 
		<div class="accent-boxes"> 
			<div class="box">
				<?php
					$the_box_query = new WP_Query( 'adminorder=accentuation&posts_per_page=1' );
					if ($the_box_query->have_posts ()) :
					$the_box_query->the_post ();
					$post_ID =  get_the_ID();
					$autor = "autor";
				?>
				<div class="green-bar">Акцент</div>
				<article>
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
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail('category-main-news', array('class' => 'alignright'));
									}
							?>
						</a>
						
						<?php 
							$args = array(
								'excerpt'	=> get_the_content(),
								'count'		=> 250,
								'p_tag'		=> true
							);
							echo get_excerpt($args);
						?>
					</div>
					<?php
						endif;
						wp_reset_postdata();
					?>
				</article>
			</div>
			
			<div class="box container-top-20">
				<?php
					$the_box_query = new WP_Query( 'adminorder=curious&posts_per_page=1' );
					if ($the_box_query->have_posts ()) :
					$the_box_query->the_post ();
				?>
				<div class="green-bar right-text">
					<span>Любопитно</span>
				</div>
				<article class="clearfix">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php if ( has_post_thumbnail() ){
										the_post_thumbnail('category-main-news', array('class' => 'alignleft'));
									}
							?>
						</a>
					<header>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<h2><?php the_title(); ?></h2>
						</a>
					</header>
					<p class="container-top-5">
						<?php 
							$args = array(
								'excerpt'	=> get_the_content(),
								'count'		=> 190
							);
							echo get_excerpt($args); 
						?>
					</p>
				</article>
				<?php
					endif;
					wp_reset_postdata();
				?>
			</div>
		</div>

	</div>

	<div class="container-top-20 news-boxes">
		<article>
			<div class="category-title-right">
				<h3>България</h3>
			</div>
			<ul class="list">
				<?php
					$bulgaria_query = new WP_Query( 'category_name=bulgaria&posts_per_page=5' );
					if ($bulgaria_query->have_posts ()) :
					while ( $bulgaria_query->have_posts () ) :
					$bulgaria_query->the_post ();
				?>
				<li>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<h6>
							<?php 
								$args = array(
									'excerpt'			=> get_the_title(),
									'count'				=> 70,
									'read_more'			=>'',
									'end_string_format' => ' ...'
								);
								echo get_excerpt($args);
							?>
						</h6>
					</a>
				</li>
				<?php
					endwhile;
					endif;
					wp_reset_postdata();
				?>
			</ul>
		</article>
		<article>
			<div class="category-title-right">
				<h3>Свят</h3>
			</div>
			<ul class="list">
				<?php
					$bulgaria_query = new WP_Query( 'category_name=world&posts_per_page=5' );
					if ($bulgaria_query->have_posts ()) :
					while ( $bulgaria_query->have_posts () ) :
					$bulgaria_query->the_post ();
				?>
				<li>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<h6>
							<?php 
								$args = array(
									'excerpt'			=> get_the_title(),
									'count'				=> 70,
									'read_more'			=>'',
									'end_string_format' => " ..."
								);
								echo get_excerpt($args);
							?>
						</h6>
					</a>
				</li>
				<?php
					endwhile;
					endif;
					wp_reset_postdata();
				?>
			</ul>
		</article>
		<article>
			<div class="category-title-right">
				<h3>Интервюта</h3>
			</div>
			<ul class="list">
				<?php
					$bulgaria_query = new WP_Query( 'category_name=interviews&posts_per_page=5' );
					if ($bulgaria_query->have_posts ()) :
					while ( $bulgaria_query->have_posts () ) :
					$bulgaria_query->the_post ();
				?>
				<li>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<h6>
							<?php 
								$args = array(
									'excerpt'			=> get_the_title(),
									'count'				=> 70,
									'read_more'			=>'',
									'end_string_format' => " ..."
								);
								echo get_excerpt($args);
							?>
						</h6>
					</a>
				</li>
				<?php
					endwhile;
					endif;
					wp_reset_postdata();
				?>
			</ul>
		</article>
	</div>
	<div class="container-top-20 news-boxes">
		<article>
			<div class="category-title-right">
				<h3>Фейсбук</h3>
			</div>
			<ul class="list">
				<?php
					$bulgaria_query = new WP_Query( 'category_name=fb&posts_per_page=5' );
					if ($bulgaria_query->have_posts ()) :
					while ( $bulgaria_query->have_posts () ) :
					$bulgaria_query->the_post ();
				?>
				<li>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<h6>
							<?php 
								$args = array(
									'excerpt'			=> get_the_title(),
									'count'				=> 70,
									'read_more'			=>'',
									'end_string_format' => " ..."
								);
								echo get_excerpt($args);
							?>
						</h6>
					</a>
				</li>
				<?php
					endwhile;
					endif;
					wp_reset_postdata();
				?>
			</ul>
		</article>
		<article>
			<div class="category-title-right">
				<h3>Конкурси</h3>
			</div>
			<ul class="list">
				<?php
					$bulgaria_query = new WP_Query( 'category_name=competitions&posts_per_page=5' );
					if ($bulgaria_query->have_posts ()) :
					while ( $bulgaria_query->have_posts () ) :
					$bulgaria_query->the_post ();
				?>
				<li>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<h6>
							<?php 
								$args = array(
									'excerpt'			=> get_the_title(),
									'count'				=> 70,
									'read_more'			=>'',
									'end_string_format' => " ..."
								);
								echo get_excerpt($args);
							?>
						</h6>
					</a>
				</li>
				<?php
					endwhile;
					endif;
					wp_reset_postdata();
				?>
			</ul>
		</article>
		<article>
			<div class="category-title-right">
				<h3>Коментари</h3>
			</div>
			<ul class="list">
				<?php
					$bulgaria_query = new WP_Query( 'category_name=coments&posts_per_page=5' );
					if ($bulgaria_query->have_posts ()) :
					while ( $bulgaria_query->have_posts () ) :
					$bulgaria_query->the_post ();
				?>
				<li>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<h6>
							<?php 
								$args = array(
									'excerpt'			=> get_the_title(),
									'count'				=> 70,
									'read_more'			=>'',
									'end_string_format' => " ..."
								);
								echo get_excerpt($args);
							?>
						</h6>
					</a>
				</li>
				<?php
					endwhile;
					endif;
					wp_reset_postdata();
				?>
			</ul>
		</article>
	</div>
	
</div>
	
<aside id="sidebar-container">
<?php
	get_sidebar();
?>
</aside>
	
<?php
get_footer ();
?>