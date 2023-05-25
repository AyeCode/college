<?php
$post_terms = wp_get_post_terms( get_the_ID(), 'category');
$counter= 1;
?>
<span class="date-published"><?php echo get_the_date(get_option('date_format')); ?></span> |
<span class="post-categories">
    <?php foreach($post_terms as $term){ ?>

        <a href="<?php echo get_term_link($term->term_id,'category'); ?>"><?php echo $term->name; ?></a>
        <?php if($counter < sizeof($post_terms)): echo ', '; endif; ?>
    <?php $counter++; } ?>
</span> |
<span class="by-author"><?php echo __('By ','college').' '.get_the_author_meta('display_name'); ?></span> |
<span class"comments-number"> <a href="<?php the_permalink(); ?>#comments"><?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'college' ), number_format_i18n(get_comments_number()
    ) );
    ?></a></span>