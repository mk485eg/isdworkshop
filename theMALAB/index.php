<?php
// Redirect index.php to front-page.php for single-page themes
if (have_posts()) {
    while (have_posts()) {
        the_post();
        get_template_part('front-page');
    }
} else {
    get_template_part('front-page');
}
