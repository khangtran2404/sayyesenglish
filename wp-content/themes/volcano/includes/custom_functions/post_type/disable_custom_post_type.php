<?php
/* Disable unused CPT */
function delete_post_type(){
//    unregister_post_type( 'post_type' );
}
add_action('init','delete_post_type');

/* Remove Uncategorized Category */
function remove_uncategorized_links( $categories ){
    foreach ( $categories as $cat_key => $category ){
        if( 1 == $category->term_id ){
            unset( $categories[ $cat_key ] );
        }
    }
    return $categories;
}
add_filter('get_the_categories', 'remove_uncategorized_links', 1);