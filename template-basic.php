<?php
/*
 * Template Name: Basic Template
 */
get_header();
?>

<div class="basic-page">
    <section class="hero-section">
		<div class="grid-container">
			<div class="grid-item">
				<h1 class="heading-primary">
					<span><?php the_field('hero_heading_line_1'); ?></span>
					<span><?php the_field('hero_heading_line_2'); ?></span>
				</h1>
				<div class="para-primary">
					<?php the_field('hero_description'); ?>
				</div>
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
            <img src="<?php echo get_field('bottom_logo_image')['url']; ?>" alt="<?php echo get_field('bottom_logo_image')['alt']; ?>" class="img-fluid">
        </section>
    </div>
</div>











<?php get_footer();