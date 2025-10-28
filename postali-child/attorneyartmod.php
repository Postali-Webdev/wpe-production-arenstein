<article class="attorneys-alt">
<div>
	<?php 

	$image = get_field('alternate_image'); 
	$size = 'full'; 

	?>

	<aside class="bio-image-alt">
		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
	</aside>

	<div class="blog-feed-article-content-alt">
			
		
		<h3><?php the_title(); ?></h3></a>
		<h4><?php the_field('title'); ?></h4>

		<?php the_field('shortened_bio'); ?>

		<p><?php the_field('areas_of_practice'); ?></p>

		
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="btn-new">Read <?php the_field('first_name'); ?> Bio</a>

	</div>

</div>
</article>