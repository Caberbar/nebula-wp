<?php

//Add theme support
add_theme_support('post-thumbnails'); //Dar soporte al teme pudiendo poner ficha de imagen


/**
 * Add CSS, JS files to our theme
 */
function principalTheme_scripts()
{
    // Add main css stylesheet
    wp_enqueue_style('style', get_stylesheet_uri());
    // Add secundary css stylesheet
    wp_enqueue_style('style2', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('boostrap', get_template_directory_uri() . '/assets/lib/bootstrap/dist/css/bootstrap.min.css');
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/lib/animate.css/animate.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/lib/components-font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('et-line-font', get_template_directory_uri() . '/assets/lib/et-line-font/et-line-font.css');
    wp_enqueue_style('flexslider', get_template_directory_uri() . '/assets/lib/flexslider/flexslider.css');
    wp_enqueue_style('owl', get_template_directory_uri() . '/assets/lib/owl.carousel/dist/assets/owl.carousel.min.css');
    wp_enqueue_style('owl-theme', get_template_directory_uri() . '/assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css');
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/lib/magnific-popup/dist/magnific-popup.css');
    wp_enqueue_style('simpletextrotator', get_template_directory_uri() . '/assets/lib/simple-text-rotator/simpletextrotator.css');
    wp_enqueue_style('default', get_template_directory_uri() . '/assets/css/colors/default.css');
    wp_enqueue_style('dashicons');

    // Add JS script files
    wp_register_script('jquery', get_template_directory_uri() . '/assets/lib/jquery/dist/jquery.js', null, null, false);
    wp_enqueue_script('jquery');

    wp_register_script('boostrap', get_template_directory_uri() . '/assets/lib/bootstrap/dist/js/bootstrap.min.js', null, null, true);
    wp_enqueue_script('boostrap');

    wp_register_script('wow', get_template_directory_uri() . '/assets/lib/wow/dist/wow.js', null, null, true);
    wp_enqueue_script('wow');

    wp_register_script('jquery-mb-YTPlayer', get_template_directory_uri() . '/assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js', array('jquery'), null, true);
    wp_enqueue_script('jquery-mb-YTPlayer');

    wp_register_script('isotope-pkgd', get_template_directory_uri() . '/assets/lib/isotope/dist/isotope.pkgd.js', null, null, true);
    wp_enqueue_script('isotope-pkgd');

    wp_register_script('imagesloaded-pkgd', get_template_directory_uri() . '/assets/lib/imagesloaded/imagesloaded.pkgd.js', null, null, true);
    wp_enqueue_script('imagesloaded-pkgd');

    wp_register_script('jquery-flexslider', get_template_directory_uri() . '/assets/lib/flexslider/jquery.flexslider.js', null, null, true);
    wp_enqueue_script('jquery-flexslider');

    wp_register_script('owl-carousel-min', get_template_directory_uri() . '/assets/lib/owl.carousel/dist/owl.carousel.min.js', null, null, true);
    wp_enqueue_script('owl-carousel-min');

    wp_register_script('smoothscroll', get_template_directory_uri() . '/assets/lib/smoothscroll.js', null, null, true);
    wp_enqueue_script('smoothscroll');

    wp_register_script('magnific-popup', get_template_directory_uri() . '/assets/lib/magnific-popup/dist/jquery.magnific-popup.js', array('jquery'), null, true);
    wp_enqueue_script('magnific-popup');

    wp_register_script('simple-text-rotator', get_template_directory_uri() . '/assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js', array('jquery'), null, true);
    wp_enqueue_script('simple-text-rotator');

    // ------------------------------------------------------------------------------------------- //

    wp_register_script('main', get_template_directory_uri() . '/assets/js/main.js', null, null, true);
    wp_enqueue_script('main');

    wp_register_script('plugins', get_template_directory_uri() . '/assets/js/plugins.js', null, null, true);
    wp_enqueue_script('plugins');

    wp_register_script('preview', get_template_directory_uri() . '/assets/js/preview.js', null, null, true);
    wp_enqueue_script('preview');

    wp_enqueue_script('masonry'); //Active masonry library
    wp_register_script('masonry-init', get_template_directory_uri() . '/assets/js/masonry-init.js', null, null, true);
    wp_enqueue_script('masonry-init');
}
add_action('wp_enqueue_scripts', 'principalTheme_scripts');


/*Limitar número de palabras del excerpt*/
function wpdocs_custom_excerpt_length($length)
{
    return 30;
}
add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);




