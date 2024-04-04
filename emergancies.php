<?php
/*
 * Template Name: Emergancies
 */
get_header();
?>

<div class="emergancies">
<section class="hero-section" style="background-image: url('<?php echo get_field('hero_background_image')['url']; ?>');">
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

    <section class="intro">
        <div class="grid-container">
            <div class="grid-item">
                <img src="<?php echo get_field('intro_image')['url']; ?>" alt="<?php echo get_field('intro_image')['alt']; ?>" class="img-fluid">
            </div>
            <div class="grid-item">
                <h2 class="heading-secondary">
                    <span><?php the_field('intro_heading_line_1'); ?></span>
                    <span><?php the_field('intro_heading_line_2'); ?></span>
                </h2>
                <div class="para-primary">
                    <?php the_field('intro_description'); ?>
                </div>
            </div>
        </div>
    </section>

    <div class="leafy-background">
        <section class="outstanding-veterinary-care">
            <div class="grid-container">
                <div class="grid-item">
                    <img src="<?php echo get_field('outstanding_vet_care_image')['url']; ?>" alt="<?php echo get_field('outstanding_vet_care_image')['alt']; ?>" class="img-fluid">
                </div>
                <div class="grid-item">
                    <h6 class="heading-sixth">
                        <span><?php the_field('outstanding_vet_care_heading_line_1'); ?></span>
                        <span><?php the_field('outstanding_vet_care_heading_line_2'); ?></span>
                    </h6>
                    <div class="para-primary">
                        <?php the_field('outstanding_vet_care_description'); ?>
                    </div>
                    <a href="<?php the_field('outstanding_vet_care_email_url')['url']; ?>">
                        <span class="email"><?php the_field('outstanding_vet_care_email_text'); ?></span>
                    </a>
                    <a href="<?php the_field('outstanding_vet_care_phone_url')['url']; ?>">
                        <span class="phone"><?php the_field('outstanding_vet_care_phone_text'); ?></span>
                    </a>
                </div>
            </div>
        </section>

        <section class="bottom-logo">
            <img src="<?php echo get_field('bottom_logo_image')['url']; ?>" alt="<?php echo get_field('bottom_logo_image')['alt']; ?>" class="img-fluid">
        </section>
    </div>
</div>

<?php
get_footer();
