<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Whikser&Woof
 */

?>

<div class="grid-item content">
	<a href="<?php echo get_permalink(); ?>">
		<?php if (has_post_thumbnail()) : ?>
			<?php $thumbnail_url = get_the_post_thumbnail_url(); ?>
			<div class="thumbnail">
				<img src="<?php echo $thumbnail_url; ?>" alt="" class="img-fluid">
			</div>
		<?php endif; ?>
		<h6 class="heading-sixth">
			<?php the_title(); ?>
		</h6>
		<p class="para-primary">
			<?php  the_excerpt(); ?>
		</p>
	</a>
</div>
