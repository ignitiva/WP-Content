<?php get_header(); ?>

<main id="page">
	<div class="container">
		<header>
			<h1>Página Não Encontrada</h1>
			<hr/>
		</header>

		<article>
			<center>
				<p>
					Ops! Parece que a página que você buscava não encontra-se mais aqui.
				</p>
				<br/>
				<a href="<?php echo esc_url(home_url('/')); ?>" class="readmore red">Ir para a home</a>
			</center>
		</article>
	</div>
</main>

<?php get_footer(); ?>