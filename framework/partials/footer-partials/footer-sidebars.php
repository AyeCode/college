<?php if (college_active_footer() !== false): ?>
    <section id="college-footer-area" class="full-section-60">
        <?php 
        $college_footer_info = college_active_footer();
        $college_footer_class = $college_footer_info['class'];
        $college_sidebars_count = $college_footer_info['sidebars_count'];
        ?>

        <div class="container">
            <div class="row">
                <div id="college-footer-sidebars">
                    <?php for($i=1; $i<$college_sidebars_count+1;$i++): ?>

                        <div class="<?php echo $college_footer_class; ?> college-footer-sidebar">
                            <?php if (!dynamic_sidebar('college-footer-'.$i)): ?>
                                <div class="pre-widget">

                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
      
    </section>
<?php endif; ?>