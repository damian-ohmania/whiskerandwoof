<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package whisker&Woof
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses whiskerwoof_header_style()
 */
function whiskerwoof_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'whiskerwoof_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => '000000',
				'width'              => 1000,
				'height'             => 250,
				'flex-height'        => true,
				'wp-head-callback'   => 'whiskerwoof_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'whiskerwoof_custom_header_setup' );

if ( ! function_exists( 'whiskerwoof_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see whiskerwoof_custom_header_setup().
	 */
	function whiskerwoof_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
				}
			<?php
			// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;

class WW_Walker_Nav_Menu extends Walker_Nav_Menu {

		// Add the custom post type submenu
		function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		//only for the services link
		  if ($item->ID == 26 && $depth == 0) {
					
			$categories = get_categories(array(
				'taxonomy'   => 'service_category',
				'hide_empty' => false,
				'object_type' => 'service',
				'orderby' => 'meta_value',
				'meta_key'   => 'order',
				'order' => 'Asc'
			));
			$current_class = '';
                if (in_array('current-menu-item', $item->classes)) {
                    $current_class = 'current_page_item'; // Add your desired class name here
                }
			if (!empty($categories)) {
			  $output .= '<li class="menu-item menu-item-has-children menu-item-type-post_type menu-item-object-page menu-item-26 ' . $current_class .'">';
			  $output .= '<a href="' . esc_url($item->url) . '">' . $item->title . ' <i class="fas fa-chevron-down"></i></a>';
			  $output .= '<ul class="sub-menu grid-container">';
	  
			  foreach ($categories as $category) {
				$output .= '<li class="grid-item"><a href="' . esc_url($item->url)  . '?tab=tab-' . $category->slug . '">' . $category->name  . '</a></li>';
			  }
	  
			  $output .= '</ul>';
			  $output .= '</li>';
			  return;
			}
		  }
	  
		  parent::start_el($output, $item, $depth, $args, $id);
		}
	  
  }
  
