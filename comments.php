<?php

if ( post_password_required()) {
    return;
}
?>
<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>

        <h2 class="comments-title">
            <?php
            printf( _n( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'college' ),
                number_format_i18n(get_comments_number()), get_the_title());
            ?>
        </h2>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' )): ?>
            <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'college'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'college' )); ?></div>
                <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'college' )); ?></div>
            </nav><!-- #comment-nav-above -->
        <?php endif; // Check for comment navigation. ?>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size'=> 56,
                'callback'=>'college_comment'
            ) );
            ?>
        </ol><!-- .comment-list -->

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' )): ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'college' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'college')); ?></div>
                <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'college' )); ?></div>
            </nav><!-- #comment-nav-below -->
        <?php endif; // Check for comment navigation. ?>

        <?php if ( ! comments_open() ) : ?>
            <p class="no-comments"><?php _e( 'Comments are closed.', 'college' ); ?></p>
        <?php endif; ?>

    <?php endif; // have_comments() ?>


    <?php $fields = array(

        'author' =>'<div class="row">
                <div class="col-lg-6">
            <p class="comment-form-author"><label for="author">' . __('Name', 'college') . '</label> ' . ($req ? '<span class="required">*</span>' : '') .
            '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) .
            '" size="30"' . ( isset( $aria_req ) ? $aria_req : '' ) . ' /></p>',

        'email' =>
            '<p class="comment-form-email"><label for="email">' . __('Email', 'college') . '</label> ' .($req ? '<span class="required">*</span>' : '') .
            '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) .
            '" size="30"' . ( isset( $aria_req ) ? $aria_req : '' ) . ' /></p>',

        'url' =>
            '<p class="comment-form-url"><label for="url">' . __('Website', 'college') . '</label>' .   '<input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) .
            '" size="30" /></p></div>'
    );
    $args = array(
        'title_reply' => __('LEAVE A REPLY', 'college'),
        'title_reply_to' => __('LEAVE A REPLY to %s', 'college'),
        'format' => 'xhtml',
        'fields' => apply_filters('comment_form_default_fields', $fields),
        'comment_field' =>(is_user_logged_in() ? '<div class="row">' : '').'<div
class="'.(is_user_logged_in() ? 'col-lg-12' : 'col-lg-6' ).'"><p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun','college' ) .
            '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
            '</textarea></p></div></div>',
    );
?>
  <div class="row">
      <div class="col-md-12">
          <?php  comment_form($args); ?>
      </div>
  </div>


</div><!-- #comments -->
