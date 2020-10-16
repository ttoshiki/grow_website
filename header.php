<?php
/**
 * Header template.
 *
 * @since   1.0.0
 *
 * @package The7\Templates
 */

defined('ABSPATH') || exit;

get_template_part('header-single');
get_template_part('header-main');

?>

<link href="/wp-content/themes/dt-the7-child/css/mypage.css">
<script src="/wp-content/themes/dt-the7-child/js/mypage.js"></script>

<aside class="fixedMenu -sp">
  <a href="<?php echo home_url(); ?>" class="fixedMenuLink -primary">会員登録</a>
  <a href="<?php echo home_url(); ?>" class="fixedMenuLink -secondary">ログイン</a>
</aside>

<?php
// Little trick!
// wp_head()
?>
