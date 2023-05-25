<?php
/*
 * Boxed-12 content.
 * Fullwidth boxed content.
 */
?>
<div class="full-section-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Main Item Content -->
                <main>
                    <?php if (is_single()): ?>
                        <section id="page-meta">
                            <?php get_template_part('/framework/partials/common-partials/meta'); ?>
                        </section>
                    <?php endif; ?>

                    <?php if(has_post_thumbnail()): ?>
                        <section id="page-featured-image">
                            <?php get_template_part('/framework/partials/common-partials/featured-image'); ?>
                        </section>
                    <?php endif; ?>

                    <section id="main-entry-content">
                        <?php the_content(); ?>
                    </section>

                    <section id="main-entry-link-pages">
                        <?php wp_link_pages(); ?>
                    </section>
                </main>

                <!-- Tags -->
                <?php if(has_tag()): ?>
                    <section id="page-tags">
                        <?php  echo get_the_tag_list(' ',' ',' '); ?>
                    </section>
                <?php endif; ?>

                <!-- Recommended items if any -->
                <?php if (get_post_meta(get_the_ID(), '_college_page_enable_related',true) == '1'): ?>

                    <section id="recommended-items-area">
                        <?php get_template_part('/framework/partials/common-partials/related-items'); ?>
                    </section>

                <?php endif; ?>

                <section id="page-comments-area">
                    <?php comments_template('', true); ?>
                </section>

            </div>
        </div>
    </div>

</div>

