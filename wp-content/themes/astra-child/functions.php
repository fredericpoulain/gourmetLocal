<?php
/**
 * J'ai crée un theme enfant : par exemple, avec astra, le nom du dossier c'est astra-child
 * J'y ai placé un fichier css avec en haut du fichier ceci : 
 */

/* Theme Name: Astra Child
Theme URI: http://example.com/astra-child
Description: Thème enfant pour Astra
Author: Frédéric Poulain
Author URI: www.fredericpoulain.fr
Template: astra
Version: 1.0.0 */

/**
 * A partir de la, il faut activer le theme enfant dans le dashboard, et activer la feuille de style nouvellement créée.
 * voir fonction "astra_child_enqueue_styles" ci-dessous
 */





// *************** AJOUT DU CSS ET DU JAVASCRIPT ******************/
function astra_child_enqueue_styles()
{
    // Charger le style du thème parent
    wp_enqueue_style('astra-style', get_template_directory_uri() . '/style.css');

    // Charger votre style personnalisé
    wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/style.css');

    //fichier JS
    wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/app.js');
}
add_action('wp_enqueue_scripts', 'astra_child_enqueue_styles');



// *************** Autoriser upload de SVG ****************/
function allow_svg_uploads($mime_types) {
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter('mime_types', 'allow_svg_uploads');



// *************** D E F E R ******************/
// Ajouter l'attribut defer au script custom-js
function add_defer_attribute($tag, $handle)
{
    // Ajouter l'attribut defer uniquement à notre script custom-js
    if ('custom-js' === $handle) {
        return str_replace(' src', ' defer="defer" src', $tag);
    }
    return $tag;
}
add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);



// *************** AJOUT DE GOOGLE FONT ******************/
// function add_google_fonts()
// {
//     wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Allison&display=swap', false);
// }
// add_action('wp_enqueue_scripts', 'add_google_fonts');


/*********CUSTOM POST TYPE RECETTES ET EVENEMENTS ******* */
/*********Permet d'ajouter des recette et/ ou événements au lieu des articles ******* */
function create_custom_post_types()
{
    // Recettes
    register_post_type(
        'recettes',
        [
            'labels' => [
                'name' => __('Recettes'),
                'singular_name' => __('Recette'),
                'menu_name' => __('Recettes'),
                'add_new' => __('Ajouter une recette'),
                'add_new_item' => __('Ajouter une nouvelle recette'),
                'edit_item' => __('Modifier la recette'),
                'new_item' => __('Nouvelle recette'),
                'view_item' => __('Voir la recette'),
                'view_items' => __('Voir les recettes'),
                'search_items' => __('Rechercher des recettes'),
                'not_found' => __('Aucune recette trouvée'),
                'not_found_in_trash' => __('Aucune recette trouvée dans la corbeille'),
                'all_items' => __('Toutes les recettes'),
                'archives' => __('Recettes'),
                'insert_into_item' => __('Insérer dans la recette'),
                'uploaded_to_this_item' => __('Téléversé dans cette recette'),
                'filter_items_list' => __('Filtrer la liste des recettes'),
                'items_list_navigation' => __('Navigation de la liste des recettes'),
                'items_list' => __('Liste des recettes'),
            ],
            'public' => true,
            'has_archive' => true,
            'rewrite' => ['slug' => 'recettes'],
            'show_in_rest' => true,
            'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'comments', 'author', 'trackbacks', 'custom-fields', 'revisions', 'page-attributes', 'post-formats'],
            'menu_position' => 5,
            'menu_icon' => 'dashicons-pressthis'
        ]
    );

    // Événements
    register_post_type(
        'evenements',
        [
            'labels' => [
                'name' => __('Événements'),
                'singular_name' => __('Événement'),
                'menu_name' => __('Événements'),
                'add_new' => __('Ajouter un événement'),
                'add_new_item' => __('Ajouter un nouvel événement'),
                'edit_item' => __('Modifier l\'événement'),
                'new_item' => __('Nouvel événement'),
                'view_item' => __('Voir l\'événement'),
                'view_items' => __('Voir les événements'),
                'search_items' => __('Rechercher des événements'),
                'not_found' => __('Aucun événement trouvé'),
                'not_found_in_trash' => __('Aucun événement trouvé dans la corbeille'),
                'all_items' => __('Tous les événements'),
                'archives' => __('Événements'),
                'insert_into_item' => __('Insérer dans l\'événement'),
                'uploaded_to_this_item' => __('Téléversé dans cet événement'),
                'filter_items_list' => __('Filtrer la liste des événements'),
                'items_list_navigation' => __('Navigation de la liste des événements'),
                'items_list' => __('Liste des événements'),
            ],
            'public' => true,
            'has_archive' => true,
            'rewrite' => ['slug' => 'evenements'],
            'show_in_rest' => true,
            'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'comments', 'author', 'trackbacks', 'custom-fields', 'revisions', 'page-attributes', 'post-formats'],
            'menu_position' => 6,
            'menu_icon' => 'dashicons-pressthis'
        ]
    );
}
add_action('init', 'create_custom_post_types');




