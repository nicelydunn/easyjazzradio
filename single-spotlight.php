<?php
get_header();
?>

	<main id="primary">

		<?php while ( have_posts() ) : the_post(); ?>

		<div class="container mx-auto px-4 mt-16">
			<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
				<div class="md:col-span-2">
					<iframe class="w-full aspect-[3/2]" src="https://www.youtube.com/embed/<?php echo get_field('spotlight_youtube'); ?>?autoplay=1&rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
					<h1 class="mt-8 text-2xl"><?php echo get_the_title(); ?></h1>
					<div class="prose-lg mt-8">
						<?php echo get_the_content(); ?>
					</div>
				</div>
				<div>
					<?php 
						$current_post_id = get_the_ID();
						$args = array(
							'post_type' => 'spotlight',
							'post_status' => 'publish',
							'posts_per_page' => 5,
							'order' => 'DESC',
							'orderby' => 'date',
							'post__not_in'   => array( $current_post_id )
						);
						$query = new WP_Query($args);
					?>
					<?php if ( $query->have_posts() ) : ?>
						<div class="bg-blue flex justify-between items-center py-4 px-4">
							<p class="text-sm uppercase font-semibold text-white">Latest Spotlights</p>
							<a href="/spotlight/" class="button">View All</a>
						</div>
						<?php while ( $query->have_posts() ) : $query->the_post(); ?>
							<a href="<?php echo get_the_permalink(); ?>">
								<div class="grid grid-cols-3 p-4 gap-4">
									<div>
										<?php echo get_the_post_thumbnail( $post->ID, 'small', array( 'class' => 'w-full aspect-[1/1] object-cover object-top' ) ); ?>
									</div>
									<div class="col-span-2">
										<p><?php echo get_the_title(); ?></p>
									</div>
									<div class="col-span-3">
										<p class="text-xs uppercase text-sky-700 flex items-baseline gap-2">
											<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" class="h-4 w-4 fill-sky-700" viewBox="0 0 610.398 610.398">
												<path d="M159.567 0h-15.329c-1.956 0-3.811.411-5.608.995-8.979 2.912-15.616 12.498-15.616 23.997v51.613c0 2.611.435 5.078 1.066 7.44 2.702 10.146 10.653 17.552 20.158 17.552h15.329c11.724 0 21.224-11.188 21.224-24.992V24.992c0-13.804-9.5-24.992-21.224-24.992zM461.288 0h-15.329c-11.724 0-21.224 11.188-21.224 24.992v51.613c0 13.804 9.5 24.992 21.224 24.992h15.329c11.724 0 21.224-11.188 21.224-24.992V24.992C482.507 11.188 473.007 0 461.288 0z"/>
												<path d="M539.586 62.553h-37.954v14.052c0 24.327-18.102 44.117-40.349 44.117h-15.329c-22.247 0-40.349-19.79-40.349-44.117V62.553H199.916v14.052c0 24.327-18.102 44.117-40.349 44.117h-15.329c-22.248 0-40.349-19.79-40.349-44.117V62.553H70.818c-21.066 0-38.15 16.017-38.15 35.764v476.318c0 19.784 17.083 35.764 38.15 35.764h468.763c21.085 0 38.149-15.984 38.149-35.764V98.322c.005-19.747-17.059-35.769-38.144-35.769zM527.757 557.9l-446.502-.172V173.717h446.502V557.9z"/>
												<path d="M353.017 266.258h117.428c10.193 0 18.437-10.179 18.437-22.759s-8.248-22.759-18.437-22.759H353.017c-10.193 0-18.437 10.179-18.437 22.759 0 12.575 8.243 22.759 18.437 22.759zM353.017 348.467h117.428c10.193 0 18.437-10.179 18.437-22.759 0-12.579-8.248-22.758-18.437-22.758H353.017c-10.193 0-18.437 10.179-18.437 22.758 0 12.58 8.243 22.759 18.437 22.759zM353.017 430.676h117.428c10.193 0 18.437-10.18 18.437-22.759s-8.248-22.759-18.437-22.759H353.017c-10.193 0-18.437 10.18-18.437 22.759s8.243 22.759 18.437 22.759zM353.017 512.89h117.428c10.193 0 18.437-10.18 18.437-22.759 0-12.58-8.248-22.759-18.437-22.759H353.017c-10.193 0-18.437 10.179-18.437 22.759 0 12.579 8.243 22.759 18.437 22.759zM145.032 266.258H262.46c10.193 0 18.436-10.179 18.436-22.759s-8.248-22.759-18.436-22.759H145.032c-10.194 0-18.437 10.179-18.437 22.759.001 12.575 8.243 22.759 18.437 22.759zM145.032 348.467H262.46c10.193 0 18.436-10.179 18.436-22.759 0-12.579-8.248-22.758-18.436-22.758H145.032c-10.194 0-18.437 10.179-18.437 22.758.001 12.58 8.243 22.759 18.437 22.759zM145.032 430.676H262.46c10.193 0 18.436-10.18 18.436-22.759s-8.248-22.759-18.436-22.759H145.032c-10.194 0-18.437 10.18-18.437 22.759s8.243 22.759 18.437 22.759zM145.032 512.89H262.46c10.193 0 18.436-10.18 18.436-22.759 0-12.58-8.248-22.759-18.436-22.759H145.032c-10.194 0-18.437 10.179-18.437 22.759.001 12.579 8.243 22.759 18.437 22.759z"/>
											</svg>
											<?php echo get_the_date('F j, Y'); ?>
										</p>
									</div>
								</div>
                            </a>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</div>

		

		<?php endwhile; ?>

	</main><!-- #main -->

<?php
get_footer();
