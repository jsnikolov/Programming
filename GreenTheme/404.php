<?php get_header(); ?>
<div id="content">
	<article class="container-top-20">
		<header>
			<h1 class="title">Страницата не е намерена <em>(грешка 404)</em></h1>
		</header>
		<div class="post-content container-top-10">
			<p class="container-top-10">Тази грешка се получава, когато сте попаднали на уеб адрес, който не съществува на сървъра на Двата бука.</p>
			<p class="container-top-10">
				Ако смятате, че проблемът е у нас (<em>например: последвали сте грешен линк в Двата бука</em>), моля да изпратите
				<a href="mailto:office@dvatabuka.eu" title="Email: office@dvatabuka.eu">email</a> с описание как сте стигнали до тук.
			</p>
			<p class="container-top-10">
				Ако сте последвали линк от външна страница, възможно е адресът е да е променен, затова можете да използвате търсачката на Двата бука, за да откриете, каквото ви е нужно.
			</p>
			<div class="search" >
				<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
					<input class="SearchBox" type="search" name="s" placeholder="Търсене..." /> <input
						class="SearchButton" type="submit" value="" />
				</form>
			</div>
			
			<p class="container-top-10">
				Ако не сте сигурни какво точно се е случило, можете да се върнете към 
				<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name');?>">началната страница на Двата бука.</a>
			</p>
		</div>
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