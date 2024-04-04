<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Whikser&Woof
 */
get_header();
?>
 <div class="blog-page">
 <section class="hero-section">
		<div class="grid-container">
			<div class="grid-item">
				<h1 class="heading-primary">
					<span><?php the_field('hero_heading_line_1', 'option'); ?></span>
					<span><?php the_field('hero_heading_line_2', 'option'); ?></span>
				</h1>
				<div class="para-primary">
					<?php the_field('hero_description', 'option'); ?>
				</div>
			</div>
		</div>
	</section>


 <section class="ww-news">
	 <div class="grid-container">
		 <div class="grid-item heading">
			 
		 </div>

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
					get_template_part('template-parts/content', get_post_type());
				endwhile;
			the_posts_navigation();
				else :
				get_template_part('template-parts/content', 'none');
			endif;
			?>

	 </div>
 </section>

 <div class="jungle-background" style="background-image: url('<?php echo get_field('jungle_background', 'option')['url']; ?>');">
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
					
				endwhile;
			the_posts_navigation();
		endif;
		get_template_part('template-parts/content-outstanding-vet-care', get_post_type());
	?>

        <section class="bottom-logo">
            <img src="<?php echo get_field('bottom_logo_image', 'option')['url']; ?>" alt="<?php echo get_field('bottom_logo_image', 'option')['alt']; ?>" class="img-fluid">
        </section>
    </div>
</div>

<?php
get_footer();
