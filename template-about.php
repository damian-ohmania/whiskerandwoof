<?php
/*
 * Template Name: About Us Template
 */
get_header();
?>

<div class="about-us">
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

    <section class="intro info-section">
        <h2 class="heading-secondary">
            <span><?php the_field('intro_heading_line_1'); ?></span>
            <span><?php the_field('intro_heading_line_2'); ?></span>
        </h2>
        <div class="para-primary">
            <?php the_field('intro_description'); ?>
        </div>
    </section>

    <section class="background-dogs">
        <img src="<?php echo get_field('image_section_image')['url']; ?>" alt="<?php echo get_field('image_section_image')['alt']; ?>" class="img-fluid">
    </section>

    <section class="about-the-practice info-section">
        <div class="grid-container">
            <div class="grid-item">
                <h3 class="heading-secondary">
                    <span><?php the_field('about_the_practice_heading_line_1'); ?></span>
                    <span><?php the_field('about_the_practice_heading_line_2'); ?></span>
                </h3>
                <div class="para-primary">
                    <?php the_field('about_the_practice_description'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="image-gallery">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <?php
        // Assuming you have an ACF repeater field named 'test_image_gallery_repeater'

        if (have_rows('image_gallery_repeater')) {

            echo '<ol class="carousel-indicators">';

            // Loop through the repeater rows to create indicators
            $indicator_index = 0;
            while (have_rows('image_gallery_repeater')) {
                the_row();
                $active_class = $indicator_index === 0 ? 'active' : '';
                echo '<li data-bs-target="#myCarousel" data-bs-slide-to="' . $indicator_index . '" class="' . $active_class . '"></li>';
                $indicator_index++;
            }

            echo '</ol>';
            echo '<div class="carousel-inner">';

            // Loop through the repeater rows to create carousel items
            $item_index = 0;
            while (have_rows('image_gallery_repeater')) {
                the_row();
                $active_class = $item_index === 0 ? 'active' : '';
                echo '<div class="carousel-item ' . $active_class . '">';
                echo '<img src="' . get_sub_field('image_gallery_image')['url'] . '" alt="' . get_sub_field('image_gallery_image')['alt'] . '" class="img-fluid">';
                echo '</div>';
                $item_index++;
            }

            echo '</div>';
            echo '<a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">';
            echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
            echo '<span class="visually-hidden">Previous</span>';
            echo '</a>';
            echo '<a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">';
            echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
            echo '<span class="visually-hidden">Next</span>';
            echo '</a>';

        }
        ?>
        </div>
    </section>





    <section class="about-the-team info-section">
        <div class="grid-item heading">
            <h4 class="heading-forth">
                <span><?php the_field('about_team_heading_line_1'); ?></span>
                <span><?php the_field('about_team_heading_line_2'); ?></span>
            </h4>
            <div class="para-primary">
                <p><?php the_field('team_intro'); ?></p>
            </div>
        </div>

        <div class="grid-container">
            <?php if (have_rows('about_team_members')) : ?>
                <?php while (have_rows('about_team_members')) : the_row(); ?>
                    <div class="grid-row">
                        <div class="grid-item img">
                            <div class="img-container">
                                <img src="<?php echo get_sub_field('team_member_image')['url']; ?>" alt="<?php echo get_sub_field('team_member_image')['alt']; ?>" class="img-fluid">
                            </div>
                        </div>
                        <div class="grid-item text">
                            <h5 class="heading-fifth"><?php the_sub_field('team_member_title'); ?></h5>
                            <div class="para-secondary">
                                <?php the_sub_field('team_member_bio'); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
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
            <img src="<?php echo get_field('bottom_logo_image')['url'] ?>" alt="<?php echo get_field('bottom_logo_image')['alt'] ?>" class="img-fluid">
        </section>
    </div>
</div>

<?php
get_footer();
