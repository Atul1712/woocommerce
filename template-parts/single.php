<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

while ( have_posts() ) :
	the_post();
	?>

<section class="tfccreate-account">
    <div class="container">
        <div class="tfccreate-acount-main">
            <?php do_action('breadcrumb');?>
        </div>
        <main id="content" <?php post_class( 'site-main' ); ?> role="main">
            <div class="page-content tfc-bg-page-content ">
                <?php if ( apply_filters( 'hello_elementor_page_title', true ) ) : ?>

                <div class="tfc-single-news-main">

                    <?php the_title( '<h1 class="tfc-news-haeding">', '</h1>' ); ?>
                    <p class="tfc-date-comment"><?php the_date(); ?>
                </div>
                <?php endif; ?>
                <div class="tfc-blog-page-thumnails-img">

                    <?php
//Displays the featured image in a <img> tag resized to the 'large' thumbnail size (use this in a loop)
	echo get_the_post_thumbnail( get_the_ID(), 'large' );
	
	?>
                </div>
                <div class="tfc-single-blog-paragraph-bt-1">
                    <?php the_content(); ?>
                </div>
                <div class="post-tags">
                    <?php the_tags( '<span class="tag-links">' . __( 'Tagged ', 'hello-elementor' ), null, '</span>' ); ?>
                </div>
                <?php wp_link_pages(); ?>
            </div>
            <nav class="tfc-nav-single">
                <span
                    class="tfc-button tfc-button-btn"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'Hello' ) ); ?>
                </span>
                <span
                    class="tfc-button tfc-button-btn"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'Hello' ) ); ?>
                </span>
            </nav>

        </main>
    </div>
    </div>
</section>
<?php
endwhile;