function add_admin_scripts()
{
    wp_register_script('preview', get_template_directory_uri() . '/assets/js/preview.js', null, null, true);
    wp_enqueue_script('preview');
}

add_action('admin_enqueue_scripts', 'add_admin_scripts');

/**
 * Retrieves a page object based on the title of the page
 * @param $title string Page title
 * @return $page Page object
 */
function get_page_object($title)
{
    $query = new WP_Query(
        array(
            'post_type'              => 'page', // Solo queremos posts tipo página
            'title'                  =>  $title, // Titulo de la página suministrado como parámetro de entrada
            'post_status'            => 'all', //Este o no publicada
            'posts_per_page'         => 1, //Solo queremos una página
            'no_found_rows'          => true,
            'ignore_sticky_posts'    => true,
            'update_post_term_cache' => false,
            'update_post_meta_cache' => false,
            'orderby'                => 'post_date ID',
            'order'                  => 'ASC',
        )
    );

    if (!empty($query->post)) {
        $page = $query->post;
    } else {
        $page  = null;
    }
    return $page;
}


/**
 * List post tags
 * @param $id integer post id
 * @return $tags Page object
 */
function get_post_tags($id)
{
    $tags = wp_get_post_tags($id); // Obtener las etiquetas del post utilizando la función de WordPress

    return $tags;
}

/**
 * List post tags
 * @param $limit integer Number of tags listed
 * @return $tag_list string List of tags
 */
function get_tag_list($limit)
{

    $args = array(
        'number' => $limit,
        'orderby' => 'count',
        'order' => 'DESC',
    );

    $tags = get_tags($args); //Tag object collection

    $tag_list = '';

    foreach ($tags as $tag) {
        $tag_list .= '<li><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '<span class="badge pull-right">' . $tag->count . '</span></a></li>';
    }

    return $tag_list;
}

/**
 * Register widgets zone for tag-cloud & calendar sidebar
 */
function register_widget_zone()
{
    $args = array(
        'name' => 'Sidebar Widgets', //El nombre que hemos usado en el if del sidebar
        'id' => 'sidebar-widgets', //
        'description' => 'Sidebar Widgets Zone',
        //'before_widget' => '<div class="widget-zone>"', //No sisrve para declarar una caja que va a contener los widgets - esto es opcional
        //'after_widget' => '</div>',
    );
    register_sidebar($args);
}
add_action('widgets_init', 'register_widget_zone');



/**
 * Retrivr the number of visits of a post
 * @param int post_id
 * @return string number of visits
 */

function get_num_visits($post_id)
{
    $numvisits = get_post_meta($post_id, 'numvisits', true);

    if (!$numvisits) $numvisits = 0; //Si no existe el metadato
    if ($numvisits == 1) { //Si $numvisits es 1
        return $numvisits . ' visit'; //Concatenamos en singular la palabra visit
    } else {
        return $numvisits . ' visits'; //Concatenamos en plural la palabra visits
    }
}


/**
 * Update the number of visits of a post
 * @param $title string Page title
 */
function add_num_visits($post_id)
{
    $numvisits = get_post_meta($post_id, 'numvisits', true);
    if ($numvisits == 0) { //Si ocurre esto es que el contador todavía no existe, tenemos que crearlo
        add_post_meta($post_id, 'numvisits', 1, true);
    } else { //Si el contador existe añadiremos una visita mas a este posts
        $numvisits++;
        update_post_meta($post_id, 'numvisits', $numvisits);
    }
}

// --------------------------------------------- AUTHORS ---------------------------------------------- //

