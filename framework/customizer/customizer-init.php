<?php
function college_customizer($wp_customize)
{


    /** Homepage Builder */
    $wp_customize->add_section(
        'college_frontpage_settings',
        array(
            'title' => __('Frontpage Settings', 'college'),
            'description' => __('Settings for the frontpage. Please do the following:'.'college').
                '<ol><li><strong>'.__('Create A new page.','college').'</strong></li>
<li><strong>'.__('Assign the presentation template to it.','college').'</strong></li>
<li><strong>'.__('Go to the Reading Settings and assign it as the front page.','college').'</strong></li>
</ol>',
            'priority' => 5,
        )
    );

    // Show slider or not
    $wp_customize->add_setting(
        'college-show-slider',
        array(
            'default' => '0',
            'sanitize_callback' => 'esc_attr'
        )
    );

    // Slide 1 (page)
    $wp_customize->add_setting(
        'college-slide-1',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_attr'
        )
    );

    // Slide 2 (page)

    $wp_customize->add_setting(
        'college-slide-2',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_attr'
        )
    );

    // Slide 3

    $wp_customize->add_setting(
        'college-slide-3',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_attr'
        )
    );

    //Image 1
    $wp_customize->add_setting(
        'college-front-image-1',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    // Image 2
    $wp_customize->add_setting(
        'college-front-image-2',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    // Image 3
    $wp_customize->add_setting(
        'college-front-image-3',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    // Staff Page 1
    $wp_customize->add_setting(
        'college-staff-1',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_attr'
        )
    );

    // Staff Page 2
    $wp_customize->add_setting(
        'college-staff-2',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_attr'
        )
    );  // Staff Page 3
    $wp_customize->add_setting(
        'college-staff-3',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_attr'
        )
    );  // Staff Page 4
    $wp_customize->add_setting(
        'college-staff-4',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_attr'
        )
    );

    $wp_customize->add_control(
        'college-show-slider',
        array(
            'type' => 'radio',
            'label' => __('Show the slider','college'),
            'section' => 'college_frontpage_settings',
            'settings' => 'college-show-slider',
            'choices' => array(
                '0' => __('Disabled', 'college'),
                '1' => __('Enabled', 'college')
            ))
    );

    $wp_customize->add_control(
        'college-slide-1',
        array(
            'type' => 'dropdown-pages',
            'label' => __('Slide 1','college'),
            'section' => 'college_frontpage_settings',
            'settings' => 'college-slide-1')
    );
    $wp_customize->add_control(
        'college-slide-2',
        array(
            'type' => 'dropdown-pages',
            'label' => __('Slide 2','college'),
            'section' => 'college_frontpage_settings',
            'settings' => 'college-slide-2')
    );

    $wp_customize->add_control(
        'college-slide-3',
        array(
            'type' => 'dropdown-pages',
            'label' => __('Slide 3','college'),
            'section' => 'college_frontpage_settings',
            'settings' => 'college-slide-3')
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'college-front-image-1',
            array(
                'label' => __('Image 1 below content', 'college'),
                'section' => 'college_frontpage_settings',
                'settings' => 'college-front-image-1',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'college-front-image-2',
            array(
                'label' => __('Image 2 below content', 'college'),
                'section' => 'college_frontpage_settings',
                'settings' => 'college-front-image-2',
            )
        )
    );

     $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'college-front-image-3',
                array(
                    'label' => __('Image 3 below content', 'college'),
                    'section' => 'college_frontpage_settings',
                    'settings' => 'college-front-image-3',
                )
            )
        );

    $wp_customize->add_control(
        'college-staff-1',
        array(
            'type' => 'dropdown-pages',
            'label' => __('Staff 1 page ,it appears below the images tha are set above','college'),
            'section' => 'college_frontpage_settings',
            'settings' => 'college-staff-1')
    );

    $wp_customize->add_control(
        'college-staff-2',
        array(
            'type' => 'dropdown-pages',
            'label' => __('Staff 2 page ,it appears below the images tha are set above','college'),
            'section' => 'college_frontpage_settings',
            'settings' => 'college-staff-2')
    );

    $wp_customize->add_control(
        'college-staff-3',
        array(
            'type' => 'dropdown-pages',
            'label' => __('Staff 3 page ,it appears below the images tha are set above','college'),
            'section' => 'college_frontpage_settings',
            'settings' => 'college-staff-3')
    );

    $wp_customize->add_control(
        'college-staff-4',
        array(
            'type' => 'dropdown-pages',
            'label' => __('Staff 4 page ,it appears below the images tha are set above','college'),
            'section' => 'college_frontpage_settings',
            'settings' => 'college-staff-4')
    );


    /** General Settings */
    $wp_customize->add_section(
        'college_general_settings',
        array(
            'title' => __('General Settings', 'college'),
            'description' => __('Logo, and other general settings.', 'college'),
            'priority' => 6,
        )
    );

    $wp_customize->add_setting(
        'college-show-loader',
        array(
            'default' => '1',
            'sanitize_callback' => 'esc_attr'
        )
    );

    $wp_customize->add_setting(
        'college-logo-upload',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        'college-show-loader',
        array(
            'type' => 'radio',
            'label' => __('Show the loader','college'),
            'section' => 'college_general_settings',
            'settings' => 'college-show-loader',
            'choices' => array(
                '0' => __('Disabled', 'college'),
                '1' => __('Enabled', 'college')
            ))
    );


    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'college-logo-upload',
            array(
                'label' => __('Upload a logo', 'college'),
                'section' => 'college_general_settings',
                'settings' => 'college-logo-upload',
            )
        )
    );

}

add_action('customize_register', 'college_customizer');