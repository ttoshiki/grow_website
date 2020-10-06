<?php

// Load WC_AM_Client class if it exists.
if (! class_exists('WC_AM_Client_2_7')) {
    require_once(get_stylesheet_directory() . '/wc-am-client.php');
}

// Instantiate WC_AM_Client class object if the WC_AM_Client class is loaded.
if (class_exists('WC_AM_Client_2_7')) {
    /**
     * This file is only an example that includes a plugin header, and this code used to instantiate the client object. The variable $wcam_lib
     * can be used to access the public properties from the WC_AM_Client class, but $wcam_lib must have a unique name. To find data saved by
     * the WC_AM_Client in the options table, search for wc_am_client_{product_id}, so in this example it would be wc_am_client_13.
     *
     * All data here is sent to the WooCommerce API Manager API, except for the $software_title, which is used as a title, and menu label, for
     * the API Key activation form the client will see.
     *
     * ****
     * NOTE
     * ****
     * If $product_id is empty, the customer can manually enter the product_id into a form field on the activation screen.
     *
     * @param string $file             Must be __FILE__ from the root plugin file, or theme functions, file locations.
     * @param int    $product_id       Must match the Product ID number (integer) in the product.
     * @param string $software_version This product's current software version.
     * @param string $plugin_or_theme  'plugin' or 'theme'
     * @param string $api_url          The URL to the site that is running the API Manager. Example: https://www.toddlahman.com/
     * @param string $software_title   The name, or title, of the product. The title is not sent to the API Manager APIs, but is used for menu titles.
     *
     * Example:
     *
     * $wcam_lib = new WC_AM_Client( $file, $product_id, $software_version, $plugin_or_theme, $api_url, $software_title );
     */

    // Preferred positive integer product_id.
    $wcam_lib = new WC_AM_Client_2_7(__FILE__, '', '1.3', 'theme', 'https://wpexplainer.com/', 'Sensei LMS + The7');
}

/* child style */
function childtheme_enqueue_styles()
{
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css', false, filemtime(get_stylesheet_directory() . '/style.css'), 'all');
    wp_enqueue_style('wpx-sensei', get_stylesheet_directory_uri() . '/wpx-sensei.css', false, filemtime(get_stylesheet_directory() . '/wpx-sensei.css'), 'all');
    wp_enqueue_style('wpx-woocommerce', get_stylesheet_directory_uri() . '/wpx-woocommerce.css', false, filemtime(get_stylesheet_directory() . '/wpx-woocommerce.css'), 'all');
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/js/custom-script.js', false, 'all');
}
add_action('wp_enqueue_scripts', 'childtheme_enqueue_styles', 25);

/**
 * Loads the child theme textdomain.
 */
