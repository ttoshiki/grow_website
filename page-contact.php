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

            <div class="contact-wrapper">
              <div class="contact-header">
                <h1 class="contact-heading custom-font">Contact</h1>
                <span class="contact-subHeading">お問い合わせ</span>
              </div>
              <section class="contact-form">
                <p class="contact-form__paragraph">
                  お問い合わせフォームからご連絡ください。ご記入されましたら【送信】ボタンをクリックしてください。送信後に確認メールをお送りしています。届かない場合は、お手数ですが<a href="mailto:info@grow-online.jp" class="contact-mailLink">info@grow-online.jp</a>までお問い合わせ内容をお送りください。
                </p>
                <div class="contact-form-wrapper">
                  <?php while (have_posts()) : ?>
                  <?php
                    the_post();
                    the_content();
                    endwhile;
                  ?>
                </div>
              </section>
            </div>

			<?php do_action('presscore_after_content') ?>

<?php get_footer() ?>