/**
 * Get the author role with a given author_id
 * @param int $author_id author_id
 */

function get_author_role($author_id)
{
    //Get the author object
    $author = get_userdata($author_id);
    //Store the author roles array
    $roles = $author->roles;
    //Retrive the author roles like a string comma separated
    return implode(',', $roles);
}

/**
 * Add social media fields
 * @param $user_methods array user profile fields - Provided by 'user_contactmethods' action hook;
 * @return $user_methods array User profile fileds
 */

function add_social_media_fields($user_methods)
{
    $user_methods['facebook'] = 'Facebook ';
    $user_methods['twitter'] = 'Twitter ';
    $user_methods['instagram'] = 'Instagram ';
    $user_methods['linkedin'] = 'LinkdIn ';

    return $user_methods;
}
add_action('user_contactmethods', 'add_social_media_fields');

/**
 * Add skills fields in user profile
 * @param $user object Nos lo proveen dos hooks ('show_user_profile' y 'edit_user_profile');
 */

function add_user_skill_info($user)
{
    //Draw the form fields for skills with html tags

    //If we have a pic uploaded get the url, on the contrary display transparent miniature

    if (!empty(get_user_meta($user->ID, 'user_pic', true))) {
        $src = get_user_meta($user->ID, 'user_pic', true);
    } else {
        $src = get_template_directory_uri() . "/assets/images/transparente.png";
    }

?>
    <h3>User Profile Picture</h3>
    <div class="flex-profile-pic">
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
        <input type="file" name="user_pic" id="user_pic" />
    </div>
    <div>
        <img src="<?php echo $src; ?>" id="previewImg" height="200" />
        <p><?php echo get_user_meta($user->ID, 'user_pic', true); ?></p>
    </div>
    <h3>User Skills</h3>
    <table class='form-table'>
        <tr>
            <th>
                <lable for='skill1'>Skill 1</lable>
            </th>
            <td><input type="text" name="skill1" id='skill1' value='<?php echo get_user_meta($user->ID, 'skill1', true); ?>' /></td>
            <th>
                <lable for='skill1V'>Skill Value</lable>
            </th>
            <td><input type="text" name="skill1V" id='skill1V' value='<?php echo get_user_meta($user->ID, 'skill1V', true); ?>' /></td>
        </tr>
        <tr>
            <th>
                <lable for='skill2'>Skill 2</lable>
            </th>
            <td><input type="text" name="skill2" id='skill2' value='<?php echo get_user_meta($user->ID, 'skill2', true); ?>' /></td>
            <th>
                <lable for='skill2V'>Skill Value</lable>
            </th>
            <td><input type="text" name="skill2V" id='skill2V' value='<?php echo get_user_meta($user->ID, 'skill2V', true); ?>' /></td>
        </tr>
        <tr>
            <th>
                <lable for='skill3'>Skill 3</lable>
            </th>
            <td><input type="text" name="skill3" id='skill3' value='<?php echo get_user_meta($user->ID, 'skill3', true); ?>' /></td>
            <th>
                <lable for='skill3V'>Skill Value</lable>
            </th>
            <td><input type="text" name="skill3V" id='skill3V' value='<?php echo get_user_meta($user->ID, 'skill3V', true); ?>' /></td>
        </tr>
        <tr>
            <th>
                <lable for='skill4'>Skill 4</lable>
            </th>
            <td><input type="text" name="skill4" id='skill4' value='<?php echo get_user_meta($user->ID, 'skill4', true); ?>' /></td>
            <th>
                <lable for='skill4V'>Skill Value</lable>
            </th>
            <td><input type="text" name="skill4V" id='skill4V' value='<?php echo get_user_meta($user->ID, 'skill4V', true); ?>' /></td>
        </tr>
    </table>

<?php
}
add_action('show_user_profile', 'add_user_skill_info');
add_action('edit_user_profile', 'add_user_skill_info');

/**
 * Insert enctype to user profile form in admin area
 */

