<?php
/*
* Creating a function to create our CPT
*/
 
function firebox_custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'services', 'Post Type General Name', 'firebox' ),
        'singular_name'       => _x( 'services', 'Post Type Singular Name', 'firebox' ),
        'menu_name'           => __( 'services', 'firebox' ),
        'parent_item_colon'   => __( 'Parent services', 'firebox' ),
        'all_items'           => __( 'All services', 'firebox' ),
        'view_item'           => __( 'View services', 'firebox' ),
        'add_new_item'        => __( 'Add New services', 'firebox' ),
        'add_new'             => __( 'Add New services', 'firebox' ),
        'edit_item'           => __( 'Edit services', 'firebox' ),
        'update_item'         => __( 'Update services', 'firebox' ),
        'search_items'        => __( 'Search services', 'firebox' ),
        'featured_image'        => __( 'services image', 'firebox' ),
        'not_found'           => __( 'Not Found', 'firebox' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'firebox' ),

    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'services', 'firebox' ),
        'description'         => __( 'services services and reviews', 'firebox' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'thumbnail' ),
         //'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array(  ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'services', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'firebox_custom_post_type', 0 );


// outfut area//
 <!-- Services sections Dynamck start -->
                <?php
                $firebox_services = new WP_Query(array( 
                    'post_type'      => 'services',
                    'posts_per_page' => '3'
                )); 
                while( $firebox_services->have_posts() ) :
                    $firebox_services->the_post();
                 ?>
                <div class="col-md-4 col-sm-6">
                    <div class="choose_us_single para_default image_fulwidth text-center wow fadeInLeft" data-wow-delay="300ms">
                        <img src="<?php the_post_thumbnail();?>">
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_content(); ?></p>
                    </div>
                </div><!--col-md-4 -->
            <?php endwhile; wp_reset_query();
            ?>
               <!-- Services sections Dynamck End -->