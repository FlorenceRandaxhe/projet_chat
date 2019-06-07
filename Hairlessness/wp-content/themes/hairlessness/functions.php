<?php
// activate Wordpress components
add_theme_support( 'post-thumbnails' );

// register main menu
register_nav_menu('main', 'main navigation');
register_nav_menu('footer', 'footer navigation');

// Page title
add_filter('wp_title', 'custom_wp_title');
function custom_wp_title($title) {
    if(empty($title)) {
        $title = 'Accueil';
    }
    $title .= ' | ' . get_bloginfo('name');
    return trim($title);
}


// create a custom post
function hl_register_post_types(){
    register_post_type('chatons', [
        'label' => 'Chatons',
        'labels' => [
            'singular_name' => 'Chaton',
            'add_new_item' => 'Ajouter un chaton'
        ],
        'description' => 'Les chatons disponibles pour l\'adoption',
        'hierarchical' => true,
        'supports' => array('title', 'custom-fields', 'revisions'),
        'public' => true,
        'menu_position'=> 5,
    ]);

    register_post_type('chats', [
        'label' => 'Chats',
        'labels' => [
            'singular_name' => 'Chat',
            'add_new_item' => 'Ajouter un chat'
        ],
        'description' => 'Les chats reproducteurs',
        'hierarchical' => true,
        'supports' => array('title', 'custom-fields', 'revisions'),
        'public' => true,
        'menu_position'=> 5,
    ]);

    register_post_type('comments', [
        'label' => 'Commentaires',
        'labels' => [
            'singular_name' => 'Commentaire',
            'add_new_item' => 'Gèrer les commentaires du livre d\'or'
        ],
        'description' => 'Liste des commentaires',
        'hierarchical' => true,
        'supports' => array('title','editor', 'revisions'),
        'public' => true,
        'menu_position'=> 5,
        'menu_icon' => 'dashicons-testimonial',
    ]);
}
add_action('init', 'hl_register_post_types');


// page url

function hl_get_page_id_from_template($templateName) {
    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template-parts/' . $templateName,
        'hierarchical' => 0
    ));
    foreach($pages as $page){
        return $page->ID;
    }
}

function hl_get_page_url($templateName) {
    return get_page_link(hl_get_page_id_from_template($templateName));
}

function hl_getMenu($location){
    $menu = [];
    $locations = get_nav_menu_locations();
    foreach (wp_get_nav_menu_items ($locations[$location]) as $post)
    {
        $item = new stdClass();
        $item->url = $post->url;
        $item->label = $post->title;
        $item->children = [];
        if (!$post->menu_item_parent) {
            $menu[$post->ID] = $item;
        } else{
            $menu[$post->nemu_item_parent]->children[$post->ID] = $item;
        }
    }
    return $menu;
}


// Assets
function asset_path ($path = ''){
    return get_template_directory_uri() . '/public/' . trim($path, '/');
}


// remove unused menu from side-bar
function remove_menus() {
    remove_menu_page( 'edit.php' );                    //Posts
    remove_menu_page( 'edit-comments.php' );           //Comments
}
add_action( 'admin_menu', 'remove_menus' );

