<?php
// Query the custom post type
$args = array(
    'post_type' => 'outstanding_vet_care',
    'posts_per_page' => 1,
    'orderby' => 'rand'
);
$query = new WP_Query($args);

// Check if there are posts
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        ?>
        <section class="outstanding-veterinary-care">
            <div class="grid-container">
                <div class="grid-item">
                    <img src="<?php echo get_field('outstanding_vet_care_image')['url']; ?>" alt="<?php echo get_field('outstanding_vet_care_image')['alt']; ?>" class="img-fluid">
                </div>
                <div class="grid-item">
                    <?php if(get_field('outstanding_vet_care_heading_line_1')){ ?>
                        <h6 class="heading-sixth">
                            <span><?php echo get_field('outstanding_vet_care_heading_line_1'); ?></span>
                            <span><?php echo get_field('outstanding_vet_care_heading_line_2'); ?></span>
                        </h6>
                    <?php } ?>
                    <?php if(get_field('outstanding_vet_care_description')){ ?>
                    <div class="para-primary">
                        <?php echo get_field('outstanding_vet_care_description'); ?>
                    </div>
                    <?php } ?>
                    <?php if(get_field('outstanding_vet_care_email_url')){ ?>
                        <a href="<?php echo get_field('outstanding_vet_care_email_url')['url']; ?>">
                            <span class="email"><?php echo get_field('outstanding_vet_care_email_text'); ?></span>
                        </a>
                        <a href="<?php echo get_field('outstanding_vet_care_phone_url')['url']; ?>">
                            <span class="phone"><?php echo get_field('outstanding_vet_care_phone_text'); ?></span>
                        </a>
                    <?php } ?>
                    <?php if(get_field('cta_button')){ ?>
                        <a href="<?php echo get_field('cta_button')['url']; ?>" class="link-box-link">
                            <div class="link-box">
                                <span><?php echo get_field('cta_button')['title']; ?></span>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </section>
        <?php
    }
    // Restore original post data
    wp_reset_postdata();
}
?>
