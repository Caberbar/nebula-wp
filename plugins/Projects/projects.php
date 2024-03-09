<?php

/**
 * Plugin Name
 *
 * @package           PluginPackage
 * @author            Carlos Bernal Barrionuevo
 * @copyright         2024 Nebula
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       projects
 * Plugin URI:        https://example.com/plugin-name
 * Description:       Desing Projects Custom Post Type
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Carlos Bernal Barrionuevo
 * Author URI:        https://example.com
 * Text Domain:       projects-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://example.com/my-plugin/
 */

//Avoid execute plugin from direction input in browser
defined('ABSPATH') or die('Oooops! Ypu are not allowed to be here... twat!');

class Events
{
  function __construct()
  {
    add_shortcode('mpm_show_main_fields', array($this, 'mpm_show_main_fields'));
    add_shortcode('mpm_show_all_fields', array($this, 'mpm_show_all_fields'));

    add_shortcode('mpm_show_categories', array($this, 'mpm_show_categories'));
    add_shortcode('mpm_show_tags', array($this, 'mpm_show_tags'));
  }

  function execute_actions()
  {

    //Register Project custom-post-type
    add_action('init', array($this, 'mpm_register_projects'));

    //Create a meta-box to display the custom-post-fields
    add_action('add_meta_boxes', array($this, 'mpm_add_metabox'));

    //Save custom post fields in DDBB
    add_action('save_post', array($this, 'mpm_save_custom_fields'));

    //Add css and Js scripts to admin area fro plugin
    add_action('admin_enqueue_scripts', array($this, 'mpm_admin_enqueue_scripts'));

    //Add css and Js scripts to front-end for plugin
    add_action('wp_enqueue_scripts', array($this, 'mpm_front_enqueue_scripts'));
    add_action('wp_enqueue_scripts', array($this, 'mpm_front_injection_styles'));

    //Add a settings to the plugin in admin-area
    add_action('admin_menu', array($this, 'mpm_events_settings_menu'));


    //Register projects settings
    add_action('admin_init', array($this, 'mpm_events_settings_register'));

    //Activate errors launcher
    add_action('admin_notices', array($this, 'mpm_events_settings_error_activation'));
  }

  function mpm_register_projects()
  {
    $supports = array(
      'title', //Display the title panel in admin-area
      'editor', //Display the editor window in admin-area
      'excerpt',
      'thumbnail',
      'author',
      'comments',
    );

    $labels = array(
      'name' => _x('Events', 'plural'),
      'singular_name' => _x('Event', 'singular'),
      'menu_name' => _x('Events', 'admin menu'),
      'menu_admin_bar' => _x('Events', 'admin bar'),
      'add_new' => _x('Add New Event', 'add_new'),
      'all_items' => __('All Events'),
      'add_new_item' => __('Add New Event'),
      'view_item' => __('View Event'),
      'search' => __('Search Events'),
      'not_found' => __('No events found...'),
    );

    $args = array(
      'supports' => $supports, //Add support to admin-area
      'labels' => $labels,    //Change labels in admin-area for custom-post-type
      'public' => true,       //Custom-post-type reachable in admin-area and front-end
      'wp_query' => true,     //We can Loop with WP_Query class
      'query_var' => true,    //Acces to query vars with custom-post-type
      'hierarchical' => false, //No posts delegated
      'show_in_rest' => true, //We are using the Gutenberg editor
      'rewrite' => array('slug' => 'events'), //Custom-post-type slug
      'has_archive' => true,  //Custom-post-type showing in archive.php
      'show_in_menu' => true, //Show custom-post-type option in admin-bar
      'menu_position' => 5,   //Show custom-post-type option in admin-bar
      'menu_icon' => 'dashicons-tickets-alt', //Dashicons icon css class

    );

    register_post_type('events', $args);

    //Add category and/or tags panels to custom-post-type shared with posts
    //register_taxonomy_for_object_type('post_tag', 'events');
    //register_taxonomy_for_object_type('category', 'events');
    //register_taxonomy_for_object_type('post_tag', 'events');

    //Add partical category and tags pannels to custom-post-type

    register_taxonomy(
      'events-category', //slug
      'events',
      array(
        'label' => 'Events Category',
        'rewrite' => array('slug' => 'events-category'),
        'hierarchical' => true, //To use the same interface of post categories
        'show_in_rest' => true, //To display de category pannel in Gutenberg editor style
        'query_var' => true, //Include new taxonomy in query vars
        'show_admin_column' => true, //Show the category column in admin-area
      ),
    ); //custom-post-type registered name

    //Add particular tags pannel to custom-post-type
    register_taxonomy(
      'events-tag', //slug
      'events',
      array(
        'label' => 'Events Tags',
        'rewrite' => array('slug' => 'events-tag'),
        'hierarchical' => false, //To use the same interface of post tags
        'show_in_rest' => true, //To display de tags pannel in Gutenberg editor style
        'query_var' => true, //Include new taxonomy in query vars
        'show_admin_column' => true, //Show the tags column in admin-area
      ),
    ); //custom-post-type registered name

    flush_rewrite_rules();
  }

