<?php
/*
 * Template Name: Homepage Template
 */
get_header();
?>

<div class="front-page">
    <section class="hero-section" style="background-image: url('<?php echo get_field('hero_background_image')['url']; ?>');">
        <div class="grid-container">
            <div class="grid-item">
                <h1 class="heading-primary">
                    <?php the_field('hero_heading') ?>
                </h1>

                <a href="<?php echo get_field('register_pet_link')['url']; ?>" class="link-box-link">
                    <div class="link-box">
                        <span><?php the_field('register_pet_text'); ?></span>
                    </div>
                </a>
                <a href="<?php echo get_field('book_appointment_link')['url']; ?>" class="link-box-link">
                    <div class="link-box">
                        <span><?php the_field('book_appointment_text'); ?></span>
                    </div>
                </a>
                <hr class="horizontal">
            </div>
        </div>
    </section>

    <section class="why-ww">
        <div class="grid-container">
            <div class="grid-item">
                <div class="img-container">
                    <?php $image = get_field('why_ww_image'); ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-fluid">
                </div>
            </div>
            <div class="grid-item">
                <h2 class="heading-secondary">
                    <span><?php the_field('why_ww_heading_line_1'); ?></span>
                    <span><?php the_field('why_ww_heading_line_2'); ?></span>
                </h2>
                <div class="para-primary">
                    <?php the_field('why_ww_description'); ?>
                </div>
            </div>
            <div class="grid-item">
                <div class="inner-grid">
                    <?php if (have_rows('why_ww_items')) : ?>
                        <?php while (have_rows('why_ww_items')) : the_row(); ?>
                            <div class="inner-grid-item">
                                <div class="icon-container">
                                    <img src="<?php echo get_sub_field('why_ww_items_icons')['url']; ?>" alt="<?php echo get_sub_field('why_ww_items_icons')['alt']; ?>" class="img-fluid">
                                </div>
                                <div class="text-container">
                                    <span class="text"><?php the_sub_field('why_ww_items_text_line_1'); ?></span>
                                    <span class="text"><?php the_sub_field('why_ww_items_text_line_2'); ?></span>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="grid-item">
                <a href="<?php echo get_field('why_ww_bottom_link_url')['url']; ?>">
                    <p class="para-secondary">
                        <?php the_field('why_ww_bottom_link_text'); ?>
                    </p>
                </a>
                <hr class="horizontal">
            </div>
        </div>
    </section>

    <section class="your-ww-services">
        <div class="grid-container">
            <div class="grid-item">
                <h3 class="heading-third">
                    <span><?php the_field('your_ww_services_heading_line_1'); ?></span>
                    <span><?php the_field('your_ww_services_heading_line_2'); ?></span>
                </h3>
            </div>
            <div class="grid-item">
                <div class="para-primary">
                    <?php the_field('your_ww_services_description'); ?>
                </div>
            </div>
            <div class="grid-item">
                <div class="inner-grid">
                    <?php if (have_rows('your_ww_services_items')) : ?>
                        <?php while (have_rows('your_ww_services_items')) : the_row(); ?>
                            <div class="inner-grid-item">
                                <img src="<?php echo get_sub_field('your_ww_services_icon')['url']; ?>" alt="<?php echo get_sub_field('your_ww_services_icon')['alt']; ?>" class="img-fluid icon">
                                <span class="text"><?php the_sub_field('your_ww_services_title'); ?></span>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="grid-item">
                <a href="<?php echo get_field('your_ww_services_bottom_link_url')['url']; ?>">
                    <p class="para-secondary">
                        <?php the_field('your_ww_services_bottom_link_text'); ?>
                    </p>
                </a>
                <hr class="horizontal">
            </div>
            <div class="grid-item">
                <div class="img-container light">
                    <img src="<?php echo get_field('your_ww_services_image_1')['url']; ?>" alt="<?php echo get_field('your_ww_services_image_1')['alt']; ?>" class="img-fluid fade-in">
                </div>
                <div class="img-container light">
                    <img src="<?php echo get_field('your_ww_services_image_2')['url']; ?>" alt="<?php echo get_field('your_ww_services_image_2')['alt']; ?>" class="img-fluid fade-in">
                </div>
            </div>
        </div>
    </section>

    <section class="info-box-w-background parallax">
        <div class="parallax-wrapper" style="background-image: url('<?php echo get_field('parallax_background_image')['url']; ?>');"></div>
        <div class="wrapper parallax-container" >
            <div class="para-primary">
                <?php the_field('floating_info_box_quote'); ?>
            </div>
            <span><?php the_field('floating_info_box_author'); ?></span>
            <hr class="horizontal">
        </div>
    </section>

    <section class="your-team">
        <div class="grid-container">
            <div class="grid-item">
                <h4 class="heading-forth">
                    <span><?php the_field('your_team_heading_line_1') ?></span>
                    <span><?php the_field('your_team_heading_line_2') ?></span>
                </h4>
                <div class="para-primary">
                    <?php the_field('your_team_description'); ?>
                </div>
                <a href="<?php echo get_field('your_team_bottom_link_url')['url']; ?>">
                    <span class="bottom-link"><?php the_field('your_team_bottom_link_text'); ?></span>
                </a>
                <hr class="horizontal">
            </div>
            <div class="grid-item">
                <div class="img-container">
                    <img src="<?php echo get_field('your_team_image')['url']; ?>" alt="<?php echo get_field('your_team_image')['alt']; ?>" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- OUTSTANDING VET CARE TO DISPLAY HERE -->
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

    <div class="jungle-background" style="background-image: url('<?php echo get_field('jungle_background')['url']; ?>');">
        <section class="ww-news">
            <div class="grid-container">
                <div class="grid-item heading">
                    <h5 class="heading-fifth">
                        <span>Whisker & Woof</span>
                        <span>News</span>
                    </h5>
                </div>
            <?php
                //get the last 3 blog posts
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'order'          => 'DESC',
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        get_template_part('template-parts/content');
                    }
                    wp_reset_postdata(); // Restore original post data
                }
            ?>
            <hr class="horizontal">
            </div>
        </section>

        <section class="bottom-logo">
            <?php $bottom_logo_image = get_field('bottom_logo_image'); ?>
            <?php if ($bottom_logo_image && isset($bottom_logo_image['url']) && isset($bottom_logo_image['alt'])) : ?>
                <img src="<?php echo $bottom_logo_image['url']; ?>" alt="<?php echo $bottom_logo_image['alt']; ?>" class="img-fluid">
            <?php endif; ?>
        </section>
    </div>
</div>

<?php
get_footer();
