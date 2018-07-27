<?php get_header(); ?>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post();

    get_template_part( 'product-partials/product-content', get_post_format() );

  endwhile; endif; ?>
  <!-- Default Single Post -->

<?php get_footer();
