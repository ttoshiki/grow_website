<?php
/**
 * The Template for displaying all single courses.
 *
 * Override this template by copying it to yourtheme/sensei/single-course.php
 *
 * @author 		Automattic
 * @package 	Sensei
 * @category    Templates
 * @version     1.9.0
 */
?>

<?php  get_sensei_header();  ?>

<article <?php post_class( array( 'course', 'post' ) ); ?>>
    <div class="course-content-wrapper">
    
     <?php

            $category_output = get_the_term_list(get_the_ID(), 'course-category', '', ', ', '');
            echo '<span class="custom-category">' . sprintf(__('%s', 'woothemes-sensei'), $category_output) . '</span>';
            ?>
            <h6 class="single-course-title"><?php the_title(); ?></h6>
            <a href="#modules" class="button view-course desktop-hidden">View course content</a>
            <div class="post-thumb">
            <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail(  );
                }
            ?>
            </div>
        <?php
    
        /**
         * Hook inside the single course post above the content
         *
         * @since 1.9.0
         *
         * @param integer $course_id
         *
         * @hooked Sensei()->frontend->sensei_course_start     -  10
         * @hooked Sensei_Course::the_title                    -  10
         * @hooked Sensei()->course->course_image              -  20
         * @hooked Sensei_WC::course_in_cart_message           -  20
         * @hooked Sensei_Course::the_course_enrolment_actions -  30
         * @hooked Sensei()->message->send_message_link        -  35
         * @hooked Sensei_Course::the_course_video             -  40
         */
        do_action( 'sensei_single_course_content_inside_before', get_the_ID() );
    
        ?>
    
        <section class="entry fix">
           
            <?php the_content(); ?>
    
        </section>
    </div><!-- end .course-content-wrapper -->
    <div id="modules" class="course-sidebar-wrapper">
        <?php
        if ( is_user_logged_in() ) {
            if ( is_active_sidebar( 'single_course_sidebar_above_loggedin' ) ) : dynamic_sidebar( 'single_course_sidebar_above_loggedin' ); endif;
        } else {
            if ( is_active_sidebar( 'single_course_sidebar_above' ) ) : dynamic_sidebar( 'single_course_sidebar_above' ); endif;
        }
        ?>

        <?php
    
        /**
         * Hook inside the single course post above the content
         *
         * @since 1.9.0
         *
         * @param integer $course_id
         *
         *
         */
        do_action( 'sensei_single_course_content_inside_after', get_the_ID() );
    
        ?>

        <!-- Single course widget area -->
        <?php if ( is_active_sidebar( 'single_course_sidebar' ) ) : dynamic_sidebar( 'single_course_sidebar' ); endif; ?>

    </div><!-- end .course-sidebar-wrapper -->
</article><!-- .post .single-course -->

<?php get_sensei_footer(); ?>