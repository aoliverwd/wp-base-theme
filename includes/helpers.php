<?php

namespace AOWD\BaseTheme\Helpers;

/**
 * Register a custom post type with configurable options.
 *
 * @param string $name The post type name (slug)
 * @param string $title The display title for the post type
 * @param bool $hasCategorys Whether to include category and post_tag taxonomies
 * @param bool $revisions Whether to enable revisions support
 * @param string $dash_icon The dashicon class for the menu icon
 * @param bool $is_public Whether the post type should be public
 * @param array<mixed> $rewrite_rule Triggers the handling of rewrites for this post type
 * @return void
 */
function registerPostType(string $name, string $title, bool $hasCategorys = false, bool $revisions = true, string $dash_icon = 'dashicons-media-default', bool $is_public = true, array $rewrite_rule = [])
{
    $cats = $hasCategorys ? ['category', 'post_tag'] : [];
    $add_revisions = $revisions ? 'revisions' : '';

    register_post_type(
        $name,
        array(
             'labels'             =>
             array(
                 'name'               => $title,
                 'singular_name'      => $title,
                 'add_new'            => 'Add New',
                 'add_new_item'       => 'Add New ' . $title,
                 'edit_item'          => 'Edit ' . $title,
                 'new_item'           => 'New ' . $title,
                 'all_items'          => 'All ' . $title,
                 'view_item'          => 'View ' . $title,
                 'search_items'       => 'Search ' . $title,
                 'not_found'          => 'No ' . $title . ' found',
                 'not_found_in_trash' => 'No ' . $title . ' found in Trash',
                 'parent_item_colon'  => '',
                 'menu_name'          => $title
             ),
             'taxonomies' => $cats,
             'public'             => $is_public,
             'publicly_queryable' => true,
             'show_ui'            => true,
             'show_in_menu'       => true,
             'query_var'          => true,
             'rewrite'            => !empty($rewrite_rule) ? $rewrite_rule : ['slug' => $name],
             'capability_type'    => 'page',
             'has_archive'        => false,
             'hierarchical'       => false,
             'menu_position'      => null,
             'show_in_rest'       => true,
             'menu_icon'          => $dash_icon,
             'supports'           =>
             array(
                 'title', 'editor', 'author', 'page-attributes', 'thumbnail', 'excerpt', $add_revisions, 'custom-fields'
             )
        )
    );
}


// Year Shortcode
function currentYear( $atts ){
    return date('Y');
}

add_shortcode("year", __NAMESPACE__ . "\currentYear");
