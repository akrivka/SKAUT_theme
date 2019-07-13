<?php get_header(); ?>

	<main class="main" role="main">
		<!-- section -->
		<section>
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<h1><?php the_title(); ?></h1>

				<?php the_content(); ?>

				<br class="clear">
				<!-- <?php edit_post_link(); ?> -->
			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2>Ups, nic nenalezeno.</h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
