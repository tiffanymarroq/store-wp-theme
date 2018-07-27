<?php get_header(); ?>

<header class="page-header text-center">
    <div class="small-container text-center-inner">
        <h1 class=" large-text text-alt letter-space">
            <?php single_term_title(); ?>
        </h1>
        <?php
$subtitle = get_post_meta($post->ID, 'subtitle', true);
if ($subtitle !== '') {
	echo '<p class="lead">' . $subtitle . '</p>';
} ?>
    </div>

</header>

<section class="section-content container">
    <!-- #container -->
    <div id="" class="grid" role="main">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
					get_template_part( 'product-partials/product-category', get_post_format() );           
            	endwhile;

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );
				endif;
			?>
    </div>
    <!-- #content -->
    <?php wordpress_numeric_post_nav(); ?>


</section>


<?php get_footer();