<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action('carbon_fields_register_fields', 'industry_dive_register_components');

function industry_dive_register_components()
{

    // Hero block
    Block::make(__('Hero', 'insdury_dive'))
        ->add_fields(array(

            Field::make('complex', 'slider_items', 'Add a new slider')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('image', 'bg_image', 'Background image'),
                    Field::make('select', 'selected_ids', __('Select Concerns'))
                        ->add_options(get_post_arr('post')),
                )),
        ))
        ->set_icon('star-filled')
        ->set_keywords([__('Hero Custom Block', 'insdury_dive')])
        ->set_description(__('Custom Block', 'insdury_dive'))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            setData($fields);
            get_template_part('components/hero');
        });

    // featured__posts block
    Block::make(__('Feauterd Posts', 'insdury_dive'))
        ->add_fields(array(
            Field::make('text', 'title', 'Title'),
            Field::make('select', 'selected_ids', __('Select Category'))
                ->add_options(get_post_cat_arr('post')),
        ))
        ->set_icon('star-filled')
        ->set_keywords([__('Feauterd Custom Block', 'insdury_dive')])
        ->set_description(__('Custom Block', 'insdury_dive'))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            setData($fields);
            get_template_part('components/featured__posts');
        });

    // trending block
    Block::make(__('Trending Posts', 'insdury_dive'))
        ->add_fields(array(
            Field::make('text', 'title', 'Title'),
        ))
        ->set_icon('star-filled')
        ->set_keywords([__('Trending Custom Block', 'insdury_dive')])
        ->set_description(__('Custom Block', 'insdury_dive'))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            setData($fields);
            get_template_part('components/trending');
        });


    // trending block
    Block::make(__('Latest Posts', 'insdury_dive'))
        ->add_fields(array(
            Field::make('text', 'title', 'Title'),
        ))
        ->set_icon('star-filled')
        ->set_keywords([__('Latest Custom Block', 'insdury_dive')])
        ->set_description(__('Custom Block', 'insdury_dive'))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            setData($fields);
            get_template_part('components/latest');
        });

    //@end block


}
