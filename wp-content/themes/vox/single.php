<?php
	get_header();
	$post_type = get_post_type();
?>

<div id="banner">
	<?php the_post_type_thumbnail($post_type->slug, 'full'); ?>
</div>

<main id="single">
	<div class="container">
		<header class="header">
			<h1>
				<?php the_title(); ?>
			</h1>
			<p>
				<?php echo $post_type->labels->name; ?>
			</p>
		</header>

		<article class="content">
			<div class="date">
				Postado em <?php echo get_the_date('d/m/Y'); ?>
			</div>

			<?php the_content(); ?>

			<a href="<?php the_post_type_link($post_type->slug); ?>" class="return">Voltar</a>
		</article>

		<aside class="sidebar">
			<?php get_sidebar(); ?>
		</aside>
	</div>
</div>

<?php get_footer(); ?>