/*********Personnaliser les Pages Affichant la Liste des Recettes et Événements ******* */

/**
 * 0 - On peux manipuler le CSS avec les classes et/ou id que Astra place dans la page.
 *          OU BIEN utiliser ses propres classes/id en restructurant les pages en questions : 
 * 1 - Il faut créer deux fichiers : archive-recettes.php ET archive-evenements.php
 * 2 - Dans ces deux fichiers j'ai inséré le même code que celui dans archive.php de Astra,
 * 3 - mais j'ai entouré certain bloc d'éléments HTML avec des classes spécifique.
 * Ainsi, j'ai pu facilement manipuler le CSS grâce à ces classes 
 */

/*********  Personnaliser les Pages Affichant une Seule Recette ou un Seul Événement ******* */

/**
 * Créer les fichier single-recettes.php ET single-evenements.php
 * Ensuite j'ai fait exactement la même chose que pour archive-recettes.php ET archive-evenements.php
 */


/******AJOUTER UNE FEUILLE DE STYLE SPECIFIQUE A SINGLE-RECETTES.PHP et  SINGLE-EVENEMENTS.php ***** */
// Etant donné que le style est le même pour recette et évenement, j'ai décider de partager la même feuille de style.
function load_single_recette_style() {
    if (is_singular('recettes')) {
        wp_enqueue_style('single-recette-style', get_stylesheet_directory_uri() . '/css/single-custom.css');
    }
}
add_action('wp_enqueue_scripts', 'load_single_recette_style');
function load_single_evenement_style() {
    if (is_singular('evenements')) {
        wp_enqueue_style('single-evenement-style', get_stylesheet_directory_uri() . '/css/single-custom.css');
    }
}
add_action('wp_enqueue_scripts', 'load_single_evenement_style');

/******AJOUTER UNE FEUILLE DE STYLE SPECIFIQUE A ARCHIVE-RECETTES.PHP et archive-evenements.php ***** */
function load_archive_recette_style() {
    if (is_post_type_archive('recettes')) {
        wp_enqueue_style('archive-recette-style', get_stylesheet_directory_uri() . '/css/archive-custom.css');
    }
}
add_action('wp_enqueue_scripts', 'load_archive_recette_style');

function load_archive_evenement_style() {
    if (is_post_type_archive('evenements')) {
        wp_enqueue_style('archive-evenement-style', get_stylesheet_directory_uri() . '/css/archive-custom.css');
    }
}
add_action('wp_enqueue_scripts', 'load_archive_evenement_style');

 // ***** DEPLOIEMENT *********

/**
 * SOLUTION 1 - via plugins
 * - Installer All-in-One WP Migration and Backup sur son site local
 * - exporter
 * - installer un nouveau wordpress sur l'hebergeur (avec les outils natif par exemple)
 * - Installer All-in-One WP Migration and Backup sur son site en ligne
 * - Importer
 * - ENSUITE il faut ABSOLUMENT réenregistrer les permaliens dans les réglages
 * - c'est tout.
*/

/**
 *  * SOLUTION 2 - manuellement.
 * 
 * ****** BASE DE DONNEES *******
 * - Exporter la base de donnée.
 * - Créer la BDD de l'hebergeur, et inporter les données dessus.
 * 
 * ******  GIT  *******
 * - Créer un dépôt GIT, et transferer le projet sur le serveur distant.
 * 
 * ****** CONFIGURATION DES FICHIERS SUR L'HEBERGEUR ******
 * - Ouvrir le fichier wp-config.php et modifier les informations de connexion à la BDD
 * - Dans phpMyadmin ouvrir la table "wp_options" et changer l'url du site pour les lignes SiteUrl et Home.
 * - Ensuite il faut savoir que dans la base de donnée, il y a encore plein de trâce de "localhost".
 * On va donc remplacer ces occurences par l'url du site en ligne avec le plugin "Better Search Replace"
 * - ENSUITE il faut ABSOLUMENT réenregistrer les permaliens dans les réglages
*/