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
    //chatons à adopter
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

    // chats adultes reproducteurs
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

    // Commentaires du livre d'or
    register_post_type('comments', [
        'label' => 'Livre d\'or',
        'labels' => [
            'singular_name' => 'Livre d\'or',
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

// Menu
function hl_getMenu($location){
    global $wp_post;
    $wp_post = get_queried_object_id();
    $menu = [];
    $locations = get_nav_menu_locations();
    foreach (wp_get_nav_menu_items ($locations[$location]) as $post) 
    {
        $item = new stdClass();
        $item->url = $post->url;
        $item->label = $post->title;
        $item->children = [];
        $item->current = ($post->object_id == $wp_post);
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

// remove text area on page template

function remove_editor() {
    if (isset($_GET['post'])) {
        $id = $_GET['post'];
        $template = get_post_meta($id, '_wp_page_template', true);
        switch ($template) {
            case 'template-parts/template-album.php':
            case 'index.php':
            case 'template-parts/template-historique.php':
                remove_post_type_support('page', 'editor');
                break;
            default :
                // Don't remove any other template.
                break;
        }
    }
}
add_action('init', 'remove_editor');

/**
 *
 * Handle custom comment formular
 */
function hl_get_comment_form(){
    return'dw-custom-form-comment';
}
//set variable as global to be able to use it everywhere in wp ex: global $tatitoto = tata
if($_POST['hl_comment_form'] ?? false === hl_get_comment_form()){
    //charger le fichier de class de controller
    require 'App/CommentFormController.php';
    //exceuter le traitement du form
    $commentForm = new CommentFormController($_POST);
    //stocker le feedback du form dans $_SESSION
    $_SESSION['comment'] = $commentForm;
    //rediriger l'utilisateur vers la page courante pour afficher le feedback et éviter le renvois intempestif d'un form lors d'un rechargement de la page.
    wp_redirect('http://localhost/hairlessness/livre-dor/');exit;
}