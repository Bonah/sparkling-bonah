<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package sparkling
 */

// Mark Posts/Pages as Untiled when no title is used
/*
function child_remove_sparkling_title() {
    remove_action( 'init', 'sparkling_title' );
}
add_action( 'wp_loaded', 'child_remove_sparkling_title' );

add_filter( 'the_title', 'sparkling_title' );

function sparkling_title( $title ) {
  if ( $title == '' ) {
    return 'بدون عنوان';
  } else {
    return $title;
  }
}

/*
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

/**
 * function to show the footer info, copyright information
 */
 /*
function sparkling_footer_info() {
global $sparkling_footer_info;
  printf( esc_html__( 'القالب بدعم من %1$s يعمل على %2 $s', 'sparkling' ) , '<a href="http://bonah.net/" target="_blank">بـــنــاة نـــت</a>', '<a href="http://ar.wordpress.org/" target="_blank">ووردبريس</a>');
}


/**
 * Get information from Theme Options and add it into wp_head
 */
 /*
    function get_sparkling_theme_options(){

      echo '<style type="text/css">';

      if ( of_get_option('link_color')) {
        echo 'a, #infinite-handle span, #secondary .widget .post-content a {color:' . of_get_option('link_color') . '}';
      }
      if ( of_get_option('link_hover_color')) {
        echo 'a:hover, a:active, #secondary .widget .post-content a:hover,
        .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover,
        .woocommerce nav.woocommerce-pagination ul li span.current  {color: '.of_get_option('link_hover_color').';}';
      }
      if ( of_get_option('element_color')) {
        echo '.btn-default, .label-default, .flex-caption h2, .btn.btn-default.read-more,button,
              .navigation .wp-pagenavi-pagination span.current,.navigation .wp-pagenavi-pagination a:hover,
              .woocommerce a.button, .woocommerce button.button,
              .woocommerce input.button, .woocommerce #respond input#submit.alt,
              .woocommerce a.button, .woocommerce button.button,
              .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt { background-color: '.of_get_option('element_color').'; border-color: '.of_get_option('element_color').';}';
        
        echo '.site-main [class*="navigation"] a, .more-link, .pagination>li>a, .pagination>li>span { color: '.of_get_option('element_color').'}';
      }

      if ( of_get_option('element_color_hover')) {
        echo '.btn-default:hover, .label-default[href]:hover, .tagcloud a:hover,button, .main-content [class*="navigation"] a:hover,.label-default[href]:focus, #infinite-handle span:hover,.btn.btn-default.read-more:hover, .btn-default:hover, .scroll-to-top:hover, .btn-default:focus, .btn-default:active, .btn-default.active, .site-main [class*="navigation"] a:hover, .more-link:hover, #image-navigation .nav-previous a:hover, #image-navigation .nav-next a:hover, .cfa-button:hover,.woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{ background-color: '.of_get_option('element_color_hover').'; border-color: '.of_get_option('element_color_hover').'; }';
      }
      if ( of_get_option('element_color_hover')) {
        echo '.pagination>li>a:focus, .pagination>li>a:hover, .pagination>li>span:focus, .pagination>li>span:hover {color: '.of_get_option('element_color_hover').';}';
      }
      if ( of_get_option('cfa_bg_color')) {
        echo '.cfa { background-color: '.of_get_option('cfa_bg_color').'; } .cfa-button:hover a {color: '.of_get_option('cfa_bg_color').';}';
      }
      if ( of_get_option('cfa_color')) {
        echo '.cfa-text { color: '.of_get_option('cfa_color').';}';
      }
      if ( of_get_option('cfa_btn_color') || of_get_option('cfa_btn_txt_color') ) {
        echo '.cfa-button {border-color: '.of_get_option('cfa_btn_color').'; color: '.of_get_option('cfa_btn_txt_color').';}';
      }
      if ( of_get_option('heading_color')) {
        echo 'h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, .entry-title {color: '.of_get_option('heading_color').';}';
      }
      if ( of_get_option('nav_bg_color')) {
        echo '.navbar.navbar-default, .navbar-default .navbar-nav .open .dropdown-menu > li > a {background-color: '.of_get_option('nav_bg_color').';}';
      }
      if ( of_get_option('nav_link_color')) {
        echo '.navbar-default .navbar-nav > li > a, .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus { color: '.of_get_option('nav_link_color').';}';
      }
      if ( of_get_option('nav_item_hover_color')) {
        echo '.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus, .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus, .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {color: '.of_get_option('nav_item_hover_color').';}';
      }
      if ( of_get_option('nav_dropdown_bg_hover') || of_get_option('nav_dropdown_item_hover') ) {
        echo '@media (max-width: 767px) {.navbar-default .navbar-nav .open .dropdown-menu>.active>a, .navbar-default .navbar-nav .open .dropdown-menu>.active>a:focus, .navbar-default .navbar-nav .open .dropdown-menu>.active>a:hover {background: '.of_get_option('nav_dropdown_bg_hover').'; color:'.of_get_option('nav_dropdown_item_hover').';} }';
      }
      if ( of_get_option('nav_dropdown_bg')) {
        echo '.dropdown-menu {background-color: '.of_get_option('nav_dropdown_bg').';}';
      }
      if ( of_get_option('nav_dropdown_item')) {
        echo '.navbar-default .navbar-nav .open .dropdown-menu > li > a, .dropdown-menu > li > a { color: '.of_get_option('nav_dropdown_item').';}';
      }
      if ( of_get_option('nav_dropdown_bg_hover') || of_get_option('nav_dropdown_item_hover') ) {
        echo '.dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus, .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus, .dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active > a:focus, .navbar-default .navbar-nav .open .dropdown-menu > li.active > a {background-color: '.of_get_option('nav_dropdown_bg_hover').'; color:'.of_get_option('nav_dropdown_item_hover').';}';
      }
      if ( of_get_option('nav_dropdown_item_hover') ) {
        echo '.navbar-default .navbar-nav .current-menu-ancestor a.dropdown-toggle { color: '.of_get_option('nav_dropdown_item_hover').';}';
      }
      if ( of_get_option('footer_bg_color')) {
        echo '#colophon {background-color: '.of_get_option('footer_bg_color').';}';
      }
      if ( of_get_option('footer_text_color')) {
        echo '#footer-area, .site-info {color: '.of_get_option('footer_text_color').';}';
      }
      if ( of_get_option('footer_widget_bg_color')) {
        echo '#footer-area {background-color: '.of_get_option('footer_widget_bg_color').';}';
      }
      if ( of_get_option('footer_link_color')) {
        echo '.site-info a, #footer-area a {color: '.of_get_option('footer_link_color').';}';
      }
      if ( of_get_option('social_color')) {
        echo '.social-icons li a {background-color: '.of_get_option('social_color').' !important ;}';
      }
      if ( of_get_option('social_footer_color')) {
        echo '#footer-area .social-icons li a {background-color: '.of_get_option('social_footer_color').' !important ;}';
      }
      global $typography_options;
      $typography = of_get_option('main_body_typography');
      if ( $typography ) {
        echo '.entry-content {font-family: ' . $typography_options['faces'][$typography['face']] . '; font-size:' . $typography['size'] . '; font-weight: ' . $typography['style'] . '; color:'.$typography['color'] . ';}';
      }
      if ( of_get_option('custom_css')) {
        echo html_entity_decode( of_get_option( 'custom_css', 'no entry' ) );
      }
        echo '</style>';
    }

add_action( 'wp_head', 'get_sparkling_theme_options', 15 );

// Theme Options sidebar
add_action( 'optionsframework_after', 'sparkling_options_display_sidebar' );

function sparkling_options_display_sidebar() { ?>
  <!-- Twitter -->
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

  <!-- Facebook -->
    <div id="fb-root"></div>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/ar_AR/all.js#xfbml=1&appId=328285627269392";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <div id="optionsframework-sidebar" class="metabox-holder">
    <div id="optionsframework" class="postbox">
        <h3><?php esc_html_e('Support and Documentation','sparkling') ?></h3>
        <div class="inside">
          <div id="social-share">
            <div class="fb-like" data-href="<?php echo esc_url( 'https://www.facebook.com/Bonah.Net' ); ?>" data-send="false" data-layout="button_count" data-width="90" data-show-faces="true"></div>
            <div class="tw-follow" ><a href="https://twitter.com/bonah" class="twitter-follow-button" data-show-count="false">تابع @bonah</a></div>
          </div>
            <p><b><a href="<?php echo esc_url( 'http://themes.bonah.net/support/sparkling' ); ?>"><?php esc_html_e('Sparkling Documentation','sparkling'); ?></a></b></p>
            <p><?php _e('The best way to contact us with <b>support questions</b> and <b>bug reports</b> is via','sparkling') ?> <a href="<?php echo esc_url( 'http://themes.bonah.net/forums' ); ?>"><?php esc_html_e('Colorlib support forum','sparkling') ?></a>.</p>
            <p><?php esc_html_e('If you like this theme, I\'d appreciate any of the following:','sparkling') ?></p>
            <ul>
              <li><a class="button" href="<?php echo esc_url( 'http://wordpress.org/support/view/theme-reviews/sparkling?filter=5' ); ?>" title="<?php esc_attr_e('Rate this Theme', 'sparkling'); ?>" target="_blank"><?php printf(esc_html__('Rate this Theme','sparkling')); ?></a></li>
              <li><a class="button" href="<?php echo esc_url( 'http://www.facebook.com/Bonah.Net' ); ?>" title="Like Bonah Net on Facebook" target="_blank"><?php printf(esc_html__('Like on Facebook','sparkling')); ?></a></li>
              <li><a class="button" href="<?php echo esc_url( 'http://twitter.com/bonah/' ); ?>" title="Follow Bonah Net on Twitter" target="_blank"><?php printf(esc_html__('Follow on Twitter','sparkling')); ?></a></li>
            </ul>
        </div>
    </div>
  </div>
<?php }  ?>*/