function add_enctype_to_user_form()
{
    echo 'enctype=multipart/form-data';
}
add_action('user_edit_form_tag', 'add_enctype_to_user_form');


/**
 * Save skills fields in user profile
 * @param $user_id object Nos lo proveen dos hooks ('personal_options_update' y 'edit_user_profile_update') estos hook solo devuelve el ID no devuelven el objeto;
 */

function save_skills_info($user_id)
{

    //Save our profile picture

    //Grab the file data
    $user_info = get_userdata($user_id);
    $user_name = $user_info->user_login;

    if ($_FILES['user_pic']['error'] == UPLOAD_ERR_OK) {

        $upload_dir = wp_upload_dir(); //Path to upload files folder in wordpress structure - No te lo devuelve con barra /
        $subdir = '/team/';
        $upload_path = $upload_dir['basedir'] . $subdir;
        $file_name = $user_name . '-' . $_FILES['user_pic']['name'];
        $file_temp = $_FILES['user_pic']['tmp_name'];
        $file_dest = $upload_path . $file_name;

        if (move_uploaded_file($file_temp, $file_dest)) {

            $upload_dir = wp_get_upload_dir();
            $file_url = $upload_dir['baseurl'] . $subdir . $file_name;


            //The file have been correctly moved -> store the new url
            update_user_meta($user_id, 'user_pic', $file_url);
        } else {
            //Something bad happens -> store the error message
            $pic_error = "<strong>Something bad happens, the pic could not be loaded ...</strong>";
            update_user_meta($user_id, 'user_pic', true);
        };
    }



    update_user_meta($user_id, 'skill1', $_POST['skill1']);
    update_user_meta($user_id, 'skill1V', $_POST['skill1V']);

    update_user_meta($user_id, 'skill2', $_POST['skill2']);
    update_user_meta($user_id, 'skill2V', $_POST['skill2V']);

    update_user_meta($user_id, 'skill3', $_POST['skill3']);
    update_user_meta($user_id, 'skill3V', $_POST['skill3V']);

    update_user_meta($user_id, 'skill4', $_POST['skill4']);
    update_user_meta($user_id, 'skill4V', $_POST['skill4V']);
}
add_action('personal_options_update', 'save_skills_info');
add_action('edit_user_profile_update', 'save_skills_info');

// --------------------------------------------- COMMENTS ---------------------------------------------- //

/**
 * Quitar el campo website (url) del formulario de comentarios
 * @param $fields array Lista de campos del form -> nos lo suministra el hook comment_form_default_fields
 * @return $fields array
 */

function delete_url_form_comment_form($fileds)
{ 

    unset($fileds['url']);

    return $fileds;
}

add_action('comment_form_default_fields', 'delete_url_form_comment_form');

/**
 * Reorder comment form fields
 * @param $fields array Lista de campos del form -> nos lo suministra el hook comment_form_fields
 * @return $fields array
 */

function reorder_comment_form_fields($fields)
{

    if (!is_user_logged_in()) {
        $aux = array();

        array_push($aux, $fields['author']);
        array_push($aux, $fields['email']);
        array_push($aux, $fields['comment']);
        array_push($aux, $fields['cookies']);
        array_push($aux, $fields['consent']);

        return $aux;
    } else {
        return $fields;
    }
}

add_action('comment_form_fields', 'reorder_comment_form_fields');

/**
 * Reorder comment form fields
 * @param $fields array Lista de campos del form -> nos lo suministra el hook comment_form_default_fields
 * @return $fields array
 */

function add_consent_field($fields)
{

    $fields['consent'] = '<p><input type="checkbox" name="consent" id="consent"><label form="consent">Check this box to allow us to post your comment. Doing so, you are accepting <a href="' . get_page_link(get_page_object('Privacy Policy')->ID) . '">privacy policy</a></label></p>';

    return $fields;
}

add_action('comment_form_default_fields', 'add_consent_field');

/**
 * Save comment consent field in Data Base
 * @param $comment_id integer Comment consent form field ID -> Provided by the hook comment_post
 */

