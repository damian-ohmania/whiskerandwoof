<?php
/*
 * Template Name: Service page
 */
get_header();
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var linkBoxes = document.querySelectorAll('.link-box');

  linkBoxes.forEach(function(linkBox) {
    linkBox.addEventListener('click', function() {
      var previouslyClicked = document.querySelector('.link-box.active');
      if (previouslyClicked && previouslyClicked !== this) {
        previouslyClicked.classList.remove('active');
      }
      this.classList.toggle('active');
    });
  });
});

</script>
<div class="services-page">
    <?php
        $background_image = get_field('hero_background_image'); // Assuming you have created a custom field named 'background_image' in ACF
    ?>
    <section class="hero-section" style="background-image: url('<?php echo esc_url($background_image['url']); ?>');">
        <div class="grid-container">
            <div class="grid-item">
                <h1 class="heading-primary">
                    <span><?php the_field('hero_heading_line_1'); ?></span>
                    <span><?php the_field('hero_heading_line_2'); ?></span>
                </h1>
                <hr class="horizontal">
            </div>
        </div>
    </section>

    <section class="intro-section info-section">
        <h2 class="heading-secondary">
            <span><?php the_field('intro_heading_line_1'); ?></span>
            <span><?php the_field('intro_heading_line_2'); ?></span>
        </h2>
        <div class="para-primary">
            <?php the_field('intro_description'); ?>
        </div>

        <div class="inner-grid custom-tab-control">

        <?php
            //build a services array grouped by service category
            $services_by_category = array();

            // Retrieve all service items
            $services_query = new WP_Query( array(
                'post_type'      => 'service',
                'posts_per_page' => -1,
            ) );

            if ( $services_query->have_posts() ) {
                while ( $services_query->have_posts() ) {
                    $services_query->the_post();

                    // Get the categories assigned to the current service
                    $categories = get_the_terms( get_the_ID(), 'service_category' );

                    if ( $categories && ! is_wp_error( $categories ) ) {
                        foreach ( $categories as $category ) {
                            $category_slug = $category->slug;

                            // Create a new array key if it doesn't exist
                            if ( ! isset( $services_by_category[ $category_slug ] ) ) {
                                $services_by_category[ $category_slug ] = array();
                            }

                            // Add the current service to the respective category in the array
                            $services_by_category[ $category_slug ][] = array(
                                'title'       => get_the_title(),
                                'image'       => get_the_post_thumbnail_url(),
                                'description' => get_the_content(),
                            );
                        }
                    }
                }

                // Restore original post data
                wp_reset_postdata();
            }
            //var_dump($services_by_category);
            ?>
            <?php //if (have_rows('intro_link_repeater')) : ?>
                <?php 
                    $tabCount = 0;
                    $categories = get_categories(array(
                        'taxonomy'   => 'service_category',
                        'hide_empty' => false,
                        'object_type' => 'service',
                        'orderby' => 'meta_value',
                        'meta_key'   => 'order',
                        'order' => 'Asc'
                    ));
                    foreach($categories as $service){
                        ?>
                        <div class="link-box-link custom-tab-control" data-target="#tab-<?php echo $service->slug; ?>">
                        <div class="link-box">
                            <span><?php echo $service->name; ?></span>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    
                <?php 
                    $tabCount++;
                    //endwhile;
                ?>
            <?php //endif; ?>
        </div>
    </section>

    <section class="services about-the-team" id="services-tabs">
        
            <?php foreach($services_by_category as $category => $service){ ?>
                <!-- start category tab -->
                <div class="tab-content" id="tab-<?php echo $category; ?>">
                    <div class="grid-container">

                    <?php foreach($service as $service_item => $service_value){ ?>
                        <div class="grid-row">
                            <div class="grid-item img">
                                <img src="<?php echo $service_value['image']; ?>" alt="<?php echo $service_value['image']; ?>" class="img-fluid">
                            </div>
                            <div class="grid-item text">
                                <h5 class="heading-fifth"><?php echo $service_value['title']; ?></h5>
                                <div class="para-secondary">
                                    <?php echo $service_value['description']; ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    
                    </div>
                </div>
                <!-- end category tab -->
            <?php } ?>
        
    </section>

    <div class="jungle-background" style="background-image: url('<?php echo get_field('jungle_background')['url']; ?>');">
    <!-- OUTSTANDING VET CARE -->
    <?php
	    if (have_posts()) :
		    /* Start the Loop */
				while (have_posts()) :
					the_post();
					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part('template-parts/content-outstanding-vet-care', get_post_type());
				endwhile;
			the_posts_navigation();
			else :
        	get_template_part('template-parts/content-outstanding-vet-care', 'none');
		endif;
	?>

        <section class="bottom-logo">
            <img src="<?php echo get_field('bottom_logo_image')['url']; ?>" alt="<?php echo get_field('bottom_logo_image')['alt']; ?>" class="img-fluid">
        </section>
    </div>

</div>

<?php
get_footer();
