<?php
/*
 * Featured image if any.
 */
if (is_single() || is_page()):
    if (has_post_thumbnail()):
              $attachment_id = get_post_thumbnail_id(get_the_ID());
                if(is_page_template('page-templates/full-width.php')):
                    $image_src = wp_get_attachment_image_src($attachment_id, 'boxed-12');
                elseif(is_page_template('page-templates/staff-page.php')):
                    $image_src = wp_get_attachment_image_src($attachment_id, 'staff-image');
                else:
                    $image_src = wp_get_attachment_image_src($attachment_id, 'boxed-9');
                endif;
        echo '<img src="' . $image_src[0] . '" alt="' . __('featured image', 'college') . '" width="' . $image_src[1] . '" height="' . $image_src[2] . '" />';
    endif;
elseif(is_home() || is_category() || is_search() || is_archive() || is_tag()):
    if (has_post_thumbnail()):
        $attachment_id = get_post_thumbnail_id(get_the_ID());
        $image_src = wp_get_attachment_image_src($attachment_id, 'boxed-9');

        echo '<img src="' . $image_src[0] . '" alt="' . __('featured image', 'college') . '" width="' . $image_src[1] . '" height="' . $image_src[2] . '" />';
    endif;
endif;