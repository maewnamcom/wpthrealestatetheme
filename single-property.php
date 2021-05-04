<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package seed
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="site-single single-area">

    <div class="main-body">
        <div id="primary" class="content-area-full">
            <main id="main" class="site-main -hide-title">

                <?php get_template_part( 'template-parts/content-single-property' ); ?>

                <?php if ( comments_open() || get_comments_number() ) { comments_template(); } ?>

                <?php wp_reset_postdata(); ?>

            </main>
        </div>
    </div>

</div>

<?php endwhile; ?>
<?php get_footer(); ?>