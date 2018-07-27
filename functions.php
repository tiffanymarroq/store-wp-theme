<?php /**
 * Proper way to enqueue scripts and styles
 */
function starter_styles() {
  wp_register_style('bootstrapCSS', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css');  
  wp_register_style('main-style',  get_template_directory_uri() . '/dist/bundle-style.min.css' );
  wp_enqueue_style('bootstrapCSS');
  wp_enqueue_style( 'main-style');

}
add_action( 'wp_enqueue_scripts', 'starter_styles' );

function starter_scripts(){
  wp_enqueue_script('jquery_min','https://code.jquery.com/jquery-3.2.1.slim.min.js');
  wp_enqueue_script('bootstrap_js','https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js');
  wp_enqueue_script( 'script', get_template_directory_uri() . '/dist/bundle.min.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'starter_scripts' );

function load_icons() {
	wp_register_style('fontAwesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_style( 'fontAwesome' );
}
add_action('wp_print_styles', 'load_icons');

function create_custom_posts() {
	register_post_type('products', // Register Custom Post Type
		array(
		'labels' => array(
			'name' => ('Products'), // Rename these to suit
		),
		'public' => true,
		'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
		'has_archive' => false,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'custom-fields',
			'thumbnail'
		), // Go to Dashboard Custom HTML5 Blank post for supports
		'can_export' => true, // Allows export in Tools > Export
		'taxonomies' => array(
				'post_tag',
				'category'
		) // Add Category and Post Tags support
	));
	register_post_type('slider', // Register Custom Post Type
	array(
	'labels' => array(
		'name' => ('Slider'), // Rename these to suit
	),
	'public' => true,
	'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
	'has_archive' => false,
	'supports' => array(
		'title',
		'editor',
		'excerpt',
		'custom-fields',
		'thumbnail'
	), // Go to Dashboard Custom HTML5 Blank post for supports
	'can_export' => true, // Allows export in Tools > Export
	'taxonomies' => array(
			'post_tag',
			'category'
	) // Add Category and Post Tags support
));
}
add_action('init', 'create_custom_posts'); // Add our work type

add_theme_support( 'post-thumbnails' );



function prefix_modify_query_order( $query ) {
	if ( is_main_query() ) {
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : '1';
  
	  $args =  array( 
			'title' => 'ASC',
			
		 );
		 
  
	  $query->set( 'orderby', $args );
	  $query->set('posts_per_page', 12);
	//   $query->set('paged',  $paged);
	  
	}
  }
add_action( 'pre_get_posts', 'prefix_modify_query_order' );

 
function wordpress_numeric_post_nav() {
    if( is_singular() )
        return;
    global $wp_query;
    /* Stop the code if there is only a single page page */
    if( $wp_query->max_num_pages <= 1 )
        return;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
    /*Add current page into the array */
    if ( $paged >= 1 )
        $links[] = $paged;
    /*Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    echo '<div class="navigation"><ul>' . "\n";
    /*Display Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link('←') );
    /*Display Link to first page*/
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
    /* Link to current page */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
    /* Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link('→') );
    echo '</ul></div>' . "\n";
}

function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );


/**
 * Enables the Excerpt meta box in Page edit screen.
 */

	add_post_type_support( 'page', 'excerpt' );


require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
function menu_setup_nav(){
	register_nav_menus( array(
		'main-menu' => 'Menu',
		'social-menu' => 'Social Media Menu',
	) );

}
add_action('after_setup_theme','menu_setup_nav');


// add multiple feature image plugin
add_filter( 'kdmfi_featured_images', function( $featured_images ) {
    $args_2 = array(
        'id' => 'header-background',
        'desc' => 'Your description here.',
        'label_name' => 'Header Background Image',
        'label_set' => 'Set Header Background',
        'label_remove' => 'Remove Header Background',
        'label_use' => 'Set Header Background',
        'post_type' => array(  'page' , 'post'),
    );
    $args_3 = array(
      'id' => 'product-1',
      'desc' => 'Your description here.',
      'label_name' => 'Product 1',
      'label_set' => 'Set Product 1',
      'label_remove' => 'Remove Product 1',
      'label_use' => 'Set Product 1',
      'post_type' => array( 'page', 'post'  ),
	);
	$args_4 = array(
		'id' => 'product-2',
		'desc' => 'Your description here.',
		'label_name' => 'Product 2',
		'label_set' => 'Set Product 2',
		'label_remove' => 'Remove Product 2',
		'label_use' => 'Set Product 2',
		'post_type' => array( 'page', 'post' ),
	);
	$args_5 = array(
		'id' => 'product-3',
		'desc' => 'Your description here.',
		'label_name' => 'Product 3',
		'label_set' => 'Set Product 3',
		'label_remove' => 'Remove Product 3',
		'label_use' => 'Set Product 3',
		'post_type' => array( 'page', 'post' ),
	);



    $featured_images[] = $args_2;
    $featured_images[] = $args_3;
    $featured_images[] = $args_4;
    $featured_images[] = $args_5;


    return $featured_images;
});
kdmfi_the_featured_image( 'header-background', 'full' );
kdmfi_the_featured_image( 'product-1', 'full' );
kdmfi_the_featured_image( 'product-2', 'full' );
kdmfi_the_featured_image( 'product-3', 'full' );