function save_consent_field($comment_id)
{

    $consent_value = $_POST['consent'];

    if ($consent_value) {
        $value = 'Consent checkbox is checked. I accept the privacy policy.';
    } else {
        if (is_user_logged_in()) {
            $value = 'Logged user. Privacy Policy have been alredy accepted.';
        } else {
            $value = 'Consent checkbox NOT checked. I do NOT accept the privacy policy.';
        }
    }

    update_comment_meta($comment_id, 'consent', $value);
}

add_action('comment_post', 'save_consent_field');


/**
 * Create a new column in admin area for consent comment form field
 * @param $columns array Columns of comments fields in admin-area -> Provided by the hook manage_edit-comments_columns
 * @return $columns array
 */

function create_consent_colum($columns)
{
    $columns = array(
        'cb' => '<input type="checkbox">',
        'author' => 'Author',
        'comment' => 'Comment',
        'consent' => 'Consent',
        'response' => '	In response to',
        'date' => 'Submmited on',
    );

    return $columns;
}

add_action('manage_edit-comments_columns', 'create_consent_colum');

/**
 * Display consent comment form field in admin-area
 * @param $column string Where to display the value -> Provided by the hook manage_comments_custom_column
 * @param $comment_id array Comment ID
 */

function display_consent_column_value($column, $comment_id)
{

    if ($column == 'consent') {
        echo get_comment_meta($comment_id, 'consent', true);
    }
}

add_action('manage_comments_custom_column', 'display_consent_column_value', 1, 2);



// --------------------------------------------- CUSTOMIZE LOGIN ---------------------------------------------- //

/**
 * Customize login template LOGO
 */

function custom_login_logo()
{
?>

    <style>
        #login h1 a,
        .login h1 a {
            background-image: url("<?php echo get_template_directory_uri(); ?>/assets/images/logo/logoblancoletras.png");
            filter: brightness(200%);
            width: 300px;
            background-size: contain;
            background-position: center center;
        }

        .login {
            background-image: url("<?php echo get_template_directory_uri(); ?>/assets/images/backgrounds/bk.jpg");

            background-size: cover;
            background-position: center center;
        }
    </style>

<?php
}

add_action('login_enqueue_scripts', 'custom_login_logo');

/**
 * Redirect login logo url
 */

function redirect_login_logo_url()
{
    return home_url('/');
}

add_filter('login_headerurl', 'redirect_login_logo_url');

/**
 * Customize login error
 */

function customize_login_error()
{
    return 'Oooops! you must enter a valid username and password ...';
}

add_filter('login_errors', 'customize_login_error');

/**
 * 
 * Customize login form
 * 
 */


// --------------------------------------------- SHORT CODE ---------------------------------------------- //

function br_callback()
{
    return '<br>';
}

add_shortcode('br', 'br_callback');



// function get_page_link($title){
//     $array_of_objects = get_posts([
//         'title' => $title,
//         'post_type' => 'page',
//     ]);
//     $id = $array_of_objects[0];
//     $id = $id->ID;
//     $link = get_permalink($id);
//     return $link;
// }


/**
 * Show custom number for posts per page depending on template
 * @param $query string WP_Query -> provided by the hook pre_get_posts 
 */
function custom_posts_per_page($query)
{
    if (is_search() && $query->is_main_query()) { //if we are in search.php or archive.php templates
        //Modify WP Query argument 'post_per_page
        $query->set('posts_per_page', '15');
    }
    if (is_archive() && $query->is_main_query()) { //if we are in search.php or archive.php templates
        //Modify WP Query argument 'post_per_page
        $query->set('posts_per_page', '5');
    }
}

add_action('pre_get_posts', 'custom_posts_per_page');

// /**
//  * Show custom number for posts per page depending on template
//  * @param $query string WP_Query -> provided by the hook pre_get_posts 
//  */

function exclude_CPT_from_query($query)
{
    $query->set('post_type', array('post', 'page', 'events'));
}

// add_action('pre_get_posts', 'exclude_CPT_from_query');
