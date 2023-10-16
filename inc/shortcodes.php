<?php
function list_directories_function() {

    ob_start();
    echo '<div id="directories">';

    $args = array(
        'post_type' => 'directory',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'title'
    );
    $query = new WP_Query($args);
    if ( $query->have_posts() ) :
        echo '<p>';
        while ( $query->have_posts() ) : $query->the_post(); 
            echo '<strong>' . get_the_title() . '</strong> <a href="' . get_field('directory_url') . '" target="_blank">' . get_field('directory_url') . '</a><br />';
        endwhile;
        echo '</p>';
        wp_reset_postdata();
    endif;

    echo "</div>";
    return ob_get_clean();

}

add_shortcode('list_directories', 'list_directories_function');

?>