  function mpm_add_metabox($screens)
  {
    $screens = array('events');
    foreach ($screens as $screen) {
      //<id de la metabox>, <titulo>, <función del callback>, <pantalla>, <contexto>
      add_meta_box('event-metabox', 'NEBULA-Events Details', array($this, 'mpm_metabox_callback'), $screen, 'advanced');
    }
  }

  /**
   * Callback function for displaying custom-fields using HTML tags
   * @param $post The post object
   */
  function mpm_metabox_callback($post)
  {
    //Create a validation mechanism to prevent executions aoutside me website using a nonce field
    wp_nonce_field(basename(__FILE__), 'event-nonce');

    //Data Harvesting
    $year = get_post_meta($post->ID, 'mpm_year', true);
    $rating = get_post_meta($post->ID, 'mpm_rating', true);
    $location = get_post_meta($post->ID, 'mpm_location', true);
    $type = get_post_meta($post->ID, 'mpm_type', true);
    $published = get_post_meta($post->ID, 'mpm_published', true);
    $cost = get_post_meta($post->ID, 'mpm_cost', true);

    //Plazas vendidas y quedan plazas

    //STAFF
    $custom_array_values = get_post_meta($post->ID, 'mpm_custom_array_field', true);


    //Display fields with HTML tags
?>

    <div class="flex-metabox">

      <div class="details">
        <h2>Events Details</h2>
        <div class="flex-item item1">
          <label for="mpm_year">Project Year: </label>
          <input type="number" name="mpm_year" id="mpm_year" size="4" value="<?php echo $year; ?>" />
        </div>
        <div class="flex-item item2">
          <label for="mpm_rating">Rating: </label>
          <input type="number" name="mpm_rating" id="mpm_rating" min=".5" max="5" step=".5" value="<?php echo $rating; ?>" />
        </div>
        <div class="flex-item item3">
          <label for="mpm_location">Location: </label>
          <input type="text" name="mpm_location" id="mpm_location" value="<?php echo $location; ?>" />
        </div>
        <div class="flex-item item4">
          <label for="mpm_type">Type: </label>
          <select class="type-select" name="mpm_type" id="mpm_type">
            <option value="Choose a type" <?php if ($type == "Choose a type") echo "selected"; ?>>Choose a type</option>
            <option value="Concert" <?php if ($type == "Concert") echo "selected"; ?>>Concert</option>
            <option value="Festival" <?php if ($type == "Festival") echo "selected"; ?>>Festival</option>
            <option value="Party" <?php if ($type == "Party") echo "selected"; ?>>Party</option>
            <option value="Show" <?php if ($type == "Show") echo "selected"; ?>>Show</option>
          </select>
        </div>
        <div class="flex-item item5">
          <label for="mpm_published">Published: </label>
          <input type="text" name="mpm_published" id="mpm_published" value="<?php echo $published; ?>" />
        </div>
        <div class="flex-item item6">
          <label for="mpm_cost">Cost: </label>
          <input type="number" name="mpm_cost" id="mpm_cost" size="4" min="0" value="<?php echo $cost; ?>" />
        </div>
      </div>
      <div class="event-staff">
        <h2>Staff</h2>
        <?php
        require_once(plugin_dir_path(__FILE__) . 'admin/includes/staff.php');
        ?>
      </div>
    </div>

  <?php
  }

