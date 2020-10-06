<?php
/**
 * The Template for displaying all single lessons.
 *
 * Override this template by copying it to yourtheme/sensei/single-lesson.php
 *
 * @author 		Automattic
 * @package 	Sensei
 * @category    Templates
 * @version     1.9.0
 */
?>

<?php  get_sensei_header();  ?>

<?php the_post(); ?>

<article <?php post_class( array( 'lesson', 'post' ) ); ?>>
    <div class="course-content-wrapper full-width">

        <?php
            $course_id = intval( get_post_meta( $id, '_lesson_course', true ) );
            echo '<a class="course-link" href="' . esc_url( get_permalink( $course_id ) ) . '">' . get_the_title( $course_id ) . '</a>'; ?>

        <h2 class="lesson-title-link"><?php echo get_the_title( get_the_ID() ); ?></h2>

    <?php

        /**
         * Hook inside the single lesson above the content
         *
         * @since 1.9.0
         *
         * @param integer $lesson_id
         *
         * @hooked deprecated_lesson_image_hook - 10
         * @hooked deprecate_sensei_lesson_single_title - 15
         * @hooked Sensei_Lesson::lesson_image() -  17
         * @hooked deprecate_lesson_single_main_content_hook - 20
         */
        do_action( 'sensei_single_lesson_content_inside_before', get_the_ID() );

    ?>

    <section class="entry fix">

        <?php

        if ( sensei_can_user_view_lesson() ) {

            if( apply_filters( 'sensei_video_position', 'top', $post->ID ) == 'top' ) {

                do_action( 'sensei_lesson_video', $post->ID );

            }

            ?>

            <div class="lesson-instructions"></div>

            <?php

            the_content();

        } else {
            ?>

                <p>

                    受講の申請、または受講条件をクリアすると閲覧できます。

                </p>

            <?php
        }

        ?>

    </section>

        <?php

        /**
         * Hook inside the single lesson template after the content
         *
         * @since 1.9.0
         *
         * @param integer $lesson_id
         *
         * @hooked Sensei()->frontend->sensei_breadcrumb   - 30
         */
        do_action( 'sensei_single_lesson_content_inside_after', get_the_ID() );

        ?>

    </div><!-- end .course-content-wrapper -->
</article><!-- .post -->

<?php get_sensei_footer(); ?>
