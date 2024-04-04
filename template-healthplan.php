<?php
/*
 * Template Name: Healthplan Template
 */
get_header();
?>

<div class="health-plan-page">
    <?php
    $background_image = get_field('hero_background_image'); // Assuming you have created a custom field named 'background_image' in ACF
    ?>

    <section class="hero-section" style="background-image: url('<?php echo esc_url($background_image['url']); ?>');">
        <div class="grid-container">
            <div class="grid-item">
                <h1 class="heading-primary">
                    <span>
                        <?php the_field('hero_heading_line_1'); ?>
                    </span>
                    <span>
                        <?php the_field('hero_heading_line_2'); ?>
                    </span>
                </h1>
                <hr class="horizontal">
            </div>
        </div>
    </section>

    <section class="why-ww-healthplan why-ww">
        <div class="grid-container">
            <div class="grid-item">
                <div class="img-container">
                    <img src="<?php echo get_field('why_ww_plan_img')['url']; ?>" alt="<?php echo get_field('why_ww_plan_img')['alt']; ?>" class="img-fluid">
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
                    <?php if (have_rows('healthplan_icon_repeater')) : ?>
                        <?php while (have_rows('healthplan_icon_repeater')) : the_row(); ?>
                            <div class="inner-grid-item">
                                <div class="icon-container">
                                <img src="<?php echo get_sub_field('healthplan_icons')['url']; ?>" alt="<?php echo get_sub_field('healthplan_icons')['alt']; ?>" class="img-fluid">
                                </div>
                                <div class="text-container">
                                    <span class="text"><?php the_sub_field('healthplan_icon_repeater_text_line_1'); ?></span>
                                    <span class="text"><?php the_sub_field('healthplan_icon_repeater_text_line_2'); ?></span>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <a href="<?php echo get_field('signup_link')['url']; ?>" class="link-box-link">
                    <div class="link-box">
                        <span><?php the_field('signup_text'); ?></span>
                    </div>
                </a>
            </div>

            <div class="grid-item">
                <p class="para-secondary">
                    <?php the_field('why_ww_disclaimer'); ?>
                </p>
            </div>
        </div>
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
            <img src="<?php echo get_field('logo_image')['url']; ?>" alt="<?php echo get_field('logo_image')['alt']; ?>" class="img-fluid">
        </section>
    </div>
</div>

<?php
get_footer();