  /**
   * CallBack function for saving custom post fields
   * @param $post_id Integer Post ID
   */
  function mpm_save_custom_fields($post_id)
  {

    //Check if we are in autosave
    $is_autosave = wp_is_post_autosave($post_id);

    //Check if we are in revision
    $is_revision = wp_is_post_revision($post_id);

    //Check if the nonce field is valid
    $is_valid_nonce = wp_verify_nonce($_POST['event-nonce'], basename(__FILE__));

    if ($is_autosave || $is_revision || !$is_valid_nonce) {
      return;
    }


    //Check if user have the capabilities to save post
    if (!current_user_can('edit_post', $post_id)) {
      return;
    }


    //Sanitize fields to avoid code injections

    $year = sanitize_text_field($_POST['mpm_year']);
    $rating = sanitize_text_field($_POST['mpm_rating']);
    $location = sanitize_text_field($_POST['mpm_location']);
    $type = sanitize_text_field($_POST['mpm_type']);
    $published = sanitize_text_field($_POST['mpm_published']);
    $cost = sanitize_text_field($_POST['mpm_cost']);

    //Store TAFF
    if (isset($_POST['mpm_custom_array_field'])) { //If we have values in array structure
      $array_aux = array();
      foreach ($_POST['mpm_custom_array_field'] as $row) {
        if (!empty($row['key1']) && !empty($row['key2'])) {
          $array_aux[] = array(
            'key1' => sanitize_text_field($row['key1']),
            'key2' => sanitize_text_field($row['key2']),
          );
        }
      }
      update_post_meta($post_id, 'mpm_custom_array_field', $array_aux);
    }


    //Update custom post field

    update_post_meta($post_id, 'mpm_year', $year);
    update_post_meta($post_id, 'mpm_rating', $rating);
    update_post_meta($post_id, 'mpm_location', $location);
    update_post_meta($post_id, 'mpm_type', $type);
    update_post_meta($post_id, 'mpm_published', $published);
    update_post_meta($post_id, 'mpm_cost', $cost);
  }

  /**
   * 
   * 
   */

  function mpm_admin_enqueue_scripts()
  {
    wp_register_style('mpm_admin_css', plugins_url('/admin/css/admin.css',  __FILE__));
    wp_enqueue_style('mpm_admin_css');

    wp_register_script('mpm_staff', plugins_url('/admin/js/staff.js',  __FILE__));
    wp_enqueue_script('mpm_staff');
  }


  function mpm_front_enqueue_scripts()
  {
    wp_register_style('mpm_front_css', plugins_url('/admin/css/front.css',  __FILE__));
    wp_enqueue_style('mpm_front_css');
  }

  function mpm_front_injection_styles()
  {
    // Harvest the settings
    $options = get_option('mpm_events_settings');
    $color = $options['mpm_color'];

    // Store all the styles in a variable
    $styles = "
      .box1, .box2, .box3 {
        border: 1px solid $color;
      }

      .box1::before, .box2::before{
        color: $color;
      }
    ";

    // Register and enqueue the styles to be injected
    wp_register_style('mpm_injected', false);
    wp_enqueue_style('mpm_injected');

    // Inject the styles
    // wp_add_inline_style(<style handle>, <style content>)
    wp_add_inline_style('mpm_injected', $styles);
  }



  /*SETTINGS*/

  /**
   * Engancha el HTML
   */
  function mpm_events_settings_menu()
  {
    //<title>,<menu option>,<capability>,<slug>,<callback>,<icon>,<position>
    add_menu_page('NEBULA - Events Settings Page', 'Events Settings', 'manage_options', 'events-settings', array($this, 'mpm_events_settings_callback'), 'dashicons-admin-settings', 6);
  }

  function mpm_events_settings_callback()
  {
    require_once(plugin_dir_path(__FILE__) . 'admin/admin-settings.php');
  }

  /**
   * Function that register the rojects settings with admin_init hook
   * in wp_options table
   */
  function mpm_events_settings_register()
  {
    //<Array of settings name>, <settings group name>, <callback function for data validation>
    register_setting('mpm_events_settings', 'mpm_events_settings', array($this, 'mpm_events_settings_validation'));
  }


