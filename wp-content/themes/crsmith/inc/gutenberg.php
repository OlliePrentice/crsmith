<?php

add_filter('block_categories', function ($categories, $post) {
    return array_merge(
        [
            [
                'slug' => 'page-blocks',
                'title' => __('Page Blocks', 'theme-blocks'),
            ],

        ],
        $categories
    );
}, 10, 2);

add_action('acf/init', function () {


    if (function_exists('acf_register_block')) {

        acf_register_block_type([
            'name'              => 'container',
            'title'             => __('Container'),
            'mode'              => 'preview',
            'render_template'   => '/template-parts/containers/container.php',
            'category'          => 'layout',
            'icon'              => 'admin-comments',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'buttons',
            'title'             => __('Buttons'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Component'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'background_colour',
            'title'             => __('Background Colour'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Component'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'a1_large_image_text',
            'title'             => __('A1 - Large image & text'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => 'full',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'a2_double_single_image_text',
            'title'             => __('A2 - Double/single image with text'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => 'full',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'a3_medium_image_text',
            'title'             => __('A3 - Medium image with text'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => 'full',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'a4_full_width_image_text',
            'title'             => __('A4 - Full width image and text'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => 'full',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'a5_image_text_background',
            'title'             => __('A5 - Image and text w/background'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'a6_two_column_image_text',
            'title'             => __('A6 - Two column image and text'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'classes'           => 'theme-light',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'a7_text_image_offset',
            'title'             => __('A7 - Text and image (offset)'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => 'full',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'a8_blurred_image_text',
            'title'             => __('A8 - Blurred image and text'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => 'full',
            'classes'           => 'theme-light',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'a9_portrait_image_text',
            'title'             => __('A9 - Portrait image and text'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => 'full',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'b1_product_carousel',
            'title'             => __('B1 - Product carousel'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => 'full',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'b2_image_slider',
            'title'             => __('B2 - Image slider'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'classes'           => 'theme-light',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'b3_full_width_carousel',
            'title'             => __('B3 - Full width carousel'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => 'full',
            'classes'           => 'theme-light',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'b4_featured_products_carousel',
            'title'             => __('B4 - Featured products carousel'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => 'full',
            'classes'           => 'overflow-hidden theme-light',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'b5_offer_carousel',
            'title'             => __('B5 - Offer carousel'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'b6_image_carousel',
            'title'             => __('B6 - Image carousel'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => 'full',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'b7_featured_image_carousel',
            'title'             => __('B7 - Featured image carousel'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'b8_expanded_image_carousel',
            'title'             => __('B8 - Expanded image carousel'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'b9_colour_slider',
            'title'             => __('B9 - Colour slider'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'b10_collection_slider',
            'title'             => __('B10 - Collection slider'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'c1_text_list',
            'title'             => __('C1 - Text list'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'c2_pullquote',
            'title'             => __('C2 - Pullquote'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);
        
        acf_register_block([
            'name'              => 'c3_text_accordion',
            'title'             => __('C3 - Text and accordion'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'c4_full_width_accordion',
            'title'             => __('C4 - Full width accordion'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => 'full',
            'classes'           => 'theme-light',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'c5_single_column_text',
            'title'             => __('C5 - Single column text'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'c6_two_column_text',
            'title'             => __('C6 - Two column text'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'c7_styled_headline',
            'title'             => __('C7 - Styled headline'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => 'full',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'c8_title',
            'title'             => __('C8 - Title'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'c9_text_list_numbered',
            'title'             => __('C9 - Text list (numbered)'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'd1_side_by_side_image',
            'title'             => __('D1 - Side by side image'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => 'full',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'd2_side_by_side_image_scaled',
            'title'             => __('D2 - Side by side image (scaled)'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'd3_container_width_image',
            'title'             => __('D3 - Container width image'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'd4_image_trio',
            'title'             => __('D4 - Image trio'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => 'full',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'd5_full_width_image',
            'title'             => __('D5 - Full width image'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'd6_single_image',
            'title'             => __('D6 - Single image'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'e1_four_numbers_icons',
            'title'             => __('E1 - 4 Numbers/icons'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'e2_two_column_icons',
            'title'             => __('E2 - 2 column icons'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'e3_icon_row',
            'title'             => __('E3 - Icon row'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'e4_icon_trio',
            'title'             => __('E4 - Icon trio'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'e5_four_icon_row',
            'title'             => __('E5 - 4 icon row'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => 'full',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'f1_header_carousel',
            'title'             => __('F1 - Header carousel'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => 'full',
            'classes'           => 'overflow-hidden',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'f2_header_image_text',
            'title'             => __('F2 - Header image and text'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => 'full',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'f3_text_header',
            'title'             => __('F3 - Text header'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => 'full',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'f4_illustrated_header',
            'title'             => __('F4 - Illustrated header'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'g1_news_module',
            'title'             => __('G1 - News module'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'g2_full_width_video_module',
            'title'             => __('G2 - Full width video module'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'g3_testimonial_carousel',
            'title'             => __('G3 - Testimonial carousel'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => 'full',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'g4_full_width_table',
            'title'             => __('G4 - Full width table'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'g5_half_width_table',
            'title'             => __('G5 - Half-width table'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'g6_trustpilot_widget',
            'title'             => __('G6 - Trustpilot widget'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => 'full',
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

        acf_register_block([
            'name'              => 'form',
            'title'             => __('Form'),
            'description'       => __('Block'),
            'render_callback'   => 'theme_block_render_callback',
            'category'          => 'page-blocks',
            'keywords'          => ['Block'],
            'mode'              => 'edit',
            'layout'            => true,
            'supports'          => array(
                'align'         => false,
                'multiple'      => true,
                'jsx'           => true,
                'anchor'        => true,
                'color'         => ['text' => false]
            ),
        ]);

    }

});


function theme_block_render_callback($block)
{

    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);

    // include a template part from within the "template-parts/block" folder
    if (!empty($block['layout']) && $block['layout']) {
        if($block['layout'] === 'full') {
            if (file_exists(get_theme_file_path("/template-parts/structures/layout-full-width.php"))) {
                include(get_theme_file_path("/template-parts/structures/layout-full-width.php"));
            }
        } else {
            if (file_exists(get_theme_file_path("/template-parts/structures/layout.php"))) {
                include(get_theme_file_path("/template-parts/structures/layout.php"));
            }
        }
    } else {
        if (file_exists(get_theme_file_path("/template-parts/blocks/{$slug}.php"))) {
            include(get_theme_file_path("/template-parts/blocks/{$slug}.php"));
        }
    }
}


function wpdc_add_custom_gutenberg_color_palette() {
	add_theme_support(
		'editor-color-palette',
		[
            [
				'name'  => esc_html__( 'White', 'wpdc' ),
				'slug'  => 'white',
				'color' => '#FFFFFF',
			],
            [
				'name'  => esc_html__( 'Light Grey', 'wpdc' ),
				'slug'  => 'gray-50',
				'color' => '#FAFAFA',
			],
			[
				'name'  => esc_html__( 'Dark Blue', 'wpdc' ),
				'slug'  => 'primary',
				'color' => '#041244',
			],
            [
				'name'  => esc_html__( 'Light Blue', 'wpdc' ),
				'slug'  => 'quaternary',
				'color' => '#EBF2FC',
			],
			[
				'name'  => esc_html__( 'Orange', 'wpdc' ),
				'slug'  => 'secondary',
				'color' => '#F39200',
			],
			[
				'name'  => esc_html__( 'Pink', 'wpdc' ),
				'slug'  => 'tertiary',
				'color' => '#C9338A',
			],
		]
	);
}
add_action( 'after_setup_theme', 'wpdc_add_custom_gutenberg_color_palette' );