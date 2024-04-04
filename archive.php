<?php
/*
 * Template Name: Archive
 */
get_header();
?>

<div class="blog-page">
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

	<section class="ww-news">
		<div class="grid-container">
			<div class="grid-item heading">
				
			</div>
			<div class="grid-item content">
				<img src="./assets/img/stock-images/cat-dog-mobile-crop.jpg" alt="" class="img-fluid">
				<h6 class="heading-sixth">
					Our exceptional services
				</h6>
				<p class="para-primary">
					Welcome to our high-end veterinary surgery in Blackheath, South London. Our experienced team
					of veterinary surgeons offers exceptional care for your furry companions using the latest
					technology and techniques.
				</p>
			</div>
			<div class="grid-item content">
				<img src="./assets/img/stock-images/cat-dog-mobile-crop.jpg" alt="" class="img-fluid">
				<h6 class="heading-sixth">
					Our exceptional services
				</h6>
				<p class="para-primary">
					Welcome to our high-end veterinary surgery in Blackheath, South London. Our experienced team
					of veterinary surgeons offers exceptional care for your furry companions using the latest
					technology and techniques.
				</p>
			</div>
			<div class="grid-item content">
				<img src="./assets/img/stock-images/cat-dog-mobile-crop.jpg" alt="" class="img-fluid">
				<h6 class="heading-sixth">
					Our exceptional services
				</h6>
				<p class="para-primary">
					Welcome to our high-end veterinary surgery in Blackheath, South London. Our experienced team
					of veterinary surgeons offers exceptional care for your furry companions using the latest
					technology and techniques.
				</p>
			</div>
			<div class="grid-item last">
				<hr class="horizontal">
			</div>
		</div>
	</section>

    <div class="jungle-background" style="background-image: url('<?php echo get_field('jungle_background')['url']; ?>');">
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
