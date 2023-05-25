<?php
/*
 * Title partial.
 */
$alt_title = get_theme_mod('college-change-blog-title', '');
?>
<?php if (is_home()): ?>
    <?php $current_link_title = get_the_title(get_queried_object_id()); ?>
        <h1 id="single-title"><?php echo $current_link_title; ?></h1>
<?php elseif (is_tax()) : $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy')); ?>
    <h1 id="single-title"><?php echo $term->name; ?></h1>

<?php elseif (is_category()): ?>
    <h1 id="single-title"><?php echo __('Posts in category: ', 'college'); ?><?php single_cat_title(); ?></h1>

<?php elseif (is_tag()): ?>
    <h1 id="single-title"><?php echo __('Posts tagged with: ', 'college'); ?><?php single_tag_title(); ?></h1>

<?php elseif (is_search()): ?>
    <h1 id="single-title"><?php echo __('Search results for:  ', 'college') . esc_html( get_search_query() ); ?></h1>

<?php elseif (is_archive()): ?>

    <?php if (is_year()):
        $archive = __('Archive for: ', 'college') . get_the_time('Y');
    elseif (is_month()):
        $archive = __('Archive for ', 'college') . get_the_time('F, Y');
    elseif (is_day()):
        $archive = __('Archive for ', 'college') . get_the_time('F jS, Y');
    endif; ?>

    <h1 id="single-title"><?php echo ( isset( $archive ) ? $archive : '' ); ?></h1>
<?php else: ?>
    <h1 id="single-title" class="animated <?php echo ( isset( $title_transition ) ? esc_attr( $title_transition ) : '' ); ?>"><?php the_title(); ?></h1>
<?php endif; ?>