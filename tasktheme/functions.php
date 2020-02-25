<?php
function bootstrapstarter_wp_setup() 
{
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'bootstrapstarter_wp_setup' );

function load_stylesheets()
{
	wp_register_style( 'carousel', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css' );
	wp_enqueue_style('carousel');

	wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css',
		array(), false, 'all');
	wp_enqueue_style('bootstrap');
	
	wp_register_style('style', get_template_directory_uri() . '/style.css',
		array(), false, 'all');
	wp_enqueue_style('style');	
	
}
add_action('wp_enqueue_scripts', 'load_stylesheets');
	
function load_scripts()
{	
	wp_register_script( 'customjs',get_template_directory_uri() . '/js/scripts.js', null, null, true );
	
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.4.1.min.js','',1,true );
	wp_enqueue_style( 'jquery' );	
}
add_action(' wp_enqueue_scripts', 'load_scripts ');


function excerpt_readmore($more) {
    return '<p> <a href="'. get_permalink($post->ID) . '" class="readmore">' . 'Lue lisää' . '</a></p>';
}
add_filter('excerpt_more', 'excerpt_readmore');

?>