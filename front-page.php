<?php

get_header();
?>

	<main id="primary">

		<?php while ( have_posts() ) : the_post(); ?>

            <div class="h-[90vh] w-full bg-cover flex items-center" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>')">
                <div class="w-full pl-4 md:pl-8 lg:pl-32 pr-8">
                    <h1 class="text-white text-5xl mt-8 drop-shadow-md shadow-white">Easy Jazz FM Radio</h1>
                    <iframe width="100%" height="350" frameborder="0" class="mt-4" src="https://live365.com/embed/player.html?station=a17629&s=xl&m=light"></iframe>
                </div>
            </div>

            <div class="bg-blue">
                <div class="container mx-auto px-4 grid grid-cols-1 lg:grid-cols-3 py-8 gap-4 items-center">
                    <div><p class="font-lora font-semibold text-2xl text-white">Your FREE Soft Jazz Station</p></div>
                    <div><p class="text-white">Easily listen using our free web player or download the Easy Jazz FM app.</p></div>
                    <div class="flex justify-center">
                    <a href="https://live365.com/embed/popout.html?station=a17629&s=xl&m=light" target="popup" onclick="window.open('https://live365.com/embed/popout.html?station=a17629&s=xl&m=light','popup','width=783,height=296'); return false;" class="button">Listen Now</a>
                    </div>
                </div>
            </div>

            <?php
                $streaming_title = (get_field('streaming_title')) ? get_field('streaming_title') : '';
                $streaming_description = (get_field('streaming_description')) ? get_field('streaming_description') : '';
                $streaming_image = (get_field('streaming_image')) ? get_field('streaming_image') : '';
                $streaming_google_app_url = (get_field('streaming_google_app_url')) ? get_field('streaming_google_app_url') : '';
                $app_google_app_url = (get_field('app_google_app_url')) ? get_field('app_google_app_url') : '';
            ?>
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-2 mt-16 bg-gray-100">
                    <div>
                        <?php echo wp_get_attachment_image( $streaming_image, 'full', "", array( "class" => "w-full h-full object-cover" ) );  ?>
                    </div>
                    <div class="flex items-center py-8">
                        <div class="px-8 lg:px-20">
                            <h3 class="text-4xl"><?php echo $streaming_title; ?></h3>
                            <p class="mt-4 text-gray-700"><?php echo $streaming_description; ?></p>
                            <div class="flex gap-4 mt-4">
                                <a href="<?php echo $app_google_app_url; ?>" target="_blank">
                                    <img src="<?php echo get_template_directory_uri() . "/assets/images/apple-app-badge.png"?>" class="h-9 w-auto object-cover" alt="">
                                </a>
                                <a href="<?php echo $streaming_google_app_url; ?>" target="_blank">
                                    <img src="<?php echo get_template_directory_uri() . "/assets/images/google-store-badge.png"?>" class="h-9 w-auto object-cover" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php 
                $args = array(
                    'post_type' => 'directory',
                    'post_status' => 'publish',
                    'posts_per_page' => 4,
                    'order' => 'ASC',
                    'orderby' => 'title',
                    'meta_query' => array(
                        array(
                            'key'     => 'directory_homepage',
                            'value'   => '"Yes"',
                            'compare' => 'LIKE'
                        )
                    )
                );
                $query = new WP_Query($args);
            ?>
            <?php if ( $query->have_posts() ) : ?>
                <div class="container mx-auto px-4 mt-16">
                    <h2 class="text-center text-4xl">Find us at these Radio Directories</h2>
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 mt-16">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <a class="flex flex-col items-center p-4 transition-all hover:bg-gray-100" href="<?php echo get_field('directory_url'); ?>" target="_blank">
                                <p class="mb-4 text-xs uppercase text-gray-600"><?php echo get_the_title(); ?></p>
                                <?php echo get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'w-auto h-16 object-contain' ) ); ?>
                            </a>
                        <?php endwhile; ?>
                    </div>
                    <p class="text-center mt-16"><a href="/ways-to-listen/#directories" class="button">View All Directories</a></p>
                </div>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>

            <?php if( get_field('sponsor_title') ) : ?>
                <?php
                    $sponsor_title = (get_field('sponsor_title')) ? get_field('sponsor_title') : '';
                    $sponsor_text = (get_field('sponsor_text')) ? get_field('sponsor_text') : '';
                    $sponsor_button_text = (get_field('sponsor_button_text')) ? get_field('sponsor_button_text') : '';
                    $sponsor_button_link = (get_field('sponsor_button_link')) ? get_field('sponsor_button_link') : '';
                    $sponsor_image = '';
                    $sponsor_image_array = (get_field('sponsor_image')) ? get_field('sponsor_image') : '';
                    if( $sponsor_image_array ) : 
                        $sponsor_image = $sponsor_image_array['url'];
                    endif; 
                ?>
                <div class="min-h-[50vh] w-full bg-cover mt-16 bg-center" style="background-image: url('<?php echo $sponsor_image; ?>')">
                    <div class="min-h-[50vh] w-full bg-[rgba(0,0,0,.5)] flex items-center justify-center">
                        <div class="max-w-prose text-center">
                            <h3 class="text-white text-4xl"><?php echo $sponsor_title; ?></h3>
                            <p class="mt-4 text-white text-lg"><?php echo $sponsor_text; ?></p>
                            <p class="mt-4"><a href="<?php echo $sponsor_button_link; ?>" class="button button-secondary"><?php echo $sponsor_button_text ; ?></a></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php 
                $args = array(
                    'post_type' => 'spotlight',
                    'post_status' => 'publish',
                    'posts_per_page' => 4,
                    'order' => 'DESC',
                    'orderby' => 'date'
                );
                $query = new WP_Query($args);
            ?>
            <?php if ( $query->have_posts() ) : ?>
                <div class="container mx-auto px-4 mt-16">
                    <h2 class="text-center text-4xl">Easy Jazz Spotlight</h2>
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 mt-8">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <a href="<?php echo get_the_permalink(); ?>">
                                <?php echo get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'w-full aspect-[3/2] object-cover object-top rounded-md' ) ); ?>
                                <p class="text-xs uppercase text-sky-700 mt-2 flex items-baseline gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" class="h-4 w-4 fill-sky-700" viewBox="0 0 610.398 610.398">
                                        <path d="M159.567 0h-15.329c-1.956 0-3.811.411-5.608.995-8.979 2.912-15.616 12.498-15.616 23.997v51.613c0 2.611.435 5.078 1.066 7.44 2.702 10.146 10.653 17.552 20.158 17.552h15.329c11.724 0 21.224-11.188 21.224-24.992V24.992c0-13.804-9.5-24.992-21.224-24.992zM461.288 0h-15.329c-11.724 0-21.224 11.188-21.224 24.992v51.613c0 13.804 9.5 24.992 21.224 24.992h15.329c11.724 0 21.224-11.188 21.224-24.992V24.992C482.507 11.188 473.007 0 461.288 0z"/>
                                        <path d="M539.586 62.553h-37.954v14.052c0 24.327-18.102 44.117-40.349 44.117h-15.329c-22.247 0-40.349-19.79-40.349-44.117V62.553H199.916v14.052c0 24.327-18.102 44.117-40.349 44.117h-15.329c-22.248 0-40.349-19.79-40.349-44.117V62.553H70.818c-21.066 0-38.15 16.017-38.15 35.764v476.318c0 19.784 17.083 35.764 38.15 35.764h468.763c21.085 0 38.149-15.984 38.149-35.764V98.322c.005-19.747-17.059-35.769-38.144-35.769zM527.757 557.9l-446.502-.172V173.717h446.502V557.9z"/>
                                        <path d="M353.017 266.258h117.428c10.193 0 18.437-10.179 18.437-22.759s-8.248-22.759-18.437-22.759H353.017c-10.193 0-18.437 10.179-18.437 22.759 0 12.575 8.243 22.759 18.437 22.759zM353.017 348.467h117.428c10.193 0 18.437-10.179 18.437-22.759 0-12.579-8.248-22.758-18.437-22.758H353.017c-10.193 0-18.437 10.179-18.437 22.758 0 12.58 8.243 22.759 18.437 22.759zM353.017 430.676h117.428c10.193 0 18.437-10.18 18.437-22.759s-8.248-22.759-18.437-22.759H353.017c-10.193 0-18.437 10.18-18.437 22.759s8.243 22.759 18.437 22.759zM353.017 512.89h117.428c10.193 0 18.437-10.18 18.437-22.759 0-12.58-8.248-22.759-18.437-22.759H353.017c-10.193 0-18.437 10.179-18.437 22.759 0 12.579 8.243 22.759 18.437 22.759zM145.032 266.258H262.46c10.193 0 18.436-10.179 18.436-22.759s-8.248-22.759-18.436-22.759H145.032c-10.194 0-18.437 10.179-18.437 22.759.001 12.575 8.243 22.759 18.437 22.759zM145.032 348.467H262.46c10.193 0 18.436-10.179 18.436-22.759 0-12.579-8.248-22.758-18.436-22.758H145.032c-10.194 0-18.437 10.179-18.437 22.758.001 12.58 8.243 22.759 18.437 22.759zM145.032 430.676H262.46c10.193 0 18.436-10.18 18.436-22.759s-8.248-22.759-18.436-22.759H145.032c-10.194 0-18.437 10.18-18.437 22.759s8.243 22.759 18.437 22.759zM145.032 512.89H262.46c10.193 0 18.436-10.18 18.436-22.759 0-12.58-8.248-22.759-18.436-22.759H145.032c-10.194 0-18.437 10.179-18.437 22.759.001 12.579 8.243 22.759 18.437 22.759z"/>
                                    </svg>
                                    <?php echo get_the_date('F j, Y'); ?>
                                </p>
                                <p class="mt-2"><?php echo get_the_title(); ?></p>
                            </a>
                        <?php endwhile; ?>
                    </div>
                    <p class="text-center mt-16"><a href="/spotlight/" class="button">View All</a></p>
                </div>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>


            <?php 
                $args = array(
                    'post_type' => 'quote',
                    'post_status' => 'publish',
                    'posts_per_page' => 5,
                    'order' => 'DESC',
                    'orderby' => 'date'
                );
                $query = new WP_Query($args);
            ?>
            <?php if ( $query->have_posts() ) : ?>
                <div class="mt-16 bg-gray-900">
                    <div id="js-slick-quotes">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <div>
                                <div class="container mx-auto px-16 py-8 flex flex-col items-center"> 
                                    <div>
                                        <?php echo get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'rounded-full h-32 w-32 object-cover' ) ); ?>
                                    </div>
                                    <p class="text-white text-lg mt-8 max-w-prose text-center">"<?php echo get_the_title(); ?>"</p>
                                    <p class="mt-4 text-sky-400 text-sm text-center"><em><?php echo ( get_field('quote_artist') ) ? get_field('quote_artist') : "quote" ; ?></em></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
            
            <?php 
                $args = array(
                    'post_type' => 'station',
                    'post_status' => 'publish'
                );
                $query = new WP_Query($args);
            ?>
            <?php if ( $query->have_posts() ) : ?>
                <div class="container mx-auto px-4 mt-16">
                    <h2 class="text-center text-4xl">Other Radio Stations</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-16">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <div class="flex flex-col items-center">
                                <?php echo get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'rounded-full w-60 h-60 object-cover' ) ); ?>
                                <h4 class="mt-4 text-lg"><?php echo get_the_title(); ?></h4>
                                <p class="text-xs uppercase"><a href="<?php echo get_the_permalink(); ?>" class="text-sky-700 underline">Listen</a></p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>

		<?php endwhile; ?>

	</main>

<?php
get_footer();
