<?php

/**
 * Plugin Name
 *
 * @package           My messenger package
 * @author            Carlos Bernal Barrionuevo
 * @copyright         2024 Carlos
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       My messenger
 * Plugin URI:        https://caberbar.com/
 * Description:       Send messages to users!
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Carlos Bernal Barrionuevo
 * Author URI:        https://caberbar.com
 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://caberbar.com/
 */
 
 //Evitar que se ejecute el pulgging desde la URL del navegador
 defined('ABSPATH') or die('You are not allowed to be here, get the fuck out the way.');
 
 class MyMessenger{
     //declare shortcode
     function __construct(){
         add_shortcode('mmm_show_message',array($this,'mmm_show_message'));
     }
     
     //ejecutar las acciones en orden para crear un nuevo custom post type
     function mmm_execute_actions(){
         //register custom post type message
         add_action('init',array($this,'mmm_register_custom_message'));
         
         //hoja de estilos
         add_action('wp_enqueue_scripts',array($this,'mmm_enqueue_front_css'));
         
         //añadir una metabox
         add_Action('add_meta_boxes',array($this,'mmm_add_message_metabox'));
         
         
         //guardar el mensaje para los custom post field
         add_Action('save_post',array($this,'mmm_save_message_metabox'));
     }
     
     function mmm_register_custom_message(){
         $supports=array(
            'title',
            'editor',
            'thumbnail',
        );
          $labels=array(//array que indica como se llaman las cosas en el backend
                'name' => _x('Messages', 'plural'),
               'singular_name' => _x('Message', 'singular'),
               'menu_name' => _x('Messages', 'admin menu'),
               'menu_admin_bar' => _x('Messages', 'admin bar'),
               'add_new' => _x('Add New Message', 'add_new'),
               'all_items' => __('All Messages'),
               'add_new_item' => __('Add new Message'),
               'view_item' => __('View Messages'),
               'search' => __('Search Message'),
               'not_found' => __('No Messages found...'), 
               
               
        );
         
         $args = array(
                'supports' => $supports,
                'labels' => $labels,
                'query_var' => true,
                'show_in_rest' => true,
                'public' => true,
                'show_in_menu' => true,
                'menu_position' => 7,
                'menu_icon' => 'dashicons-format-status' , 
                'exclude_from_search' => true,
            );
         
         
         register_post_type('mmm_message',$args);
         
         
         //Añadir roles del autor como nueva taxonomia
         register_taxonomy(
            'to',
            'mmm_message',
            array(
                'rewrite' => array('slug'=> 'to'),
                'label' => "To",
                'show_admin_column' => true,
                'query_var' => true,
                'hierarchical' => true,
                'show_in_rest' => true,
            ),
        );
        
        //INSERTAR EN LA BASE DE DATOS
        $terms=['All Users','Administrator','Editor','Author','Collaborator','Subscriptor'];
         
         foreach($terms as $term){
             wp_insert_term($term,'to');
         }
         
         
         flush_rewrite_rules();
     }
     
     function mmm_show_message($atts){
        $authorid=shortcode_atts(
            array("id" => 0,) , $atts
        );
        
        $author_id = $authorid['id'];
        
        // Hallar el rol del usuario
        $rol=trim(implode('',get_userdata($author_id)->roles));
        
        
        //Asegurarnos de que el usuario está logeado
        
        if(is_user_logged_in()){
            //Query to determine if theres is a message for him
            //query de la taxonomia
            
            $args= array(
                'posts_per_page' => 1,
                'post_type' => 'mmm_message',
                'tax_query' => array(
                        array(
                            //taxonomia por la cual se busca, el slug
                            'taxonomy' => 'to',
                            //tipo de campo que es
                            'field' => 'slug',
                            //valor del slug que tiene que buscar
                            'terms' => $rol,
                            //accion que se lleva a cabo en la consulta, ACTION INCLUDE o NOT INCLUDE
                            'operator' => 'IN',
                            )
                    ),
            );
            
            $msg=new WP_Query($args);
            
            if($msg->have_posts()):
                $msg->the_post();
                $post_id= get_the_id();
                
                //Extraemos la fecha de expiración
                $expired_date = get_post_meta($post_id, 'mmm_exp_date',true);
                
                $year = substr($expired_date, 0, 4);
                $month = substr($expired_date, 5, 2);
                $day = substr($expired_date, 8, 2);
                $hour = substr($expired_date, 11, 2);
                $minute = substr($expired_date, 14, 2);
                
                $fecha = new DateTime();
                $fecha->setDate(intval($year), intval($month), intval($day));
                $fecha->setTime(intval($hour), intval($minute));
                
                $actual = new DateTime();
                
                $difference = $actual->diff($fecha);
                $difference_format = $difference->format('%R');   
                
                        if (has_post_thumbnail()) {
                          $thumb_url = get_the_post_thumbnail_url();
                      } else {
                          $thumb_url = get_template_directory_uri() . '/assets/images/myImages/defaultImg.png';
                      }
                      
                      if($difference_format==='+'){ ?>
                                <div class="motd-box">
                                        <div class="message-pic" style="background-image:url(<?php echo $thumb_url; ?>)"></div>
                                        <div class="message-content">
                                        <h3 class=""><?php the_title();?></h3>
                                        <p><?php the_content(); ?></p>
                                    </div>
                                </div>
                
                <?php
                 };
            else:
                echo '<h2>Theres is no message for '.$rol.' yet...</h2>';
            endif;
            wp_reset_postdata();
        }
        
        
        //Crear la estructura para visualizar el mensaje
     }
     
     function mmm_enqueue_front_css(){
         wp_register_style('mmm-front-css',plugins_url('/mmm-front.css',__FILE__));
         wp_enqueue_style('mmm-front-css');
     }
     
     function mmm_add_message_metabox($screens){
         $screens=array('mmm_message');//esto es el custom post type
         foreach($screens as $screen){
             //primer parametro id del dis de l ametabox
             add_meta_box('mmm_message', 'Message Details',array($this,'mmm_metabox_callback'),$screen, 'advanced');
         }
     }
     
     function mmm_metabox_callback($post){
    wp_nonce_field(basename(__FILE__), 'mmm_message_nonce');
    $expired_date = get_post_meta($post->ID, 'mmm_exp_date', true);
    if (!$expired_date) {
        $exp_Date = new DateTime();
        $exp_Date->modify('+24 hours'); // Agrega 24 horas al tiempo actual
        
        // Formatea la fecha para que sea compatible con el input datetime-local
        $expired_date = $exp_Date->format('Y-m-d\TH:i');
        
        update_post_meta($post->ID, 'mmm_exp_date', $expired_date);
    }
    ?>
    <div class="custom_field">
        <label for="mmm_exp_date">Expired Time & Date</label>
        <input type="datetime-local" id="mmm_exp_date" name="mmm_exp_date" value="<?php echo $expired_date; ?>"/>
    </div>
    <?php
}
     
     function mmm_save_message_metabox($post_id){
          
         //comprobar si estamos en autosave
         $is_autosave=wp_is_post_autosave($post_id);
         
         //comprobar si estamos en revision
         $is_revision=wp_is_post_revision($post_id);
         
         //comprobar si el campo nonce es valido
         $is_valid_nonce=wp_verify_nonce($_POST["mmm_message_nonce"],basename(__FILE__));
         
         //si esta en autosave si esta en revision si no nonce no es valido
         if($is_autosave || $is_revision || !$is_valid_nonce){
             return;
         }
         
         //comprobar si el usaurio tiene la capacidad de hacer posts
         if(!current_user_can("edit_post",$post_id)){
             return;
         }
         
         //sanear los campos
        $expired_date = sanitize_text_field($_POST['mmm_exp_date']);
        
        update_post_meta($post_id, 'mmm_exp_date',$expired_date);
         
     }
 }
 
 if(class_exists('MyMessenger')){
     $myMessage= new MyMessenger();
     $myMessage->mmm_execute_actions();
 }
