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

add_action( 'after_setup_theme', function () {
    // load custom translation file for the parent theme
    load_theme_textdomain( 'sparkling', get_stylesheet_directory() . '/languages/sparkling' );
    // load translation file for the child theme
    load_child_theme_textdomain( 'sparkling-bonah', get_stylesheet_directory() . '/languages' );
} );

define( 'GITHUB_UPDATER_EXTENDED_NAMING', true );

function sparkling_child_add_image_size() {
    add_image_size( 'tab-slide', 1600, 460 , true); // slider Thumbnail
}
add_action( 'after_setup_theme', 'sparkling_add_image_size', 11 );

// END ENQUEUE PARENT ACTION

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'sparkling_bonah_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function sparkling_bonah_register_required_plugins() {
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		/** This is an example of how to include a plugin pre-packaged with a theme */
		array(
			'name'     => 'Github Updater Plugin', // The plugin name
			'slug'     => 'github-updater', // The plugin slug (typically the folder name)
			'source'   => get_stylesheet_directory() . '/lib/plugins/github-updater-5.4.0.zip', // The plugin source
			'required' => true,
		),
		/** This is an example of how to include a plugin from the WordPress Plugin Repository */
		array(
			'name' => 'Easy Bootstrap Shortcode',
			'slug' => 'easy-bootstrap-shortcodes',
		),
		array(
			'name' => 'Jetpack',
			'slug' => 'jetpack',
		),
		array(
			'name' => 'WP-Hijri',
			'slug' => 'wp-hijri',
		),
		array(
			'name' => 'Contact Form 7',
			'slug' => 'contact-form-7',
		),
	);
	/** Change this to your theme text domain, used for internationalising strings */
	$theme_text_domain = 'sparkling-bonah';
	/**
	 * Array of configuration settings. Uncomment and amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * uncomment the strings and domain.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       => $theme_text_domain,         // Text domain - likely want to be the same as your theme.
		/*'default_path' => '',                         // Default absolute path to pre-packaged plugins */
		'menu'         => 'install-my-theme-plugins', // Menu slug
		'strings'      	 => array(
			'page_title'             => __( 'Install Required Plugins', $theme_text_domain ), // 
			'menu_title'             => __( 'Install Plugins', $theme_text_domain ), // 
			'instructions_install'   => __( 'The %1$s plugin is required for this theme. Click on the big blue button below to install and activate %1$s.', $theme_text_domain ), // %1$s = plugin name 
			'instructions_activate'  => __( 'The %1$s is installed but currently inactive. Please go to the <a href="%2$s">plugin administration page</a> page to activate it.', $theme_text_domain ), // %1$s = plugin name, %2$s = plugins page URL 
			'button'                 => __( 'Install %s Now', $theme_text_domain ), // %1$s = plugin name 
			'installing'             => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name 
			'oops'                   => __( 'Something went wrong with the plugin API.', $theme_text_domain ), // 
			'notice_can_install'     => __( 'This theme requires the %1$s plugin. <a href="%2$s"><strong>Click here to begin the installation process</strong></a>. You may be asked for FTP credentials based on your server setup.', $theme_text_domain ), // %1$s = plugin name, %2$s = TGMPA page URL 
			'notice_cannot_install'  => __( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', $theme_text_domain ), // %1$s = plugin name 
			'notice_can_activate'    => __( 'This theme requires the %1$s plugin. That plugin is currently inactive, so please go to the <a href="%2$s">plugin administration page</a> to activate it.', $theme_text_domain ), // %1$s = plugin name, %2$s = plugins page URL 
			'notice_cannot_activate' => __( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', $theme_text_domain ), // %1$s = plugin name 
			'return'                 => __( 'Return to Required Plugins Installer', $theme_text_domain ), // 
		),
	);
	tgmpa( $plugins, $config );
}

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
