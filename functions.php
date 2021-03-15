<?php

//On déclare la zone que l'on souhaite créer
function widgets(){
    register_sidebar(
        array(
            //On donne un nom à la zone de notre widget qui apparaîtra dans votre administration Wordpress
            'name' => 'Horaires',
            //Identifiant unique de votre zone qui vous permettra par la suite de l'appeler en front
            'id' => 'horaires',
            //On ajoute une description à notre zone
            'description' => 'Ajouter un widget de type texte dans lequel vous saisirez vos horaires dans cette zone',
            //On choisi la balise HTML qui va entourer notre widget
            'before_widget' => '<div id="horaires" class="widget">',
            'after_widget' => '</div>',
            //On choisi la balise HTML qui va entourer le titre de notre widget
            'before_title' => '<p class="titreduwidget">',
            'after_title' => '</p>'
    )
        );   
}
//On lance l'action avec le hook widget_init pour qu'il puisse exécuter notre fonction et ajouter notre zone aux widgets
add_action('widgets_init', 'widgets');

//Appel de la zone en front
//dynamic_sidebar('[id_saisie]'); 

function mesMenusWordpress()
{
    register_nav_menus(
        array(
            'header-menu' => __('Zone menu header'),
            'footer-menu' => __('Menu à afficher dans le footer')
        )
        );
}

add_action('init', 'mesMenusWordpress');

/*
* On utilise une fonction pour créer notre custom post type 'Portfolio'
*/

function wpm_custom_post_type() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Réalisations', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Réalisation', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Portfolio'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Toutes les réalisations'),
		'view_item'           => __( 'Voir les réalisations'),
		'add_new_item'        => __( 'Ajouter une nouvelle réalisation'),
		'add_new'             => __( 'Ajouter une réalisation'),
		'edit_item'           => __( 'Editer la réalisation'),
		'update_item'         => __( 'Modifier la réalisation'),
		'search_items'        => __( 'Rechercher une réalisation'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	
	// On peut définir ici d'autres options pour notre custom post type
	
	$args = array(
		'label'               => __( 'Réalisations'),
		'description'         => __( 'Tous sur réalisations'),
		'labels'              => $labels,
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'editor', 'slug', 'comments', 'thumbnail', 'revisions', 'custom-fields', ),
		/* 
		* Différentes options supplémentaires
		*/
		'show_in_rest'        => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'portfolio'),

	);
	
	// On enregistre notre custom post type qu'on nomme ici "portfolio" et ses arguments
	register_post_type( 'portfolio', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );