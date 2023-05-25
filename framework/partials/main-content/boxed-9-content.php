<?php
/*
 * Boxed-9 content.
 * Contains both main content and sidebar.
 */
?>
<div class="full-section-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">


                <?php if (is_home() || is_category() || is_tag() || is_search() || is_archive()): // is the blog index? ?>
                    <?php if (have_posts()): ?>

                        <main id="college-blog-container">
                            <?php while (have_posts()):the_post(); ?>
                                <article id="<?php the_ID(); ?>" class="blog-item">

                                    <section class="blog-item-title">
                                        <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                    </section>

                                    <section class="blog-item-meta">
                                        <?php get_template_part('/framework/partials/common-partials/meta'); ?>
                                    </section>

                                    <?php if (has_post_thumbnail()): ?>
                                        <section class="blog-item-featured-image">
                                            <?php get_template_part('/framework/partials/common-partials/featured-image'); ?>
                                        </section>
                                    <?php endif; ?>

                                    <section class="blog-item-main-content">
                                        <?php the_excerpt(); ?>
                                    </section>

                                    <!-- Tags -->
                                    <?php if (has_tag()): ?>
                                        <section class="blog-item-tags">
                                            <?php echo get_the_tag_list(' ', ' ', ' '); ?>
                                        </section>
                                    <?php endif; ?>

                                    <a class="blog-item-read-more college-btn" title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
                                        <?php echo __('READ MORE', 'college'); ?>
                                    </a>
                                    <hr/>
                                </article>
                            <?php endwhile; ?>

                            <section class="pagination">
                                <?php college_pagination(); ?>
                            </section>


                        </main>

                    <?php else: ?>
                        <p><?php echo __('There are not any posts available' . 'college'); ?></p>
                    <?php endif; ?>

                <?php else: // is not blog page ?>
                    <!-- Main Item Content -->
                    <main>
                        <?php if (is_single()): ?>
                            <section id="page-meta">
                                <?php get_template_part('/framework/partials/common-partials/meta'); ?>
                            </section>
                        <?php endif; ?>

                        <?php if (has_post_thumbnail()): ?>
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
                    <?php if (has_tag()): ?>
                        <section id="page-tags">
                            <?php echo get_the_tag_list(' ', ' ', ' '); ?>
                        </section>
                    <?php endif; ?>


                <?php endif;  // is home(blog) or single page/post ?>

                <section id="page-comments-area">
                    <?php comments_template('', true); ?>
                </section>


            </div>
            <div class="col-lg-3">

                <!-- Sidebar -->
                <aside>
                   <?php get_sidebar(); ?>
                </aside>

            </div>
        </div>
    </div>

</div>

