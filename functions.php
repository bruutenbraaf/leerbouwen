<?php
	
add_image_size( 'home', 920, 500, true );
add_image_size( 'bigfeatured', 470, 530, true );
add_image_size( 'ccta', 1000, 300, true );
add_image_size( 'smallfeatured', 470, 250, true );
add_image_size( 'serviceshome', 250, 350, true );
add_image_size( 'partnershome', 150, 150, true );
add_image_size( 'vacaturesmall', 50, 50, false);


function leerbouwen_scripts() {
  wp_deregister_script('jquery');
  wp_enqueue_script( 'jquerylib', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', '3.3.1', false);
  wp_enqueue_script( 'jqueryui', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js', '3.3.1', false);
  wp_enqueue_script( 'bootjs', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array(), '1.0.0', true);
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true);
	wp_enqueue_script( 'slickslider', get_template_directory_uri() . '/js/slick.min.js', array(), '1.0.0', true);
	
	wp_enqueue_style( 'bootcss', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
}
add_action('wp_enqueue_scripts', 'leerbouwen_scripts');

// Add option page

acf_add_options_page( array(

  'page_title' 	=> 'Website informatie',
  'menu_title' 	=> 'Logo & Opties',
  'menu_slug' 	=> 'website-informatie',
  'capability' 	=> 'edit_posts', 
  'icon_url' => 'dashicons-universal-access-alt',
  'position' => 3
  
  ) );


if (!function_exists('get_archive_link')) {
  function get_archive_link( $post_type ) {
    global $wp_post_types;
    $archive_link = false;
    if (isset($wp_post_types[$post_type])) {
      $wp_post_type = $wp_post_types[$post_type];
      if ($wp_post_type->publicly_queryable)
        if ($wp_post_type->has_archive && $wp_post_type->has_archive!==true)
          $slug = $wp_post_type->has_archive;
        else if (isset($wp_post_type->rewrite['slug']))
          $slug = $wp_post_type->rewrite['slug'];
        else
          $slug = $post_type;
      $archive_link = get_option( 'siteurl' ) . "/{$slug}/";
    }
    return apply_filters( 'archive_link', $archive_link, $post_type );
  }
}

function register_my_menus() {
  register_nav_menus(
    array(
      'main_menu' => __( 'Hoofd Menu' ),
      'mobile_menu' => __( 'Mobiele Menu' ),
      'socket_menu' => __( 'Socket Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


function arphabet_widgets_init() {	
		
		register_sidebar( array(
			'name'          => 'Footer een',
			'id'            => 'footer_1',
			'before_widget' => '<div class="widget-block">',
      'after_widget'  => '</div>',
      'before_title'  => '<h4 class="widget-title">',
	    'after_title'   => '</h4>'
		) );
		
		register_sidebar( array(
			'name'          => 'Footer twee',
			'id'            => 'footer_2',
			'before_widget' => '<div class="widget-block">',
      'after_widget'  => '</div>',
      'before_title'  => '<h4 class="widget-title">',
	    'after_title'   => '</h4>'
		) );	
		
		register_sidebar( array(
			'name'          => 'Footer drie',
			'id'            => 'footer_3',
			'before_widget' => '<div class="widget-block">',
      'after_widget'  => '</div>',
      'before_title'  => '<h4 class="widget-title">',
	    'after_title'   => '</h4>'
		) );	
		
		register_sidebar( array(
			'name'          => 'Footer drie',
			'id'            => 'footer_4',
			'before_widget' => '<div class="widget-block">',
      'after_widget'  => '</div>',
      'before_title'  => '<h4 class="widget-title">',
	    'after_title'   => '</h4>'
		) );	
}

add_action( 'widgets_init', 'arphabet_widgets_init' );

function new_excerpt_more( $more ) {
	return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);

      if (count($excerpt) >= $limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }

      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

      return $excerpt;
}

function content($limit) {
    $content = explode(' ', get_the_content(), $limit);

    if (count($content) >= $limit) {
        array_pop($content);
        $content = implode(" ", $content) . '...';
    } else {
        $content = implode(" ", $content);
    }

    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content); 
    $content = str_replace(']]>', ']]&gt;', $content);

    return $content;
}



// Uitgelicht toevoegen aan opleidingen
add_filter( 'manage_opleidingen_posts_columns', 'set_custom_edit_opleidingen_columns' );
function set_custom_edit_opleidingen_columns($columns) {
    	$columns['uitgelicht'] = __( 'Uitgelicht', 'uitgelicht' );
    return $columns;
}

add_action( 'manage_opleidingen_posts_custom_column' , 'custom_opleidingen_column', 10, 2 );
function custom_opleidingen_column( $column, $post_id ) {
    switch ( $column ) {
        case 'uitgelicht' :
            if ( get_field( 'maak_uitgelicht', $post_id ) == 1 ) 
				echo 'Ja';
			 else 
				echo 'Nee';
			break;
    }
}

// Uitgelicht toevoegen aan cursussen
add_filter( 'manage_cursussen_posts_columns', 'set_custom_edit_cursussen_columns' );
function set_custom_edit_cursussen_columns($columns) {
    	$columns['uitgelicht'] = __( 'Uitgelicht', 'uitgelicht' );
    return $columns;
}

add_action( 'manage_cursussen_posts_custom_column' , 'custom_cursussen_column', 10, 2 );
function custom_cursussen_column( $column, $post_id ) {
    switch ( $column ) {
        case 'uitgelicht' :
            if ( get_field( 'maak_uitgelicht', $post_id ) == 1 ) 
				echo 'Ja';
			 else 
				echo 'Nee';
			break;
    }
}


?>