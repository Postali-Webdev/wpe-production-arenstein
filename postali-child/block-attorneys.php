<div id="attorney-arrows">
    <div class="attorney-prev">
        <div class="prev-arrow"></div>
        <p>Previous Attorney</p>
    </div>
    <div class="attorney-next">
        <div class="next-arrow"></div>
        <p>Next Attorney</p>
    </div>
</div>

<div class="not-responsive">

    <?php if( have_rows('attorneys_repeater' , 'options') ): ?>

        <?php while( have_rows('attorneys_repeater' , 'options') ): the_row(); 

            // vars
            $attorney = get_sub_field('single_attorney');
            ?>

            <?php if( $attorney ): ?>
            
            <?php $post = $attorney; setup_postdata( $post ); ?>

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

                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="btn-new">Read <?php the_field('first_name'); ?>'s Bio</a>

                </div>

            </div>
            </article>

            <?php wp_reset_postdata(); ?>

            <?php endif; ?>

        <?php endwhile; ?>

    <?php endif; ?>
</div>