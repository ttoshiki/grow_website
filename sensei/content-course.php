<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Content-course.php template file
 *
 * responsible for content on archive like pages. Only shows the course excerpt.
 *
 * For single course content please see single-course.php
 *
 * @author 		Automattic
 * @package 	Sensei
 * @category    Templates
 * @version     1.9.0
 */
?>

<li <?php post_class(  WooThemes_Sensei_Course::get_course_loop_content_class() ); ?> >

    <?php
    /**
     * This action runs before the sensei course content. It runs inside the sensei
     * content-course.php template.
     *
     * @since 1.9
     *
     * @param integer $course_id
     */
    do_action( 'sensei_course_content_before', get_the_ID() );
    ?>

    <section class="course-content">

            <?php
            /* custom course archive */
            echo '<div class="custom-sensei-courses course-id-' . get_the_ID() . '">';
            ?>
            <a href="<?php the_permalink(); ?>">
            <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'thumbnail' );
                }
            ?>
            </a>
            <div class="title-wrapper">
            <div class="more-wrapper">
            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            <?php
            $category_output = get_the_term_list(get_the_ID(), 'course-category', '', ', ', '');
            echo '<span class="custom-category">' . sprintf(__('%s', 'woothemes-sensei'), $category_output) . '</span>';

            echo '</div><!-- end title-wrapper -->';
            echo '</a>';
            ?>
            <a class="preview-btn" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Preview this course', 'sensei-lms' ); ?></a>
            
            <?php
            /**
             * Fires just after the course content in the content-course.php file.
             *
             * @since 1.9
             *
             * @param integer $course_id
             *
             * @hooked  Sensei()->course->the_course_free_lesson_preview - 20
             */
            do_action('sensei_course_content_inside_after', get_the_ID() );
            ?>
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
            </div>
            <?php
            echo '</div><!-- end custom-sensei-courses -->';

            ?>

    </section> <!-- section .course-content -->

    <?php
    /**
     * Fires after the course block in the content-course.php file.
     *
     * @since 1.9
     *
     * @param integer $course_id
     *
     * @hooked  Sensei()->course->the_course_free_lesson_preview - 20
     */
    do_action('sensei_course_content_after', get_the_ID() );
    ?>


</li> <!-- article .(<?php echo esc_attr( join( ' ', get_post_class( array( 'course', 'post' ) ) ) ); ?>  -->