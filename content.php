<header class="page-header text-center">
    <div class="small-container text-center-inner">
        <h1 class=" large-text text-alt letter-space">
            <?php the_title(); ?>
        </h1>
        <?php
$subtitle = get_post_meta($post->ID, 'subtitle', true);
if ($subtitle !== '') {
	echo '<p class="lead">' . $subtitle . '</p>';
} ?>
    </div>

</header>

<section class="section-content">
    <article>
        <div class="container">
            <?php the_content(); ?>
        </div>
    </article>
</section> 
<!-- content -->
