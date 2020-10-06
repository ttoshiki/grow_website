<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package The7
 * @since 1.0.0
 */

// File Security Check
if (! defined('ABSPATH')) {
    exit;
}

$config = presscore_config();
$config->set('template', 'blog');
$config->set('layout', 'list');
$config->set('template.layout.type', 'list');
$config->set('post.preview.media.width', 30);

get_header();
?>

<p style="font-size:60px;">aa!!</p>

			<?php do_action('presscore_after_content') ?>

<?php get_footer() ?>