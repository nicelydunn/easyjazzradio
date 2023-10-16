<?php
get_header();
?>

	<main id="primary">

		<?php while ( have_posts() ) : the_post(); ?>

            <?php if( get_field('station_rtplayer_stylesheet') ) : ?>
                <?php 
                    function rtplayer_head_code() {
                        echo '<link href="' . get_field('station_rtplayer_stylesheet') . '" rel="stylesheet" type="text/css" />';
                    }
                    add_action('wp_footer', 'rtplayer_head_code', 1);
                ?>
            <?php endif; ?>

            <?php if( get_field('station_rtplayer') ) : ?>
                <?php 
                    function rtplayer_footer_code() {
                        echo "<script>" . get_field('station_rtplayer')  . "</script>";
                    }
                    add_action('wp_footer', 'rtplayer_footer_code', 9999);
                ?>
            <?php endif; ?>

            <div class="container mx-auto px-4 mt-16">
                <div class="flex flex-col md:flex-row justify-center items-center gap-4 bg-gray-100 p-8">
                    <div>
                        <?php if( get_field('station_status_widget') ) : ?>
                            <?php echo get_field('station_status_widget'); ?>
                        <?php endif; ?>
                    </div>
                    <div>
                        <h1 class="mb-8 text-4xl"><?php echo get_the_title(); ?></h1>
                        <?php if( get_field('station_rtplayer_html') ) : ?>
                            <?php echo get_field('station_rtplayer_html'); ?>
                        <?php endif; ?>
                        <p class="text-sm uppercase mt-8 mb-4">Other Ways To Listen</p>
                        <?php if( get_field('station_getmeradio_url') ) : ?>
                            <div><a href="<?php echo get_field('station_getmeradio_url'); ?>" target="_blank" class="text-sky-700 underline">www.getmeradio.com</a></div>
                        <?php endif; ?>

                        <?php if( get_field('station_onlineradiobox_url') ) : ?>
                            <div><a href="<?php echo get_field('station_onlineradiobox_url'); ?>" target="_blank" class="text-sky-700 underline">www.onlineradiobox.com</a></div>
                        <?php endif; ?>

                        <?php if( get_field('station_mytuner_radio_url') ) : ?>
                            <div><a href="<?php echo get_field('station_mytuner_radio_url'); ?>" target="_blank" class="text-sky-700 underline">www.mytuner-radio.com</a></div>
                        <?php endif; ?>

                        <?php if( get_field('station_popup_url') ) : ?>
                            <div><a href="<?php echo get_field('station_popup_url'); ?>" target="popup" class="text-sky-700 underline" onclick="window.open('<?php echo get_field('station_popup_url'); ?>','popup','width=355,height=510'); return false;">Popup Player</a></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

		<?php endwhile; ?>

	</main><!-- #main -->

<?php
get_footer();
