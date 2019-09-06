<?php
	
add_image_size( 'home', 1920, 600, true );
add_image_size( 'bigfeatured', 470, 530, true );
add_image_size( 'ccta', 1000, 300, true );
add_image_size( 'smallfeatured', 470, 250, true );
add_image_size( 'serviceshome', 250, 350, true );
add_image_size( 'partnershome', 150, 150, true );
add_image_size( 'vacaturesmall', 50, 50, false);


function leerbouwen_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'bootjs', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array(), '1.0.0', true);
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true);
	wp_enqueue_script( 'readmore', get_template_directory_uri() . '/js/readmore.min.js', array(), '1.0.0', false);
	wp_enqueue_script( 'dropzonejs', get_template_directory_uri() . '/js/dropzone.js', array(), '1.0.0', false);
	wp_enqueue_script( 'slickslider', get_template_directory_uri() . '/js/slick.min.js', array(), '1.0.0', true);
	wp_enqueue_script( 'niceselect', get_template_directory_uri() . '/js/jquery.nice-select.min.js', array(), '1.0.0', true);
	wp_enqueue_script( 'scrolltriggerjs', get_template_directory_uri() . '/js/ScrollTrigger.min.js', array(), '1.0.0', true);
	
	wp_enqueue_style( 'bootcss', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'niceselectcss', get_template_directory_uri() . '/css/nice-select.css' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'wowcss', get_template_directory_uri() . '/css/animate.css' );
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
	
	function my_cpt_support_author() {
    add_post_type_support( 'nieuws', 'author' );
}
add_action('init', 'my_cpt_support_author');

/**
 * Add HTML5 theme support.
 */
function wpdocs_after_setup_theme() {
    add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );


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
			$columns['uitgelicht'] = __( 'Uitgelicht', 'leerbouwen' );
			$columns['meestgekozen'] = __( 'Meest gekozen', 'leerbouwen' );
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

			case 'meestgekozen' :
			if ( get_field( 'maak_meest_gekozen', $post_id ) == 1 ) 
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
			$columns['meestgekozen'] = __( 'Meest gekozen', 'leerbouwen' );
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
		case 'meestgekozen' :
			if ( get_field( 'maak_meest_gekozen', $post_id ) == 1 ) 
				echo 'Ja';
			else 
				echo 'Nee';
			break;
    }
}


function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyBwjs5yVQERqyM-MUa52sJa1a7jeBHiEes');
}

add_action('acf/init', 'my_acf_init');




// Option pages for archive + auto fields (titel, intro)
function option_page_posttypes() 
{
	$args  = array('public'   => true,'_builtin' => false );
    $excluded_post_types = array('participation', 'partners');
	$custom_post_types = get_post_types($args);
    foreach ( $custom_post_types as $custom_post_type ) 
	{
        if ( in_array( $custom_post_type, $excluded_post_types ) ) 
		{
          
        } 
		else 
		{
			if(function_exists('acf_add_options_page')) 
			{

				$formated_string = str_replace('_', " ", $custom_post_type);

				acf_add_options_sub_page(array(
				  'page_title'     => 'Archive options '.$formated_string.'',
				  'menu_title'    => 'Archive options '.$formated_string.'',
				  'parent_slug'    => 'edit.php?post_type='.$custom_post_type.'',
				));

				$prefix = str_replace("_","-", $custom_post_type);
				$acf_pre = 'acf-options-archive-options-';
				$compiled_acf = $acf_pre .= $prefix;

				acf_add_local_field_group(array (
					'key' => 'archive_options_'.$custom_post_type.'',
					'title' => 'Archive options '.$formated_string.'',
					'fields' => array (
						array (
						  'key' => ''.$custom_post_type.'_archive_title',
						  'label' => 'Archief titel',
						  'name' => ''.$custom_post_type.'_archive_title',
						  'type' => 'text',
						  'prefix' => '',
						  'instructions' => 'Voor de programmeur, dit veld is te plaatsen met the_field("'.$custom_post_type.'_archive_title", "option")',
						  'required' => 0,
						  'conditional_logic' => 0,
						  'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						  ),
						  'default_value' => '',
						  'placeholder' => '',
						  'prepend' => '',
						  'append' => '',
						  'maxlength' => '',
						  'readonly' => 0,
						  'disabled' => 0,
						),
						array (
						  'key' => ''.$custom_post_type.'_archive_intro',
						  'label' => 'Archief intro',
						  'name' => ''.$custom_post_type.'_archive_intro',
						  'type' => 'wysiwyg',
						  'prefix' => '',
						  'instructions' => 'Voor de programmeur, dit veld is te plaatsen met the_field("'.$custom_post_type.'_archive_intro", "option")',
						  'required' => 0,
						  'conditional_logic' => 0,
						  'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						  ),
						  'default_value' => '',
						  'placeholder' => '',
						  'prepend' => '',
						  'append' => '',
						  'maxlength' => '',
						  'readonly' => 0,
						  'disabled' => 0,
						),
					),
					'location' => array (
						array (
						  array (
							'param' => 'options_page',
							'operator' => '==',
							'value' => $compiled_acf,
						  ),
						),
					),
					'menu_order' => 0,
					'position' => 'normal',
					'style' => 'default',
					'label_placement' => 'top',
					'instruction_placement' => 'label',
					'hide_on_screen' => '',
				));
			}
		}
    }
}
add_action( 'init', 'option_page_posttypes');


// adds shortcode for social media
add_shortcode('mailchimp','mailchimp');
function mailchimp() {
  ob_start();
	get_template_part( 'template-parts/mailchimp' );
  $output = ob_get_clean();
  return $output;
}


add_shortcode('contactpersoon','contactpersoon');
function contactpersoon() {
  ob_start();
	get_template_part( 'templates/contactpersoon' );
  $output = ob_get_clean();
  return $output;
}