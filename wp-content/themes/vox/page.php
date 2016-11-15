<?php get_header(); ?>

<div id="banner">
	<?php the_post_thumbnail('full'); ?>
</div>

<main id="page">
	<div class="container">
		<header>
			<h1>
				<?php the_title(); ?>
			</h1>
		</header>

		<article>
			<?php the_content(); ?>
		</article>
	</div>
</main>

<?php get_footer(); ?>