<article class="attorneys">

<a href="<?php the_permalink(); ?>"  title="<?php the_title_attribute(); ?>">
	<aside class="bio-image">
	<div><?php the_post_thumbnail(); ?></div>
	</aside>

	<div class="blog-feed-article-content">
			
		
		<h3><?php the_title(); ?></h3>
		<h4><?php the_field('title'); ?></h4>
	</div>
</a>

	<a href="<?php the_permalink(); ?>" class="btn-new" title="<?php the_title_attribute(); ?>">Read Bio</a>

		
</article>