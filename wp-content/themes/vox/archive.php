<?php
	get_header();
	$post_type = get_post_type();
?>

<div id="banner">
	<?php the_post_type_thumbnail($post_type->slug, 'full'); ?>
</div>

<main id="archive">
	<div class="container">
		<header class="header">
			<h1><?php echo $post_type->labels->name; ?></h1>
		</header>

		<article class="article">
			<ul>
				<?php
					$query = new WP_Query(array(
						'post_type' => $post_type->slug,
						'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1, 
						'posts_per_page' => '4'
					));
				?>
				<?php while($query->have_posts()): $query->the_post(); ?>
					<li>
						<!-- -->
					</li>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</ul>
			
			<?php TW_Pagination($query); ?>
		</article>

		<aside class="sidebar">
			<?php get_sidebar(); ?>
		</aside>
	</div>
</div>

<?php get_footer(); ?>