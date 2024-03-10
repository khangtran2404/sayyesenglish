<?php
//=========== Contructor Custom Post Type have PERMALINK=============//
function constructor_cpt_have_permalink($args)
{
    if (!is_array($args) || !$args['post_type'] || !$args['name'] || !$args['single'] || !$args['slug']) return;
    $post_type = $args['post_type'];
    $name = $args['name'];
    $single = $args['single'];
    $slug = $args['slug'];
    $icon = $args['menu_icon'];
    $support = (isset($args['support']) && !empty($args['support'])) ? $args['support'] : array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions');
    $exclude_search = (isset($args['exclude_search']) && !empty($args['exclude_search'])) ? $args['exclude_search'] : false;

    register_post_type($post_type, array(
        'labels' => array(
            'name' => __($name),
            'singular_name' => __($single),
            'add_new' => __('Add new ' . $single),
            'add_new_item' => __('Add new ' . $single),
            'edit_item' => __('Edit ' . $single),
            'new_item' => __('New ' . $single),
            'all_items' => __('All ' . $name),
            'view_item' => __('View ' . $single),
            'search_items' => __('Search ' . $name),
            'not_found' => __('Not Found ' . $single),
            'not_found_in_trash' => __('Not Found ' . $single . ' In Trash'),
            'parent_item_colon' => '',
            'menu_name' => __($name)
        ),

        'public' => true,
        'menu_icon' => $icon, // Add icon for custom post type
        'exclude_from_search' => $exclude_search,
        'publicly_queryable' => true,
        'menu_position' => 15,
        'has_archive' => true,
        'rewrite' => array('slug' => $slug, 'with_front' => false),
        'supports' => $support,
        'show_in_rest' => true,
    ));
}

//=========== Controctor Custom post type no PERMALINK =============//
function constructor_cpt_no_permalink($args)
{
    if (!is_array($args) || !$args['post_type'] || !$args['name'] || !$args['single'] || !$args['slug']) return;
    $post_type = $args['post_type'];
    $name = $args['name'];
    $single = $args['single'];
    $slug = $args['slug'];
    $icon = $args['menu_icon'];
    $support = (isset($args['support']) && !empty($args['support'])) ? $args['support'] : array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions');

    register_post_type($post_type, array(
        'labels' => array(
            'name' => __($name),
            'singular_name' => __($single),
            'add_new' => __('Add New ' . $single),
            'add_new_item' => __('Add New ' . $single),
            'edit_item' => __('Edit ' . $single),
            'new_item' => __('New ' . $single),
            'all_items' => __('All ' . $name),
            'view_item' => __('View ' . $single),
            'search_items' => __('Search ' . $name),
            'not_found' => __('Not Found ' . $single),
            'not_found_in_trash' => __('Not Found ' . $single . ' In Trash'),
            'parent_item_colon' => '',
            'menu_name' => __($name)
        ),

        'public' => false,  // hide permarlink
        'publicly_queryable' => false,  // button review change
        'show_ui' => true, // need to true because public => false on head
        'menu_icon' => $icon,// Add icon for custom post type
        'exclude_from_search' => false,
        'menu_position' => 15,
        'has_archive' => true,
        'rewrite' => array('slug' => $slug),
        'supports' => $support,
    ));
}

function constructor_custom_taxonomy_create($args)
{
    if (!is_array($args) || !$args['post_type'] || !$args['name'] || !$args['slug'] || !$args['singular_name']) return;
    $labels = array(
        'name' => _x($args['name'], 'twentytwentyone'),
        'singular_name' => _x($args['singular_name'], 'twentytwentyone'),
        'search_items' => __('Search ' . $args['name'], 'twentytwentyone'),
        'all_items' => __('All ' . $args['name'], 'twentytwentyone'),
        'parent_item' => __('Parent ' . $args['singular_name'], 'twentytwentyone'),
        'edit_item' => __('Edit ' . $args['singular_name'], 'twentytwentyone'),
        'update_item' => __('Update ' . $args['singular_name'], 'twentytwentyone'),
        'add_new_item' => __('Add New ' . $args['singular_name'], 'twentytwentyone'),
        'menu_name' => __($args['name'], 'twentytwentyone'),
    );
    register_taxonomy(
        $args['slug'],
        $args['post_type'],
        array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_in_rest' => true,
            'show_in_menu' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => true,
        ));
}

function constructor_custom_tag_create($args)
{
    if (!is_array($args) || !$args['post_type'] || !$args['slug']) return;
    register_taxonomy(
        $args['slug'], //tag
        $args['post_type'], //post-type
        array(
            'hierarchical' => false,
            'label' => __('Tags', 'twentytwentyone'),
            'singular_name' => __('Tag', 'twentytwentyone'),
            'edit_item' => __('Edit Tag', 'twentytwentyone'),
            'update_item' => __('Update Tag', 'twentytwentyone'),
            'add_new_item' => __('Add New Tag', 'twentytwentyone'),
            'new_item_name' => __('New Tag Name', 'twentytwentyone'),
            'separate_items_with_commas' => __('Separate tags with commas', 'twentytwentyone'),
            'add_or_remove_items' => __('Add or remove tags', 'twentytwentyone'),
            'choose_from_most_used' => __('Choose from the most used tags', 'twentytwentyone'),
            'menu_name' => __('Tags', 'twentytwentyone'),
            'rewrite' => array('slug' => 'tag', 'twentytwentyone'),
            'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
        ));
}

/* Create PARTNERS post type */
function create_partners_post_type()
{
    $post_type_args = array(
        'post_type' => 'partners',
        'name' => __('Partners', 'twentytwentyone'),
        'single' => __('Partner', 'twentytwentyone'),
        'slug' => 'partner',
        'menu_icon' => 'dashicons-share',
        'support' => array('title', 'thumbnail'),
        'exclude_search' => false,
    );

    constructor_cpt_have_permalink($post_type_args);

}

/* Create WORK BRANDS post type */
function create_work_brands_post_type()
{
    $post_type_args = array(
        'post_type' => 'work_brands',
        'name' => __('Work Brands', 'twentytwentyone'),
        'single' => __('Work Brand', 'twentytwentyone'),
        'slug' => 'work_brands',
        'menu_icon' => 'dashicons-hammer',
        'support' => array('title', 'thumbnail','editor'),
        'exclude_search' => false,
    );
    $post_type_tax_args = array(
        'post_type' => 'work_brands',
        'name' => __('Types', 'twentytwentyone'),
        'singular_name' => __('Type', 'twentytwentyone'),
        'slug' => 'work_brand_type',
    );
    constructor_cpt_have_permalink($post_type_args);
    constructor_custom_taxonomy_create($post_type_tax_args);
}

/* Create WORK FILMS post type */
function create_work_films_post_type()
{
    $post_type_args = array(
        'post_type' => 'work_films',
        'name' => __('Work Films', 'twentytwentyone'),
        'single' => __('Work Film', 'twentytwentyone'),
        'slug' => 'work_films',
        'menu_icon' => 'dashicons-hammer',
        'support' => array('title', 'thumbnail','editor'),
        'exclude_search' => false,
    );
    $post_type_tax_args = array(
        'post_type' => 'work_films',
        'name' => __('Types', 'twentytwentyone'),
        'singular_name' => __('Type', 'twentytwentyone'),
        'slug' => 'work_film_type',
    );
    constructor_cpt_have_permalink($post_type_args);
    constructor_custom_taxonomy_create($post_type_tax_args);
}

/* INIT function create */
add_action('init', 'create_partners_post_type');
add_action('init', 'create_work_brands_post_type');
add_action('init', 'create_work_films_post_type');
