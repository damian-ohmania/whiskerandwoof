<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package whisker&Woof
 */

?>

<footer class="footer">
    <section class="footer-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="wrapper">
                        <img src="<?php echo get_field('footer_image', 'option')['url']; ?>" alt="<?php echo get_field('footer_image', 'option')['alt']; ?>" class="img-fluid">
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="wrapper">
                        <h6 class="heading-sixth"><?php the_field('opening_times_heading', 'option'); ?></h6>
                        <hr class="horizontal">
                        <p class="para-primary">
                            <?php if (have_rows('opening_times', 'option')) : ?>
                                <?php while (have_rows('opening_times', 'option')) : the_row(); ?>
                                    <span><?php the_sub_field('date_time', 'option'); ?></span>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="wrapper">
                        <h6 class="heading-sixth"><?php the_field('important_pages_heading', 'option'); ?></h6>
                        <hr class="horizontal">
                        <p class="para-primary">
                        <?php if (have_rows('important_pages', 'option')) : ?>
                            <?php while (have_rows('important_pages', 'option')) : the_row(); ?>
                            <a href="<?php echo get_sub_field('important_pages_link_url', 'option')['url']; ?>">
                                <span><?php the_sub_field('important_pages_link_text', 'option'); ?></span>
                            </a>
                            <?php endwhile; ?>
                        <?php endif; ?>        
                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="wrapper">
                        <h6 class="heading-sixth"><?php the_field('contact_info_heading', 'option'); ?></h6>
                        <hr class="horizontal">
                        <div class="para-primary">
                            <?php the_field('footer_contact_info_description', 'option'); ?>
                        </div>
                        <div class="social-icons">
                            <?php if (have_rows('social_icons', 'option')) : ?>
                                <?php while (have_rows('social_icons', 'option')) : the_row(); ?>
                                    <a href="<?php echo get_sub_field('social_icon_link_url', 'option')['url']; ?>" target="_blank">
                                        <img src="<?php echo get_sub_field('social_icon_img', 'option')['url']; ?>" alt="<?php echo get_sub_field('social_icon_img', 'option')['alt']; ?>" class="img-fluid">
                                    </a>
                                <?php endwhile; ?>
                            <?php endif; ?>  
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 disclaimer-1">
                    <div class="wrapper">
                        <a href="<?php echo get_field('privacy_policy_url', 'option')['url']; ?>">
                            <span><?php the_field('privacy_policy_text', 'option'); ?></span>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-lg-6 disclaimer-2">
                    <div class="wrapper">
                        <?php if (have_rows('notices_repeater', 'option')) : ?>
                            <?php while (have_rows('notices_repeater', 'option')) : the_row(); ?>
                                <a href="<?php echo get_sub_field('notice_url', 'option')['url']; ?>">
                                    <span><?php the_sub_field('notice_text', 'option'); ?><span class="pipe"><?php the_sub_field('vertical_line', 'option'); ?></span></span>
                                </a>
                            <?php endwhile; ?>
                        <?php endif; ?>   

                            

                    </div>
                </div>
                            
            </div>
        </div>
    </section>
</footer class="footer">
<?php wp_footer(); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>