function brandrocket_child_theme_setup()
{
    load_child_theme_textdomain('jupiter', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'brandrocket_child_theme_setup');

/*** woocommerce ***/
if (is_plugin_active('woocommerce/woocommerce.php')) {
    /* remove extra billing information */
    add_filter('woocommerce_checkout_fields', 'custom_remove_checkout_fields');

    function custom_remove_checkout_fields($fields)
    {
        unset($fields['billing']['billing_address_1']);
        unset($fields['billing']['billing_address_2']);
        unset($fields['billing']['billing_postcode']);
        //unset($fields['billing']['billing_city']);
        //unset($fields['billing']['billing_country']);
        $fields['billing']['billing_city']['class'] = array('form-row-last');
        unset($fields['billing']['billing_state']);

        return $fields;
    }

    /* remove order again btn */
    if (!function_exists('woocommerce_order_again_button')) {
        function woocommerce_order_again_button($order)
        {
            return;
        }
    }

    /* Redirect to checkout on add to cart */
    function wpx_redirect_checkout_add_cart($url)
    {
        $url = get_permalink(get_option('woocommerce_checkout_page_id'));
        return $url;
    }

    add_filter('woocommerce_add_to_cart_redirect', 'wpx_redirect_checkout_add_cart');

    /* add my courses to my account */
    add_action('woocommerce_account_dashboard', 'my_dashboard_addition');
    function my_dashboard_addition()
    {
        echo do_shortcode('[sensei_user_courses]');
    }

    /* Product thumbnails on checkout */
    add_filter('woocommerce_cart_item_name', 'ts_product_image_on_checkout', 10, 3);

    function ts_product_image_on_checkout($name, $cart_item, $cart_item_key)
    {

        /* Return if not checkout page */
        if (! is_checkout()) {
            return $name;
        }

        /* Get product object */
        $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

        /* Get product thumbnail */
        $thumbnail = $_product->get_image();

        /* Add wrapper to image and add some css */
        $image = '<div class="ts-product-image" style="width: 75px; height: 75px; display: inline-block; padding-right: 7px; vertical-align: middle;">'
            . $thumbnail .
            '</div>';

        /* Prepend image to name and return it */
        return $image . $name;
    }
}

/*** register our sidebars and widgetized areas  ***/
function wpexplainer_widgets_init()
{
    register_sidebar(array(
        'name'          => 'Course sidebar - Above modules (logged in users)',
        'id'            => 'single_course_sidebar_above_loggedin',
        'before_title'  => '<h5 class="sidebar-title">',
        'after_title'   => '</h5>'
    ));

    register_sidebar(array(
        'name'          => 'Course sidebar - Above modules (not-logged in)',
        'id'            => 'single_course_sidebar_above',
        'before_title'  => '<h5 class="sidebar-title">',
        'after_title'   => '</h5>'
    ));

    register_sidebar(array(
        'name'          => 'Course sidebar - Below modules',
        'id'            => 'single_course_sidebar',
        'before_widget' => '<section class="single-course-sidebar">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));
}

add_action('widgets_init', 'wpexplainer_widgets_init');

/*** sensei general ***/
if (is_plugin_active('woothemes-sensei/woothemes-sensei.php') or is_plugin_active('sensei-lms/sensei-lms.php')) {

    /* unhook the default Sensei wrappers */
    global $woothemes_sensei;
    remove_action('sensei_before_main_content', array($woothemes_sensei->frontend, 'sensei_output_content_wrapper'), 10);
    remove_action('sensei_after_main_content', array($woothemes_sensei->frontend, 'sensei_output_content_wrapper_end'), 10);

    /* hook correct start and end wrappers */
    add_action('sensei_before_main_content', 'my_theme_wrapper_start', 10);
    add_action('sensei_after_main_content', 'my_theme_wrapper_end', 10);

    function my_theme_wrapper_start()
    {
        echo '<div id="#content" class=".content">';
    }

    function my_theme_wrapper_end()
    {
        echo '</div><!-- #content -->';
    }

    /* declare sensei support */
    add_action('after_setup_theme', 'declare_sensei_support');
    function declare_sensei_support()
    {
        add_theme_support('sensei');
    }

    /* Single course */
    remove_action('sensei_single_course_content_inside_before', array('Sensei_Course', 'the_title'), 10);
    remove_action('sensei_single_course_content_inside_before', array('Sensei_Course', 'the_course_video'), 40);
    add_action('sensei_single_course_content_inside_before', array('Sensei_Course', 'the_course_video'), 11);
    remove_action('sensei_single_lesson_content_inside_before', array('Sensei_Lesson', 'the_title'), 15);

    /* Single quiz */
    remove_action('sensei_single_quiz_content_inside_before', array('Sensei_Quiz', 'the_title'), 20);

    function wpx_quiz_title()
    {
        echo '<h2 class="lesson-title-link">' . get_the_title(get_the_ID()) . '</h2>';
    }
    add_action('sensei_single_quiz_content_inside_before', 'wpx_quiz_title', 20);
}

add_filter('wp_calculate_image_srcset_meta', '__return_null');

/*** 追記 ***/

function logout_redirect()
{
    wp_safe_redirect(home_url().'/login');
    exit();
}
add_action('wp_logout', 'logout_redirect');

function login_redirect()
{
    wp_safe_redirect(home_url().'/my-account');
    exit();
}
add_action('wp_login', 'login_redirect');

function ez_sparrow_remove_password_strength()
{
    if (wp_script_is('wc-password-strength-meter', 'enqueued')) {
        wp_dequeue_script('wc-password-strength-meter');
    }
}
add_action('wp_print_scripts', 'ez_sparrow_remove_password_strength', 100);

/**
 * Google Fonts
 */

function twpp_enqueue_styles()
{
    wp_enqueue_style(
        'google-webfont-style',
        '//fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap
'
    );
}

add_action('wp_enqueue_scripts', 'twpp_enqueue_styles');
