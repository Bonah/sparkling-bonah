<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

        
if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css' );
		wp_enqueue_style('bootstrap-css', get_stylesheet_directory_uri().'/inc/css/bootstrap.min.css', true, NULL, 'all');
        wp_enqueue_style( 'chld_thm_cfg_ext1', 'https://fonts.googleapis.com/css?family=Amiri:400,700&subset=arabic,latin' );
        wp_enqueue_style( 'chld_thm_cfg_ext2', 'https://fonts.googleapis.com/css?family=Lateef&subset=arabic,latin' );
		wp_enqueue_style( 'chld_thm_cfg_ext3', 'https://fonts.googleapis.com/earlyaccess/droidarabickufi.css' );
		wp_enqueue_style( 'chld_thm_cfg_ext4', 'https://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css' );
		wp_enqueue_style( 'chld_thm_cfg_ext5', 'https://fonts.googleapis.com/css?family=Scheherazade:400,700&subset=arabic,latin' );
		wp_enqueue_style( 'chld_thm_cfg_ext6', 'http://fonts.googleapis.com/earlyaccess/notokufiarabic.css' );
		wp_enqueue_style( 'chld_thm_cfg_ext7', 'http://fonts.googleapis.com/earlyaccess/notonaskharabic.css' );
		wp_enqueue_style( 'chld_thm_cfg_ext8', 'http://fonts.googleapis.com/earlyaccess/notonaskharabicui.css' );
		wp_enqueue_style( 'chld_thm_cfg_ext9', 'http://fonts.googleapis.com/earlyaccess/notonastaliqurdudraft.css' );
		wp_enqueue_style( 'chld_thm_cfg_ext10', 'http://fonts.googleapis.com/earlyaccess/notosanskufiarabic.css' );
		if ( is_admin() ) {
		wp_enqueue_style("functions", $file_dir."/admin.css", false, "1.0", "all");
		}

    }
endif;

add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css' );


add_action( 'wp_print_styles', 'child_overwrite_styles', 100 );

function child_overwrite_styles() {
    wp_deregister_style( 'sparkling-bootstrap' );
}



function sparkling_child_add_image_size() {
    add_image_size( 'tab-slide', 1600, 460 , true); // slider Thumbnail
}
add_action( 'after_setup_theme', 'sparkling_add_image_size', 11 );

// END ENQUEUE PARENT ACTION


// Typography Options
function the_theme_setup(){ 
global $typography_options;
$typography_options = array(
        'sizes' => array( '6px' => '6px','10px' => '10px','12px' => '12px','14px' => '14px','15px' => '15px','16px' => '16px','18'=> '18px','20px' => '20px','24px' => '24px','28px' => '28px','32px' => '32px','36px' => '36px','42px' => '42px','48px' => '48px' ),
        'faces' => array(
			'Amiri'          => 'Amiri',
			'arial'          => 'Arial',
			'verdana'        => 'Verdana, Geneva',
			'Lateef'      => 'Lateef',
			'Scheherazade'        => 'Scheherazade',
			'Droid Arabic Kufi'          => 'Droid Arabic Kufi',
			'tahoma'         => 'Tahoma, Geneva',
			'Droid Arabic Naskh'      => 'Droid Arabic Naskh',
			'Noto Kufi Arabic'       => 'Noto Kufi Arabic',
			'Noto Sans Kufi Arabic'      => 'Noto Sans Kufi Arabic',
			'Noto Nastaliq Urdu Draft' => 'Noto Nastaliq Urdu Draft',
			'Noto Naskh Arabic UI' => 'Noto Naskh Arabic UI',
			'Noto Naskh Arabic' => 'Noto Naskh Arabic'
        ),
        'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
        'color'  => true
);

} add_action( 'after_setup_theme', 'the_theme_setup' );

function sparkling_featured_slider() {
  if ( is_front_page() && of_get_option( 'sparkling_slider_checkbox' ) == 1 ) {
    echo '<div class="flexslider">';
      echo '<ul class="slides">';

        $count = of_get_option( 'sparkling_slide_number' );
        $slidecat =of_get_option( 'sparkling_slide_categories' );

        $query = new WP_Query( array( 'cat' =>$slidecat,'posts_per_page' =>$count ) );
        if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post();

          echo '<li><a href="'. get_permalink() .'">';
            if ( (function_exists( 'has_post_thumbnail' )) && ( has_post_thumbnail() ) ) :
              echo get_the_post_thumbnail($post_id, 'tab-slide');
            endif;

              echo '<div class="flex-caption">';
                  if ( get_the_title() != '' ) echo '<h2 class="entry-title">'. get_the_title().'</h2>';
                  if ( get_the_excerpt() != '' ) echo '<div class="excerpt">' . get_the_excerpt() .'</div>';
              echo '</div>';
              echo '</a></li>';
              endwhile;
            endif;

      echo '</ul>';
    echo ' </div>';
  }
}