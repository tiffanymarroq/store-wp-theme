

<?php 
    $postImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>
    <article id="post-<?php the_ID(); ?>" class="grid-item ">

        <img class="post-image" src="<?php echo $postImg['0'];?>" alt="<?php the_title(); ?>">
        <?php if ( get_post_thumbnail_id() ) { ?>

        <div class="portfolio-thumbnail">
            <a href="<?php echo $url; ?>" target="_blank"></a>
        </div>

        <?php } ?>
        <a href="<?php echo get_permalink( $post->ID ); ?>">
            <div class="post-description">
                <div class="post-title">
                    <h1 class=" letter-space text-alt">
                        <?php the_title();?>
                    </h1>
                    <?php
                        $subtitle = get_post_meta($post->ID, 'subtitle', true);
                        if ($subtitle !== '') {
                        echo '<p class="lead subtitle-text">' . $subtitle . '</p>';
                        }?>
                </div>
            </div>
        </a>
    </article>


<!-- product-category page -->