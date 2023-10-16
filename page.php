<?php

get_header();
?>

	<main id="primary" class="">

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="h-[50vh] w-full bg-cover" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>')">
				<div class="w-full h-full flex items-center justify-center bg-[rgba(0,0,0,0.5)]">
					<h1 class="text-white text-5xl mt-8 drop-shadow-md shadow-white"><?php echo get_the_title(); ?></h1>
				</div>
			</div>

			<div class="max-w-3xl mx-auto p-8 -mt-16 bg-gray-100">
				
				<div class="prose-lg">
					<?php the_content(); ?>
				</div>
			</div>

		<?php endwhile; ?>

	</main>

<?php
get_footer();