  /**
   * Function for projects settings validation
   * @param $settings Array Projects Settings
   */
  function mpm_events_settings_validation($settings)
  {
    if (!isset($settings['mpm_color'])) {
      $settings['mpm_color'] = '#0d1b2a';
    }

    if (!isset($settings['mpm_allow_rating'])) {
      $settings['mpm_allow_rating'] = 'yes';
    }

    if (!isset($settings['mpm_max_rating']) || $settings['mpm_max_rating'] < 0 || $settings['mpm_max_rating'] > 10) {
      $settings['mpm_max_rating'] = '5';
    }

    return $settings;
  }


  /**
   * FActivar los errores en los settings
   * 
   */
  function mpm_events_settings_error_activation()
  {
    settings_errors();
  }

  /* ---- SHORT CODE ---- */
  function mpm_show_main_fields($attr)
  {
    $args = shortcode_atts(
      array(
        'id' => 0,
      ),
      $attr
    );
    $post_id = $args['id'];

  ?>

    <div class="data-fields box1">
      <div class="field field1"><span>Year: </span><span><?php echo get_post_meta($post_id, 'mpm_year', true); ?></span></div>
      <div class="field field2"><span>Rating: </span><span><?php echo get_post_meta($post_id, 'mpm_rating', true); ?></span></div>
      <div class="field field3"><span>Location: </span><span><?php echo get_post_meta($post_id, 'mpm_location', true); ?></span></div>
    </div>

  <?php
  }

  function mpm_show_all_fields($attr)
  {
    $args = shortcode_atts(
      array(
        'id' => 0,
      ),
      $attr
    );
    $post_id = $args['id'];

  ?>

    <div class="data-fields box1">
      <div class="field field1"><span>Year: </span><span><?php echo get_post_meta($post_id, 'mpm_year', true); ?></span></div>
      <div class="field field2"><span>Rating: </span><span><?php echo get_post_meta($post_id, 'mpm_rating', true); ?></span></div>
      <div class="field field3"><span>Location: </span><span><?php echo get_post_meta($post_id, 'mpm_location', true); ?></span></div>

    </div>

    <div class="data-fields box2">
      <div class="field field4"><span>Type: </span><span><?php echo get_post_meta($post_id, 'mpm_type', true); ?></div>
      <div class="field field5"><span>Published: </span><span><?php echo get_post_meta($post_id, 'mpm_published', true); ?></div>
      <div class="field field6"><span>Cost: </span><span><?php echo get_post_meta($post_id, 'mpm_cost', true); ?></div>
    </div>

    <div class="staff box3">
      <h2 class="staff-h2">Staff</h2>
      <div class="staff-header">
        <div class="staff-lbl">Name: </div>
        <div class="staff-lbl">Rol: </div>
      </div>
      <div class="staff-body">
        <?php
        $custom_array_values = get_post_meta($post_id, 'mpm_custom_array_field', true);
        if (!empty($custom_array_values)) {
          foreach ($custom_array_values as $row) {
            echo '<div class="staff-row">';
            echo '<span class="key1 staff-lbl">' . $row['key1'] . '</span>';
            echo '<span class="key2 staff-lbl">' . $row['key2'] . '</span>';
            echo '</div>';
          }
        }
        ?>
      </div>
    </div>

<?php
  }

  function mpm_show_categories($attr)
  {
    $args = shortcode_atts(
      array(
        'id' => 0,
      ),
      $attr
    );
    $post_id = $args['id'];

    $terms = get_the_terms($post_id, 'events-category');
    if (!empty($terms)) {
      foreach ($terms as $term) {
        echo '&nbsp; <a href="'.get_term_link($term->term_id).'">'.$term->name.'</a>';
      }
    }
  }

  function mpm_show_tags($attr)
  {
    $args = shortcode_atts(
      array(
        'id' => 0,
      ),
      $attr
    );
    $post_id = $args['id'];


    $terms = get_the_terms($post_id, 'events-tag');
    if (!empty($terms)) {
      foreach ($terms as $term) {
        echo '&nbsp; <a href="'.get_term_link($term->term_id).'">'.$term->name.'</a>';
      }
    }
  }
}





















if (class_exists('Events')) {

  //Instanciamos un nuevo objeto de la clase 'Project'
  $event = new Events();
  $event->execute_actions();

  //Register Activation & Desactivation Hooks
}
