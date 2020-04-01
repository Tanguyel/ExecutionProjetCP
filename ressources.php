<?php
/* Gere les custom post type ressources pour afficher des pages de ressources 
*
*
*/



if ( ! function_exists('ep_ressource_post_type') ) {

// Register Custom Post Type
function ep_ressource_post_type() {

	$labels = array(
		'name'                  => _x( 'Ressources', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Ressource', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Ressources', 'text_domain' ),
		'name_admin_bar'        => __( 'Ressources', 'text_domain' ),
		'archives'              => __( 'Ressources Archives', 'text_domain' ),
		'attributes'            => __( 'Ressource Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Ressource Parent :', 'text_domain' ),
		'all_items'             => __( 'Toutes les ressources', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter une ressource', 'text_domain' ),
		'add_new'               => __( 'Ajouter', 'text_domain' ),
		'new_item'              => __( 'Nouvelle ressource', 'text_domain' ),
		'edit_item'             => __( 'Modifier la ressource', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour la ressource', 'text_domain' ),
		'view_item'             => __( 'Voir la ressource', 'text_domain' ),
		'view_items'            => __( 'Voir les ressources', 'text_domain' ),
		'search_items'          => __( 'Rechercher une ressource', 'text_domain' ),
		'not_found'             => __( 'Aucune ressource trouvé', 'text_domain' ),
		'not_found_in_trash'    => __( 'Aucune ressource trouvé dans la corbeille', 'text_domain' ),
		'featured_image'        => __( 'Image en vedette', 'text_domain' ),
		'set_featured_image'    => __( 'Sélectionner l\'image en vedette', 'text_domain' ),
		'remove_featured_image' => __( 'Supprimer l\'image en vedette', 'text_domain' ),
		'use_featured_image'    => __( 'Utiliser comme image en vedette', 'text_domain' ),
		'insert_into_item'      => __( 'Insérer dans la ressource', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Télécharger pour cette ressource', 'text_domain' ),
		'items_list'            => __( 'Liste des ressources', 'text_domain' ),
		'items_list_navigation' => __( 'Parcourir la liste des ressources', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrer la liste des ressources', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'ressources',
		'with_front'            => true,
		'pages'                 => false,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Ressources', 'text_domain' ),
		'description'           => __( 'Des ressources disponibles', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
		'taxonomies'            => array( 'ressource_category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-hammer',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'ressources',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'ressources', $args );

}
add_action( 'init', 'ep_ressource_post_type', 0 );

}


if ( ! function_exists( 'ressource_category' ) ) {

// Register Custom Taxonomy
function ressource_category() {

	$labels = array(
		'name'                       => _x( 'Types de ressource', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Type de ressource', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Type de ressource', 'text_domain' ),
		'all_items'                  => __( 'Tous les types de ressource', 'text_domain' ),
		'parent_item'                => __( 'Type de ressource parent', 'text_domain' ),
		'parent_item_colon'          => __( 'Type parent :', 'text_domain' ),
		'new_item_name'              => __( 'Nouveau type de ressource', 'text_domain' ),
		'add_new_item'               => __( 'Ajouter un type de ressource', 'text_domain' ),
		'edit_item'                  => __( 'Editer le type de ressource', 'text_domain' ),
		'update_item'                => __( 'Mettre à jour le type de ressource', 'text_domain' ),
		'view_item'                  => __( 'Voir le type de ressource', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separer les types avec une virgule', 'text_domain' ),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer des type de ressource', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choisir parmi les plus utilisés', 'text_domain' ),
		'popular_items'              => __( 'Types populaires', 'text_domain' ),
		'search_items'               => __( 'Rechercher un type de ressource', 'text_domain' ),
		'not_found'                  => __( 'Aucun résultat', 'text_domain' ),
		'no_terms'                   => __( 'Aucun type de ressource', 'text_domain' ),
		'items_list'                 => __( 'Liste des types de ressource', 'text_domain' ),
		'items_list_navigation'      => __( 'Parcourir les types de ressource', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'ressource_type', array( 'ressources' ), $args );

}
add_action( 'init', 'ressource_category', 0 );

}

/**
 * Adds a metabox to the right side of the screen under the â€œPublishâ€ box
 */
function ep_add_ressources_file() {
	add_meta_box(
		'ep_ressources_file',
		'Ressource',
		'ep_ressources_file_metabox',
		'ressources',
		'side',
		'default'
	);
}

add_action("add_meta_boxes", "ep_add_ressources_file");

/**
 * Output the HTML for the metabox.
 */
function ep_ressources_file_metabox() {
	global $post;
	// Nonce field to validate form request came from current site
	wp_nonce_field( basename( __FILE__ ), 'ressources_fields_meta' );
	// Get the location data if it's already been entered
	$ressource_file = get_post_meta( $post->ID, 'ressource_file', true );
    $ressource_name = get_post_meta( $post->ID, 'ressource_name', true );
	// Output the field
	?>
<fieldset>
    <div>
        <label for="ressource_name"><?php _e( 'Nom de la ressource', 'text_domain' )?></label><br>
        <input type="text" class="large-text" name="ressource_name" id="ressource_name" value="<?php echo esc_attr( $ressource_name ); ?>"><br>
    </div>
    <div>
        <label for="ressource_file"><?php _e( 'Fichier ressource', 'text_domain' )?></label><br>
        <input type="url" class="large-text" name="ressource_file" id="ressource_file" value="<?php echo esc_attr( $ressource_file ); ?>"><br>
        <button type="button" class="button" id="ressources_file_upload_btn" data-media-uploader-target="#ressource_file"><?php _e( 'Charger un fichier', 'text_domain' )?></button>
    </div>
</fieldset>
<?php
}


/**
	 * Load the media uploader and our custom myplugin-media.js file
	 * Change `myplugin_custom_post_type` to whatever the post type for your metabox is
	 * You may also need to change the `plugins_url()` path to match your plugin folder structure (currently assumes flat with no subfolders)
	 */
	function ep_ressources_load_admin_scripts( $hook ) {
		global $typenow;
		if( $typenow == 'ressources' ) {
			wp_enqueue_media();
			// Registers and enqueues the required javascript.
			wp_register_script( 'meta-box-image', get_stylesheet_directory_uri() . '/ressources_cpt/ressource_cpt.js' ); 
			wp_localize_script( 'meta-box-image', 'meta_image',
				array(
					'title' => __( 'Choose or Upload Media', 'events' ),
					'button' => __( 'Use this media', 'events' ),
				)
			);
			wp_enqueue_script( 'meta-box-image' );
		}
	}
	add_action( 'admin_enqueue_scripts', 'ep_ressources_load_admin_scripts', 10, 1 );


function ep_save_ressources_meta( $post_id, $post ) {
	// Return if the user doesn't have edit permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}
	// Verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times.
	if ( ! isset( $_POST['ressource_file'] ) || ! wp_verify_nonce( $_POST['ressources_fields_meta'], basename(__FILE__) ) ) {
		return $post_id;
	}
	// Now that we're authenticated, time to save the data.
	// This sanitizes the data from the field and saves it into an array $events_meta.
	$events_meta['ressource_file'] = esc_textarea( $_POST['ressource_file'] );
    $events_meta['ressource_name'] = esc_textarea( $_POST['ressource_name'] );
    
	// Cycle through the $events_meta array.
	// Note, in this example we just have one item, but this is helpful if you have multiple.
	foreach ( $events_meta as $key => $value ) :
		// Don't store custom data twice
		if ( 'revision' === $post->post_type ) {
			return;
		}
		if ( get_post_meta( $post_id, $key, false ) ) {
			// If the custom field already has a value, update it.
			update_post_meta( $post_id, $key, $value );
		} else {
			// If the custom field doesn't have a value, add it.
			add_post_meta( $post_id, $key, $value);
		}
		if ( ! $value ) {
			// Delete the meta key if there's no value
			delete_post_meta( $post_id, $key );
		}
	endforeach;
}
add_action( 'save_post', 'ep_save_ressources_meta', 1, 2 );



// Ajout d'un short code pour indiquer le type de ressource telechargé. 
add_filter( 'shortcode_atts_wpcf7', 'custom_shortcode_atts_wpcf7_filter', 10, 3 );
 
function custom_shortcode_atts_wpcf7_filter( $out, $pairs, $atts ) {
    $my_attr = 'modele_name';
    $my_attr = str_replace(" ","_",$my_attr);
 
  if ( isset( $atts[$my_attr] ) ) {
    $out[$my_attr] = $atts[$my_attr];
  }
 
  return $out;
}

?>